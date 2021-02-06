<?php

namespace App\Http\Middleware;

use Closure;

class AuthAdmin
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
        if (!isset(auth()->user()->name)) {
            return redirect('login')->with('Gagal',"Sesi berakhir, harap login kembali.");
        }
        
        if(auth()->user()->name == 'admin'){
            return $next($request);
        }
   
        return redirect('home')->with('Gagal',"You don't have admin access.");
    }
}
