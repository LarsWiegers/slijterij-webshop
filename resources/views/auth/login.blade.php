@extends('layouts.app')

@section('content')
    <div class="container age_verification modal-view">
        <nav class="panel">
            <p class="panel-heading">
                Log in
            </p>
            <div class="panel-block column is-centered">
                <h1 class="title has-text-centered"> Login hier in op uw account</h1>
                {!! Form::open(["url" => route("login")]) !!}
                <div class="column is-centered has-text-centered {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-Mail Address</label>

                    <div class="">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                               required autofocus>
                        @if($errors->has("email"))
                            <p class="error">{{$errors->first("email")}}</p>
                        @endif
                    </div>
                </div>
                <div class="column is-centered has-text-centered">
                    <label for="password">Password</label>

                    <div class="">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if($errors->has("password"))
                            <p class="error">{{$errors->first("password")}}</p>
                        @endif
                    </div>
                </div>
                <div class="column is-centered has-text-centered">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>
                <div class="column is-centered has-text-centered">
                    <button type="submit" class="button">
                        Login
                    </button>

                    <a class="button" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div>
                {!! Form::close() !!}
            </div>
        </nav>
    </div>

@endsection
