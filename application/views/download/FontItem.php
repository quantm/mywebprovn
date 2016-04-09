<style>
	ins{display:none !important;	}
	.ads {position: fixed;margin-top: -20%;margin-left: 28%;}
	.ads_right {position: absolute;background: red;margin-left: 76%;margin-top: -31%;}
	.ads_left {position: absolute;background: red;margin-left: 2%;margin-top: -31%;}
	.ads_ants {position: fixed;margin-top: -20%;margin-left: 50%}
</style>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/jquery-2.1.0.min.js"></script>
<script>
$(document).ready(function(){
	var link_download=$('em').next().next().find('a').attr('href'),
		 header_link=$('font a').attr('href')
	$('em').next().next().find('a').attr('data-href',link_download)
	$('em').next().next().find('a').removeAttr('href')
	$('em').next().next().find('a').attr('style','cursor:pointer')
	$('em').next().next().find('a').click(function(){
		document.location.href=$('.ads a')[0]
		window.open($(this).attr('data-href'),'_blank')
	})
	$('font a').attr('href',header_link.replace('http://www.freefontsdownload.net/','http://myweb.pro.vn/download/font/'))
})

</script>
<?=$content?>
<div class="ads_ants">
	<!--- Script ANTS - 300x250 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="534383851" data-ants-zone-id="534383851"></div>
	<!--- end ANTS Script -->
</div>
<div class="ads">
	<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16563.ads"></script>
</div>
<div class="ads_right">
	<!--- Script ANTS - 300x600 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="521621655" data-ants-zone-id="521621655"></div>
<!--- end ANTS Script -->
</div>
<div class="ads_left">
	<!--- Script ANTS - 300x600 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="517324837" data-ants-zone-id="517324837"></div>
	<!--- end ANTS Script -->
</div>