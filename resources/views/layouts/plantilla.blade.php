
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">

    <!-- Fontawesome Link -->
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    
    {{-- Iconos --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
  </head>
  <body class="bg-gray-100 text-gray-900">

    <nav class="flex py-5 bg-gray-500 text-white">
      <div class="w-1/2 px-12 mr-auto">
        <p class="text-xl 2xl font-bold">Sistema Examenes</p>
      </div>
      @yield('option')
    </nav>
      @yield('content')
  
  </body>
</html>