@extends('layouts.interface')

@section('title', 'Examen')

{{-- @section('estilos')
    <link rel="stylesheet" href="{!! asset('css/agregarPregunta.css') !!}">
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
    <form class="bg-blue-300 shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{route('homedocente.savePregunta')}}" method="POST">
        @csrf
        @foreach ($examen as $item)
            <h1 class="text-center"> Examen: {{$item->titulo}}</h1>
        @endforeach

        <input type="text" name="idExamen" value="{{$idExamen}}" hidden>
        {{-- Pregunta --}}
        <p class='mb-4'>Escriba la pregunta</p>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-3"
         type='text' name='pregunta' id='pregunta' placeholder='Ingrese la pregunta' required/>
        {{-- Opcion1 --}}
        <p class='mb-4'>Indique las posibles respuestas</p>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-3"
         type='text' name='opcion1' id='1' placeholder='Opcion A' required />
        {{-- Opcion2 --}}
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-3"
        type='text' name='opcion2' id='2' placeholder='Opcion B' required />
        
        {{-- Opcion3 --}}
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-3"
         type='text' name='opcion3' id='3' placeholder='Opcion C' required/>

        <!-- correcta con Select -->
        {{-- <div class='mb-4 relative'>
            <label class='text-gray-700 text-sm font-fold mb-2'>Selecciona la respuesta correcta</label>
        <div class='relative rounded shadow-sm'>
          <div>
            <select name='correcta' id='correcta' class='shadow appearence-none border 
            rounded w-full py-2 pr-3 pl-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
              <option value='1'>Opcion 1</option>
              <option value='2'>Opcion 2</option>
              <option value='3'>Opcion 3</option>
            </select>
          </div>
          <div class='absolute  inset-y-0  left-2 flex items-center'>
          </div>
        </div>
      </div> --}}

      <label>Selecciona las respuestas correctas</label><br>
      <input type="checkbox" id="correcta1" name="correcta1" value="1">
      <label for="correcta1"> A </label><br>

      <input type="checkbox" id="correcta2" name="correcta2" value="2">
      <label for="correcta2"> B </label><br>

      <input type="checkbox" id="correcta3" name="correcta3" value="3">
      <label for="correcta3"> C </label><br>


        {{-- Respuesta Correcta --}}
        {{-- <p class='mb-4 mt-0'>Respuesta correcta</p>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-3"
         type='text' name='correcta' id='correcta' placeholder='Correcta' required /> --}}
        
         {{-- Botones --}}
        <div class='flex justify-center pt-4'>
            {{-- Boton Guardar --}}
            <button  class="bg-blue-500 text-white hover:bg-indigo-700 rounded-md py-2 px-2 h-10">Guardar</button>
            
            {{-- Boton salir --}}
            <a href="{{route('homedocente.editarexamen',$idExamen)}}" class="botons text-center">
                <button class="bg-red-500 text-white hover:bg-indigo-700 rounded-md py-2 px-10 h-10" type="button">Salir</button>
            </a>
        </div>
    </form>
</div>
@endsection
