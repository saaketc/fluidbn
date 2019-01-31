<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfAerePaduserUnauthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
  
        public function handle( $request, Closure $next, $guard = 'aerepad' ) {
          if ( !Auth::guard( $guard )->check() ) {
            return redirect()->route('aerepadloginform');
          }
      
          return $next( $request );
        }
      }

