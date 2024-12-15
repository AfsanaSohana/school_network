<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Student; // custome
use Illuminate\Http\Request;
use Session; // custome

class checkStudentAuth
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
            return redirect()->route('student.LogOut');
        }else{
            $user=Student::where('status',1)->where('id',currentUserId())->first();
            if(!$user)
                return redirect()->route('student._logout');
            else
                return $next($request);
        }
        return redirect()->route('student.LogOut');
    }
}
