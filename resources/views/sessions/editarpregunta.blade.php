@extends('layouts.interface')

@section('title', 'Examen')

{{-- @section('estilos')
    <link rel="stylesheet" href="{!! asset('css/editarPregunta.css') !!}">
@endsection --}}


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

<div class="w-full max-w-lg w-96 m-auto pt-2">
    @foreach ($pregunta as $datoPregunta)
        <form class="bg-blue-300 shadow-md rounded px-8 pt-6 pb-8 mb-4" 
        action="{{route('homedocente.saveEditarPregunta',$datoPregunta)}}" method="POST">

            @csrf
            @method('put')
            <div class='mt-0'>
                <input  type="text" name="idExamen" value="{{$datoPregunta -> idExamen}}" hidden>

                <label class='mb-4 text-xl'>Pregunta: </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-3" type='text' name='pregunta' id='pregunta' placeholder='Ingresa la nueva pregunta' value="{{$datoPregunta -> pregunta}}" required/>
                
                <label >Opcion 1:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-3"
                 type='text' name='opcion1' id='1' placeholder='Ingresa la nueva opcion 1' value="{{$datoPregunta -> opcion1}}" required/>
                
                 <label>Opcion 2:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-3"
                 type='text' name='opcion2' id='2' placeholder='Ingresa la nueva  opcion 2' value="{{$datoPregunta -> opcion2}}" required/>
                
                 <label>Opcion 3:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-3"
                 type='text' name='opcion3' id='3' placeholder='Ingresa la nueva opcion 3' value="{{$datoPregunta -> opcion3}}" required/>
                
                {{-- <label class='mt-2'>Respuesta correcta</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-3"
                type='text' name='correcta' id='correcta' placeholder='Ingresa la nueva respuesta correcta' value="{{$datoPregunta -> correcta}}" required/> --}}
                
                <label>Selecciona las respuestas correctas</label><br>
                <input type="checkbox" id="correcta1" name="correcta1" value="1">
                <label for="correcta1"> A </label><br>
        
                <input type="checkbox" id="correcta2" name="correcta2" value="2">
                <label for="correcta2"> B </label><br>
        
                <input type="checkbox" id="correcta3" name="correcta3" value="3">
                <label for="correcta3"> C </label><br>


                <div class='flex justify-center pt-4'>
                    <button class="bg-blue-500 text-white hover:bg-indigo-700 rounded-md py-2 px-2 h-10" 
                    type="submit">Guardar</button>

                    <a href="{{route('homedocente.editarexamen',$datoPregunta -> idExamen)}}" class="botons text-center">
                        <button type="button" class="bg-red-500 text-white hover:bg-indigo-700 rounded-md py-2 px-10 h-10">Salir</button>
                    </a>
                </div>
            </div>
        </form>
    @endforeach
</div>
@endsection