@extends('layouts.app')

@section('content')
    <div class="checkout">
        @guest
            <div class="column">
                <h1>U bent op dit moment niet ingelogd</h1>
                <div class="columns">
                    <div class="column">
                        <h2>Ik heb een account</h2>
                        <p>Zou u dan hier graag willen inloggen: </p>
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
            @if($CountShoppingCartItems === 0)
                <div class="column container">
                    <h1>Om een bestelling te plaatsen, moet u eerst producten in uw winkelwagen toevoegen</h1>
                </div>
            @else
                <div class="steps columns">
                    <div class="column">
                        <span class="step-title done">1</span>
                    </div>
                    <div class="column line done"></div>
                    <div class="column">
                        <span class="step-title active">2</span>
                    </div>
                    <div class="column line"></div>
                    <div class="column">
                        <span class="step-title">3</span>
                    </div>

                </div>
                <div class="columns is-vcentered">
                    <div class="column is-two-thirds">
                        {!! Form::open(["url" => route("order_checkout_step_2")]) !!}
                            <label for="first_name">
                                Voornaam :
                            </label>
                            <input name="first_name" value="{{Auth::user()->first_name}}" name="first_name" id="first_name">

                            <label for="last_name">
                                Achternaam :
                            </label>
                            <input name="last_name" value="{{Auth::user()->last_name}}" name="last_name" id="last_name">
                            <label for="address">
                                Bezorg address :
                            </label>
                            <input name="address" value="{{Auth::user()->address}}" name="address" id="address">
                        <label for="postcode">
                            postcode :
                        </label>
                        <input name="postcode" value="{{Auth::user()->postcode}}" name="postcode" id="postcode">
                        <label for="city">
                            Stad :
                        </label>
                        <input name="city" value="{{Auth::user()->city}}" name="city" id="city">
                        {!! Form::close() !!}
                    </div>
                    <div class="column is-one-third">

                    </div>
                </div>
            @endif
        @endauth
    </div>
@endsection
