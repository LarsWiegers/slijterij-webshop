<section class="sign_up_bar">
    {!! Form::open(["url" => route("signUp_url")]) !!}
        <label for="naam">Uw naam: </label><input value="{{Auth::user()->name}}" id="naam">
        <label for="achternaam">Uw achternaam: </label><input value="{{Auth::user()->achternaam}}" id="achternaam">
        <label for="email">Uw email adress: </label><input value="{{Auth::user()->email}}" id="email">
    {!! Form::close() !!}
</section>