<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Rule;

class LoginController extends Controller
{
    public function signin ( Request $request )
    {
        // First, validate the captcha
        $request->validate ( [ 
            'Captcha'  => [ 'required', new CheckCaptcha ],
            'Username' => [ 'required' ],
            'Password' => [ 'required', 'min:6' ],
        ] );

        $usernameOrEmail = $request->input ( 'Username' );
        $password        = $request->input ( 'Password' );

        // Attempt to authenticate the user by username or email
        if (
            Auth::attempt ( [ 'username' => $usernameOrEmail, 'password' => $password ] ) ||
            Auth::attempt ( [ 'email' => $usernameOrEmail, 'password' => $password ] )
        )
        {
            // Authentication was successful

            // Check if the authenticated user has the "Admin" role
            if ( Auth::user ()->roles ()->where ( 'name', 'Admin' )->exists () )
            {
                // Redirect to the Admin Dashboard
                return redirect ()->route ( 'dashboard_admin_uploads' )->with ( 'success', 'Login success!' );
            }
            else
            {
                // Redirect to the User Dashboard
                return redirect ()->route ( 'dashboard_user_uploads' )->with ( 'success', 'Login success!' );
            }
        }
        else
        {
            // Authentication failed
            return redirect ()->back ()->with ( 'customError', 'Authentication failed. Please try again.' );
        }
    }

    public function signout ( Request $request )
    {
        Auth::logout ();

        $request->session ()->invalidate ();

        $request->session ()->regenerateToken ();

        // return redirect ()->route ( 'home' );
        return back ()->with ( 'success', 'Logout success!' );
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