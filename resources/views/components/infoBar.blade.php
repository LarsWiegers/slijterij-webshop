<section class="info_bar {{$status == "1"? 'success' : 'failed' }}" >
    <div class="column container">
        <p>
            @if($status == "1")
                <span class="icon">
            <i class="fa fa-check-circle-o" aria-hidden="true"></i>
        </span>

            @else
                <span class="icon">
           <i class="fa fa-times-circle-o" aria-hidden="true"></i>
        </span>
            @endif
            {{$message}}
        </p>
        <i class="fa fa-times close-icon" aria-hidden="true"></i>
    </div>

</section>