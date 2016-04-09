<html>
<head>
	<title>Thư mục nấu ăn</title>
	<meta charset="UTF-8">
	<meta name='description' content='Chỉ mục tài liệu'>
</head>
<body>
<?php foreach($food as	$key):?>
<?
$path=str_replace('webnauan.net','myweb.pro.vn/nau-an',$key['link']);
//$path=str_replace('naungon.com','myweb.pro.vn/nau-ngon?id='.$key['id'].'',$key['link']);
?>
<a title="<?=$key['id']?>" target="_new" href="http://myweb.pro.vn/ngon-ngon?id=<?=$key['id']?>">
	<?=$key['name']?>
</a>	
<?php endforeach;?>
</body>
</html>
