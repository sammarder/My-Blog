<p>{{$track->title}} by {{$track->artist}}</p>
<audio id="myMusic" onended="next(event, '{{$name}}', {{$trackNum}})" controls title="Change by hitting tab followed by the arrow keys">
    <source id="song" src="{{ URL::asset('music/'.$track->filename) }}" type="audio/mpeg">
</audio>
