<html>
<head>
	<title>Luận văn index</title>
	<meta charset="UTF-8">
	<meta name='description' content='Chỉ mục luận văn'>
</head>
<body>
<?=$pagination?>
<?php foreach($ebook_data as	$key):?>
<a href='/luan-van?id=<?=$key['ID']?>'><h3><?=$key['NAME']?></h3></a><br>
<?php endforeach;?>
</body>
</html>