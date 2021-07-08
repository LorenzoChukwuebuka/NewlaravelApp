<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Welcome to Laravel </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('materialize/css/materialize.css') }}" rel="stylesheet">
    </head>

    <body>
		<nav>
		<div class="nav-wrapper">
		
			
			<div class="nav-wrapper blue darken-3">
			<a href="{{ route('home') }}" class="brand-logo"> Home </a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
			@auth
			<li> <a href=""> {{ auth()->user()->name }} </a> </li> 
			<li> <a href="{{ route('post') }}"> Post  </a> </li> 
			<li> <a href="{{ route('dash')}} "> Dashboard </a> </li> 
			<li> <a href="{{ route('logout') }}"> logout </a> </li> 
			@endauth
			
			@guest
			<li> <a href="{{ route('dash')}} "> Dashboard </a> </li> 
			<li> <a href="{{ route('post') }}"> Post  </a> </li> 
			<li> <a href="{{ route('login') }}"> Login </a> </li> 
			<li> <a href="{{ route('register') }}"> register </a> </li> 
			@endguest
		
			
			
			</ul>
		
		
		</nav>
			@yield('content')
			<script src="" async defer></script>
    </body>

    <script src="{{ asset('materialize/js/materialize.js') }}"> </script>
      <script>
        M.AutoInit();
       </script>
</html>