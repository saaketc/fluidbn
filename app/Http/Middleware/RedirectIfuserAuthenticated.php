<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfuserAuthenticated
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
      //If request comes from logged in user, he will
      //be redirect to home page.
      if (Auth::guard('web')->check()) {
          return redirect('/feed');
      }

      //If request comes from logged in admin, he will
      //be redirected to admin's home page.
      if (Auth::guard('aerepad')->check()) {
          return redirect('/aerepad/desk');
      }
      if (Auth::guard('studio')->check()) {
        return redirect('/workstation/fbn.studio/dashboard/');
    }
    else{
         return redirect('/');
    }
      return $next($request);
  }
}
