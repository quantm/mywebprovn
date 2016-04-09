<html>
<head>
	<title>Thư mục film </title>
	<meta charset="UTF-8">
	<meta name='description' content='Chỉ mục video'>
</head>
<body>
<?php foreach($elib as	$key):?>
<? if(preg_match('/m-viet.com/',$key['fetch_link'])){
		$path=str_replace('http://m-viet.com/','',$key['fetch_link']);
		$path='mvietcom/'.$path;	
	}
	if(preg_match('/chatvl.com/',$key['fetch_link'])){
		$path=str_replace('http://chatvl.com/','',$key['fetch_link']);
		$path='chatvlcom/'.$path;	
	}
	if(preg_match('/www.muviza.com/',$key['referer'])){
		$path=str_replace('watch?v=','',$key['fetch_link']);
		$path='muviza'.$path.'/youtube';	
	}
	if(preg_match('/clipvn/',$key['referer'])){
		$path=str_replace('http://clip.vn/','',$key['fetch_link']);
		$path=str_replace('http://phim.clip.vn/','',$path);
		$path='clipvn/'.$path;	
	}
	if(preg_match('/memevn/',$key['referer'])){
		$path=str_replace('http://www.meme.vn/','',$key['fetch_link']);
		$path='memevn/'.$path;	
	}
	if(preg_match('/v.nhaccuatui.com/',$key['referer'])){
		$path=str_replace('http://v.nhaccuatui.com/','',$key['fetch_link']);
		$path='vnhaccuatui/'.$path;	
	}
	if(preg_match('/megabox.vn/',$key['referer'])){
		$path=str_replace('http://phim.megabox.vn/','',$key['fetch_link']);
		$path='megabox/'.$path;	
	}
	if(preg_match('/tv.zing.vn/',$key['referer'])){
		$path=str_replace('http://tv.zing.vn/','',$key['fetch_link']);
		$path='zingtv/'.$path;	
	}
	if(preg_match('/phimbathu.com/',$key['referer'])){
		$path=str_replace('http://phimbathu.com/','',$key['fetch_link']);
		$path='phimbathu/'.$path;	
	}
	if(preg_match('/vietsubhd.com/',$key['referer'])){
		$path=str_replace('http://www.vietsubhd.com/','',$key['fetch_link']);
		$path='vietsubhd/'.$path;	
	}
	if(preg_match('/direct_link/',$key['referer'])){
		$path=str_replace('http://','',$key['fetch_link']);
		$path='direct_link/'.$path;	
	}
?>
<a href='http://myweb.pro.vn/clip-moi-dep-hay-hai-hot/<?=$path?>' data-id='<?=$key['id']?>'><h3><?=$key['name']?></h3></a><br>
<?php endforeach;?>
</body>
</html>
