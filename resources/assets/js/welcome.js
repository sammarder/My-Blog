var countTrack = 0;
var countImage = 0;
function foo(name) {
    alert("hey " + name);
}

function changeMedia(event, name, track, image) {
    countTrack = track;
    countImage = image;
    var keyPressed = event.key;
    var expr = new RegExp("^Arrow.*");
    var triggered = "";
    if (keyPressed === "ArrowLeft" || keyPressed === "ArrowDown") {
        countTrack--;
        triggered = "ld";
    }
    else if (keyPressed === "ArrowRight" || keyPressed === "ArrowUp") {
        countTrack++;
        triggered = "ru";
    }
    else if (keyPressed === "a" || keyPressed === "s") {
        countImage--;
        triggered = "as";
    }
    else if (keyPressed === "d" || keyPressed === "w") {
        countImage++;
        triggered = "dw";
    }
    //alert("You have gone to image " + countImage + " and song " + countTrack + ".");
    var arguments = {"name": name, "trackNum": countTrack, "imageNum": countImage};
    var arg = "name=" + encodeURI(name) + "&trackNum=" + encodeURI(countTrack) + "&imageNum=" + encodeURI(countImage);
    if (triggered !== "") {
        window.location = "?" + arg;
    }
}

function next(event, name, track) {
    track = track + 1;
    window.location = "?name=" + encodeURI(name) + "&trackNum=" + encodeURI(track);
    var song = document.getElementById("myMusic");
    song.autoplay = true;
    song.load();
}
