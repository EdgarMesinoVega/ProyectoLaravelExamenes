@extends('layouts.interface')

@section('title', 'Examen')

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

    <div class='w-3/4 h-3/4 m-auto mt-5 flow-root'>
        <div class='text-2xl text-center'>
            <label class='text-2xl text-center'>Tus exámenes</label>
            {{-- Boton para crear un nuevo examen --}}
            <a href="{{ route('homedocente.tituloExamen') }}">
                <button class='float-right'>
                    <svg class="h-10 w-10 text-blue-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <circle cx="12" cy="12" r="9" />
                        <line x1="9" y1="12" x2="15" y2="12" />
                        <line x1="12" y1="9" x2="12" y2="15" />
                    </svg>
                </button>
            </a>
            <p class='float-right text-xl'>Nuevo</p>
        </div>
        <div>
            {{-- listado de examenes --}}
            @foreach ($listaExamenes as $examenes)
                <div class="mb-3">
                    <div class="card-container">
                        <div class="bg-green-300 pt-2 pb-1">
                            <h3 class="text-xl">{{$examenes->titulo}}</h3>
                        </div>
                        <div class="image-exam-docente"><img src="https://cdn.create.vista.com/api/media/small/123798376/stock-vector-school-exam-test-results-pencil" alt="mi foto">
                        </div>
                        <div class="mitad-exa">
                            <div class="flex flex-center justify-center items-center pb-2 pt-2">

                                {{-- Para editar --}}
                                <a href="{{route('homedocente.editarexamen',$examenes->id)}}">
                                    @csrf
                                    <button class="hover:bg-white" type="submit">
                                        <svg class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                </a>
                                    

                                {{-- Para eliminar --}}
                                <form method="POST" action="{{ route('homedocente.destroy', $examenes->id)}}"
                                    class="formulario-eliminar">                            
                                    @csrf
                                    @method('delete')
                                    <button class="hover:bg-white" type="submit">
                                        <svg class="h-8 w-8 text-red-600"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="18" y1="6" x2="6" y2="18" />  <line x1="6" y1="6" x2="18" y2="18" /></svg>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endsection


        {{-- MENSAJES ALERT --}}
        
        @section('js')

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        
        
        @if (session('eliminar') == 'eliminado')
            <script>
                Swal.fire(
                'Eliminado!',
                'El examen y sus preguntas fueron eliminados',
                'success'
                );
            </script>
        @endif

        <script>
            $('.formulario-eliminar').submit(function(e){
                e.preventDefault();                     
                Swal.fire({
                title: 'Estas seguro de eliminar el Examen?',
                text: "El examen y las preguntas se borraran",
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