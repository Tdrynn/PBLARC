<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassController extends Controller
{
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'oldpass' => 'required',
            'password' => 'required',
            'confirmpass' => 'required|same:password'
        ]);

        // Ambil user
        $user = User::find(Auth::id());

        // Cek password lama
        if (!Hash::check($request->oldpass, $user->password)) {
            return back()->withErrors(['oldpass' => 'Password lama salah']);
        }

        // Update password
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password berhasil diubah!');
    }
}
