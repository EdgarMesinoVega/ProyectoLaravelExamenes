@extends('layouts.plantilla')

@section('title','Login')

@section('option')

@endsection

@section('content')

<ul class="w-1/2 px-20 ml-auto absolute justify-end pt-10">
  <li class="mx-6">
      <a href="{{route('home')}}" class="inline-flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded">
        <svg class="h-8 w-8 text-white"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1" /></svg>
        Volver
      </a>
  </li>
</ul>

  <div class='w-full max-w-xs m-auto pt-10'>
      <form class='bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4' method="POST">
        @csrf
          <div class='mb-4 relative'>
            <h3 class="text-2xl text-center">Inicia sesión</h3>
              <label class='block text-gray-700 text-sm font-fold mb-2'>Usuario</label>
            <div class='relative rounded shadow-sm'>
              <div>
                <input type='text' name='usuario' id="usuario" placeholder='Ingresa tu usuario'
                class="border border-gray-10 rounded-md bg-gray-100 w-full text-lg
                placeholder-gray-600 p-2 focus:bg-white">
              </div>
              <div class=' absolute  inset-y-0  left-2 flex items-center'>
              </div>
            </div>
          </div>
          <div class='mb-4 relative'>
                <label class='block text-gray-700 text-sm font-fold mb-2'>Contraseña</label>
            <div class='relative rounded shadow-sm'>
              <div>
                <input type='password' name='password' id='password'
                placeholder='*******' class="border border-gray-10 rounded-md bg-gray-100 w-full text-lg
                placeholder-gray-600 p-2 focus:bg-white">
              </div>
              <div class=' absolute  inset-y-0  left-2 flex items-center'>
              </div>
            </div>
        </div>

        {{-- <div class="topping ml-1 mb-1">
          <input type="checkbox" id="topping" name="topping" value="Paneer" /> Ver contraseña
        </div> --}}
        
        @error('message')
        <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-2 my-2">Error usuario/contraseña incorrectos</p>
        @enderror
        
        <button class='bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 mt-3 rounded focus:outline-none focus:shadow-outline w-full m-auto' type="submit">Iniciar Sesión</button>

      </form>
          
        <p class='my-2 text-sm flex justify-center px-3 '>¿No tienes una cuenta?</p>

        <a href=" {{ route('register.index') }} ">
          <button class='bg-slate-50 hover:bg-slate-200 text-black shadow-md rounded border-2 border-gray-300 py-2 px-4 w-full m-auto'>Crear Cuenta
          </button>
        </a>
  </div>
@endsection