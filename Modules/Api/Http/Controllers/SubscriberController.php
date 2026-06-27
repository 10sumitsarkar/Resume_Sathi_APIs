<?php

namespace Modules\Api\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:subscribers,email',
            'name' => 'nullable|string|max:255',
        ]);

        $subscriber = Subscriber::create([
            'email' => $validated['email'],
            'name' => $validated['name'] ?? null,
            'status' => true,
        ]);

        return response()->json([
            'message' => 'Successfully subscribed to newsletter',
            'data' => $subscriber
        ], 201);
    }
} 