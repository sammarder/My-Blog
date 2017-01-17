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
        <script type="text/javascript" src="{{ URL::asset('js/welcome.js') }}"></script>
    </head>
    <body onclick="foo()">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    @if ($name)
                       {{ $name }}
                    @else
                    Laravel
                    @endif
                </div>
                <div class="links">
                    <a href="google.com" onmouseover="show(foodtip)" onmouseout="hide(foodtip)">
                        Food
                        <div class="tooltip" id="foodtip">
                            Take a bite!
                        </div>
                    </a>
                    <a href="laracasts.com" onmouseover="show(phototip)" onmouseout="hide(phototip)">
                        Photography
                        <div class="tooltip" id="phototip">
                            Mind blowing shots!
                        </div>
                    </a>
                    <a href="laravel-news.com" onmouseover="show(codetip)" onmouseout="hide(codetip)">
                        Code
                        <div class="tooltip" id="codetip">
                            Elegantly imperfect code
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
