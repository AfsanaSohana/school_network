<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User; // custome
use Illuminate\Http\Request;
use Session; // custome

class checkSuperadmin
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
        if(!Session::has('userId') || Session::has('userId')==null){
            return redirect()->route('LogOut');
        }else{
            $user=User::where('role',Session::has('userRole'))->where('id',currentUserId())->first();
            if(!$user)
                return redirect()->route('_logout');
            else
                return $next($request);
        }
        return redirect()->route('LogOut');
    }
}
