<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    
    public function store(){
        if(auth()->attempt(request(['usuario','password']))==false){
            return back()->withErrors([
                'message' => 'El usuario y/o contraseña son incorrectas Intentalo de nuevo'
            ]);
        }else{
            if(auth()->user()->tipoUsuario == 'Docente'){
                return  redirect()->to('/homedocente');
            }else{
                return  redirect()->to('/homealumno');
            }
        }
    }

    public function destroy(){
        auth()->logout();
        return redirect()->to('/');
    }
}
