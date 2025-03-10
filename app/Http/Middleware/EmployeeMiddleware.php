<?php 
namespace App\Http\Middleware;

use Closure;
use Auth;

class EmployeeMiddleware
{
    public function handle($request, Closure $next) {
        //This line uses the Auth::check() method to determine 
        //if the user is currently authenticated. If the user is authenticated, 
        //the method returns true; otherwise, it returns false.
        if (Auth::check()) {


            if(Auth::user()->is_role == 0) {
                return $next($request);
            }else{
                Auth::logout();
                return redirect(url('/'));
            }

        // If the user is authenticated, this block checks if the authenticated user's role is 0 by accessing Auth::user()->is_role.
        // If the user's role is 0, the request is passed to the next middleware or the controller by calling return $next($request);.
        // If the user's role is not 0, the user is logged out using Auth::logout() and redirected to the homepage (url('/')).
            
        }else {
            Auth::logout();
            return redirect(url('/'));
        }
        //If the user is not authenticated (Auth::check() returns false), 
        //this block logs out the user (as a precaution) and redirects them to the homepage.

    }
}


