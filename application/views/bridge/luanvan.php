<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rancho&effect=putting-green|emboss" type="text/css">
<title><?=$name?></title>
<meta charset="UTF-8"/>
<link rel="stylesheet" type="text/css" async href="http://raovatnhanh.net.co/css/bootstrap.min.css" />
<link rel="shortcut icon" href="http://xahoihoctap.net.vn/images/icons/graduate_hat.png" type="image/x-icon"/>
<script type="text/javascript"  src="http://raovatnhanh.net.co/js/jquery-2.1.0.min.js"></script>
<base href='<?php echo $base_link?>'/>
<style>
	body,html {overflow:hidden}
	.clr {clear:both;height:10px;}
	.thesis_name {font-size:17px;color:red !important;font-weight: bold;margin-left: 25px;}
	.fb-share-button{position:fixed !important;margin-top:-10px;margin-left:93.2%;}
	.my_ads_redirect {display:none;}
</style>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
$(document)
.ready(function(){
	var obj_reader=$('.obj_reader').contents().find('object').parent().html(),
		 title=$('.obj_reader').find('title').html();
	$(this).parent().find('title').html(title)
	$('#obj_reader').html(obj_reader);
	$('.obj_reader').remove()
})
</script>
<div class="obj_reader" style="display:none"><?=$content?></div>
<div class="thesis_name font-effect-putting-green"><?=$name?></div>
<div class="fb-share-button" data-layout="button" data-width="200px" data-height="100px" data-href='http://myweb.pro.vn/mydoc/xahoihoctapnetvn/<?=$id_doc?>'></div>
<div class="clr"></div>
<div id="obj_reader"></div>
<div class="my_ads_redirect"><script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_18500.ads"></script></div>
<input type="hidden" id="is_open" value="<?=$happy_reading?>"/>

