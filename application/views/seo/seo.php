<html>
<head>
	<title>Thư mục tài liệu</title>
	<meta charset="UTF-8">
	<meta name='description' content='Chỉ mục tài liệu'>
</head>
<body>
<?php foreach($elib as	$key):?>
<?php
	  $str_1='zbook';
	  $str_3='myweb.pro';
	  $str_2='ebook';
	  $str_4='tailieu-luanvan-doan/ebook';
	  $path=str_replace('http://luanvan.net.vn/','/tailieu-luanvan-doan',$key['path']);
	  $path=str_replace('http://doc.edu.vn/','/tailieu-luanvan-doan',$path);
	  $path=str_replace('http://doko.vn/','/tailieu-luanvan-doan',$path);
	  $path=str_replace('http://tailieu.vn/','/tailieu-luanvan-doan',$path);
	  $path=str_replace('http://thuviengiaoan.vn/','/tailieu-luanvan-doan',$path);
	  $path=str_replace('http://luanvan.co/','/tailieu-luanvan-doan',$path);
	  $path=str_replace('http://luanvan365.com/','/tailieu-luanvan-doan',$path);
	  $path=str_replace('http://timtailieu.vn/','/tailieu-luanvan-doan',$path);
	  $path=str_replace('http://voer.edu.vn/','/tailieu-luanvan-doan',$path);
	  $path=str_replace('http://giaoan.com.vn/','/tailieu-luanvan-doan',$path);
	  $path=str_replace('http://tai-lieu.com/','/tailieu-luanvan-doan',$path);
	  $path=str_replace('http://tailieu.tv/','/tailieu-luanvan-doan',$path);
	  $path=str_replace('http://timtailieu.vn/','/tailieu-luanvan-doan',$path);
	  $path=str_replace('http://ebook.net.vn/','/tailieu-luanvan-doan',$path);
	  $path=str_replace($str_1,$str_3,$path);
	  $path=str_replace($str_2,$str_4,$path);
?>
<a href='<?php echo $path;?>' target='_new'><h3><?=$key['NAME']?></h3></a><br>
<img src="<?=$key['THUMBS']?>" alt="<?=$key['NAME']?>"/>
<?php endforeach;?>
</body>
</html>
