//TODO: Make this post back to the main photo page
$(document).ready(function() {
    $("body").keydown(function() {
        var key = event.key;
        var currentImage = $('input[name=imageNum]').val();
        var token = $('input[name=_token]').val();
        if (key === "a" || key === "s" || key === "ArrowLeft" || key === "ArrowDown") {
            currentImage--;
            $.post("https://mah-pi/photo", {imageNum: currentImage, _token: token})
                 .done(function() {window.location = "?imageNum=" + currentImage;});
        }
        else if (key === "w" || key === "d" || key === "ArrowUp" || key === "ArrowRight") {
            currentImage++;
            $.post("https://mah-pi/photo", {imageNum: currentImage, _token: token})
                 .done(function() {window.location = "?imageNum=" + currentImage;});
        }
    });
});
