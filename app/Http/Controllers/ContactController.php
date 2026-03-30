<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Honeypot check
        if ($request->filled('website')) {
            return redirect('/contact');
        }

        // Rate limiting: 3 submissions per minute per IP
        $key = 'contact:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 3)) {
            return back()->withErrors(['form_error' => __('contact.too_many_requests')])->withInput();
        }
        RateLimiter::hit($key, 60);

        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'subject' => 'required|string|max:150',
            'message' => 'required|string|max:2000',
        ]);

        try {
            Mail::to(config('mail.contact_to'))->send(new ContactMail($validated));
        } catch (\Symfony\Component\Mailer\Exception\TransportExceptionInterface $e) {
            Log::error('Contact form email failed', ['error' => $e->getMessage()]);

            return back()->withErrors(['form_error' => __('contact.send_failed')])->withInput();
        }

        return redirect('/contact')->with('success', __('contact.success'));
    }
}
