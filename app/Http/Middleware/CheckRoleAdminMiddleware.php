<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;


use Closure;

class CheckRoleAdminMiddleware
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
       
        if(Auth::check()){
            if(Auth::user()->role == 0 || Auth::user()->role == 1 ){
                     if(Auth::user()->role == 0){
                            return $next($request);
                        }else{
                             return redirect(route('categorylist'));
                        }
             }else{
                return redirect(route('page.index'));
            }
        }
        else{
            return redirect('admin/login');
        }
        
    }
}
