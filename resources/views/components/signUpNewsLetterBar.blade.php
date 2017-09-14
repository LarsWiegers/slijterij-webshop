<section class="sign_up_bar container-fluid">
    {!! Form::open(["url" => route("sign_up_url")]) !!}
    <div class="container has-text-centered">
        <h1>Wilt u meer informatie?</h1>
        <h3>Schrijf u dan in voor onze email lijst</h3>
    </div>
    <div class="columns">
        <div class="column">
            <span class="for-layout">
                <label for="naam">Uw naam: </label>
            </span>
            <input value="{{isset(Auth::user()->first_name) ? Auth::user()->first_name : '' }}" id="naam">
        </div>
        <div class="column">
            <span class="for-layout">
                <label for="achternaam">Uw achternaam: </label>
            </span>
            <input value="{{isset(Auth::user()->last_name) ? Auth::user()->last_name : '' }}" id="achternaam">
        </div>
        <div class="column">
            <span class="for-layout">
                <label for="email">Uw email adress: </label>
            </span><input value="{{isset(Auth::user()->email) ? Auth::user()->email : '' }}" id="email">
        </div>
        <div class="column is-one-third">
            <span class="for-layout">
                stuur mij e-mails
            </span>
            <button type="submit" value="Submit" class="button">Subscribe</button>
        </div>
    </div>
    {!! Form::close() !!}
</section>