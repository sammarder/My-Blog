var countTrack = 0;
var countImage = 0;
function foo(name) {
    alert("hey " + name);
}

function show (elem) {  
    elem.style.display="block";
}
function hide (elem) { 
    elem.style.display=""; 
}

/*
So the count variable is constant within a session
Next step: Figure out how to get max value of array in here
After that, figure out how to adjust the image and song accordingly
*/
function myF(event) {
    var keyPressed = event.key;
    var expr = new RegExp("^Arrow.*");
    if (keyPressed === "ArrowLeft" || keyPressed === "ArrowDown") {
        countTrack--;
    }
    else if (keyPressed === "ArrowRight" || keyPressed === "ArrowUp") {
        countTrack++;
    }
    else if (keyPressed === "a" || keyPressed === "s") {
        countImage--;
    }
    else if (keyPressed === "d" || keyPressed === "w") {
        countImage++;
    }
    //alert("You have gone to image " + countImage + " and song " + countTrack + ".");
    if (!expr.match(x)) {
        var newTrack = "http://mah-pi/music/07 - Aurora.mp3"
        var audioElement = document.getElementById("song");
        if (audioElement) {
            audioElement.setAttribute('src', newTrack);
        }
        audioElement.parentNode.load();
        alert("The key pressed was " + x);
    }
}
