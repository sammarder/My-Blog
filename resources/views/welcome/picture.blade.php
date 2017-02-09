<div class="flex-center">
    <input type="hidden" name="imageNum" value="{{ $imageNum }}">
    <input type="hidden" name="trackNum" value="{{ $trackNum }}">
    <button class="mobile" name="left"><</button>
    <img src="{{ URL::asset($image) }}" title="Change by hitting tab then the wasd keys">
    <button class="mobile" name="right">></button>
</div>
