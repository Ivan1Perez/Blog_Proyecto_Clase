<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>@yield('titulo')</title>
</head>
<body>
    @include('partials.nav')
   <div class="float-right mx-4 bg-[#0d6efd] text-white p-2 rounded">
     <button>{{fechaActual('d D F \of o')}}</button>
   </div>
    @yield('contenido')
</body>
</html>
