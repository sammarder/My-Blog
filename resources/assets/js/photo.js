$(document).ready(function() {
    $("body").keydown(function() {
        var key = event.key;
        var currentImage = $('input[name=imageNum]');
        if (key === "a" || key === "s" || key === "ArrowLeft" || key === "ArrowDown") {
            currentImage--;
            alert(currentImage);
        }
        else if (key === "w" || key === "d" || key === "ArrowUp" || key === "ArrowRight") {
            currentImage++;
            alert(currentImage);
        }
    });
}); 
