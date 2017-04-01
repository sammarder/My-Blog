<div class="pic flex-center">
    <div class="column">
        <img src="{{ URL::asset('img/photos/full/'.$pic->name.'.jpg') }}" title="Try hitting wasd or arrow keys">
    </div>
    <div class="column">
        <p class="left-center">
            Image Title: {{ $pic->name }}<br><br>
            <input type="hidden" name="clip" value="{{ $pic->clip }}">
            Season: {{ $pic->season." ".$pic->year }} <br>
            @if ($pic->location)
                Location: {{ $pic->location }}<br>
            @endif
        </p>
    </div>
</div>
