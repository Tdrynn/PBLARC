<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function welcome()
    {
        $images = Image::where('page', 'home')->get();
        return view('welcome', compact('images'));
    }
    public function home()
    {
        $images = Image::where('page', 'home')->get();
        return view('user.home', compact('images'));
    }
}
