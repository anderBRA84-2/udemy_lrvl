<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('title')</title>{{-- chamamos o parametro definido em @section('title') --}}
        <meta charset="utf-8">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        @include('site.layouts.partials.topo'){{-- //INCLUDE para incluir partes nesse caso o me@include('site.layouts.partials.rodape')//footernu --}}
        @yield('content'){{-- chamamos o parametro definido em @section('content') --}}
        @include('site.layouts.partials.rodape')//footer
    </body>
</html>
