@extends('layouts.app')

@section('content')
    <div class="home">
        <div class="slider-container">
            <div class="item">
                <div class="front">
                    <h1>
                        Slijterij Stuk in m'n Kraag
                    </h1>
                    <h2>
                        Waar wij u helpen tot u te vreden bent.
                    </h2>
                </div>
                <div class="back" style="background-image:url({{asset("banners/banner1.jpg")}})"></div>
            </div>
            <div class="item">
                <div class="front">
                    <h1>
                        Slijterij Stuk in m'n Kraag
                    </h1>
                    <h2>
                        Waar u uw favoriete wijntje vindt.
                    </h2>
                </div>
                <div class="back" style="background-image:url({{asset("banners/banner2.png")}})"></div>
            </div>
            <div class="item">
                <div class="front">
                    <h1>
                        Slijterij Stuk in m'n Kraag
                    </h1>
                    <h2>
                        Waar u dat niewe speciaal biertje vindt.
                    </h2>
                </div>
                <div class="back" style="background-image:url({{asset("banners/banner3.jpg")}})"></div>
            </div>
        </div>
        <div class="featured-products">
            <div class="grid-container">
                @foreach($featuredProducts as $product)
                    @component("components.featuredProduct")
                        @slot("image")
                            {{$product->productImage[0]->location}}
                        @endslot
                        @slot("alt")
                            {{$product->productImage[0]->alt}}
                        @endslot
                        @slot("name")
                            {{$product->name}}
                        @endslot
                        @slot("price")
                            {{$product->price}}
                        @endslot
                    @endcomponent
                @endforeach
            </div>
        </div>
    </div>
    @component("components.signUpNewsLetterBar")
    @endcomponent
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
            $(".close-icon").on("click",function() {
                $(".info_bar").addClass("close");
            });
        });
    </script>

@endpush
