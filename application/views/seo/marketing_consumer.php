<html>
<head>
	<title>Thư mục tiếp thị tiêu dùng</title>
	<meta charset="UTF-8">
	<meta name='description' content='Thư mục so sánh giá sản phẩm'>
</head>
<body>
<?php foreach($seo as $key):?>
<?php
		$path=str_replace('tttd.vn','myweb.pro.vn/tiep-thi-tieu-dung',$key['link']);  
		$path=str_replace('.html','.html/1',$path);  
?>
<a href='<?php echo $path;?>' data-id='<?=$key['id']?>' target='_new'>
	<h3><?=$key['name']?></h3>
</a><br>
<?php endforeach;?>
</body>
</html>
