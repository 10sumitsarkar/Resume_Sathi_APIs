<?php

namespace Modules\Api\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'phone' => 'nullable|string|max:20',
        ]);

        $contact = ContactUs::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'phone' => $validated['phone'] ?? null,
            'status' => false,
        ]);

        return response()->json([
            'message' => 'Contact form submitted successfully',
            'data' => $contact
        ], 201);
    }
} 