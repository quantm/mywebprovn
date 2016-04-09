<script type='text/javascript'>
$.fn.flash = function(duration, iterations) {
    duration = duration || 1000; // Default to 1 second
    iterations = iterations || 1; // Default to 1 iteration
    var iterationDuration = Math.floor(duration / iterations);

    for (var i = 0; i < iterations; i++) {
        this.fadeOut(iterationDuration).fadeIn(iterationDuration);
    }
    return this;
}

$(document).ready(function(){


//game24h
if($('body').find('.choiGame-container').length=='1'){	
	var flash_game=$('#play_game').attr('src')
	if(flash_game.match('game.24h.com.vn')){
	//do nothing
	}
	else {
		flash_game='http://game.24h.com.vn'+flash_game
	}
	$('.game_category').addClass('game_24h_category');
	$('.choiGame-container').empty()
	.prepend("<h5 class='game_name'><a href='/game/' target='_new'>Trang chủ</a> <i class='fa fa-long-arrow-right'></i> <a title='<?=$game_name?>' href='game?id_category=<?=$id_cate?>' target='_new'><?=$cate_name?></a> <i class='fa fa-long-arrow-right'></i> <?=$game_name?></h5>")
	.append('<embed src='+flash_game+' id="play_game" quality="high" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer/" width="663" height="509.184">')
}

//trochoiviet
if($('body').find('#trochoiviet').length=='1'){	
	$('.game_category').addClass('game_24h_category');
	$('#trochoiviet')
	.prepend("<h5 class='game_name'><a href='/game/' target='_new'>Trang chủ</a> <i class='fa fa-long-arrow-right'></i> <a title='<?=$game_name?>' href='game?id_category=<?=$id_cate?>' target='_new'><?=$cate_name?></a> <i class='fa fa-long-arrow-right'></i> <?=$game_name?></h5>")
	.append('<embed src="<?=$path?>" id="play_game" quality="high" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer/" width="728" height="509.184">')
}

//y8
$('.ants_center h1').click(function(){
	var href=$('.game_category a')[0]
		open(href,'_blank')
		$(this).hide()
})

$('.light-grey-box-bg,.item-tags,#tags,#fav_body,.addthis_counter,.grey-box-bg,#header,#footer,#div-gpt-ad-1,#div-gpt-ad-2,.voting-container,.embed-popup,.ads-bottom-text').remove()
$('.post-comment-container').next().remove()
$('.post-comment-container,.toggle-comments,.ads-bottom-text-box').empty()

//trochoiviet
if($('body').find('#trochoiviet').length=='1'){	
	//onload hightlight the advertisement
	$('#ssvzone_16551').flash(1200,4)
	
	$('#trochoiviet').append('<div style="width:962px;height:120px"></div>')
	//fix UI advertisement
	$('.adv_ants_bottom').addClass('trochoiviet_bottom')
	$('.ads_right')
		.addClass('trochoiviet_ads_left_right')
		.find('#ads_zone16548_slot2').addClass('trochoiviet_ad_slot_2')
	//end

}

//y8
if($('body').find('.ads-bottom-text-box').length=='1'){
	//onload hightlight the advertisement
	$.fn.flash = function(duration, iterations) {
	duration = duration || 1000; // Default to 1 second
	iterations = iterations || 1; // Default to 1 iteration
	var iterationDuration = Math.floor(duration / iterations);

	for (var i = 0; i < iterations; i++) {
	this.fadeOut(iterationDuration).fadeIn(iterationDuration);
	}
	return this;
	}
	$('.adv_ants_bottom').addClass('y8_fixed')
	$('#ssvzone_16551').flash(1200,4)
}
$('.ads-bottom-text-box').append('<div style="width:962px;height:120px"></div>');
//end y8

//game24h
$('.choiGame-container').append('<div style="width:962px;height:120px"></div>')

})
</script>
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/fetch_game.css">

<div class='game_category'>
	<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/519993167.ads"></script>
</div>

<div class='adv_ants_bottom'>
	<!--- Script ANTS - 980x90 -->
	<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324908.js"></script>
	<!--- end ANTS Script -->
</div>

<div class='ants_center' style="display:none">
	<h1 style="width:300px;height:300px" class="btn btn-primary">Chơi ngay - Play now</h1>
</div>

<div class='ads_right'>
	<!--- Script ANTS - 160x600 -->
	<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324811.js"></script>
	<!--- end ANTS Script -->
</div>

<?=$game?>

<input type="hidden" value=""/>>