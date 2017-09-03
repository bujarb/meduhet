<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;
use Spatie\Permission\Models\Role;

class ForProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->hasAnyRole(Role::all())){
          return $next($request);
        }
        return redirect()->route('home');
    }
}
