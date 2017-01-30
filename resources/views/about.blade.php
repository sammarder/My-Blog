<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Binary Dragon Photography</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ URL::asset('css/welcome.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/about.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/photo.js') }}"></script>
    </head>
    <body>
        <p class="left-align">I am a recent college grad playing around with the LAMP stack. I started this project after I got laid off from my first job out of college which left me hungry for more full stack development. This project was principally for me to understand what goes into real web design and to better understand different JS libraries. I have attempted to design each page as well as I could and in the process learning about CSS as much as possible.</p>

        <p class="left-align">This site makes use of the Laravel PHP framework as its back bone for routing and controlling the passage of information from the MySQL database to the frontend. Each page makes use of a different JS framework except for this one.</p>

        <p class="left-align">The home page uses vanilla JS with events being managed by the HTML side hence hitting tab before being able to interact with it. It is encouraged to try the wasd and arrow keys here to see how the page reacts. Also, if you provide /?name=sam at the end of the home page, you can see various links to other parts of the website.</p>

        <p class="left-align">The photo page makes use of jQuery for interaction. All you have to do is hit wasd or an arrow key and the image will change along with the information about that image.</p>
    </body>
</html>
