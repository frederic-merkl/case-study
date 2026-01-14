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



    /**
     * logout and ivalidate session with auth facade
     * regenerate CSRF token
     * redirect to login
     */
    public function logout(Request $request)
    {
        Auth::logout();
        // destroys all session-data and invalidates the current session ID
        $request->session()->invalidate();
        // generates new empty session token with new ID, old ID gets overwritten.
        $request->session()->regenerate();
        // redirect and sets key for view and content with flash message for the next request
        return redirect('/login')->with('success', 'Du wurdest erfolgreich abgemeldet.');
    }

}