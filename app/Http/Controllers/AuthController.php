<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    // login - show login form
    public function index()
    {
        return view('auth.login');
    }


    public function store(LoginRequest $loginRequest)
    {
        $login_data = $loginRequest->validated();

        if (Auth::attempt($login_data)) {
            $loginRequest->session()->regenerate(); // to prevent session fixation - IMPORTANT
            return redirect()->intended(route('jobs.index')); // indendet() routes the user to the intendet uri before login inteception
                                                                            // 'jobs.index' is a fallback, if user went directly to login page.
        } else {
            return back()->withErrors([
                'email' => 'Die Zugangsdaten sind falsch.',
            ])->onlyInput('email');
        }
    }

}