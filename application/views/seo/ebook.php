<html>
<head>
	<title>Thư mục tài liệu</title>
	<meta charset="UTF-8">
	<meta name='description' content='Chỉ mục tài liệu'>
</head>
<body>
<?php foreach($ebook_data as	$key):?>
<a href='/download-tai-lieu?id=<?=$key['ID']?>' data-id='<?=$key['ID']?>'><?=$key['NAME']?></a>
<?php endforeach;?>
</body>
</html>
