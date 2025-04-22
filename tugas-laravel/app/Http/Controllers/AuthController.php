<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();

        if (!$user) {
            $user = User::create([
                'name' => 'User Default',
                'email' => $email,
                'password' => Hash::make($password),
            ]);
        }

        if (Hash::check($password, $user->password)) {
            Auth::login($user);
            return redirect('/biodata');
        } else {
            return back()->withErrors(['password' => 'Password salah'])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
