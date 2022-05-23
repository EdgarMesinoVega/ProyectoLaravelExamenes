@extends('layouts.interface')

@section('title',"Sistema")

@section('direccionhome')
{{ route('homealumno.index') }}
@endsection

@section('direccionexamen')
{{ route('homealumno.examen') }}
@endsection

@section('direccionresultados')
{{ route('homealumno.resultados')}}
@endsection


@section('content')
<div class="flex justify-center max-w-sm w-full lg:max-w-full lg:flex pt-10 ">        
    <div class="mb-8">
      <div class="text-white font-bold text-2xl mb-1 absolute pt-2 pl-10">Bienvenido Alumno {{auth()->user()->name}}</div>
      <img class="rounded-xl" src="https://gstatic.com/classroom/themes/Psychology.jpg" alt="">
    </div>
</div>
@endsection