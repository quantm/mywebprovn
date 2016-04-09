<html>
<head>
	<title>Thư mục download font</title>
	<meta charset="UTF-8">
	<meta name='description' content='Chỉ mục tài liệu'>
</head>
<body>
<?php foreach($seo as $key):?>
<? $path=str_replace('http://www.freefontsdownload.net/','',$key['link']);
?>
<a href='/download/font/<?=$path?>' target='_new' data-id='<?=$key['id']?>'><h3>FONT <?=$key['name']?> </h3></a>
<?php endforeach;?>
</body>
</html>

