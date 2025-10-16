<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index(){

         $user = Auth::user();
        return view('auth.profile',compact('user'));
    }
    public function update(Request $request)
    {
         $user = Auth::user();

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|max:20',
             'profile_image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

          if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $path = $image->store('profile_images', 'public');
                $validated['profile_image'] = $path;
            }


        $user->update($validated);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
    public function changepassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'confirmed'
            ],
        ]);

        $user = auth()->user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Old password is incorrect.');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password changed successfully!');
    }

}
