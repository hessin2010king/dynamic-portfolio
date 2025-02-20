<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
{
    // Retrieve all contact submissions
    $submissions = ContactSubmission::all();

    // Return a view with the submissions
    return view('contact.index', compact('submissions')); // Create this view
}
    // Show contact form
    public function show()
    {
        return view('contact'); // Ensure you create this view
    }

    // Store contact form submission
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Create a new contact submission
        $submission = ContactSubmission::create($request->all());

        // Optional: Send notification email
        Mail::raw('You have a new contact submission: ' . $submission->message, function ($message) use ($submission) {
            $message->to('your-email@example.com') // replace with your email
                    ->subject('New Contact Submission from ' . $submission->name);
        });

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
