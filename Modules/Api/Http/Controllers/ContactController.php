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
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'message' => 'required|string',
            'subject' => 'nullable|string|max:255', // Validation ke liye rakha hai, DB me save nahi hoga
        ]);

        // Full name ko first_name & last_name me split karna
        $nameParts = preg_split('/\s+/', trim($validated['name']), 2);

        $contact = ContactUs::create([
            'first_name'  => $nameParts[0] ?? '',
            'last_name'   => $nameParts[1] ?? '',
            'email'       => $validated['email'],
            'phone_number'=> $validated['phone'] ?? null,
            'message'     => $validated['message'],
        ]);

        return response()->json([
            'message' => 'Contact form submitted successfully',
            'data'    => $contact,
        ], 201);
    }
}
