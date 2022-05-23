@extends('layouts.plantilla')

@section('title','Home')

@section('option')
  
@endsection

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-g">
    <h3 class="text-center text-xl">¿Que desea hacer?</h3>
    <a href="{{ route('login.index') }}">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 top-2 rounded w-full text-lg  p-3 my-5">
            Iniciar Sesion
        </button>
    </a>
    
    <a href="{{ route('register.index') }}">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full text-lg">
            Registrarse
        </button>
    </a>
</div>

@endsection

