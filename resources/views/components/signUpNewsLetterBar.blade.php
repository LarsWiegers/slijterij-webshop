<section class="sign_up_bar container-fluid">
    {!! Form::open(["url" => route("sign_up_url")]) !!}
    <div class="container has-text-centered">
        <h1>Wilt u meer informatie?</h1>
        <h3>Schrijf u dan in voor onze email lijst</h3>
    </div>
    <div class="columns">
        <div class="column">
            <span class="for-layout">
                <label for="first_name">Uw voornaam: </label>

            </span>
            <input value="{{isset(Auth::user()->first_name) ? Auth::user()->first_name : '' }}" id="first_name" required name="first_name">
            @if($errors->has("first_name"))
                <p class="error">{{$errors->first("first_name")}}</p>
            @endif
        </div>
        <div class="column">
            <span class="for-layout">
                <label for="last_name">Uw achternaam: </label>

            </span>
            <input value="{{isset(Auth::user()->last_name) ? Auth::user()->last_name : '' }}" id="last_name" required name="last_name">
            @if($errors->has("last_name"))
                <p class="error">{{$errors->first("last_name")}}</p>
            @endif
        </div>
        <div class="column">
            <span class="for-layout">
                <label for="email">Uw email adress: </label>
            </span><input value="{{isset(Auth::user()->email) ? Auth::user()->email : '' }}" id="email" required name="email">
            @if($errors->has("email"))
                <p class="error">{{$errors->first("email")}}</p>
            @endif
        </div>
        <div class="column is-one-third">
            <span class="for-layout">
                stuur mij e-mails
            </span>
            <button type="submit" value="Submit" class="button">Subscribe</button>
        </div>
    </div>
</section>