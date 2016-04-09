<? include_once 'include/analyticstracking.php';?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<base href="http://luanvan.net.vn/">
<script type="text/javascript"  src="http://xahoihoctap.com/js/jquery-2.1.0.min.js"></script>
<script type='text/javascript'>
$(document)
//start ready function
.ready(function(){
if($('body').find('#viewerPlaceHolder').length=='1'){
var direct_link=$('[name="flashvars"]').val().split('&')[0].replace('SwfFile=','')
$.ajax({
content:'text/html',
url:'http://xahoihoctap.com/book/update_link',
data:{
id:'<?=$share_id?>',
direct_link:'http://luanvan365.com'+direct_link
},
success:function(data){
$('#toefl_overview').submit()
},
error:function(data){
$('#toefl_overview').submit()
}

})
}
if($('body').find('#viewerPlaceHolder').length=='0'){

var direct_link=$('[name="obj1"]').attr('src')
$.ajax({
content:'text/html',
url:'http://xahoihoctap.com/book/update_link',
data:{
id:'<?=$share_id?>',
direct_link:direct_link
},
success:function(data){
$('#toefl_overview').submit()
},
error:function(data){
$('#toefl_overview').submit()
}

})

}
})
</script>
<body>
<?=$content?>
<form id="toefl_overview" method="get" action="http://xahoihoctap.com/doc-luan-van">
<input type="hidden" id="id" name="id" value="<?=$next_id?>"/>
<input type="hidden" id="book_title" name="book_title" value="<?=$book_title?>" />
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>
</body>
</html>