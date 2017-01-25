//TODO: Make this post back to the main photo page
$(document).ready(function() {
    $("body").keydown(function() {
        var key = event.key;
        var currentImage = $('input[name=imageNum]').val();
        var triggered = "";
        if (key === "a" || key === "s" || key === "ArrowLeft" || key === "ArrowDown") {
            currentImage--;
            triggered = "down";
        }
        else if (key === "w" || key === "d" || key === "ArrowUp" || key === "ArrowRight") {
            currentImage++;
            triggered = "up";
        }
        
        if (triggered !== "") {
            window.location = "?imageNum=" + encodeURI(currentImage);
        }
    });
}); 
