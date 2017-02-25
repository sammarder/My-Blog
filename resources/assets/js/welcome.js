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

    var arguments = {"name": name, "trackNum": countTrack, "imageNum": countImage};
    if (triggered !== "") {
        this.post("/", arguments);
    }
}

function post(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.getElementById("main");

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
}
