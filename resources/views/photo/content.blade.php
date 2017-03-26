<div class="pic flex-center">
    <div class="column">
        <button class="mobile" name="left"><</button>
    </div>
    <div class="column">
        <img src="{{ URL::asset('img/'.$photo->name.'.jpg') }}" title="Try hitting wasd or arrow keys">
    </div>
    <div class="column">
        <p class="left-center">
            Image Title: {{ explode(".", $name)[0] }}<br><br>
            @if ($photo)
                <input type="hidden" name="clip" value="{{ $photo->clip }}">
                Camera Model: {{ $photo->model }}<br>
                Lens Length: {{ $photo->lens_length }}mm<br><br>
                F Number: f/{{ $photo->f_number }}<br>
                ISO: {{ $photo->iso }}<br>
                Shutter Speed: {{ $photo->shutter_speed }} seconds
            @endif
        </p>
    </div>
    <div class="column">
        <button class="mobile" name="right">></button>
    </div>
</div>
