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
//update_link()
post_ins_db_tai_lieu()
//post_ins_db_voer()
//post_ins_db_lv()
})
function post_ins_db_lv(){
var ins_db_title=[],ins_db_link=[],ins_db_thumbs=[],ins_db_desc =[]
$(".items li").each(function(value,index){
ins_db_title.push($(this).find('.doc-title').find('a').html())
ins_db_thumbs.push($(this).find('.doc-thumb').attr('src'))
//ins_db_desc.push($(this).find('.description').html())
ins_db_link.push($(this).find('.doc-title').find('a').attr('href'))
$.ajax({
content:'text/html',
 type:'get',
 url:'/book/get_tl',
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
function post_ins_db_voer(){
var ins_db_title=[],ins_db_link=[],ins_db_thumbs=[],ins_db_desc =[]
$('.material-list-entry').each(function(value,index){
ins_db_title.push($(this).find('.material-brief').find('h5').find('a').attr('title'))
ins_db_thumbs.push($(this).find('.material-cover').find('img').attr('src'))
ins_db_link.push($(this).find('.material-brief').find('h5').find('a').attr('href'))
ins_db_desc.push($(this).find('.material-brief').find('p').html())
$.ajax({
content:'text/html',
type:'get',
url:'/book/get_tl',
data:{
name:ins_db_title[value],
path:'http://voer.edu.vn'+ins_db_link[value],
thumbs:'http://voer.edu.vn'+ins_db_thumbs[value],
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

function update_link(){
	$.ajax({
	content:'text/html',
	type:'get',
	url:'/test/update_link',
	data:{
		new_path:jQuery('#downloadcardform').next().next().find('a').attr('href'),
		id:'<?=$id?>'
	},
	success:function(){
		$("#frm_get_book").submit()
	},
	error:function(){
		$("#frm_get_book").submit()
	}
	})
	
}
function post_ins_db_tai_lieu(){
var ins_db_title=[],ins_db_link=[],ins_db_thumbs=[],ins_db_desc =[]
$("#documents .box").find('.pager').prev().find('li').each(function(value,index){
ins_db_title.push($(this).find('.illustration').attr('alt'))
ins_db_thumbs.push($(this).find('.illustration').attr('src'))
ins_db_desc.push($(this).find('.description').html())
ins_db_link.push($(this).find('.illustration').next().attr('href'))
$.ajax({
content:'text/html',
type:'get',
url:'http://m.myweb.pro.vn/book/get_tl/',
data:{
name:ins_db_title[value],
path:'http://luanvan365.com/'+ins_db_link[value],
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
  </script>
 </head>

 <body>
  <?=$content?>
<form  id="frm_get_book" method="get" action="/test/get_tl_server/">
<input type="hidden" id="id" name="id" value="<?=$next_id?>"/>
</form>
 </body>
</html>
