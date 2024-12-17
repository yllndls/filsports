<?php

namespace App\Http\Controllers;

use App\Models\CustomerFeedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function create()
    {
        return view('user.feedback');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'required|string|min:10',
        ]);

        CustomerFeedback::create([
            'user_id' => auth()->id(),
            'rating' => $validated['rating'],
            'feedback' => $validated['feedback'],
            'is_approved' => false // Set to false by default
        ]);

        return back()->with('success', 'Thank you for your feedback! It will be displayed after admin approval.');
    }
}