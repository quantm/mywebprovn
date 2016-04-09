<html>
<head>
	<title>Chỉ mục tin tức</title>
	<meta charset="UTF-8">
	<meta name='description' content='Chỉ mục tài liệu'>
</head>
<body>
<?php foreach($elib as	$key):?>
<?
$link=$key['link'].'/13';
$path=str_replace('kenh13.info','myweb.pro.vn/tin-tuc',$link);
?>
<a title="<?=$key['id']?>" target="_new" href="<?php echo $path; ?>">
	<?=$key['name']?>
</a>	
<?php endforeach;?>
</body>
</html>
