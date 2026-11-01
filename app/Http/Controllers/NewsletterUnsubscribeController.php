<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Response;

class NewsletterUnsubscribeController extends Controller
{
    public function confirm(Subscriber $subscriber): Response
    {
        return response()->view('emails.unsubscribe', [
            'unsubscribeUrl' => rtrim(config('app.email_asset_url'), '/') . request()->getRequestUri(),
        ]);
    }

    public function unsubscribe(Subscriber $subscriber): Response
    {
        $subscriber->delete();

        return response()->view('emails.unsubscribe-complete');
    }
}
