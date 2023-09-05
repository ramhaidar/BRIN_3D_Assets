<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Rule;

class RegistrationController extends Controller
{
    public function register ( Request $request )
    {
        $request->validate ( [ 
            'Captcha'  => [ 'required', new CheckCaptcha ],

            'Username' => [ 'required', 'min:6', 'unique:users,username' ],
            'Email'    => [ 
                'required',
                'email',
                'unique:users,email',
                function ($attribute, $value, $fail)
                {
                    if ( ! str_ends_with ( $value, '@gmail.com' ) )
                    {
                        $fail ( $attribute . ' must be a @gmail.com email address.' );
                    }
                }
            ],
            'Password' => [ 'required', 'min:6' ],
        ] );

        // Store the user...
        $user           = new User;
        $user->username = $request->Username;
        $user->email    = $request->Email;
        $user->password = Hash::make ( $request->Password );
        $user->save ();

        // Redirect on success...
        return redirect ()->route ( 'signin' )->with ( 'success', 'Account Succesfully Registered!' );
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