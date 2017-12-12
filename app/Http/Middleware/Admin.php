<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Phanquyen;
class Admin
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
      if (session('username') != null) {
        $value = session('username');
        $quyen =  Phanquyen::where('username','=',$value)->first();
        $quanly = $quyen->quanly;
        if($quanly){
            return $next($request);
        }
     }
    return redirect('/dang-nhap');
    }
}
