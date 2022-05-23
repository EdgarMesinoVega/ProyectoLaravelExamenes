@extends('layouts.interface')

@section('title',"Sistema")

@section('direccionhome')
{{-- {{ route('homealumno.index') }} --}}
@endsection

@section('direccionexamen')
{{-- {{ route('homealumno.examen') }} --}}
@endsection

@section('direccionresultados')
{{-- {{ route('homealumno.resultados') }} --}}
@endsection


@section('content')

{{--Formulario para modificar el titulo del examen --}}
@foreach ($examen as $exa)
    <div class="w-full max-w-lg w-96 m-auto pt-10">
    <form class="bg-blue-300 shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{route('homedocente.guardartituloedit',$exa)}}" method="POST">
        @csrf
        @method('put')
        <h3 class="text-xl text-center">Cambiar titulo del examen</h3>
        <p class="mb-3 text-lg">ID de examen:</p>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-3" type="text" readonly name="id" id="id" value="{{$exa->id}}" class="controls">

        <p class='mb-3 mt-0 text-lg'>Titulo de examen</p>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type='text' name='titulo' id='titulo' value='{{$exa->titulo}}' required/>

        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type='text' name='idUsuario' id='idUsuario' placeholder='Correcta' value='{{auth()->user()->id}}' hidden/>

        @error('titulo')
        <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-2 my-2">*{{$message}}</p>
        @enderror

        <div class='flex justify-center pt-4'>
            
            <button class="bg-blue-500 text-white hover:bg-indigo-700 rounded-md py-2 px-2 h-10" 
            type="submit">Actualizar</button>
            
            <a href="{{ route('homedocente.examen') }}">
                <button class="bg-red-500 text-white hover:bg-indigo-700 rounded-md py-2 px-10 h-10" type="button">Salir</button>
            </a>
        </div>  
    </form>
    </div>
    @endforeach           
@endsection