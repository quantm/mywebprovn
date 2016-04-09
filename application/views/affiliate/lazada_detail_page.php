<style type="text/css">
.carousel {
	margin-top: 45px!important;
}
.main_wrapper {
	margin-top: 335px!important;
}
</style>
<!--meta-->
<meta property="og:title" content="<?=$lazada[0]['product_name'];?><" />
<meta property="og:image" content="<?=$lazada[0]['picture_url'];?>" />
<meta property="og:description" content=<?=$lazada[0]['description'];?> />
<meta property="og:url" content="http://www.myweb.pro.vn/lazada-mua-sam?id=<?=$id_product?>" />

<meta name="image" content="<?=$lazada[0]['picture_url'];?>" />
<meta name="description" content=<?=$lazada[0]['description'];?> />
<link rel="canonical" href="http://www.myweb.pro.vn/lazada-mua-sam?id=<?=$id_product?>"/>

<title><?=$lazada[0]['product_name'];?></title>
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/lazada/product_view.css"/>
<script src='http://xahoihoctap.net.vn/js/lazada/jquery.elevatezoom.js'></script>
<script type="text/javascript">
$(document)
.ready(function(){
	window.scrollTo(300,400)
	$(".product-zoom").elevateZoom({scrollZoom : true,zoomWindowWidth:500});
	$('.itm-img')
		.error(function(){
			$(this).attr('src','http://xahoihoctap.net.vn/images/lazada_affiliate_program/Lazada_Icon.png')
		})
		.mouseenter(function(value,index){
			var src=$(this).attr('src')
				product_zoom_image=$('.product-zoom').attr('data-zoom-image')
				style=$('.zoomWindowContainer div').attr('style').replace(product_zoom_image,src)
				$('.zoomWindowContainer div').attr('style',style)	
				$(".product-zoom").attr('src',src)				
			$('.product-zoom').attr('data-zoom-image',src)
		})
})
.on('click','.lazada_redirect',function(){
	$(this).attr('data-href',	$(this).attr('href')	)
	$(this).removeAttr('href')
	document.location.href=$('.microad_b a')[0]
	window.open($(this).attr('data-href'),'_blank')
})
function thumb_error(obj){
	obj.src='http://xahoihoctap.net.vn/images/lazada_affiliate_program/Lazada_Icon.png';	
}
</script>
<body>
<div class="main_wrapper">

<!-- product info-->
<h1><?=$lazada[0]['product_name'];?></h1>
<div>Thương hiệu : <a href="http://www.myweb.pro.vn/lazada-mua-sam?brand=<?=$lazada[0]['brand'];?>"><?=$lazada[0]['brand'];?></a></div>
<div>Mô tả : <?php echo str_replace('"','',$lazada[0]['description']);?></div>
<!--end -->

<!-- redirect lazada.vn-->
<a class="lazada_redirect" href="<?=$lazada[0]['URL']?>" target="_new">
	<img class="object_lazada_redirect" src="http://xahoihoctap.net.vn/images/lazada_affiliate_program/giohang.png"/>
</a>
<!--end-->

<!-- product image -->
<div class="prod_img prd-imageBoxLayout" id="productImageBox">
<div class="prd-moreImages" data-thumbnailcount="5">
<div class="prd-moreImagesListWrapper" data-simple-sku="default" id="prdMoreImagesList-default">
               
<div class="prd-moreImagesListContainer">
	<ul class="prd-moreImagesList ui-listItemBorder ui-listLight clearfix">
		<li>

		<span class="lfloat ui-border" >
			<span class="productImage  loaded isCurrentImage">
				<img class="itm-img" onerror="thumb_error(this)"  alt="<?=$lazada[0]['product_name'];?>" src="<?=$lazada[0]['picture_url'];?>">
			</span>
		</span>

		<span class="lfloat ui-border" >
		<span class="productImage  loaded">
					<img class="itm-img" onerror="thumb_error(this)"  alt="<?=$lazada[0]['product_name'];?>" src="<?=$lazada[0]['image_url_2'];?>">
		</span>
		</span>

		<span class="lfloat ui-border" >
		<span class="productImage  loaded">
			<span class="itm-imageWrapper ll-imageWrapper default-state" >
					<img class="itm-img"  onerror="thumb_error(this)"  alt="<?=$lazada[0]['product_name'];?>" src="<?=$lazada[0]['image_url_3'];?>">
			</span>
			</span>
		</span>

		<span class="lfloat ui-border" >
		<span class="productImage  loaded">
			<span class="itm-imageWrapper ll-imageWrapper default-state" >
				<img class="itm-img" onerror="thumb_error(this)"  alt="<?=$lazada[0]['product_name'];?>"  src="<?=$lazada[0]['image_url_4'];?>">
			</span>
		</span>
		</span>

		<span class="lfloat ui-border" >
			<span class="productImage  loaded">
				<span class="itm-imageWrapper ll-imageWrapper default-state" >
				<img class="itm-img" onerror="thumb_error(this)"  alt="<?=$lazada[0]['product_name'];?>" src="<?=$lazada[0]['image_url_5'];?>">
			</span>
		</span>
		</span>
		</li>
	</ul>
</div>
</div>
</div>
	<!-- large main image--->		
	<span class="productImage  loaded" style="width: 340px!important; height: 340px;!importan">
	<img class="itm-img  product-zoom" alt="<?=$lazada[0]['product_name'];?>" data-zoom-image="<?=$lazada[0]['zoom_picture_url'];?>" src="<?=$lazada[0]['picture_url'];?>">
	</span>
	<!-- end-->
</div>
<!-- end product image-->

</div>

<div class="admicro-bottom">
	<!--- Script ANTS - 728x90 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="517324894" data-ants-zone-id="517324894"></div>
	<!--- end ANTS Script -->
	<div class="microad_b" style="display:none"><script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16556.ads"></script></div>
</div>

</body>