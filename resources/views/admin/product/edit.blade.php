@extends('layouts.admin')

@section('content')
    <div class="edit_product">
        <div class="container modal-view">
            <nav class="panel">
                <p class="panel-heading">
                    Een product aanpassen
                </p>
                <div class="panel-block column">
                    {!! Form::open(["url" => route("admin_products_make")]) !!}
                    <div class="column container is-fluid has-text-centered form-container">
                        <div class="column">
                            <span class="for-layout">
                                <label for="category_id">
                                    Tot welke categorie behoort dit nieuwe project :
                                </label></span>
                            <select id="category_id" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="column">
                            <span class="for-layout">
                                 <label for="name">
                                    naam :
                                </label>
                            </span>
                            <input  name="name" id="name" value="{{$product->name}}">
                        </div>
                        <div class="column">
                            <span class="for-layout">
                                 <label for="description">
                                    Beschrijving :
                                </label>
                            </span>
                            <textarea name="description" id="description">{{$product->description}}</textarea>
                        </div>
                        <div class="column">
                            <span class="for-layout">
                                 <label for="price">
                                    Prijs :
                                </label>
                            </span>
                            <input name="price" id="price" value="{{$product->price}}">
                        </div>
                        <div class="column">
                            <span class="for-layout">
                                 <label for="quantity">
                                    Hoeveelheid ( ml ) :
                                </label>
                            </span>
                            <input name="quantity" id="quantity" value="{{$product->quantity}}">
                        </div>
                        <div class="column">
                            <span class="for-layout">
                                 <label for="code">
                                    Code :
                                </label>
                            </span>
                            <input name="code" id="code" value="{{$product->code}}">
                        </div>
                        <div class="column">
                            <span class="for-layout">
                                 <label for="online">
                                    Is zichtbaar voor de wereld :
                                </label>
                            </span>
                            @if($product->online == 1)
                            <input type="checkbox" name="online" id="online" checked>
                            @else
                                <input type="checkbox" name="online" id="online">
                                @endif

                        </div>
                        <div class="column">
                            <button type="submit" class="button">Voeg toe</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </nav>
        </div>


    </div>
@endsection