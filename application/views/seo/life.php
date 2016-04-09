<html>
<head>
	<title>Blog cuộc sống</title>
	<meta charset="UTF-8">
	<meta name='description' content='Blog cuộc sống'>
</head>
<body>
<?php foreach($seo as	$key):?>
<?php
	  if(preg_match('/langnhincuocsongcom/',$key['referer'])){
			  $path=str_replace('langnhincuocsong.com','myweb.pro.vn',$key['path']);
			  $path=$path.'/lncs';
	  }
	  if(preg_match('/nhatkycuocsongcom/',$key['referer'])){
			$path=str_replace('nhatkycuocsong.com','myweb.pro.vn',$key['path']);
			$path=$path.'/nkcs';
	  }
	  
?>
<a href='<?php echo $path;?>' data-id='<?=$key['id']?>' target='_new'><h3><?=$key['name']?></h3></a><br>
<?php endforeach;?>
</body>
</html>
