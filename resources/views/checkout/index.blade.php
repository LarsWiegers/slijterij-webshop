@extends('layouts.app')

@section('content')
   <div class="checkout">
       @guest
           <div class="column">
               <h1>U bent op dit moment niet ingelogd</h1>
               <div class="columns">
                   <div class="column">
                       <h2>Ik heb een account</h2>
                       <p>Zou u dan hier graag willen inloggen:  </p>
                       <a href="{{route("login")}}" class="button">Login</a>
                   </div>
                   <div class="column">
                       <h2>Nog geen account</h2>
                       <p>U kunt een account aanmaken op deze pagina : </p>
                       <a href="{{route("register")}}" class="button">Registeer</a>
                   </div>
               </div>
           </div>
       @endguest
       @auth

       @endauth
   </div>
@endsection
