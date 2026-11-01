<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;
use Symfony\Component\Mime\Email;

class subscribers extends Mailable
{
    use Queueable, SerializesModels;
    public $msg;
    public $articles;
    public $examGuides;
    public $unsubscribeUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($msg, $articles = [], $examGuides = [])
    {
        $this->msg = $msg;
        $this->articles = $articles;
        $this->examGuides = $examGuides;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this
            ->subject('Thanks for subscribing to our newsletter')
            ->view('emails.subscriber');

        $subscriberId = $this->msg['subscriber_id'] ?? null;
        if ($subscriberId) {
            $relativeUrl = URL::temporarySignedRoute(
                'newsletter.unsubscribe.confirm',
                now()->addYears(5),
                ['subscriber' => $subscriberId],
                false
            );
            $this->unsubscribeUrl = rtrim(config('app.email_asset_url'), '/') . $relativeUrl;

            $mail->withSymfonyMessage(function (Email $message): void {
                $message->getHeaders()->addTextHeader(
                    'List-Unsubscribe',
                    '<' . $this->unsubscribeUrl . '>'
                );
                $message->getHeaders()->addTextHeader(
                    'List-Unsubscribe-Post',
                    'List-Unsubscribe=One-Click'
                );
            });
        }

        return $mail;
    }
}
