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
   <div class="col-12 d-flex justify-content-end">
     <button class="col-2 btn btn-primary me-2">{{fechaActual('d D F \of o')}}</button>
   </div>
    @yield('contenido')
</body>
</html>