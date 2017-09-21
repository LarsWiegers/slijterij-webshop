@extends('layouts.admin')

@section('content')
    <table>
        <thead>
        <tr>
            <td>Naam :</td>
            <td>Address :</td>
            <td>postcode :</td>
            <td>stad :</td>
            <td>land :</td>
            <td>telefoon nummer :</td>
            <td>email: </td>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->first_name}} {{$user->last_name}}</td>
                <td>{{$user->adress}}</td>
                <td>{{$user->postcode}}</td>
                <td>{{$user->city}}</td>
                <td>{{$user->country}}</td>
                <td>
                    <a href="tel:{{$user->telephone_number}}">
                        {{$user->telephone_number}}
                    </a>
                </td>
                <td>
                    <a href="mail:{{$user->email}}">
                        {{$user->email}}
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection