<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrerController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    
    // validar campos del formulario
    public function store(RegisterRequest $request){
        $user = User::create(request(['name','usuario', 'tipoUsuario','password']));
        auth()->login($user);
        return redirect()->to('/');
    }
}
