<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function camping()
    {
        $images = Image::where('page', 'camping')->get();
        return view('user.camping', compact('images'));
    }
    public function picnic()
    {
        $images = Image::where('page', 'picnic')->get();
        return view('user.picnic', compact('images'));
    }
    public function camperVan()
    {
        $images = Image::where('page', 'camperVan')->get();
        return view('user.camperVan', compact('images'));
    }
    public function groupEvent()
    {
        $images = Image::where('page', 'groupEvent')->get();
        return view('user.groupEvent', compact('images'));
    }
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
