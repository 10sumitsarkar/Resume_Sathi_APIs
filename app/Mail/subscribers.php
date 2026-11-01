<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class subscribers extends Mailable
{
    use Queueable, SerializesModels;
    public $msg;
    public $articles;
    public $examGuides;

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
        return $this
            ->subject('Thanks for subscribing to our newsletter')
            ->view('emails.subscriber');

    }
}
