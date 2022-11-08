<div class="col-2 d-inline" style="background-color: {{$bgColor}}; text-align: center; padding: 15px 10px; margin: 4px 4px;
                                        border-radius: 15px;">
    <a class="btn mb-2 {{ $class ?? '' }}" href="{{$route}}">
        {{$slot}}
    </a>
</div>
