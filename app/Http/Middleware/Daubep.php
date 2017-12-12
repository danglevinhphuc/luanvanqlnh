<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Phanquyen;
class Daubep
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
        $quanly= $quyen->quanly;
        $daubep = $quyen->daubep;
        $phucvu = $quyen->phucvu;
        if($daubep || $quanly || $phucvu){
            return $next($request);
        }
     }
    return redirect('/dang-nhap');
    }
}
