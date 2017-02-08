<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Binary Dragon Programming Project</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{ URL::asset('css/welcome.css') }}">
        <script type="text/javascript" src="{{ URL::asset('js/welcome.js') }}"></script>
    </head>
    <body >
        <form method="POST">
            {{ csrf_field() }}
            <div class="flex-center">
                <div class="content" onkeydown="changeMedia(event, '{{$name}}', {{$trackNum}}, {{$imageNum}})">
                    <div class="row">
                        <div class="title m-b-md" title="A driven programmer">
                            @if ($name)
                                {{ $name }}
                            @else
                                Laravel
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="links flex-center">
                            @foreach($links as $link)
                            <a href="{{ $link->link }}" title="{{ $link->tip }}">
                                {{ $link->link_text }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="flex-center">
                            <input type="hidden" name="imageNum" value="{{ $imageNum }}">
                            <input type="hidden" name="trackNum" value="{{ $trackNum }}">
                            {{-- TODO: make these actually do something --}}
                            <button class="mobile" name="left"><</button>
                            <img src="{{ URL::asset($image) }}" title="Change by hitting tab then the wasd keys">
                            <button class="mobile" name="right">></button>
                        </div>
                    </div>
                    <div class="row">
                        <p>{{$track->title}} by {{$track->artist}}</p>
                        <audio id="myMusic" onended="next(event, '{{$name}}', {{$trackNum}})" controls {{$auto}} title="Change by hitting tab followed by the arrow keys">
                            <source id="song" src="{{ URL::asset('music/'.$track->filename) }}" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
