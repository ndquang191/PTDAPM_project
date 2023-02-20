<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            echo 'Middleware checkrole active'."<br>";
            echo 'Tài khoản: '.Auth::User()->username."<br>";
            if (Auth::user()->role == 'admin1'){
                return $next($request);
            }
            else{
                return dd('Bạn không có quyền truy cập!');
            }
        }
        else{
            return redirect('/');
        }
    }
}
