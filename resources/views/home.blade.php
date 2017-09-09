@extends('layouts.app')

@section('content')
    <div class="featured-products">
        <div class="grid-container">
            @foreach($featuredProducts as $product)
                <div class="product">
                    <img src="{{asset($product->productImage[0]->location)}}" alt="{{$product->productImage[0]->alt}}">
                    <p class="name">{{$product->name}}</p>
                    <p class="price">€ {{$product->price}}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
