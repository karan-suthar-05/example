<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view("auth.login");
    }

    public function store(Request $request)
    {
        // validate
        $attributes = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        // attemp to login if fail throw VE
        if(! Auth::attempt($attributes))
        {
            throw ValidationException::withMessages([
                'password' => "Sorry, given credentials are incorrect!!!"
            ]);
        }
        // regenerate session token
        $request->session()->regenerate();
        // redirect
        return redirect("/jobs");
    }

    public function destroy()
    {
        Auth::logout();
        return redirect("/");
    }
}
