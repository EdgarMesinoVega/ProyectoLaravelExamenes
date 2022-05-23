@extends('layouts.interface')

@section('title',"Sistema")

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
<div class="flex justify-center max-w-sm w-full lg:max-w-full lg:flex pt-10 ">        
    <div class="mb-8 ">
      <div class="text-white font-bold text-2xl mb-1 absolute pt-2 pl-10">Bienvenido Docente {{auth()->user()->name}}</div>
      <img class="rounded-xl" src="https://gstatic.com/classroom/themes/Writing.jpg">
    </div>
</div>


@endsection
