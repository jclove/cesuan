<?php

namespace App\Http\Middleware;

use Closure;

class ExistOrderId
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
        if (!$request->session()->has('order_id')){
            return redirect()->route('web.index');
        }
        return $next($request);
    }
}
