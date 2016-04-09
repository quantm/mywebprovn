<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style>
body {
overflow:hidden;
}
</style>
</head>
<body>
<form action="/upload/" method="post" enctype="multipart/form-data">   
	<img width="150px" height="100px" src=""/>
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
	<input type="file" name="img" />
	<input type="submit" name="ok" value="Upload" />	
</form>	
</body>
</html>