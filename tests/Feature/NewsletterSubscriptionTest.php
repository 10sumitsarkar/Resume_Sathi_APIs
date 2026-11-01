<?php

namespace Tests\Feature;

use App\Mail\subscribers;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
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
}
