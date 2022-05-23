@extends('layouts.interface')

@section('title',"Sistema")

@section('direccionhome')
{{ route('homealumno.index') }}
@endsection

@section('direccionexamen')
{{ route('homealumno.examen') }}
@endsection

@section('direccionresultados')
{{ route('homealumno.resultados') }}
@endsection


@section('content')

{{-- Validacion de examen <5 preguntas  --}}
@if (sizeof($preguntas)<5)
    <div class="pt-10 m-auto w-500 pr-80 float-right">
            {{-- Boton regresar (SALIR)--}}
    <a href="{{ route('homealumno.examen')}}">
        <button class="bg-transparent hover:bg-blue-300 inline-flex items-center text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" 
        type="button">
        <svg class="h-8 w-8 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1" /></svg>
            <span>Volver</span>
        </button>
    </a>
    </div>
    <div class='w-full max-w-lg m-auto pt-5 pl-10'>
        <div class=''><img src="{{ asset('images/nodisponible.jpg') }}" alt="foto" width='400'></div>  
    </div> 
@else

<div class='bg-slate-300 w-full overflow-y-auto overflow-y-scroll'>

    <form action="{{route('homealumno.calificar')}}" method="POST">
        @csrf
        <div class='bg-pastel-50 w-3/4 h-9/10 m-auto mt-5 shadow rounded'>
            <div className='border border-2px h-9 bg-white flow-root'>
                <label class='font-bold ml-2 text-lg ml-10'>Alumno: {{auth()->user()->name}}</label>
                <input name="nombreAlumno" value="{{auth()->user()->name}}" hidden/> {{--Nombre Alumno--}}
                @foreach ($examen as $datoExamen)
                <label class='font-bold text-xl ml-10 pl-20'>Examen: {{$datoExamen->titulo}}</label>
                <input name="idExamen" value="{{$datoExamen->id}}" hidden/> {{-- Id exammen--}}
                <input name="titulo" value="{{$datoExamen->titulo}}" hidden/> {{-- Titulo exammen--}}
                <input name="idUsuario" value="{{$datoExamen->idUsuario}}" hidden/>{{-- Id usuario docente--}}
                @endforeach

                {{-- Boton regresar (SALIR)--}}
                <a href="{{ route('homealumno.examen')}}">
                    <button class='float-right mr-1' type="button">
                        <svg class="h-8 w-8 text-red-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/> <line x1="9" y1="9" x2="15" y2="15" />  <line x1="15" y1="9" x2="9" y2="15"/></svg>
                    </button>
                </a>
                
                {{-- Boton para calificar --}}
                    <button class='float-right mr-1' type="submit">
                        <svg class="h-8 w-8 text-green-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="9 11 12 14 20 6" />  <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                    </button>
                    <label class="float-right text-lg">Guardar Resultados</label>
            </div>


            {{-- para imprimir las preguntas  --}}
            <div class="bg-blue-200  w-full">
                @foreach ($preguntas as $index => $preguntas)

                @if ($index == 0)
                <div class="rounded mr-4 ml-4 mt-2 mb-3">
                    <label class='font-bold ml-2 text-xl'>{{$index+1}}.{{$preguntas->pregunta}}</label>
                    <br>
                    <label class='mx-2'>
                        <input value="{{$preguntas->opcion1}}" name="resp1" type="checkbox" /> {{$preguntas->opcion1}}
                    </label>
                    <br>
                    <label class='mx-2'>
                        <input value="{{$preguntas->opcion2}}" name="resp2" type="checkbox" /> {{$preguntas->opcion2}}
                    </label>
                    <br>
                    <label class='mx-2'>
                        <input value="{{$preguntas->opcion3}}" name="resp3" type="checkbox"/> {{$preguntas->opcion3}}
                    </label>
                    <br>
                    <input name="correcta{{$index+1}}" value="{{$preguntas->correcta}}" hidden>
                </div>
                @endif

                @if ($index == 1)
                    <div class="rounded mr-4 ml-4 mt-2 mb-3">
                        <label class='font-bold ml-2 text-xl'>{{$index+1}}.{{$preguntas->pregunta}}</label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntas->opcion1}}" name="resp4" type="checkbox" /> {{$preguntas->opcion1}}
                        </label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntas->opcion2}}" name="resp5" type="checkbox" /> {{$preguntas->opcion2}}
                        </label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntas->opcion3}}" name="resp6" type="checkbox"/> {{$preguntas->opcion3}}
                        </label>
                        <br>
                        <input name="correcta{{$index+1}}" value="{{$preguntas->correcta}}" hidden>
                    </div>
                @endif

                @if ($index == 2)
                <div class="rounded mr-4 ml-4 mt-2 mb-3">
                    <label class='font-bold ml-2 text-xl'>{{$index+1}}.{{$preguntas->pregunta}}</label>
                    <br>
                    <label class='mx-2'>
                        <input value="{{$preguntas->opcion1}}" name="resp7" type="checkbox" /> {{$preguntas->opcion1}}
                    </label>
                    <br>
                    <label class='mx-2'>
                        <input value="{{$preguntas->opcion2}}" name="resp8" type="checkbox" /> {{$preguntas->opcion2}}
                    </label>
                    <br>
                    <label class='mx-2'>
                        <input value="{{$preguntas->opcion3}}" name="resp9" type="checkbox"/> {{$preguntas->opcion3}}
                    </label>
                    <br>
                    <input name="correcta{{$index+1}}" value="{{$preguntas->correcta}}" hidden>
                </div>
                @endif

                @if ($index == 3)
                <div class="rounded mr-4 ml-4 mt-2 mb-3">
                    <label class='font-bold ml-2 text-xl'>{{$index+1}}.{{$preguntas->pregunta}}</label>
                    <br>
                    <label class='mx-2'>
                        <input value="{{$preguntas->opcion1}}" name="resp10" type="checkbox" /> {{$preguntas->opcion1}}
                    </label>
                    <br>
                    <label class='mx-2'>
                        <input value="{{$preguntas->opcion2}}" name="resp11" type="checkbox" /> {{$preguntas->opcion2}}
                    </label>
                    <br>
                    <label class='mx-2'>
                        <input value="{{$preguntas->opcion3}}" name="resp12" type="checkbox"/> {{$preguntas->opcion3}}
                    </label>
                    <br>
                    <input name="correcta{{$index+1}}" value="{{$preguntas->correcta}}" hidden>
                </div>
                @endif

                @if ($index == 4)
                <div class="rounded mr-4 ml-4 mt-2 mb-3">
                    <label class='font-bold ml-2 text-xl'>{{$index+1}}.{{$preguntas->pregunta}}</label>
                    <br>
                    <label class='mx-2'>
                        <input value="{{$preguntas->opcion1}}" name="resp13" type="checkbox" /> {{$preguntas->opcion1}}
                    </label>
                    <br>
                    <label class='mx-2'>
                        <input value="{{$preguntas->opcion2}}" name="resp14" type="checkbox" /> {{$preguntas->opcion2}}
                    </label>
                    <br>
                    <label class='mx-2'>
                        <input value="{{$preguntas->opcion3}}" name="resp15" type="checkbox"/> {{$preguntas->opcion3}}
                    </label>
                    <br>
                    <input name="correcta{{$index+1}}" value="{{$preguntas->correcta}}" hidden>
                </div>
                @endif
            
                @endforeach
            </div>
        </div>
    </form>
</div>

@endif
@endsection

