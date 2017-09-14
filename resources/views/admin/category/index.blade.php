@extends('layouts.admin')

@section('content')
    <table>
        <thead>
        <tr>
            <td>Naam :</td>
            <td>aantal producten :</td>
            <td> edit / delete </td>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>
                    {{$category->name}}
                </td>
                <td>
                    {{$category->amountOfProducts}}
                </td>
                <td>
                    <div class="columns">
                        <div class="column">
                            <a href="{{route("admin_categories_edit",["productId" => $category->id])}}">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="column">
                            <a href="{{route("admin_categories_delete",["productId" => $category->id])}}">
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