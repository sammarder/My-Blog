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
        <form id="main" method="POST">
            {{ csrf_field() }}
            <div class="flex-center">
                <div class="content" onkeydown="changeMedia(event, '{{$name}}', {{$trackNum}}, {{$imageNum}})">
                    <div class="row">
                        <div class="title m-b-md" title="A driven programmer">
                            {{ $name }}
                        </div>
                    </div>
                    <div class="row">
                        @include("welcome.links")
                    </div>
                    <div class="row">
                        @include("welcome.picture")
                    </div>
                    <div class="row">
                        @include("welcome.music")
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
