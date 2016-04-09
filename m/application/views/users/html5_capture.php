<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="UTF-8"/>
<meta name="Author" content="">
<meta name="Keywords" content="">
<meta name="Description" content="">
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
<script type="text/javascript"  src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script src="/js/jquery.countdown.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript"  src="/js/bootstrap.js"></script>
<script type="text/javascript">
$('#allow_use_camera').countdown({
image: '/',
startTime: '00:6',
timerEnd: function(){
$('#allow_use_camera').hide()
},
format: 'mm:ss'
})
// Put event listeners into place
window.addEventListener("DOMContentLoaded", function() {
// Grab elements, create settings, etc.
var canvas = document.getElementById("canvas"),
context = canvas.getContext("2d"),
video = document.getElementById("video"),
videoObj = { "video": true },
errBack = function(error) {
console.log("Video capture error: ", error.code); 
};

// Put video listeners into place
if(navigator.getUserMedia) { // Standard
navigator.getUserMedia(videoObj, function(stream) {
video.src = stream;
video.play();
}, errBack);
} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
navigator.webkitGetUserMedia(videoObj, function(stream){
video.src = window.webkitURL.createObjectURL(stream);
video.play();
}, errBack);
} else if(navigator.mozGetUserMedia) { // WebKit-prefixed
navigator.mozGetUserMedia(videoObj, function(stream){
video.src = window.URL.createObjectURL(stream);
video.play();
}, errBack);
}

// Trigger photo take
document.getElementById("snap").addEventListener("click", function() {
	context.drawImage(video, 0, 0, 640, 480);
	document.getElementById("image_avatar").src=canvas.toDataURL()
	document.getElementById("image_avatar").style.display="block";
	SaveToDisk(canvas.toDataURL(),'test')
});
}, false);

function SaveToDisk(fileURL, fileName) {
    // for non-IE
    if (!window.ActiveXObject) {
        var save = document.createElement('a');
        save.href = fileURL;
        save.target = '_blank';
        save.download = fileName || 'unknown';

        var event = document.createEvent('Event');
        event.initEvent('click', true, true);
        save.dispatchEvent(event);
        (window.URL || window.webkitURL).revokeObjectURL(save.href);
    }

    // for IE
    else if ( !! window.ActiveXObject && document.execCommand)     {
        var _window = window.open(fileURL, '_blank');
        _window.document.close();
        _window.document.execCommand('SaveAs', true, fileName || fileURL)
        _window.close();
    }
}
</script>
<style>
#allow_use_camera {
display:inline-block;
position:fixed;
margin-left:-5%;
}
#image_avatar {
	position:fixed;
	width:480px;
	height:320px;
}
</style>
</head>

<body>

<!--start capture modal -->
<div class="modal fade in" style="left: 32%;top: 55%;width: 85%" id="iframe_modal_take_picture">
<div class="modal-header">
<img id="allow_use_camera" src="/images/allow_camera.png"/>
<h4 style="margin-left:70%">Chụp ảnh làm hình đại diện</h4>
</div>
<div class="modal-body">
<img id="image_avatar" style="display:none" src=""/>
<canvas id="canvas" width="480" height="320"></canvas>
<video style="float:right" id="video" width="480" height="320" autoplay></video>
</div>  
<div class="modal-footer">
<button type="button" id="snap" class="btn btn-inverse" >Chụp ảnh</button>
</div>
</div>
<!-- end capture modal -->

</body>
</html>
