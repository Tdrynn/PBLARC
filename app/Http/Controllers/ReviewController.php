<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string'
        ]);
        $user = $request->user();
        Review::create([
            'rating' => $request->rating,
            'review' => $request->review,
            'user_id' => $user->id,
            'name' => $user->name,
        ]);

        return redirect()->back()->with('success', 'Thanks for review');
    }
}
