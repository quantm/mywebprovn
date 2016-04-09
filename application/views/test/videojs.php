<!DOCTYPE html>
<html>
<head>
  <title>Video.js | HTML5 Video Player</title>

  <!-- Chang URLs to wherever Video.js files will be hosted -->
  <link href="http://myweb.pro.vn/css/video-js.css" rel="stylesheet" type="text/css">
  <!-- video.js must be in the <head> for older IEs to work. -->
  <script src="http://myweb.pro.vn/js/video.js"></script>

  <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
  <script>
    videojs.options.flash.swf = "http://myweb.pro.vn/include/video-js.swf";
  </script>


</head>
<body>

  <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="800" height="600"
      poster="http://video-js.zencoder.com/oceans-clip.png"
     data-setup='{"techOrder": ["youtube"],"controls": true, "autoplay": true, "preload": "auto", "src":"http://www.youtube.com/watch?v=MXou3V0jdPs" }'>
  </video>

</body>
</html>
