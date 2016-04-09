<html>
<head>
	<title>Thư mục bài hát karaoke</title>
	<meta charset="UTF-8">
	<meta name='description' content='Chỉ mục bài hát karaoke'>
</head>
<body>
<?php foreach($content as $key):?>
<? $song=str_replace(' ','-',$key['name']);
?>
<a href='http://myweb.pro.vn/mobile/karaoke?song=<?=$song?>' target='_new' data-id='<?=$key['id']?>'>
	<h3><?=$key['name']?></h3>
</a>
<?php endforeach;?>
</body>
</html>
