<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DocenteAuth
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
        //valida si inicio sesion
        if(auth()->check()){
            if(auth()->user()->tipoUsuario  == 'Docente'){
                return $next($request);
            }else{
                return redirect()->to('homealumno.index');
            }
        }

        //redirecciona si no inicio sesion
        return $next($request);
    }
}
