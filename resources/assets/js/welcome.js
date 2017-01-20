function foo(name) {
    alert("hey " + name);
}

function show (elem) {  
    elem.style.display="block";
}
function hide (elem) { 
    elem.style.display=""; 
}

function myF(event) {
    var x = event.key;
    var expr = new RegExp("^Arrow.*");
    if (expr.test(x)) {
        var newTrack = "http://mah-pi/music/07 - Aurora.mp3"
        var audioElement = document.getElementById("song");
        if (audioElement) {
            audioElement.setAttribute('src', newTrack);
        }
        audioElement.parentNode.load();
        alert("The key pressed was " + x);
    }
}
