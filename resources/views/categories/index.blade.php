@extends('layouts.app')

@section('content')
    <div class="columns">
        <div class="column sidebar">
            <aside class="menu">
                <p class="menu-label">
                    General
                </p>
                <ul class="menu-list">
                    <li><a>Dashboard</a></li>
                    <li><a>Customers</a></li>
                </ul>
                <p class="menu-label">
                    Administration
                </p>
                <ul class="menu-list">
                    <li><a>Team Settings</a></li>
                    <li>
                        <a class="is-active">Manage Your Team</a>
                        <ul>
                            <li><a>Members</a></li>
                            <li><a>Plugins</a></li>
                            <li><a>Add a member</a></li>
                        </ul>
                    </li>
                    <li><a>Invitations</a></li>
                    <li><a>Cloud Storage Environment Settings</a></li>
                    <li><a>Authentication</a></li>
                </ul>
                <p class="menu-label">
                    Transactions
                </p>
                <ul class="menu-list">
                    <li><a>Payments</a></li>
                    <li><a>Transfers</a></li>
                    <li><a>Balance</a></li>
                </ul>
            </aside>
        </div>
        <div class="column">
            <div class="featured-products">
                <div class="grid-container">
                    @foreach($products as $product)
                        <div class="product">
                            <img src="{{asset($product->productImage[0]->location)}}"
                                 alt="{{$product->productImage[0]->alt}}">
                            <p class="name">{{$product->name}}</p>
                            <p class="price">{{env("CURRENCY_ICON")}} {{$product->price}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
