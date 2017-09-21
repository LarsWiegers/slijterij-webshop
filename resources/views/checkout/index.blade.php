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
                        <span class="step-title active">1</span>
                    </div>
                    <div class="column line"></div>
                    <div class="column">
                        <span class="step-title">2</span>
                    </div>
                    <div class="column line"></div>
                    <div class="column">
                        <span class="step-title">3</span>
                    </div>

                </div>
                <div class="columns is-vcentered">
                    <div class="column is-two-thirds">
                        <div class="container-fluid checkout-table-container">
                            <table class="checkout-table">
                                <thead>
                                <tr>
                                    <td>Product :</td>
                                    <td>Naam :</td>
                                    <td>categorie :</td>
                                    <td>prijs :</td>
                                    <td>Hoeveelheid (ml) :</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($shoppingCartItems as $product)
                                    <tr>
                                        <td>
                                            <img src="{{$product->productImage[0]->location}}"
                                                 alt="{{$product->productImage[0]->alt}}">
                                        </td>

                                        <td>
                                            <a href="{{route("product_single",["productname" => $product->name])}}">{{$product->name}}</a>
                                        </td>
                                        <td>
                                            {{$product->category->name}}
                                        </td>
                                        <td>
                                            {{env("CURRENCY_ICON")}} {{$product->price}}
                                        </td>
                                        <td>
                                            {{$product->quantity}}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="last">
                                    <td>
                                        Totaal prijs :
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>{{env("CURRENCY_ICON")}} {{$totalPriceCartItems}}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="column is-one-third">
                        <div class="text has-text-centered is-centered">
                            <h5>Zijn dit alle producten die u wil bestellen ?</h5>
                            <p>Dan kunt u door naar stap 2</p>
                            <a href="{{route("order_checkout_step_2")}}" class="button is-primary">Stap 2</a>
                        </div>
                    </div>
                </div>
            @endif
        @endauth
    </div>
@endsection
