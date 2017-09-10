@extends('layouts.app')

@section('content')
    <div class="columns">
        <div class="column sidebar">
            <aside class="menu">
                {!! Form::open(["url" => route("set_category_criteria")]) !!}
                <h2 class="menu-label">
                    Sorteren / Filteren:
                </h2>
                <p class="menu-label">
                    Categorieen :
                </p>
                <ul class="menu-list">
                    @foreach($allCategories as $category)
                        <li class="category-item">
                            <label for="category-{{$category->id}}">
                                {{$category->name}}
                            </label>
                            @if(isset($checkboxesToBeChecked))
                                @php
                                    $needToBeChecked = false;
                                @endphp
                                @foreach($checkboxesToBeChecked as $id)
                                    @php
                                        if($category->id == $id) {
                                            $needToBeChecked = true;
                                        }
                                    @endphp
                                @endforeach
                                @if($needToBeChecked)
                                    <input id="category-{{$category->id}}" type="checkbox" value="{{$category->id}}"
                                           name="category-{{$category->id}}" checked>
                                @else
                                    <input id="category-{{$category->id}}" type="checkbox" value="{{$category->id}}"
                                           name="category-{{$category->id}}">
                                @endif
                                @php
                                    $needToBeChecked = false;
                                @endphp
                            @else
                                <input id="category-{{$category->id}}" type="checkbox" value="{{$category->id}}"
                                       name="category-{{$category->id}}">
                            @endif
                        </li>
                    @endforeach
                </ul>
                <p class="menu-label"><label for="price">Prijs :</label></p>
                <input type="text" id="price" readonly name="price">
                <div class="column">
                    <div id="slider-range"></div>
                </div>
                <p class="menu-label"><label for="quantity">Hoeveelheid ( ml ) :</label></p>
                <input type="text" id="quantity" readonly name="quantity">
                <div class="column">
                    <div id="quantity-slider"></div>
                </div>
                <button type="submit" valu="submit" class="button">Filter</button>
                {!! Form::close() !!}
            </aside>
        </div>
        <div class="column">
            @if(count($products) <= 0)
                <div class="column has-text-centered sorry-message">
                    <h2>Sorry , we konden geen producten vinden met de filters die u aan heeft staan.</h2>
                </div>
            @else
                <div class="featured-products">
                    <div class="grid-container">
                        @foreach($products as $product)
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
            @endif
        </div>
    </div>
@endsection
@push("head")
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@push("footer")
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#slider-range").slider({
                range: true,
                min: {{$lowestPrice}},
                max: {{$highestPrice}},
                @if(isset($chosenLowestPrice) && isset($chosenHighestPrice)  )
                values: [ {{$chosenLowestPrice}}, {{$chosenHighestPrice}} ],
                @else
                values: [ {{$lowestPrice}}, {{$highestPrice}} ],
                @endif

                slide: function (event, ui) {
                    $("#price").val("$" + ui.values[0] + " - $" + ui.values[1]);
                }
            });
            $("#price").val("$" + $("#slider-range").slider("values", 0) +
                " - $" + $("#slider-range").slider("values", 1));
            $("#quantity-slider").slider({
                range: true,
                min: {{$lowestQuantity}},
                max: {{$highestQuantity}},
                @if(isset($chosenLowestQuantity) && isset($chosenHighestQuantity)  )
                values: [ {{$chosenLowestQuantity}}, {{$chosenHighestQuantity}} ],
                @else
                values: [ {{$lowestQuantity}}, {{$highestQuantity}} ],
                @endif
                slide: function (event, ui) {
                    $("#quantity").val(ui.values[0] + "ml - " + ui.values[1] + "ml");
                }
            });
            $("#quantity").val($("#quantity-slider").slider("values", 0) +
                "ml - " + $("#quantity-slider").slider("values", 1) + "ml");
        });
    </script>
@endpush