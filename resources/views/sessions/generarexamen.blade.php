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
    {{--Formulario para crear las preguntas --}}
    <div class="w-full max-w-lg w-96 m-auto pt-2">
    <form class="bg-blue-300 shadow-md rounded px-8 pt-6 pb-8 mb-4" 
    action="{{ route('homedocente.crearPreguntas') }}" method="POST">
    
        @csrf
        <p class="mb-3 text-lg">ID de examen:</p>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-3" type="text" readonly name="idExamen" id="idExamen" value="{{ $id }}" class="controls">

        <p class='text-lg'>Escriba la pregunta</p>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-3" type='text' name='pregunta' id='pregunta' placeholder='Ingrese la pregunta' required/>
        <p class='mb-3'>Indique las posibles respuestas</p>

        {{-- Para opcion 1 --}}
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/7">
                <label class="block text-gray-500 font-bold md:text-right mb-1 pr-1" for="inline-full-name">
                A.
                </label>
            </div>
            <div class="md:w-full">
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-3" type='text' name='opcion1' id='1' placeholder='Opcion 1' required/>
                {{-- <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text"> --}}
            </div>
        </div>

            {{-- Para opcion 2 --}}
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/7">
                <label class="block text-gray-500 font-bold md:text-right mb-1 pr-1" for="inline-full-name">
                B.
                </label>
            </div>
            <div class="md:w-full">
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-3" type='text' name='opcion2' id='2' placeholder='Opcion 2' required/>        
                {{-- <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text"> --}}
            </div>
        </div>

        {{-- Para opcion 3 --}}
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/7">
                <label class="block text-gray-500 font-bold md:text-right mb-1 pr-1" for="inline-full-name">
                C.
                </label>
            </div>
            <div class="md:w-full">
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-3" type='text' name='opcion3' id='3' placeholder='Opcion 3' required/>
                {{-- <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text"> --}}
            </div>
        </div>

        {{-- <p class='mb-3 mt-0 text-lg'>Escriba la respuesta correcta</p>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type='text' name='correcta' id='correcta' placeholder='Correcta' required/> --}}

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

        {{-- A<input type="radio" name="correcta1" value="1"/> 
        B<input type="radio" name="correcta2" value="2"/>
        C<input type="radio" name="correcta3" value="3"/> --}}

        <label>Selecciona las respuestas correctas</label><br>
        <input type="checkbox" id="correcta1" name="correcta1" value="1">
        <label for="correcta1"> A </label><br>

        <input type="checkbox" id="correcta2" name="correcta2" value="2">
        <label for="correcta2"> B </label><br>

        <input type="checkbox" id="correcta3" name="correcta3" value="3">
        <label for="correcta3"> C </label><br>


        <div class='flex justify-center pt-4'>
            
            <button class="bg-blue-500 text-white hover:bg-indigo-700 rounded-md py-2 px-2 h-10" 
            type="submit">Siguiente Pregunta</button>
            
            <a href="{{ route('homedocente.examen') }}">
                <button class="bg-red-500 text-white hover:bg-indigo-700 rounded-md py-2 px-10 h-10" type="button">Salir</button>
            </a>
        </div>
    </form>
    </div>
@endsection
