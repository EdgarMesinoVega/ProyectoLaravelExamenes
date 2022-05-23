@extends('layouts.interface')

@section('title', 'Crear Examen')

@section('direccionhome')
    {{ route('homedocente.index') }}
@endsection

@section('direccionexamen')
    {{ route('homedocente.examen') }}
@endsection

@section('direccionresultados')
    {{ route('homedocente.resultados') }}
@endsection


@section('content')

    {{-- Formulario Crear examen Titulo --}}
    <div class="w-full max-w-xs m-auto pt-7">
    <form class="bg-blue-300 shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('homedocente.crearExamen') }}" method="POST">
        @csrf
        <h1 class='mt-0 mb-1 flex justify-center text-2xl'>Examen</h1>
        <div>
            <label class="text-lg">Usuario:</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type='text' name='user' id='user' value="{{ auth()->user()->name }}" readonly/>
        </div>
        
        <div>
            <label class="text-lg">ID</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type='text' name='idUsuario' id='idUsuario' value="{{auth()->user()->id}}" readonly/>
        </div>

        <div>
            <label class="text-lg">Titulo del examen</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline "
            type='text' name='titulo' id='titulo' placeholder="Titulo"/>
            @error('titulo')
            <p class="border border-red-500 rounded-md bg-red-100 w-full-text-red-600 p-2 my-2">*{{$message}}</p>
            @enderror
        </div>

        <input type='text' name='maestro' id='maestro' value="{{ auth()->user()->name }}" hidden/>

        <div class='flex justify-center pt-4'>
            <button class="bg-blue-500 text-white hover:bg-indigo-700 rounded-md py-2 px-2 h-10" type="submit">
                Continuar
            </button>

            <a href="{{ route('homedocente.examen') }}"
                class="bg-red-500 text-white hover:bg-indigo-700 rounded-md py-2 px-2 h-10">
                <button type="button">Cancelar</button>
            </a>
        </div>
    </form>
    </div>

@endsection
