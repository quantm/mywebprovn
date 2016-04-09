<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
<script type="text/javascript"  src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$("#ads").empty();
$(".footerText").html("Thử chạy đoạn code của bạn - © <a href='/'>myweb.pro.vn</a>")
$("#code").val($("#textareaCode").val())
$("#tryitform").append('<input type="hidden" name="csrf_test_name" id="csrf_test_name">')
$("#tryitform #csrf_test_name").val($("#game_header_search	#csrf_test_name").val())
})
.on('click','.headerBtnDiv button',function(){
	runcode()		
})
function runcode()
{
$(".footer_append_server").html($("#textareaCode").val())
//$("#iframeResult").contents().remove()
$("#iframeResult").contents().find("body").html($(".footer_append_server").html())
}
</script>
<style>
.footer_append_server {
display:none;
}
.container {
top:110px;
bottom:0;
min-width:550px;
position:absolute;
margin-top:15%;
}
.submit {
font-size:15px;
border-radius:4px;
background-color:#555555;
color:#ffffff;
border:1px solid #555555;
padding:4px 15px;
width:auto;
cursor:pointer;    
}
.submit:hover {
background-color:#777777;
}.submit:active {
background-color:#222222;
}
.headerText {
margin-top: -36px;
margin-left: 0.5%;
position: fixed;
font-size: 15px;
font-weight: bold;
}
#textareaCode {
height: 85%;
position: absolute;
bottom: 0;
top: 0;
width: 50%;
}
.iframecontainer {
position: absolute;
margin-top: 0%;
width: 60%;
margin-left: 60%;
border: 1px rgb(195, 195, 195) solid;
height: 86.5%;
border-radius: 2px 2px 2px 2px;
z-index: 100000;
}
.content_frame_container h1 {
margin-left:15px;
}
.btn-inverse {
margin-top:5px;
}
#iframeResult, #iframeSource {
height: 100%;
position: absolute;
bottom: 0;
top: 0;
width: 100%;
border: none;
}
.textareawrapper {
top:42px;
bottom:30px;
}
.iframewrapper {
top:42px;
bottom:30px;
}
.footerText {
position:absolute;
bottom:0;
font-family:verdana;
font-size:0.8em;
width:97%;
padding-right:3%;
text-align:right;
padding-bottom:7px;
}
.footerText a {
color:#000000;
}
.footerText a:hover {
text-decoration:none;
}
.textareacontainer {
margin-left: 3%;
}
.headerBtnDiv {
width: auto !important;
float: right !important;
margin-top: -40px !important;
margin-right: 47.4% !important;
z-index:10000000000000;
}
</style>
</head>

<body>

<?=$main?>

</body>
</html>
