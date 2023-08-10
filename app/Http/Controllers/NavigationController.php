<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function about_us ( Request $request )
    {
        if ( request ()->segment ( 1 ) != 'api' )
        {
            return view ( "about_us" )->with ( [ 
                "activeNavItem" => "about_us",
            ] );
        }
    }

    public function home ( Request $request )
    {
        if ( request ()->segment ( 1 ) != 'api' )
        {
            return view ( "home" )->with ( [ 
                "activeNavItem" => "home",
            ] );
        }
    }

    public function explore ( Request $request )
    {
        if ( request ()->segment ( 1 ) != 'api' )
        {
            return view ( "explore" )->with ( [ 
                "activeNavItem" => "explore",
            ] );
        }
    }

    public function signup ( Request $request )
    {
        if ( request ()->segment ( 1 ) != 'api' )
        {
            return view ( "registration" )->with ( [ 
                "activeNavItem" => "signup",
            ] );
        }
    }
    public function signin ( Request $request )
    {
        if ( request ()->segment ( 1 ) != 'api' )
        {
            return view ( "login" )->with ( [ 
                "activeNavItem" => "signin",
            ] );
        }
    }

    public function model_view ( Request $request )
    {
        if ( request ()->segment ( 1 ) != 'api' )
        {
            return view ( "model_view" )->with ( [ 
                "activeNavItem" => "model_view",
            ] );
        }
    }
}