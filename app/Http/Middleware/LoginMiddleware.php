<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
{
    /**
     * 验证是否登录
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if (!session('uid') || !session('username')) {
        return redirect('login');
      }
      return $next($request);
    }
}
