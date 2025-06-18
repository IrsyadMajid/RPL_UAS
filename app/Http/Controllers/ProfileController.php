<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:Laki-Laki,Perempuan',
            'password' => 'nullable|string|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->fullname = $validatedData['fullname'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'] ?? $user->phone;
        $user->gender = $validatedData['gender'] ?? $user->gender;

        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) {
                Storage::delete('public/profile_photos/'.$user->profile_photo);
            }

            $filename = time().'_'.$request->profile_photo->getClientOriginalName();
            $request->profile_photo->storeAs('public/profile_photos', $filename);
            $user->profile_photo = $filename;
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile berhasil diperbarui!');
    }
}
