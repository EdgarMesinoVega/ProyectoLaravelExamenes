@extends('layouts.interface')

@section('title', 'Examen')

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
<div class='content-result m-auto'>
    <div class='bg-transparent w-50 m-auto shadow rounded'>
        <div class='bg-white flow-root text-center'>
            <label class='font-serif p-1 text-center text-lg'>Alumno: {{auth()->user()->name}}</label>
            <a href="{{route('homealumno.examen')}}"><button class='float-right mr-1'>
                <svg class="h-8 w-8 text-black"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/> <line x1="9" y1="9" x2="15" y2="15" />  <line x1="15" y1="9" x2="9" y2="15" /></svg>
            </button></a>
        </div>            
        <div class='w-full max-w-lg m-auto pt-2'>

            @if ($cal == 0)
            <label class='absolute pt-10 text-white text-2xl pl-12 text-center font-bold'>
                La calificación obtenida es 0/100 <br> Respuestas correctas: <br> Ninguna</label>
            @endif
            
            @if ($cal == 20)
                <label class='absolute pt-8 text-white text-2xl pl-12 text-center font-bold'>
                    La calificación obtenida es 20/100 <br> Respuestas correctas: 1</label>
            @endif

            @if ($cal == 40)
                <label class='absolute pt-8 text-white text-2xl pl-12 text-center font-bold'>
                    La calificación obtenida es 40/100 <br> Respuestas correctas: 2</label>
            @endif

            @if ($cal == 60)
                <label class='absolute pt-8 text-white text-2xl pl-12 text-center font-bold'>
                    La calificación obtenida es 60/100 <br> Respuestas correctas: 3</label>
            @endif

            @if ($cal == 80)
                <label class='absolute pt-8 text-white text-2xl pl-20 text-center font-bold'>
                    Tu calificación es 80/100 <br> Respuestas correctas: 4</label>
            @endif

            @if ($cal == 100)
                <label class='absolute pt-8 text-white text-2xl pl-20 text-center font-bold'>
                    Tu calificación es 100/100 <br> Respuestas correctas: 5</label>
            @endif
   
        </div>            
        <div class='w-full max-w-lg m-auto pt-2 pl-10'>

            @if ($cal == 0)
                <div class=''><img src="{{ asset('images/ninguna.jpg') }}" alt="foto" width='400'></div>
            @endif

            @if ($cal == 20)
                <div class=''><img src="{{ asset('images/1buena.jpg') }}" alt="foto" width='400'></div>
            @endif

            @if ($cal == 40)
                <div class=''><img src="{{ asset('images/2buenas.jpg') }}" alt="foto" width='400'></div>
            @endif

            @if ($cal == 60)
                <div class=''><img src="{{ asset('images/3buenas.jpg') }}" alt="foto" width='400'></div>
            @endif

            @if ($cal == 80)
                <div class=''><img src="{{ asset('images/4buenas.jpg') }}" alt="foto"></div>
            @endif

            @if ($cal == 100)
                <div class=''><img src="{{ asset('images/5buenas.jpg') }}" alt="foto" width='400'></div>
            @endif
        </div>
    </div>
</div>
@endsection