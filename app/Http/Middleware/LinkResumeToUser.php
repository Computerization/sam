<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Resume;
use Illuminate\Support\Facades\Auth;

class LinkResumeToUser
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
      if(Auth::check()){
        $resume = User::find(Auth::id())->resume()->first();
        if (!$resume){
          $resume = Resume::where('email', Auth::user()->email)->first();
          if ($resume) {
            $resume->user()->associate(User::find(Auth::id()));
          }
        }
      }
      return $next($request);
    }
}
