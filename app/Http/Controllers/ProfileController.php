<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $data_user = Auth::user();
        return view('profile.show', compact('data_user'));
    }

    public function edit()
    {
        $data_user = Auth::user();
        return view('profile.edit', compact('data_user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email'
        ]);

        $data_user = Auth::user();

        $data_user->update([
            'username' => $request->username,
            'email' => $request->email,
        ]);

        $data_user->save();

        return redirect()->route('profile.show');
    }
}
