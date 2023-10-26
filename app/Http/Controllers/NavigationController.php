<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Modelx;
use App\Models\ModelView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function model_view ( Request $request, $id = null )
    {
        if ( request ()->segment ( 1 ) != 'api' )
        {
            if ( ! $id )
            {
                return view ( "model_view" )->with ( [ 
                    "activeNavItem" => "model_view",
                ] );
            }
            else
            {
                $model = Modelx::where ( 'sha3_hash', 'LIKE', "%{$id}%" )->get ()->all ();

                if ( count ( $model ) > 1 )
                {
                    return redirect ()->route ( 'home' )->with ( [ 
                        "activeNavItem" => "home",
                        "customError"   => "Something went wrong.",
                    ] );
                }

                if ( $model )
                {
                    // Check if the last viewed time is more than 12 hours ago
                    if (
                        ! ModelView::where ( 'model_id', $model[ 0 ]->id )
                            ->where ( 'ip_address', $request->ip () )
                            ->where ( 'viewed_at', '>=', Carbon::now ()->subHours ( 12 ) )
                            ->exists ()
                    )
                    {
                        reset ( $model )->increment ( 'view_count' );
                        ModelView::create ( [ 
                            'model_id'   => $model[ 0 ]->id,
                            'ip_address' => $request->ip (),
                            'viewed_at'  => Carbon::now (),
                        ] );
                    }

                    // For authenticated users
                    if ( Auth::check () )
                    {
                        $isLikedByUser = Auth::user ()->likes ()->where ( 'model_id', $model[ 0 ]->id )->exists ();
                        return view ( 'model_view' )->with ( [ 
                            "activeNavItem" => "model_view",
                            "model"         => $model[ 0 ],
                            'liked'         => $isLikedByUser,
                        ] );
                    }
                    // For guests
                    else
                    {
                        return view ( 'model_view' )->with ( [ 
                            "activeNavItem" => "model_view",
                            "model"         => $model[ 0 ],
                            'liked'         => false,
                        ] );
                    }
                }
            }
        }
    }

    public function dashboard_user ( Request $request )
    {
        if ( request ()->segment ( 1 ) != 'api' )
        {
            return redirect ()->route ( 'dashboard_user_uploads' );
        }
    }

    public function dashboard_user_uploads ( Request $request )
    {
        if ( request ()->segment ( 1 ) != 'api' )
        {
            // Get all models that have user_id of the user authenticated
            $models = Modelx::where ( 'user_id', Auth::user ()->id )->take ( 8 )->get ();

            return view ( 'dashboard.user.uploads' )->with ( [ 
                "activeNavItem" => "dashboard_user_uploads",
            ] );
        }
    }

    public function dashboard_user_favorites ( Request $request )
    {
        if ( request ()->segment ( 1 ) != 'api' )
        {
            // Get all models that have been favorited by the authenticated user
            $models = Auth::user ()->favorites ()->with ( 'modelx' )->get ()->pluck ( 'modelx' );

            return view ( 'dashboard.user.favorites' )->with ( [ 
                "activeNavItem" => "dashboard_user_favorites",
                "models"        => $models,
            ] );
        }
    }

    public function dashboard_user_downloads ( Request $request )
    {
        if ( request ()->segment ( 1 ) != 'api' )
        {
            return view ( 'dashboard.user.downloads' )->with ( [ 
                "activeNavItem" => "dashboard_user_downloads",
            ] );
        }
    }

    public function upload_file ( Request $request )
    {
        if ( request ()->segment ( 1 ) != 'api' )
        {
            if ( Auth::user ()->roles ()->where ( 'name', 'Admin' )->exists () )
            {
                $role = 'Admin';
            }
            else
            {
                $role = 'User';
            }

            return view ( 'upload' )->with ( [ 
                "activeNavItem" => "dashboard_user_uploads",
                "role"          => $role,
            ] );
        }
    }

    public function test ( Request $request )
    {
        if ( request ()->segment ( 1 ) != 'api' )
        {
            return view ( 'test' )->with ( [ 
                "activeNavItem" => "test",
            ] );
        }
    }
}