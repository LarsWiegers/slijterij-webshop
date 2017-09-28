<div class="product">
    <a href="{{route("product_single",["productname" => $name])}}">
        <img src="{{asset($image)}}" alt="{{$alt}}">
        <p class="name">
            <span>
                {{$name}}
            </span>
        </p>
        <p class="price"><span>{{env("CURRENCY_ICON")}} {{$price}}</span></p>
    </a>
</div>