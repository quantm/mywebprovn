<html>
<head>
	<title>Download</title>
	<meta charset="UTF-8">
	<meta name='description' content='Download'>
</head>
<body>
<?php foreach($download as	$key):?>
<a title='<?=$key['id']?>' href='<?=str_replace('http://down.vn','/download/index?path=',$key['path'])?>' target='_new'><h3><?=$key['name']?></h3></a><br>
<?php endforeach;?>
</body>
</html>
