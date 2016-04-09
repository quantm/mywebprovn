<style type="text/css">
.footer_pagination a {
	margin-left: 5px;
}
</style>
<?php foreach($content as $key):?>
<?php
	if(preg_match('/nhaccuatui.com/',$key['fetch_link'])){
	$path=str_replace('nhaccuatui.com','myweb.pro.vn/mobile/baihat',$key['fetch_link']);
	$path=$path.'/nhaccuatui';
	}
	if(preg_match('/nhacso.net/',$key['fetch_link'])){
	$path=str_replace('nhacso.net','www.myweb.pro.vn/mobile/baihat',$key['fetch_link']);
	$path=$path.'/nhacsonet';
	}
	if(preg_match('/www.muviza.com/',$key['referer'])){
	$path=str_replace('watch?v=','',$key['fetch_link']);
	$path='http://www.myweb.pro.vn/mobile/baihat/muviza'.$path.'/youtube';	
	}
	if(preg_match('/nhackhongloivn.com/',$key['fetch_link'])){
	$path=str_replace('song/','',$key['fetch_link']);
	$path=str_replace('album/','',$path);
	$path=str_replace('nhackhongloivn.com','www.myweb.pro.vn/mobile/baihat',$path);
	$path=$path.'/nhackhongloivn';
	}
	if(preg_match('/zing/',$key['fetch_link'])){
	$path=str_replace('mp3.zing.vn/bai-hat','www.myweb.pro.vn/mobile/baihat',$key['fetch_link']);
	$path=str_replace('mp3.zing.vn/album','www.myweb.pro.vn/mobile/baihat',$path);
	$path=str_replace('mp3.zing.vn/video-clip','www.myweb.pro.vn/mobile/baihat',$path);
	$path=$path.'/zing';
	}
	if(preg_match('/www.keeng.vn/',$key['fetch_link'])){
	$path=str_replace('www.keeng.vn','www.myweb.pro.vn/mobile/baihat',$key['fetch_link']);
	$path=str_replace('index.php/video/','',$path);
	$path=str_replace('index.php/audio/','',$path);
	$path=str_replace('home.php/audio/','',$path);
	$path=str_replace('home.php/video/','',$path);
	$path=str_replace('home.php/album/','',$path);
	$path=str_replace('index.php/album/','',$path);
	$path=$path.'/keeng';
	}
	?>
<a style="margin-left: 11%;" href='<?php echo $path ;?>' data-id='<?=$key['id']?>' target='_parent'>
	<?=$key['song_name']?>
</a><br>
<?php endforeach;?>

</div style="clear:both"></div>
<ul class="breadcrumb" style="margin-top: 10px;width: 80%;margin-left: 10%;">
			<li class="active footer_pagination"><?=$pagination?></li>
</ul>
<input type="hidden" id="id_category" value="<?=$id_category?>"/>