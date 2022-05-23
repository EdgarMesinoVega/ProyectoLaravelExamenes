@extends('layouts.interface')

@section('title', 'Resultados')

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
    {{-- <h1>Resultados Alumno</h1> --}}

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    
    <a href="{{route('homealumno.generarpdf')}}" class="inline-flex bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-5 rounded absolute right-10 top-40">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
        Imprimir pdf</a>


   <div class="bg-blue-200 w-2/3 m-auto mt-10 rounded-lg">
        <div class="bg-blue-300">
            <h2 class="text-lg pt-4 pb-4 m-auto text-center font-semibold bg-blue-500 text-white">Resultados</h2>
            <div class="text-lg  ml-5 font-semibold pb-1 pt-2">Nombre del Alumno : {{auth()->user()->name}}</div>
            <div class="text-lg ml-5 font-semibold pb-2">Id del Alumno : {{auth()->user()->id}}</div>
        </div>
        
        <div class="h-auto grid grid-cols-3 pt-3 pb-3 text-center hover:bg-blue-400 hover:text-white">
            <div class="font-bold">Nombre de Examen</div>
            <div class="font-bold">Numero de Intentos</div>
            <div class="font-bold">Promedio Final</div>
        </div>


        @foreach ($listaResultados as $resultados)                   
            <div class="h-auto grid grid-cols-3 text-center pb-3 pt-3 hover:bg-green-400 hover:text-white">
                <div class="text-lg">{{$resultados->tituloExamen}}</div>
                <div class="text-lg">{{$resultados->intentos}}</div>
                <div class="text-lg">{{$resultados->promedio}}</div>                
            </div>
        @endforeach        


        {{-- Todos los intentos --}}
        <div class="bg-blue-200">
            <h2 class="text-lg pt-4 pb-4 m-auto text-center font-semibold bg-blue-500 text-white">
                Intentos Realizados</h2>
        </div>

        <div class="h-auto grid grid-cols-3 pt-3 pb-3 text-center hover:bg-blue-400 hover:text-white">
            <div class="font-bold">Id Resultado</div>
            <div class="font-bold">Nombre de Examen</div>
            <div class="font-bold">Calificación</div>
        </div>

        <div class="h-auto grid grid-cols-3 pt-3 pb-3 text-center hover:bg-blue-400 hover:text-white">
            
            <?php 
            $cont=1;
            $titulo="";
            $contt="";
            ?>
            @foreach ($listaCalificaciones as $calificaciones)

                <div class="font-bold">{{$calificaciones->idResultado}}</div>
                <div class="font-bold">{{$calificaciones->tituloExamen}}</div> 
                <div class="font-bold">{{$calificaciones->calificacion}}</div> 
            
            <?php 
            $cont = $cont+1;
            ?>

            @endforeach


        </div>    
    </div> 












































        <!-- Grafica -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
        <div class="w-1/3 m-auto pt-5">
            <canvas id="myChart" width="300" height="300"></canvas>
        </div>
 --}}



        <?php
        // para mostrar las etiquetas de examenes
        $titulos= array();
        $calificaciones= array();
        foreach ($listaCalificaciones as $cal) {
        array_push($titulos,$cal->tituloExamen);
        array_push($calificaciones,$cal->calificacion);
        }

        ?>

        <script>
        var arrayt = @json($titulos);
        var calific = @json($calificaciones);
        // document.write(arrayt);
        // document.write(calific);

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',  //bar/line / radar / pie(circular) / doughnut (cir) / buble
            data: {
                labels: arrayt,
                datasets: [{
                    label: '# of Votes',
                    data: calific,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        // beginAtZero: true
                        max:100
                    }
                }
            }
        });
        </script>

            
        
        @endsection