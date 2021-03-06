@extends('layouts.app')

@section('content')
    <div class="product">
        <div class="columns top-view">
            <div class="column">
                <div class="slider-container">
                    @for($i = 1; $i <= count($product->productImages) ; $i++)
                        <div class="item">
                            <img data-lazy="{{asset($product->productImages[$i - 1]->location)}}"
                                 alt="{{$product->productImages[$i -1]->alt}}">
                        </div>
                    @endfor
                </div>
            </div>
            <div class="column info-container">
                {!! Form::open(["url" => route("add_to_cart",["productId" => $product->id])]) !!}
                <h1 class="name">{{$product->name}}</h1>
                <p class="price">{{env("CURRENCY_ICON")}} {{$product->price}}</p>
                <button type="submit" class="button is-primary">
                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                    Voeg toe aan winkelwagen</button>
                {!! Form::close() !!}
            </div>
        </div>
        <hr class="section-devider">
        <div class="column description-container has-text-centered">
            <h2 class="title">{{$product->name}}</h2>
            <p class="description">{{$product->description}}</p>
        </div>
        <hr class="section-devider">
        <div class="column description-container has-text-centered">
            <h2 class="title">technische Informatie</h2>
            <div class="columns">
                <div class="column">
                    <h4>Hoeveelheid</h4>
                    <p>{{$product->quantity}} ml</p>
                </div>
                <div class="column">
                    <h4>Categorie</h4>
                    <p>{{ ( new \App\Category() )->find($product->category_id)->name }}</p>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="column">
                        <h4>Alcohol Percentage</h4>
                        <p>{{$product->category_id }}%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push("head")
    <link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
@endpush
@push("footer")
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="/slick/slick.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.slider-container').slick({
                infinite: true,
                speed: 700,
                dots: true,
                lazyLoad: 'ondemand',
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                fade: true,
                arrows: false,
                cssEase: 'linear'
            });
        });
    </script>
@endpush