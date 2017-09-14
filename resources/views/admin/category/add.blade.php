@extends('layouts.admin')

@section('content')
    <div class="add_product">
        <div class="container modal-view">
            <nav class="panel">
                <p class="panel-heading">
                    Een categorie toevoegen
                </p>
                <div class="panel-block column">
                    {!! Form::open(["url" => route("admin_categories_make")]) !!}
                    <div class="column container is-fluid has-text-centered form-container">
                        <div class="column">
                        <span class="for-layout">
                                <label for="name">
                                    categorie naam:
                                </label></span>
                            <input id="name" name="name" value="">
                        </div>
                        <div class="column">
                            @if($errors->has("name"))
                                <p class="error">{{$errors->first("name")}}</p>
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