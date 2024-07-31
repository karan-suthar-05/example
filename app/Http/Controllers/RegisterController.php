<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create()
    {
        return view("auth.register");
    }
    public function store(Request $request)
    {
        // validate
        $attributes = $request->validate([
            "first_name" => ['required','min:2'],
            "last_name" => ['required','min:2'],
            "email" => ['required','email','unique:Users,email'],
            "password" => ['required',Password::min(5)->letters()->numbers()->mixedCase()->symbols(),'confirmed'],
        ]);
        // create user
        $user = User::create($attributes);
        // logs in the user
        Auth::login($user);
        // redirect
        return redirect("/jobs");
    }
}
