<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function all()
    {
        $reviews = Review::latest()->get();
        $averageRating = Review::avg('rating');
        $totalReviews = Review::count();

        return view('user.review_list', compact('reviews', 'averageRating', 'totalReviews'));
    }

    public function welcome()
    {
        // Ambil 2 review terbaru
        $reviews = Review::latest()->take(2)->get();
        $averageRating = Review::avg('rating');
        $totalReviews = Review::count();
        return view('welcome', compact('reviews', 'averageRating', 'totalReviews'));
    }
    public function home()
    {
        // Ambil 2 review terbaru
        $reviews = Review::latest()->take(2)->get();
        $averageRating = Review::avg('rating');
        $totalReviews = Review::count();
        return view('user.home', compact('reviews', 'averageRating', 'totalReviews'));
    }

    public function index()
    {
        $reviews = Review::latest()->paginate(9);
        $averageRating = Review::avg('rating');
        $totalReviews = Review::count();
        return view('user.review_list', compact('reviews', 'averageRating', 'totalReviews'));
    }

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
