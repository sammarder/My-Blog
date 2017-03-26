<div class="pic flex-center">
    <div class="column">
        <button class="mobile" name="left"><</button>
    </div>
    <div class="column">
        <img src="{{ URL::asset('img/photos/'.$photo->name.'.jpg') }}" title="Try hitting wasd or arrow keys">
    </div>
    <div class="column">
        <p class="left-center">
            Image Title: {{ $photo->name }}<br><br>
            <input type="hidden" name="clip" value="{{ $photo->clip }}">
            Season: {{ $photo->season." ".$photo->year }} <br>
            @if ($photo->location)
                Location: {{ $photo->location }}<br>
            @endif
        </p>
    </div>
    <div class="column">
        <button class="mobile" name="right">></button>
    </div>
</div>
