@extends('layouts.app')

@section('content')
    <div class="container age_verification modal-view">
        <nav class="panel">
            <p class="panel-heading">
                Registreer
            </p>
            <div class="panel-block column">
                <h1 class="title has-text-centered"> Met dit account kunt u geweldige product bestellen</h1>
                {!! Form::open(["url" => route("register")]) !!}
                    {{ csrf_field() }}
                    <div class="columns has-text-centered is-centered">
                        <div class="column is-one-quarter{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="">Voornaam </label>
                            <input id="first_name" type="text" class="form-control" name="first_name"
                                   value="{{ old('first_name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="column is-one-quarter{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="">last_name</label>
                            <input id="last_name" type="text" name="last_name"
                                   value="{{ old('first_name') }}" required autofocus>
                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="columns has-text-centered is-centered">
                        <div class="column is-one-quarter{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                   required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="column is-one-quarter{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="">address</label>
                            <input id="address" class="form-control" name="address" value="{{ old('address') }}"
                                   required>
                            @if ($errors->has('address'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="columns has-text-centered is-centered">
                        <div class="column is-one-quarter{{ $errors->has('postcode') ? ' has-error' : '' }}">
                            <label for="postcode" class="">Postcode</label>
                            <input id="postcode" class="form-control" name="postcode" value="{{ old('postcode') }}"
                                   required>
                            @if ($errors->has('postcode'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="column is-one-quarter{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="">Stad</label>
                            <input id="city" class="form-control" name="city" value="{{ old('city') }}"
                                   required>
                            @if ($errors->has('city'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="columns has-text-centered is-centered">
                        <div class="column is-one-quarter{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="country" class="">Land</label>
                            <input id="country" class="form-control" name="country" value="{{ old('country') }}"
                                   required>
                            @if ($errors->has('country'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="column is-one-quarter{{ $errors->has('telephone_number') ? ' has-error' : '' }}">
                            <label for="telephone_number" class="">Telefoon nummer</label>
                            <input id="telephone_number" class="form-control" name="telephone_number"
                                   value="{{ old('telephone_number') }}"
                                   required>
                            @if ($errors->has('telephone_number'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('telephone_number') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="columns has-text-centered is-centered">
                        <div class="column is-one-quarter{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="column is-one-quarter">
                            <label for="password-confirm" class="">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="column has-text-centered  is-centered">
                        <button type="submit" class="button">
                            Registeer
                        </button>
                    </div>
                {!! Form::close() !!}
            </div>
        </nav>
    </div>
@endsection
