<div class="product">
    <a href="{{route("product_single",["productname" => $name])}}">
        <img src="{{asset($image)}}" alt="{{$alt}}">
        <p class="name">{{$name}}</p>
        <p class="price">{{env("CURRENCY_ICON")}} {{$price}}</p>
    </a>
</div>