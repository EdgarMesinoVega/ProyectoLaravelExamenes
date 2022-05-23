@extends('layouts.interface')

@section('title',"Sistema")

@section('direccionhome')
{{-- {{ route('homealumno.index') }} --}}
@endsection

@section('direccionexamen')
{{-- {{ route('homealumno.examen') }} --}}
@endsection

@section('direccionresultados')
{{-- {{ route('homealumno.resultados') }} --}}
@endsection


@section('content')

<div class='bg-slate-300 w-full overflow-y-auto overflow-y-scroll'>
    
    <div class='bg-pastel-50 w-2/4 h-9/10 m-auto mt-5 shadow rounded'>
        <div className='border border-2px h-9 bg-white flow-root'>

            @foreach ($examen as $datoExamen)

            <label class='font-bold ml-2 text-xl ml-10'>Examen: {{$datoExamen->titulo}}</label>
            {{-- Boton para editar el titulo --}}
            {{-- <a href="{{ route('homedocente.editartituloexamen',$datoExamen->id) }}">
                <button class='float-right mr-1'>
                    editar titulo
                </button>
            </a> --}}

            {{-- Boton para salir --}}
            <a href="{{ route('homedocente.examen') }}">
                <button class='float-right mr-1'>
                    <svg class="h-8 w-8 text-black"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/> <line x1="9" y1="9" x2="15" y2="15" />  <line x1="15" y1="9" x2="9" y2="15"/></svg>
                </button>
            </a>
            
            <a href="{{route('homedocente.addPregunta',$datoExamen->id)}}">
                <button class='float-right'>
                    <svg class="h-8 w-8 text-black"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <line x1="9" y1="12" x2="15" y2="12" />  <line x1="12" y1="9" x2="12" y2="15" /></svg>
                </button> 
                <label class="float-right text-lg">Agregar Pregunta</label>
            </a>
            {{-- <button class='float-right mr-1' onClick={agregar}>
                <svg class="h-8 w-8 text-black"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />  <circle cx="12" cy="14" r="2" />  <polyline points="14 4 14 8 8 8 8 4" /></svg>
                <svg class="h-8 w-8 text-black"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <line x1="9" y1="12" x2="15" y2="12" />  <line x1="12" y1="9" x2="12" y2="15" /></svg>
            </button> --}}
        </div>
        @endforeach           
        
        {{-- Validacion si no hay preguntas disponibles --}}
        {{-- @if (sizeof($preguntas)==0)
            <h1 class="text-center text-bold pt-10 text-2xl">No hay preguntas Disponibles</h1>
        @endif --}}

        @foreach ($preguntas as $datosPreguntas)
        {{-- para imprimir las preguntas  --}}
        <div class="flex flex-row p-15 bg-blue-200 pt-2 w-full border-2">
            <div class="w-full pl-3"><b><p>{{$datosPreguntas->pregunta}}</p></b></div>
            
            <div  class="flex flex-row pt-2" >
                {{-- Boton para Editar --}}
            <a href="{{route('homedocente.editarPregunta',$datosPreguntas->id)}}">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 h-10 px-4 border border-blue-700 rounded">
                Editar</button>
            </a>
            
            {{-- Boton para Eliminar --}}
            <form action="{{route('homedocente.destroyPregunta',$datosPreguntas->id)}}" method="POST"
                class="formulario-eliminar">
                @csrf
                @method('delete')
                <div class="flex flex-row-reverse w-full">
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 h-10 border border-red-700 rounded" type="submit">
                    Eliminar</button>
            </form>            
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
        
        
        @endsection
        

        {{-- MENSAJES ALERT --}}
        
@section('js')

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Cuando se agregue una nueva pregunta --}}
@if (session('addpregunta') == 'addpregunta')
<script>
 Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Se agrego una pregunta nueva!!',
    showConfirmButton: false,
    timer: 1300
    }) 
</script>
@endif

{{-- Cuando se edite una preguta --}}
@if (session('editPregunta') == 'editPregunta')
<script>
 Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Se edito Correctamente!!',
    showConfirmButton: false,
    timer: 1300
    }) 
</script>
@endif

{{-- Cuando se Elimine una preguta --}}
@if (session('eliminarPreg') == 'eliminarPreg')
<script>
    Swal.fire({
    icon: 'error',
    title: 'Error al eliminar la pregunta',
    text: 'No puedes eliminar menos de 5 preguntas!',
    })
</script>
@endif


{{-- Cuando se Elimine una preguta (correcta)--}}
@if (session('deletepreg') == 'deletepreg')
    <script>
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Se Elimino Correctamente la Pregunta!!',
        showConfirmButton: false,
        timer: 1300
        }) 
    </script>
@endif

<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();                     
        Swal.fire({
        title: 'Estas seguro de eliminar le pregunta?',
        text: "la pregunta se borrara",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, quiero Borrar!',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
        }) 
    });   
</script>


@endsection