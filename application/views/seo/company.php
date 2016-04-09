<html>
<head>
	<title>Thư mục thông tin công ty</title>
	<meta charset="UTF-8">
	<meta name='description' content='Thư mục thông tin công ty'>
</head>
<body>
<?php foreach($seo as $key):?>
<?php
		$path=str_replace('hosocongty.vn','myweb.pro.vn/thong-tin-cong-ty',$key['link']);  
?>
<a href='<?php echo $path;?>' data-id='<?=$key['id']?>' target='_new'><h3><?=$key['name']?></h3></a>
<?php endforeach;?>
</body>
</html>
