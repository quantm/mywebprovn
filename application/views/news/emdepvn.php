<meta charset="UTF-8">
<link type="image/x-icon" href="http://raovatnhanh.net.co/images/icon/news.png" rel="icon">
<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
<script type="text/javascript" src="http://raovatnhanh.net.co/js/jquery-2.1.0.min.js"></script>
<script>
$(document).ready(function(){
	$('#refad1,.ads,#footer').remove()
	$('#main-menu a').each(function(){
		var link=$(this).attr('href')
			  link='http://myweb.pro.vn/em-tui-dep'+link
		$(this).attr('href',link)
	})
	$('.list-news a,.pagination a,.content a').each(function(){
		var link=$(this).attr('href')
			  link='http://myweb.pro.vn/em-tui-dep'+link
		$(this).attr('href',link)
	})
	$('#event_emdep a').each(function(){
		var link=$(this).attr('href')
			  link='http://myweb.pro.vn/em-tui-dep/home'+link
		$(this).attr('href',link)
	})
})
.on('error','img',function(){
	$(this).attr('src','http://raovatnhanh.net.co/images/header/my_news.png')		
})
</script>
<style>
	.ads_right {
		position: fixed;
		margin-top:35px;
	}
	/* style scroll bar*/
	::-webkit-scrollbar-track {}

	::-webkit-scrollbar-button {}

	::-webkit-scrollbar {
	width: 15px;
	height: 5px;
	background: rgba(238, 238, 238, 0.5);
	border: thin solid lightgray;
	box-shadow: 0px 0px 3px #dfdfdf inset;
	border-radius: 3px;
	}
	::-webkit-scrollbar-thumb{
	background:pink;
	box-shadow: 10px 10px 10px rgba(123, 92, 92, 0.62) inset;
	border-radius: 5px;
	}
	/*end*/
</style>

<div class="ads_right">
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="521621655" data-ants-zone-id="521621655"></div>
</div>

<?=$content?>

