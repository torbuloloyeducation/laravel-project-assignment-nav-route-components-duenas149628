<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; 

Route::get('/', function () {
    // We send the current session emails to the view so they display immediately
    $emails = session()->get('emails', []);
    return view('welcome', ['emails' => $emails]); 
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/showcases', function () {
    return view('showcases');
});

Route::get('/blog', function () {
    return view('blog');
});

// --- ACTIVITY 2 ROUTES ---

Route::post('/submit-email', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
    ]);

    $newEmail = $request->input('email');
    $emails = session()->get('emails', []);

    // TASK 3: Check for duplicates
    if (in_array($newEmail, $emails)) {
        return back()->with('error', 'That email is already in the list!');
    }

    // TASK 6: Limit to 5 entries
    if (count($emails) >= 5) {
        return back()->with('error', 'Limit reached! You can only store 5 emails.');
    }

    // If both checks pass, add the email
    $emails[] = $newEmail;
    session(['emails' => $emails]);

    return back()->with('success', 'Email added successfully!');
});

Route::post('/delete-email/{index}', function ($index) {
    // Get the current list
    $emails = session()->get('emails', []);

    // If the index exists, remove it
    if (isset($emails[$index])) {
        unset($emails[$index]);
        // array_values resets the numbering so there are no gaps (0, 1, 2...)
        session(['emails' => array_values($emails)]);
    }

    return back()->with('success', 'Email removed successfully!');
});