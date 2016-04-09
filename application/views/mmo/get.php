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
	window.onload=function(){
	$('.entry-header').each(function(){
	$.ajax({
	content:'text/html',
	type:'get',
	url:'/kiemtien/ins_db',
	data:{
	name:$(this).find('a').html(),
	path:$(this).find('a').attr('href')	
	},
	success:function(){
		$('#frm_get_book').submit()
	},
	error:function(){
		$('#frm_get_book').submit()
	}
	})
	})
	}
</script>
</head>

<body>
<?=$content?>
<form  id="frm_get_book" method="get" action="/kiemtien/get_content">
<input type="hidden" id="page" name="page" value="<?=$page?>"/>
</form>
</body>
</html>
