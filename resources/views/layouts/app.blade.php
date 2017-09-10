<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    @stack("head")
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                {{env("APP_NAME")}}
            </a>
            <div class="navbar-burger burger" data-target="navMenubd-example">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="navbar-start">
            <a href="{{route("categories_home")}}" class="navbar-item">
                Producten
            </a>
        </div>
        <div class="navbar-end">
            <div class="navbar-item has-dropdown is-hoverable shopping-cart-container">
                <div class="navbar-link  is-active">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span class="count">{{$CountShoppinCartItems}}</span>
                </div>
                <div class="navbar-dropdown">

                    @if(count($shoppingCartItems) <= 0)
                        <div class="column has-text-centered">
                            U heeft nog geen producten toegevoegd in uw winkelwagen
                        </div>
                    @else

                        @foreach($shoppingCartItems as $item)
                            {!! Form::open(['url' => route("remove_an_item",["productId" => $item->id,"returnUrl" => Request::path()])]) !!}
                            <a class="navbar-item" href="/documentation/overview/start/">
                                <div class="img-container">
                                    @if(count( $item->productImages ) > 0)
                                        <img src="{{asset( $item->productImages[0]->location )}}"
                                             alt="{{asset( $item->productImages[0]->alt )}}">
                                    @else
                                        <img src="{{asset( "productimages/default.png")}}"
                                             alt="Default product image1">
                                    @endif
                                </div>
                                <div class="text">
                                    {{$item->name}}
                                </div>
                                <div class="button-container">
                                    <button type="submit" value="Submit"><i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </a>
                            {!! Form::close() !!}
                        @endforeach
                        <hr class="navbar-divider">
                        <div class="column has-text-centered">
                            <h3 class="price">Sub totaal : {{env("CURRENCY_ICON")}} {{$totalPriceCartItems}}</h3>
                        </div>
                    @endif

                    <hr class="navbar-divider">
                    <div class="columns buttons">
                        <div class="column">
                            <a class="button is-primary" href="{{route("order_checkout")}}">Bestellen</a>
                        </div>
                        <div class="column has-text-right">
                            <a class="button is-primary" href="{{route("remove_all_checkout_items",["returnUrl" => Request::path()])}}">Leegmaken</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="content">
        @yield('content')
    </div>
</div>

<!-- Scripts -->
@stack("footer")
</body>
</html>
