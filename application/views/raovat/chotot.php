<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="shortcut icon" href="http://raovatnhanh.net.co/images/icon/raovat.png" type="image/x-icon">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
	$('.advertised_user').removeAttr('href')
	$('#sell_btn,.sunny_footer_container,.sunny_footer,.sprite_ila_common_tick_verified,.reviewed_by,#chotot-qc-zone-2,#ar_link_b,#adview_menu,#TipInputs,.fine_print,.vi_tips_footer,#header_right').remove();
		if($('#view_phone').val()=='1'){
			var src=$('#real-phone').attr('src')
				  src=src.replace('http://myweb.pro.vn/rao-vat-online/','http:///www.chotot.vn/')
				$('#real-phone').attr('src',src)
			$('#hidden-phone-b').remove()
			$('.real-phone-div').show()
		}
})
.on('click','#hidden-phone-b',function(){
	document.location.href=$('.ads_redirect_bottom a')[3]
	var link=document.location.href
		  link=link.replace('#','')
	window.open(link+'?view_phone=1','_blank')
})
.on('mousemove',function(){$('.zopim,#chotot-qc-zone-2').remove();})
.on('click','.btn-view',function(){$('.ads_bottom').hide();$('.content_holder').show();})
$(window).scroll(function(){$('.zopim,#chotot-qc-zone-2').remove();$('#buy_tab').attr('style','position: fixed;margin-left: -18px;')})
</script>
<style type="text/css">
	@font-face {
		font-family: 'FontAwesome';
		src: url('/fonts/fontawesome-webfont.eot?v=4.0.3');
		src: url('/fonts/fontawesome-webfont.eot?#iefix&v=4.0.3') format('embedded-opentype'), url('/fonts/fontawesome-webfont.woff?v=4.0.3') format('woff'), url('/fonts/fontawesome-webfont.ttf?v=4.0.3') format('truetype'), url('/fonts/fontawesome-webfont.svg?v=4.0.3#fontawesomeregular') format('svg');
		font-weight: normal;
		font-style: normal;
	}
	.content_holder {display:none;}
	.ads_right {
		position: fixed;
		margin-left: 87%;
		margin-top: 0px;
	}
	.ads_left {
		position: fixed;
		margin-top: 0px;
	}
	.ads_bottom {position: fixed;margin-left: 23%;margin-top: 3%;}
	.ads_redirect_bottom{
		margin-top: 6%;
		margin-left: 17%;
		position: absolute;
	}
	.chotot-list-row {height: auto !important;}
	.sprite_sunny_common_logo-listing-60 {width:530px!important;height:48px!important;background:none !important;}
	.sprite_sunny_common_logo-listing-40 {background:none !important;}
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
	background: rgb(0, 187, 255);
	box-shadow: 10px 10px 10px rgba(123, 92, 92, 0.62) inset;
	border-radius: 5px;
	}
	/*end*/
	.btn-view {position: fixed;margin-left:45%;margin-top:11%;}
</style>

<div class="ads_redirect_bottom" style="display:none">
	<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16598.ads"></script>
</div>

<div class="ads_bottom">
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="517324894" data-ants-zone-id="517324894"></div>
</div>

<div class="btn btn-danger btn-view">Xem nội dung</div>

<div class="ads_left">
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="519993167" data-ants-zone-id="519993167"></div>
</div>
<div class="ads_right">
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="517324811" data-ants-zone-id="517324811"></div>
</div>
<div class="content"><?=$content?></div>
<input type="hidden" id="view_phone" value="<?=$view_phone?>"/>