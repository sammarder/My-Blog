<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{ URL::asset('css/welcome.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/photo.js') }}"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="row">
                    <div class="title m-b-md">
                        Photography
                    </div>
                </div>
                <input type="hidden" name="imageNum" value=0 />
                {{-- TODO: Abstract this segment as much as possible --}}
                <div class="pic flex-center">
                    <div class="column">
                        <img src="{{ URL::asset('img/fall.jpg') }}">
                    </div>
                    <div class="column">
                        <p class="left-center">
                            Image Title: fall<br><br>
                            Camera Model: Canon Rebel t5i<br>
                            Lens Length: 24mm<br><br>
                            F Number: 22<br>
                            ISO: 3200 <br>
                            Shutter Speed: 53 seconds
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
