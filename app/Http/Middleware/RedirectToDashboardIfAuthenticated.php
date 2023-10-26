<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectToDashboardIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle ( $request, Closure $next, $guard = null )
    {
        if ( Auth::guard ( $guard )->check () )
        {
            if ( Auth::user ()->roles ()->where ( 'name', 'Admin' )->exists () )
            {
                // Redirect to the Admin Dashboard
                return redirect ()->route ( 'dashboard_admin' )->with ( 'success', 'Login success!' );
            }
            else
            {
                // Redirect to the User Dashboard
                return redirect ()->route ( 'dashboard_user' )->with ( 'success', 'Login success!' );
            }
        }

        return $next ( $request );
    }

}