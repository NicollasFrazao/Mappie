<!DOCTYPE html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta http-equiv="Cache-control" content="public">
    <meta name="description" content=""/>
    <meta name="author" content="">
    <meta name="title" content="@yield('title')">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:url" content="https://www.mappie.com.br" />
    <meta property="og:site_name" content="Mappie" />
    
    <link rel="manifest" href="js/manifest.json">
    <link rel="canonical" href="https://www.mappie.com.br">
    <link rel="shortcut icon" href="image/mappie-favicon.png"/>    

    <title>Mappie - @yield('title')</title>

    <style>
    
    <?php
      include('css/estilo.css');
      include('css/login.css');
    ?>

    </style>

  </head>

  <body onhashchange='hash()'>

    @yield('content')

    @include('footer')

  </body>

    @yield('links')
    @yield('scripts')

  <script>
    
    @yield('scriptsOnPage')

  </script>

</html>