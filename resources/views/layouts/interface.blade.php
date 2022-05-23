<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title')</title>
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <!-- Fontawesome Link -->
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    
    {{-- Iconos --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{!! asset('css/generarExamen.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/cardExamenDocente.css') !!}">

</head>
<body class="bg-gray-100 text-gray-600">

    <svg class="h-20 w-16 text-white pl-3 pt-0 absolute"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
    </svg> 
    
        <nav class='flex py-4 bg-gray-500 text-white'>
            <div class="w-1/2 px-12 mr-auto">                 
                <p class="pl-10">Bienvenido </p>
                <p class="text 2xl font-bold pl-10">{{auth()->user()->name}}</p>
            </div>            
            
            <ul class="w-1/2 px-12 mr-auto flex justify-center pt-5">
                <li class="w-full">
                    <a class="font-semibold hover:bg-indigo-600 py-3 px-4 rounded-md text-lg" href="@yield('direccionhome')">Inicio</a>
                    <a class="font-semibold hover:bg-indigo-600 py-3 px-4 rounded-md text-lg" href="@yield('direccionexamen')">Examenes</a>
                    <a class="font-semibold hover:bg-indigo-600 py-3 px-4 rounded-md text-lg" href="@yield('direccionresultados')">Resultados</a>
                    {{-- <a class="font-semibold hover:bg-indigo-600 py-3 px-4 rounded-md text-lg" href="@yield('direccionresultados')">Ventana</a> --}}
                </li>
            </ul>

            <div class="w-1/2 px-12 mr-auto flex justify-end pt-3">
                <a href="{{ route('login.destroy') }}" class="h-12 font-semibold py-3 px-4 rounded-md bg-red-500 hover:bg-red-600">Cerrar Sesión</a>
            </div>
        </nav>

        @yield('content')
 
        @yield('js')

</body>
</html>