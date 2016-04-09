<meta property="og:image" content="http://myweb.pro.vn/images/icon/fun.png">
<style type="text/css">
.breadcrumb {
background: -webkit-gradient(linear, 0 0, 0 100%, from(rgba(0, 0, 0, .2)), color-stop(0.05, rgba(0, 0, 0, 0)), color-stop(0.97, rgba(0, 0, 0, 0)), to(rgba(0, 0, 0, .45))), -webkit-gradient(linear, 0 0, 100% 0, from(rgba(0, 0, 0, .2)), color-stop(0.002, rgba(0, 0, 0, 0)), color-stop(0.998, rgba(0, 0, 0, 0)), to(rgba(0, 0, 0, .2))), url('data:image/png;base64') no-repeat 50% 50%, -webkit-gradient(linear, 0 100%, 0 0, from(rgb(106,185,44)), color-stop(0.5, rgb(106,185,44)), color-stop(0.51, rgb(106,185,44)), to(rgb(106,185,44)));
margin-top: 41%;
margin-left: 215px;
position: absolute;
width:38%;
}
.breadcrumb a {
color: white;
font-size: 14px;
text-shadow: none;
margin-left: 2px;
}

.category_wrapper {
  position: absolute;
  margin-left: 215px;
  margin-top: 40px;
  font-size: 16px;
}
.cate_item {

}
.category_pagination {
  position: absolute!important;
  margin-top: 575px!important;
  margin-left: 2%!important;
}
.ads_ants_left {
  position:fixed;
  margin-left: 1%;
  margin-top: 2%;
}
.ads_ants_right {
	 position: fixed;
	 margin-left: 77%;
	 margin-top: 2%;
}
.ads_ants_left * {
 
}
/* hightlight advertisement object */
.blink {
	background-color: #B8FFC1;
	height: 110px;
	width: auto;
}

.blink_rose {
	background-color:#DD9BC1;
	height: 110px;
	width: auto;
}
/*end*/

.pending_load_thumb {
	position: fixed;
	margin-left: 50%;
	display:none;
}
</style>

<script type="text/javascript">
$(document).ready(function(){
	
	setInterval(function(){
		$(".ads_ants_right .adv_items, .ads_ants_right .adv_item").toggleClass("blink_rose");
		},3075)

	$('.breadcrumb a').each(function(){
		var path=$(this).attr('href')
			$(this).attr('href', path+'?&id_category=<?=$id_category?>')
	})

})
</script>
<img class="pending_load_thumb" src="http://xahoihoctap.net.vn/images/ajax-loader.gif"></img>
<div class="thumb_temp"></div>
<div class="category_wrapper">
<?php foreach($content as $key):?>
<?
	$path=str_replace('webtruyen.com','myweb.pro.vn/doc-truyen?fetchItem=',$key['path']);
	$path=str_replace('truyen.vui1.net','myweb.pro.vn/doc-truyen?fetchItem=',$path);
	$path=str_replace('www.doctruyen360.com','myweb.pro.vn/doc-truyen?fetchItem=',$path);
?>
<a class="cate_item" title="<?=$key['name']?>" href="<?=$path?>"><?=$key['name']?></a>
<div style="clear:both"></div>
<?php endforeach;?>
</div>

<div class="ads_ants_right">
 <!--- Script ANTS - 300x600 -->
<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324837.js"></script>
<!--- end ANTS Script --> 
</div>

<div class="ads_ants_left">
	 <!--- Script ANTS - 120x600 -->
	<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324793.js"></script>
	<!--- end ANTS Script --> 
</div>

<ul class="breadcrumb">
			<li class="active footer_pagination"><?=$pagination?></li>
</ul>
