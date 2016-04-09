<meta charset='windows-1258'>
<style type="text/css">
.con img {
	border-radius: 15px;
} 
li {
	list-style:none !important;
}
.related {
  position: absolute;
  width: 600px;
  margin-left: 200px;
  display: block;
  margin-top: -280px;
}
.header_left_adv {
  width: 345px;
  height: 250px;
  float: left;
}
#ssvzone_16574_items .ssvzBorder {
  background:none!important;
}
.header_left_adv * {
	border:none!important;
}
.content {
  width: 72%;
  margin-left: 13%;
  margin-top: 8%;
  text-align: justify;
  font-size: 16px;
}
.eclick_left {
  position:fixed;
  margin-top: -65px;
}
.ads_ants_right {
  position:fixed;
  margin-left:88%;
  margin-top: -65px;
}
.food_name{
  position: absolute;
  margin-top: -50px;
  margin-left: 185px;
  color: pink;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$('.contopads').empty()
	$('.tags').remove()
	$('.related').find('a').each(function(){
		var href=$(this).attr('href'),new_href=href.replace('webnauan.net','myweb.pro.vn/nau-an')
			$(this).attr('href',new_href)
	})
})
</script>
<!-- start left advertisement id:16623-->
<div class="eclick_left"> 
<!--- Script ANTS - 160x600 --> 
<script type="text/javascript">
    if(typeof window.ANTS=='undefined'||(window.ANTS&&typeof window.ANTSExcuted!='undefined'))
       document.write('<script type="text/javascript" async="true" src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"><\/script>');
    document.write('<div class="519993167" data-ants-zone-id="519993167"><\/div>');
</script> 
<!--- end ANTS Script -->
</div>
<!-- end left advertisement -->

<div class="ads_ants_right"> 
<!--- Script ANTS - 160x600 -->
<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324811.js"></script>
<!--- end ANTS Script -->
</div>

<h3 class="food_name">
<?=$name?>
</h3>
<?=$content?>