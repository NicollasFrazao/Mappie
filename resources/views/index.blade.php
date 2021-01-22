@extends('layouts.master')

@section('title', 'Come que a fome some')

@section('description', '')

@section('content')
  <section id="index">
    <header class="padding" style=' margin-top: 50px;
        display: flex;
        justify-content: space-around;
    '>

        <img id="logo" src="image/mappie.png" alt="Logotipo Mappie">

    </header>

    <h1>Já está com fome?<br><span>Seu Mappie está sendo preparado!</span></h1>

    <h2>Por enquanto, curta as redes sociais pra ficar por dentro de tudo!</h2>


    <div>
    	<a href="https://instagram.com/mappie_oficial" target="_blank"><img src="image/instagram.png" alt="Instagram"></a>
    	<a href="https://www.facebook.com/Mappie-2138033079592086/" target="_blank"><img src="image/facebook.png" alt="Facebook"></a>
    </div>
    <div>
    	<h3>Come que a fome some!</h3>
    </div>
  </section>
@endsection

@section('links')
    <link href="css/index.css" type="text/css" rel="stylesheet">
@endsection

@section('scripts')

@endsection

@section('scriptsOnPage')

  <?php

    //include('js/index.js');

  ?>

@endsection