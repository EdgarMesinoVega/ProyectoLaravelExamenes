@extends('layouts.interface')

@section('title', 'Resultados')

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
    <a href="{{route('homedocente.crearpdf')}}" class="inline-flex bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-5 rounded absolute right-10 top-40">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
        Imprimir pdf</a>

    <div class="bg-blue-200 w-2/3 m-auto mt-10 rounded-lg">
        <div class="bg-blue-300">
            <h2 class="text-lg pt-4 pb-4 m-auto text-center font-semibold bg-blue-500 text-white">Resultados</h2>
        </div>
        
        <div class="h-auto grid grid-cols-5 pt-3 pb-3 text-center hover:bg-blue-400 hover:text-white">
            <div class="font-bold">Id de Alumno</div>
            <div class="font-bold">Nombre del Alumno</div>
            <div class="font-bold">Nombre de Examen</div>
            <div class="font-bold">Numero de Intentos</div>
            <div class="font-bold">Promedio Final</div>
        </div>

        <?php 
        $sum=0;
        $prom=0;
        $cont=0;
        ?>
        @foreach ($listaResultados as $resultados)                   
            <div class="h-auto grid grid-cols-5 text-center pb-3 pt-3 hover:bg-green-400 hover:text-white">
                <div class="text-lg">{{$resultados->idAlumno}}</div>
                <div class="text-lg">{{$resultados->alumno}}</div>
                <div class="text-lg">{{$resultados->tituloExamen}}</div>
                <div class="text-lg">{{$resultados->intentos}}</div>
                <div class="text-lg">{{$resultados->promedio}}</div>                
            </div>
            <?php 
            $sum = $sum + $resultados->promedio; 
            $cont=$cont+1;
            ?>
        @endforeach     

        <div class="bg-blue-300">
            <h2 class="text-lg pt-4 pb-4 m-auto text-center font-semibold bg-blue-500 text-white">
                Intentos de los Alumnos</h2>
        </div>

        <div class="h-auto grid grid-cols-4 pt-3 pb-3 text-center hover:bg-blue-400 hover:text-white">
            <div class="font-bold">Titulo Examen</div>
            <div class="font-bold">Id del alumno</div>
            <div class="font-bold">Nombre del alumno</div>
            <div class="font-bold">Calificacion</div>
        </div>

        @foreach ($listaCalificaciones as $calificaciones)                   
        <div class="h-auto grid grid-cols-4 text-center pb-3 pt-3 hover:bg-green-400 hover:text-white">            
            <div class="text-lg">{{$calificaciones->tituloExamen}}</div>
            <div class="text-lg">{{$calificaciones->idAlumno}}</div>
            <div class="text-lg">{{$calificaciones->nombreAlumno}}</div>
            <div class="text-lg">{{$calificaciones->calificacion}}</div>
        </div>
        <?php 
        $cont=$cont+1;
        ?>
    @endforeach 

        {{-- <div class="text-lg pt-4 pb-2 pl-3">El promedio del grupo es: <?php echo "Promedio de grupo: ".$prom = $sum/$cont; ?> </div>  --}}
        
        
    </div>

@endsection