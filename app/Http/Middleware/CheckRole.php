<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        //kita tangkap role user yang sedang login
        if($request->user()->role == $role){
            
        return $next($request);
        }

        return redirect('/dashboard')->with('forbidden', 'Anda tidak memiliki akses');
    }
}
