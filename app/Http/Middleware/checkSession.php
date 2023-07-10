<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class checkSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

      if(!Session()->has('SessionId') && !Session()->has('UserId') && !Session()->has('Department')&& !Session()->has('lat')&& !Session()->has('long')){
        return redirect('/login-user')->with('fail','You Have To Login First');
      }
        return $next($request);
    }
}
