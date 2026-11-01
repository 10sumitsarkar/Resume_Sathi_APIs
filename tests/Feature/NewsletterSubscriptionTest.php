<?php

namespace Tests\Feature;

use App\Mail\subscribers;
use App\Models\Subscriber;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class NewsletterSubscriptionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Schema::dropIfExists('subscribers');
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function test_subscribing_saves_email_and_sends_confirmation(): void
    {
        Mail::fake();

        $this->postJson('/api/subscribers', ['email' => 'reader@example.com'])
            ->assertCreated()
            ->assertJsonPath('email_sent', true);

        $this->assertDatabaseHas('subscribers', ['email' => 'reader@example.com']);

        Mail::assertSent(subscribers::class);
        Mail::assertSent(subscribers::class, function (subscribers $mail): bool {
            return ($mail->msg['subscriber_id'] ?? null) === 1;
        });
    }

    public function test_confirmation_email_contains_a_signed_unsubscribe_link(): void
    {
        $mail = new subscribers([
            'email' => 'reader@example.com',
            'subscriber_id' => 1,
        ], [
            (object) [
                'url_name' => 'sample-article',
                'article_title' => 'Sample article',
                'hero_image' => 'https://api.resumesathi.com/email-assets/wa.png',
            ],
        ], [
            (object) [
                'slug' => 'sample-guide',
                'title' => 'Sample guide',
                'hero_image' => 'https://api.resumesathi.com/email-assets/fb.png',
            ],
        ]);

        $html = $mail->render();

        $this->assertStringContainsString(
            'https://api.resumesathi.com/api/newsletter/unsubscribe/1?',
            $html
        );
        $this->assertStringContainsString('Unsubscribe', $html);
        $this->assertSame(8, substr_count($html, 'src="data:image/'));
    }

    public function test_duplicate_subscriptions_return_validation_error_without_resending_email(): void
    {
        Mail::fake();

        $this->postJson('/api/subscribers', ['email' => 'reader@example.com'])->assertCreated();

        $this->postJson('/api/subscribers', ['email' => 'reader@example.com'])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('email');

        Mail::assertSent(subscribers::class, 1);
    }

    public function test_unsubscribe_confirmation_does_not_remove_subscriber_until_confirmed(): void
    {
        $subscriber = Subscriber::create(['email' => 'reader@example.com']);
        $url = URL::temporarySignedRoute(
            'newsletter.unsubscribe.confirm',
            now()->addMinutes(30),
            ['subscriber' => $subscriber->id],
            false
        );

        $this->get($url)
            ->assertOk()
            ->assertSee('Confirm that you no longer want to receive newsletter emails');

        $this->assertDatabaseHas('subscribers', ['id' => $subscriber->id]);
    }

    public function test_signed_one_click_unsubscribe_removes_subscriber(): void
    {
        $subscriber = Subscriber::create(['email' => 'reader@example.com']);
        $url = URL::temporarySignedRoute(
            'newsletter.unsubscribe.confirm',
            now()->addMinutes(30),
            ['subscriber' => $subscriber->id],
            false
        );

        $this->post($url, ['List-Unsubscribe' => 'One-Click'])
            ->assertOk()
            ->assertSee('You&rsquo;re unsubscribed', false);

        $this->assertDatabaseMissing('subscribers', ['id' => $subscriber->id]);
    }

    public function test_unsubscribe_rejects_an_invalid_signature(): void
    {
        $subscriber = Subscriber::create(['email' => 'reader@example.com']);

        $this->post('/api/newsletter/unsubscribe/' . $subscriber->id)
            ->assertForbidden();

        $this->assertDatabaseHas('subscribers', ['id' => $subscriber->id]);
    }
}
