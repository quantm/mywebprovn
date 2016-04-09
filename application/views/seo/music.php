<html>
<head>
	<title>Thư mục âm nhạc</title>
	<meta charset="UTF-8">
	<meta name='description' content='Thư mục âm nhạc'>
</head>
<body>

<a href="http://www.gbotvisit.com/p-1gbs-c45f0953ada164860dcfe895.html" alt="Google bot last visit powered by Gbotvisit" target="_blank"><img src="http://www.gbotvisit.com/services/gblv/gblv.php?s=c45f0953ada164860dcfe895" border="0" title="Google bot last visit powered by Gbotvisit" /></a><noscript><a href="http://www.gbotvisit.com"  alt="Google bot last visit powered by Gbotvisit">Google bot last visit powered by Gbotvisit</a></noscript>
<div style="clear:both"></div>
<?php foreach($music as $key):?>
<?php
	  if(preg_match('/nhaccuatui.com/',$key['fetch_link'])){
		$path=str_replace('nhaccuatui.com','myweb.pro.vn/nghe-nhac-mobile',$key['fetch_link']);
		$path=$path.'/nhaccuatui';
	  }
	  if(preg_match('/nhacso.net/',$key['fetch_link'])){
		$path=str_replace('nhacso.net','www.myweb.pro.vn/nghe-nhac-mobile',$key['fetch_link']);
		$path=$path.'/nhacsonet';
	  }
	  if(preg_match('/www.muviza.com/',$key['referer'])){
			$path=str_replace('watch?v=','',$key['fetch_link']);
			$path='http://www.myweb.pro.vn/nghe-nhac-mobile/muviza'.$path.'/youtube';	
	  }
	  if(preg_match('/nhackhongloivn.com/',$key['fetch_link'])){
		$path=str_replace('song/','',$key['fetch_link']);
		$path=str_replace('album/','',$path);
		$path=str_replace('nhackhongloivn.com','www.myweb.pro.vn/nghe-nhac-mobile',$path);
		$path=$path.'/nhackhongloivn';
	  }
	  if(preg_match('/zing/',$key['fetch_link'])){
		$path=str_replace('mp3.zing.vn/bai-hat','www.myweb.pro.vn/nghe-nhac-mobile',$key['fetch_link']);
		$path=str_replace('mp3.zing.vn/album','www.myweb.pro.vn/nghe-nhac-mobile',$path);
		$path=str_replace('mp3.zing.vn/video-clip','www.myweb.pro.vn/nghe-nhac-mobile',$path);
		$path=$path.'/zing';
	  }
	  if(preg_match('/www.keeng.vn/',$key['fetch_link'])){
		$path=str_replace('www.keeng.vn','www.myweb.pro.vn/nghe-nhac-mobile',$key['fetch_link']);
		$path=str_replace('index.php/video/','',$path);
		$path=str_replace('index.php/audio/','',$path);
		$path=str_replace('home.php/audio/','',$path);
		$path=str_replace('home.php/video/','',$path);
		$path=str_replace('home.php/album/','',$path);
		$path=str_replace('index.php/album/','',$path);
		$path=$path.'/keeng';
	  }
?>
<a href='<?php echo $path ;?>' data-id='<?=$key['id']?>' target='_new'>
	<?=$key['name']?>
</a>
<?php endforeach;?>
</body>
</html>
