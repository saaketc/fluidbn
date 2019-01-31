<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class RedirectIfstudiouserUnauthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
  
        public function handle( $request, Closure $next, $guard = 'studio' ) {
          if ( !Auth::guard( $guard )->check() ) {
            return redirect()->route('studioLoginForm');
          }
      
          return $next( $request );
        }
      }

