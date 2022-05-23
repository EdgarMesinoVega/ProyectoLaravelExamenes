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

    <div class="w-3/4 h-3/4 m-auto mt-5">
        <h1 class="text-2xl text-center">Examenes disponibles</h1>
        <div>
                {{-- listado de examenes --}}
                @foreach ($listaExamenes as $examenes)
                <div class="mb-3">
                    <div class="card-container rounded">
                        <div class="bg-blue-400 pt-2 pb-2">
                            <h3 class="text-white text-xl">{{$examenes->titulo}}</h3>
                        </div>
                        <div class="w-40 m-auto"><img src="https://st3.depositphotos.com/1071184/12604/v/600/depositphotos_126041006-stock-illustration-rating-on-customer-service.jpg">
                        </div>
                        <div class="bg-blue-400 pt-2 pb-2">
                            <h3 class="text-white text-lg">Maestro: {{$examenes->maestro}}</h3>
                        </div>
                        <div class="bg-blue-400 pt-2 pb-2">
                            <div class="pt-1 pb-2">
                               <form action="{{route('homealumno.contestarexamen',$examenes->id)}}">
                                <button class="inline-flex items-center bg-white hover:bg-blue-300 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                    <svg class="h-5 w-5 text-green-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                                      </svg>                                      
                                    Contestar
                                </button>      
                                </form>                            
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection