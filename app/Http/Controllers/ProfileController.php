<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Booking;


class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        // update data session biar langsung ke-refresh
        session([
            'user_name' => $user->name,
            'user_email' => $user->email,
            'user_phone' => $user->phone,
        ]);

        return back()->with('success', 'Profile updated!');
    }

    public function history()
    {
        $bookings = Booking::with(['package'])
            ->where('user_id', auth()->id())
            ->orderByDesc('created_at')
            ->paginate(2);

        return view('user.history', compact('bookings'));
    }


}
