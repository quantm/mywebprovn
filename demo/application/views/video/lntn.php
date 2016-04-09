<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Video làm như thế nào</title>
<meta name="Generator" content="EditPlus">
<meta name="Keywords" content="">
<meta name="Description" content="">
<meta charset="UTF-8"/>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=fire-animation"/>
<script type="text/javascript"  src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script type="text/javascript">
$(document)
//start ready function
.ready(function(){
//$("#top-navigation").remove()
$("#top-navigation .search").remove()
$("#top-navigation").append('<?=$data_append?>')
$(".meta-author").remove()
$("#top-navigation .twitter").remove()
$("#top-navigation .share").remove()
$("#header").remove()
$(".pri-menu").remove()
$(".body-content .copyright").remove()
$(".body-content .widget-section").remove()
$(".body-content .author-wrap").remove()
$(".body-content a").each(function(){
if($(this).attr("id")!="header_link"){
$(this).attr("href","http://myweb.pro.vn/video/lntn?lntn&is_hidden=false&id="+$(this).attr("href"))
$(this).attr("target","<?=$target?>")
}
})
$("#top-navigation .top-menu-left a").each(function(){
if($(this).attr("id")!="header_link"){
$(this).attr("href","http://myweb.pro.vn/video/lntn?lntn&is_hidden=false&id="+$(this).attr("href"))
$(this).attr("target","<?=$target?>")
}
})

$("div .jt").each(function(){
if($(this).attr("id")!="header_link"){
$(this).attr("rel","http://myweb.pro.vn/video/lntn?lntn&is_hidden=false&id="+$(this).attr("rel"))
}
})
$(".small-logo a")
.attr("href","/")
.attr("target","_parent")

$(".share-buttons").remove()
$(".top-menu-left .categories a").attr("href","http://myweb.pro.vn/video/lntn?lntn&is_hidden=false")
})
//end ready function
</script>
<style>
#main {
background-color:rgb(255, 240, 240);
}
#kakaka{
margin-top:-5%;
background:rgb(255, 240, 240);
overflow:<?=$overflow?>;
}
.font-effect-fire-animation {
margin-left: 65px;
}
</style>
</head>

<body id="kakaka">
<?=$content?>
</body>
</html>
