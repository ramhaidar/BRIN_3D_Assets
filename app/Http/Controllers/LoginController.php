<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Rule;

class LoginController extends Controller
{
    public function login ( Request $request )
    {
        // First, validate the captcha
        $request->validate ( [ 
            'Captcha'  => [ 'required', new CheckCaptcha ],

            'Username' => [ 'required', 'min:6', 'exists:users,username' ],
            'Password' => [ 'required', 'min:6' ],
        ] );

        $request->merge ( [ 
            'username' => $request->input ( 'Username' ),
            'password' => $request->input ( 'Password' ),
        ] );

        // Retrieve the form data
        $credentials = $request->only ( 'username', 'password' );

        // Attempt to authenticate the user
        if ( Auth::attempt ( $credentials ) )
        {
            // Authentication was successful
            return redirect ()->route ( 'home' )->with ( 'success', 'Login success!' );
        }
        else
        {
            // Authentication failed
            return back ()->withErrors ( [ 
                'message' => 'The provided credentials do not match our records.',
            ] );
        }
    }

    public function logout ( Request $request )
    {
        Auth::logout ();

        $request->session ()->invalidate ();

        $request->session ()->regenerateToken ();

        return redirect ()->route ( 'home' );
    }
}

class CheckCaptcha implements Rule
{
    public function passes ( $attribute, $value )
    {
        return Hash::check ( $value, session ( 'captcha.key' ) );
    }

    public function message ()
    {
        return 'The captcha you entered is incorrect.';
    }
}