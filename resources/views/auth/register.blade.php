@extends('layouts.plantilla')

@section('title','Register')

@section('option')

@endsection


@section('content')
{{-- <h1 class="text-5xl text-center pt-24">Register</h1> --}}
<ul class="w-1/2 px-20 ml-auto absolute justify-end pt-10">
  <li class="mx-6">
      <a href="{{route('home')}}" class="inline-flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded">
        <svg class="h-8 w-8 text-white"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1" /></svg>
        Volver</a>
  </li>
</ul>

<div class='w-full max-w-xs m-auto pt-5'>

    <form class='bg-white shadow-md rounded px-7 pt-5 pb-7 mb-4' method="POST">
      @csrf
        <div class='mb-4 relative'>
              <h3 class="text-2xl text-center">Registro</h3>
              <label class='block text-gray-700 text-sm font-fold'>Nombre:</label>
          <div class='relative rounded shadow-sm'>
            <div>
              <input type='text' name='name' id="name" placeholder='Ingresa tu nombre'
              input type="text" class="border border-gray-10 rounded-md bg-gray-100 w-full text-lg
              placeholder-gray-600 p-2 focus:bg-white" value="{{old('name')}}">
            </div>
            <div class='absolute  inset-y-0  left-2 flex items-center'>
            </div>
          </div>
            @error('name')
              <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-2 my-2">*{{$message}}</p>
            @enderror
        </div>

        <div class='mb-4 relative'>
              <label class='text-gray-700 text-sm font-fold mb-2'>Usuario:</label>
          <div class='relative rounded shadow-sm'>
            <div>
              <input type='text' name='usuario' id="usuario" placeholder='Ingresa tu usuario'
              class="border border-gray-10 rounded-md bg-gray-100 w-full text-lg
              placeholder-gray-600 p-2 focus:bg-white" value="{{old('usuario')}}">
            </div>
            <div class='absolute  inset-y-0  left-2 flex items-center'>
            </div>
          </div>
            @error('usuario')
            <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-2 my-2">*{{$message}}</p>
            @enderror
        </div>

        <div class='mb-4 relative'>
              <label class='text-gray-700 text-sm font-fold mb-2'>Tipo de Usuario:</label>
          <div class='relative rounded shadow-sm'>
            <div>
              <select name='tipoUsuario' id='tipoUsuario' id="tipoUsuario" class='shadow appearence-none border 
              rounded w-full py-2 pr-3 pl-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                <option value='Docente'>Docente</option>
                <option value='Alumno'>Alumno</option>
              </select>
            </div>
            <div class='absolute  inset-y-0  left-2 flex items-center'>
            </div>
          </div>
        </div>

        <div class='mb-4 relative'>
              <label class='text-gray-700 text-sm font-fold mb-2'>Contraseña:</label>
          <div class='relative rounded shadow-sm'>
            <div>
              <input type='password' name='password' id='password'
              placeholder='*******' class="border border-gray-10 rounded-md bg-gray-100 w-full text-lg
              placeholder-gray-600 p-2 focus:bg-white" value="{{old('password')}}">
            </div>
            <div class='absolute  inset-y-0  left-2 flex items-center'>
            </div>
          </div>
          @error('password')
            <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-2 my-2">*{{$message}}</p>
            @enderror
        </div>

        {{-- <div class="topping ml-1 mb-3 mt-0">
          <input type="checkbox" id="topping" name="topping" value="Paneer"/> Ver contraseña
        </div> --}}

        @error('message')
        <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-2 my-2">{{ $message }}</p>
        @enderror

        <button class='bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full m-auto'>Crear Cuenta</button>

    </form>

  </div>
@endsection