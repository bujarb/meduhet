<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class OnlyForUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     // Midlware to check if a user has a right to access only his needs
    public function handle($request, Closure $next)
    {
        $id = $request->route()->parameter('user_id');

        if(Auth::user()->id == $id){
          return $next($request);
        }
        return redirect()->back();
    }
}
