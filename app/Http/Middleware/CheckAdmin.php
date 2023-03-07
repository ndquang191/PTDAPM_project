<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->QuyenTruyCap == 'admin1' ||  Auth::user()->QuyenTruyCap == 'admin2'){
            return $next($request);
        }
        else{
            // return redirect()->back()->withErrors(['msg' => 'Bạn không có quyền truy cập']);
            return dd('Không có quyền truy cập');
        }
    }
}
