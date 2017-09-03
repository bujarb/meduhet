<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$permission)
    {
      if (Auth::guest()) {
        return redirect()->back();
      }

      if (! $request->user()->can($permission)) {
         return redirect()->back();
      }

      return $next($request);
      }
}
