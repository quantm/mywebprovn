				  			
<?php $condition = empty($content) || !is_array($content) ? 0 : count($content); ?>
<?php if ($condition) {
$loop = -1;
foreach ($content as $key) {                    
$loop++;
	 if(preg_match('/m-viet.com/',$key['referer'])){
		$path=str_replace('http://m-viet.com/','',$key['fetch_link']);
		$path='mvietcom/'.$path;	
	}
	if(preg_match('/chatvlcom/',$key['referer'])){
		$path=str_replace('http://chatvl.com/','',$key['fetch_link']);
		$path='chatvlcom/'.$path;	
	}
	if(preg_match('/www.muviza.com/',$key['referer'])){
		$path=str_replace('watch?v=','',$key['fetch_link']);
		$path='muviza'.$path.'/youtube';	
	}
?>
<?php if ($loop && $loop % 4 == 0) { ?>
<tr>
<?php } ?>
<td style="cursor: pointer"  align="center" valign="top" width="<?php echo 100 / 4 ?>%">
<?php if ($key["thumb"]) { ?>

<a href='/xem-video-tong-hop/<?=$path?>'>
	<div class="film_div_item" id="ebook_div_item_<?= $key['id'] ?>">                        
	<button id="ebook_item_<?= $key['id'] ?>"  class="game_list btn btn-primary" >Xem ngay</button>
	<img onerror="this.src='http://myweb.pro.vn/images/fb/HD_ONLINE.jpg'" class="film_cover" src="<?=$key['thumb']?>" alt="<?=$key['film_name']?>"/>
	<div style="clear:both;height:15px"></div>
	<span><?= $key['film_name'] ?></span>
	</div>
</a>
<?php } ?>
</td>
<?php }
} ?>
</tr>		