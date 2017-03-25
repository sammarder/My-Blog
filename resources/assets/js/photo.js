//TODO: Make this post back to the main photo page
$(document).ready(function() {
    $("body").keydown(function() {
        var key = event.key;

        var posting = function(offset){
            var currentImage = parseInt($('input[name=imageNum]').val()) + offset;
            var token = $('input[name=_token]').val();
            $.post("https://mah-pi/photo", {imageNum: currentImage, _token: token})
                 .done(function() {window.location = "?imageNum=" + currentImage;});
        };

        if (key === "a" || key === "s" || key === "ArrowLeft" || key === "ArrowDown") {
            posting(-1); //Go back one image
        }
        else if (key === "w" || key === "d" || key === "ArrowUp" || key === "ArrowRight") {
            posting(+1); //Go forward one image
        }
    });
    $("img").click(function() {
        var clip = 'clips/chirping.wav';
        var audio = new Audio(clip);
        audio.play();
    });
});
