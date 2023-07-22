<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {

    if (auth()->check()) {
      $userType = auth()->user()->user_type;

      // Check if the user_type is 'admin'
      if ($userType === 'Admin') {
        return $next($request);
      }
    }

    abort(403, 'Unauthorized action.');
    // return redirect()->route('access.denied');
  }
}
