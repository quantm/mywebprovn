<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
body {
overflow:hidden;
}
</style>
<script type="text/javascript"  src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#upload_avatar").attr("src",<?php echo $src ?>)
})
</script>
</head>
<body>
<form action="/upload/" method="post" enctype="multipart/form-data">   
	<img id="upload_avatar" width="150px" height="100px" src=""/>
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
	<input style="margin-top: 15px" type="file" name="img" />
	<input type="submit" name="ok" value="Tải lên" />	
</form>	
</body>
</html>