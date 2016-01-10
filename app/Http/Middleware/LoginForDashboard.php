<?php

namespace Pictunes\Http\Middleware;

use Closure;
use Auth;

class LoginForDashboard
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
    if (Auth::check()) {
      return $next($request);
    } else {
      $request->session()->flash('needs_authentication', true);
      return redirect('/auth/login');
    }
  }
}
