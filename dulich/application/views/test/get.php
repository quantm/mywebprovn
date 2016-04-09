<? include_once 'include/analyticstracking.php';?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title></title>
  <meta name="Generator" content="EditPlus">
  <meta charset="UTF-8">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <script type="text/javascript"  src="/js/jquery-2.1.0.min.js"></script>
  <script type="text/javascript">
$(document).ready(function(){
post_ins_db_lv()
//get_giao_an()
})
function post_ins_db_lv(){
var ins_db_title=[],ins_db_link=[],ins_db_thumbs=[],ins_db_desc =[]
$("#documents .box").find('.pager').prev().find('li').each(function(value,index){
ins_db_title.push($(this).find('.illustration').attr('alt'))
ins_db_thumbs.push($(this).find('.illustration').attr('src'))
ins_db_desc.push($(this).find('.description').html())
ins_db_link.push($(this).find('.illustration').next().attr('href'))
$.ajax({
content:'text/html',
type:'get',
url:'http://m.myweb.pro.vn/book/get_book',
data:{
name:ins_db_title[value],
path:'http://doan.edu.vn/'+ins_db_link[value],
thumbs:ins_db_thumbs[value],
description:ins_db_desc[value]
},
success:function(){
   $("#frm_get_book").submit()
},
error:function(){
	$("#frm_get_book").submit()
}
})
})
}
function get_giao_an(){
var ins_db_title=[],ins_db_link=[],ins_db_thumbs=[],ins_db_desc =[]
$(".items li").each(function(value,index){
ins_db_title.push($(this).find('.doc-title').find('a').html())
ins_db_thumbs.push($(this).find('.doc-thumb').attr('src'))
//ins_db_desc.push($(this).find('.description').html())
ins_db_link.push($(this).find('.doc-title').find('a').attr('href'))
$.ajax({
content:'text/html',
 type:'get',
url:'/book/get_book',
data:{
name:ins_db_title[value],
path:ins_db_link[value],
thumbs:ins_db_thumbs[value],
//description:ins_db_desc[value]
},
success:function(){
	$("#frm_get_book").submit()
},
error:function(){
	$("#frm_get_book").submit()
}
})
})
}
  </script>
 </head>

 <body>
  <?=$content?>
<form  id="frm_get_book" method="get" action="http://m.myweb.pro.vn/test/get_doc_server/">
<input type="hidden" id="page" name="page" value="<?=$page?>"/>
</form>
 </body>
</html>
