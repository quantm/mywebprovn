<html>
<head>
	<title>Thư mục tài liệu</title>
	<meta charset="UTF-8">
	<meta name='description' content='Chỉ mục tài liệu'>
</head>
<body>
<?php foreach($elib as	$key):?>
<? 
	$path=str_replace('chi-tiet-sach/','',$key['path']);
?>
<a title="<?=$key['NAME']?>" data-id="<?=$key['ID']?>" href="http://www.myweb.pro.vn/tai-lieu-hoc-tap<?php echo $path;?>">
	<?=$key['NAME']?>
</a>	
<?php endforeach;?>
</body>
</html>
