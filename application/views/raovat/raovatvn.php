<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="shortcut icon" href="http://raovatnhanh.net.co/images/icon/raovat.png" type="image/x-icon">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
	$('.fb-like-box,#habla_beta_container_do_not_rely_on_div_classes_or_names,#footer,.headerBoxSearch,.header_bg').remove();
		$('.detail-icon-box a,.headerPost  a').removeAttr('href')
		if($('#view_phone').val()=='1'){
			phone = $('.phone_view').attr('data-phone');
			$('.phone_view').find('span').html('<i class="fa fa-phone"></i>'+phone)
		}
	$('.tableList,.key-ls,.breakcrumb,#itemSameCat,#other-cate,.listSubCat,.pager').find('a').each(function(){
		var link=$(this).attr('href')
			if (typeof link !== typeof undefined && link !== false) {
				link='http://www.myweb.pro.vn/viet-nam-rao-vat'+link+'/xem-tin'
				$(this).attr('href',link)
			}
			
	})
	$('.category,.fl').find('a').each(function(){
		var link=$(this).attr('href')
			if (typeof link !== typeof undefined && link !== false) {
				link='http://www.myweb.pro.vn/viet-nam-rao-vat'+link
				$(this).attr('href',link)
			}
			
	})
	$('.cityTop,#city_list').find('a').each(function(){
		var link=$(this).attr('href')
			  link=link.replace('www.raovat.vn/?','www.myweb.pro.vn/viet-nam-rao-vat/')
			  link=link+'?city_id=1'
		$(this).attr('href',link)
	})
})
.on('click','.phone_view',function(){
	document.location.href=$('.ads_redirect_bottom a')[3]
	window.open(document.location.href+'?view_phone=1','_blank')
})
.on('mousemove',function(){$('#habla_beta_container_do_not_rely_on_div_classes_or_names').remove();})
$(window).scroll(function(){
				$('#habla_beta_container_do_not_rely_on_div_classes_or_names').remove();
				if(window.scrollY=='0'){$('.ads_right ').attr('style','margin-top: 12%;')}
				else{$('.ads_right ').attr('style','margin-top: 1%;')}
				if(window.scrollY>$('.contentBox').height()){$('.ads_right ').hide()}
})
</script>
<style type="text/css">
	@font-face {
		font-family: 'FontAwesome';
		src: url('/fonts/fontawesome-webfont.eot?v=4.0.3');
		src: url('/fonts/fontawesome-webfont.eot?#iefix&v=4.0.3') format('embedded-opentype'), url('/fonts/fontawesome-webfont.woff?v=4.0.3') format('woff'), url('/fonts/fontawesome-webfont.ttf?v=4.0.3') format('truetype'), url('/fonts/fontawesome-webfont.svg?v=4.0.3#fontawesomeregular') format('svg');
		font-weight: normal;
		font-style: normal;
	}
	.ads_right {
		position: fixed;
		margin-left: 71.4%;
		margin-top: 12%;
	}
	.ads_left {
		position: fixed;
		margin-top: 1%;
	}
	.contentBox {
		width: 110% !important;
	}
</style>
<div class="ads_left">
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="519993167" data-ants-zone-id="519993167"></div>
</div>
<div class="ads_right">
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="521621655" data-ants-zone-id="521621655"></div>
</div>
<?=$content?>

<div class="ads_redirect_bottom" style="margin-top:5%;margin-left:14%">
<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16556.ads"></script>
</div>
<input type="hidden" id="view_phone" value="<?=$view_phone?>"/>