<html>
<head>
	<title>Thư mục tài liệu</title>
	<meta charset="UTF-8">
	<meta name='description' content='Chỉ mục tài liệu'>
</head>
<body>
<?php foreach($elib as	$key):?>
<? $path=str_replace('http://vndoc.com/','',$key['fetch_link']);
	$path=$path.'/vndoccom'	
?>
<a href='/tai-lieu-pdf/<?=$path?>' target='_new' data-id='<?=$key['id']?>'><h3><?=$key['name']?></h3></a><br>
<?php endforeach;?>
</body>
</html>
