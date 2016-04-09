<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
<link href="/css/web/web.css" type="text/css" rel="stylesheet">
<link href="/css/web/detail.css" type="text/css" rel="stylesheet">
<script type="text/javascript"  src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

//start fix firefox UI error
var isFirefox = typeof InstallTrigger !== 'undefined';   
if(isFirefox){
$('body').attr('style','height:10.5!important')
}
//end

	$(".example a").click(function(){
		var mySpan = parent.document.getElementById('try_it_url').value
			mySpan = mySpan.split('/')[0]+'/'+$(this).attr('data-href')
			$("#try_it_yourself").val(mySpan)
			parent.document.getElementById('set_ads_web_detail_right').value='1'
			$("#frm_run").submit()
	})
	$(".bottom-ads").empty()
	$("#leftcolumn").remove()
	
})
</script>
<script>
<!--
var colortophex="#FF0000"
var colorbottomhex="#0000FF"

function mouseOverColortop(hex)
{
document.getElementById("divpreviewtop").style.backgroundColor=hex
document.getElementById("divpreviewtxttop").innerHTML=hex
document.body.style.cursor="pointer"
}

function mouseOverColorbottom(hex)
{
document.getElementById("divpreviewbottom").style.backgroundColor=hex
document.getElementById("divpreviewtxtbottom").innerHTML=hex
document.body.style.cursor="pointer"
}

function mouseOutMaptop()
{
document.getElementById("divpreviewtop").style.backgroundColor=colortophex
document.getElementById("divpreviewtxttop").innerHTML=colortophex
document.body.style.cursor=""
}

function mouseOutMapbottom()
{
document.getElementById("divpreviewbottom").style.backgroundColor=colorbottomhex
document.getElementById("divpreviewtxtbottom").innerHTML=colorbottomhex
document.body.style.cursor=""
}
function mouseOverColor(hex)
{
document.getElementById("divpreview").style.backgroundColor=hex;
document.getElementById("divpreviewtxt").innerHTML=hex;
document.body.style.cursor="pointer";
}

function mouseOutMap()
{
document.getElementById("divpreview").style.backgroundColor=colorhex;
document.getElementById("divpreviewtxt").innerHTML=colorhex;
document.body.style.cursor="";
}


function clickColor(hex,n,seltop,selleft)
{
var xhttp,c,x,colortop,colorbottom,colorhextop,colorhexbottom
if (n==0)
	{
	x="bottom"
	colortop=document.getElementById("colortop").value;
	colorbottom=hex
	}
else
	{
	x="top"
	colortop=hex
	colorbottom=document.getElementById("colorbottom").value;
	}
if (hex==0)
	{
	colortop=document.getElementById("colortop").value;	
	colorbottom=document.getElementById("colorbottom").value;
	}
if (colortop.substr(0,1)=="#")
	{
	colortop=colortop.substr(1);
	}
colortop=colortop.substr(0,10);
colortophex="#" + colortop;
document.getElementById("colortop").value=colortophex;
if (colorbottom.substr(0,1)=="#")
	{
	colorbottom=colorbottom.substr(1);
	}
colorbottom=colorbottom.substr(0,10);
colorbottomhex="#" + colorbottom;
document.getElementById("colorbottom").value=colorbottomhex;
if (window.XMLHttpRequest)
  {
  xhttp=new XMLHttpRequest();
  }
else
  {
  xhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xhttp.open("GET","http://www.w3schools.com/tags/http_colormixer.asp?colortop=" + colortop + "&colorbottom=" + colorbottom + "&r=" + Math.random(),false);
xhttp.send("");
document.getElementById("colormixer").innerHTML=xhttp.responseText;
if (seltop>-1 && selleft>-1)
	{
	document.getElementById("selectedColor" + x).style.top=seltop + "px";
	document.getElementById("selectedColor" + x).style.left=selleft + "px";
	document.getElementById("selectedColor" + x).style.visibility="visible";
	}
else
	{
	document.getElementById("divpreviewtop").style.backgroundColor=colortophex;
	document.getElementById("divpreviewtxttop").innerHTML=colortophex;
	document.getElementById("selectedColortop").style.visibility="hidden";
	document.getElementById("divpreviewbottom").style.backgroundColor=colorbottomhex;
	document.getElementById("divpreviewtxtbottom").innerHTML=colorbottomhex;
	document.getElementById("selectedColorbottom").style.visibility="hidden";
	}
}

//-->
</script>


<script type="text/javascript">
function allowDrop(ev)
{
ev.preventDefault();
}

function drag(ev)
{
ev.dataTransfer.setData("text",ev.target.id);
}

function drop(ev)
{
ev.preventDefault();
var data=ev.dataTransfer.getData("text");
ev.target.appendChild(document.getElementById(data));
}
</script>


<style>
.bottom-ads {
width:728px;
height:90px;
}
body {font-size:10.5!important;color:#404040;
</style>
<!-- start bing translator widget -->
<script type='text/javascript'>setTimeout(function(){{var s=document.createElement('script');s.type='text/javascript';s.charset='UTF-8';s.src=((location && location.href && location.href.indexOf('https') == 0)?'https://ssl.microsofttranslator.com':'http://www.microsofttranslator.com')+'/ajax/v3/WidgetV3.ashx?siteData=ueOIGRSKkd965FeEGM5JtQ**&ctf=True&ui=true&settings=auto&from=en&to=vi';var p=document.getElementsByTagName('head')[0]||document.documentElement;p.insertBefore(s,p.firstChild); }},0);</script>
<!--end widget -->

</head>
 <body onload="return LanguageMenu.onclick('vi');">
   <div id='MicrosoftTranslatorWidget' class='Dark' style='color:white;background-color:#555555'></div>
  <?=$left_col?>
 <form name="frm_run" id="frm_run" action="/lap_trinh/run/" method="post">
<input type="hidden" name="try_it_yourself" id="try_it_yourself"/>
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>
 </body>
<style>
#MicrosoftTranslatorWidget {
display:none !important;
}
#WidgetFloaterPanels {
display:none !important;
}
</style>
</html>
