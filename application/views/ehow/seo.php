<html>
<head>
	<title>Chỉ mục làm sao</title>
	<meta charset="UTF-8">
	<meta name='description' content='Chỉ mục làm sao'>
</head>
<body>
<?php foreach($ehow as	$key):?>
<?
$path=str_replace('lamsao.com','myweb.pro.vn/lam-sao',$key['link']);
?>
<a title="<?=$key['id']?>" target="_new" href="<?php echo $path; ?>">
	<?=$key['name']?>
</a>	
<?php endforeach;?>
</body>
</html>
