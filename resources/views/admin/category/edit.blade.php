@extends('layouts.admin')

@section('content')
    <div class="edit_product">
        <div class="container modal-view">
            <nav class="panel">
                <p class="panel-heading">
                    Een Category aanpassen
                </p>
                <div class="panel-block column">
                    {!! Form::open(["url" => route("admin_categories_update",["categoryId" => $category->id])]) !!}
                    <div class="column container is-fluid has-text-centered form-container">
                        <div class="column">
                            <span class="for-layout">
                                <label for="name">
                                    Categorie naam :
                                </label></span>
                            <input id="name" name="name" value="{{$category->name}}">
                        </div>
                        <div class="column">
                            @if($errors->has("name"))
                                <p class="error">{{$errors->first("name")}}</p>
                            @endif
                        </div>
                        <div class="column">
                            <button type="submit" class="button">pas aan</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </nav>
        </div>


    </div>
@endsection