@extends('layouts.admin')

@section('content')
    <table>
        <thead>
        <tr>
            <td>Naam :</td>
            <td>categorie :</td>
            <td>zichtbaar voor klanten :</td>
            <td>code :</td>
            <td>prijs :</td>
            <td>alcohol percentage :</td>
            <td>Hoeveelheid (ml) :</td>
            <td> edit / delete </td>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>
                    <a href="{{route("product_single",["productname" => $product->name])}}">{{$product->name}}</a>
                </td>
                <td>
                    {{$product->category->name}}
                </td>
                <td>
                    @if($product->online)
                        ja
                    @else
                        nee
                    @endif
                </td>
                <td>
                    {{$product->code}}
                </td>
                <td>
                    {{$product->price}}
                </td>
                <td>
                    {{$product->alcoholPercentage}}%
                </td>
                <td>
                    {{$product->quantity}}
                </td>
                <td>
                    <div class="columns">
                        <div class="column">
                            <a href="{{route("admin_products_edit",["productId" => $product->id])}}">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="column">
                            <a href="{{route("admin_products_delete",["productId" => $product->id])}}">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection