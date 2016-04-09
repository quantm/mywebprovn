<script type="text/javascript" src="/js/dragable-content.js">
  function ctck()
{
     var sds = document.getElementById("dum");
     if(sds == null){
        alert("You are using a free package.\n You are not allowed to remove the tag.\n");
     }
     var sdss = document.getElementById("dumdiv");
     if(sdss == null){
         alert("You are using a free package.\n You are not allowed to remove the tag.\n");
     }
}
document.onload ="ctck()";
</script>

<div style="color: #006622;"><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Drag and Drop the images anywhere in this page</h4>
  <p align=center><img src="/images/test/image1.jpg" style="padding-left: 10px; float:left" class="dragableElement"></p>
	<p align=center><img src="/images/test/image2.jpg" style="padding-left: 10px; float:left" class="dragableElement"></p>
	<p align=center><img src="/images/test/image3.jpg" style="padding-left: 10px; float:left" class="dragableElement"></p>
<br><br><br><br><br><br></div>
<div align=center style="font-size: 10px;color: #dadada;" id="dumdiv">
<a href="http://www.hscripts.com" id="dum" style="text-decoration:none;color: #dadada;">©h</a></div>