<div class="pic flex-center">
    <div class="column">
        <img src="{{ URL::asset('img/photos/full/'.$pic->name.'.jpg') }}" title="Try hitting wasd or arrow keys">
    </div>
    <div class="column">
        <p class="left-center">
            <input type="hidden" name="clip" value="{{ $pic->clip }}">
            {{ $pic->season." ".$pic->year }}<br>
            @if ($pic->location)
                {{ $pic->location }}<br>
            @endif
        </p>
    </div>
</div>
