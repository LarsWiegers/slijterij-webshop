@extends('layouts.app')

@section('content')
    <div class="container age_verification modal-view">
        <nav class="panel">
            <p class="panel-heading">
                Leeftijdsrestrictie
            </p>
            <div class="panel-block column">
                <h1 class="title has-text-centered"> Bent u 18 jaar of ouder ?</h1>
                <div class="columns container is-fluid has-text-centered">
                    <div class="column">
                        <a class="button is-primary" href="age_verification/yes">Ja, ik ben 18 jaar of ouder</a>
                    </div>
                    <div class="column">
                        <a class="button is-danger" href="age_verification/no">Nee, ik ben geen 18 jaar of ouder</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

@endsection
