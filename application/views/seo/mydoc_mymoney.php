<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rancho&effect=putting-green|emboss" type="text/css">
<title><?=$name?></title>
<meta charset="UTF-8"/>
<link rel="shortcut icon" href="http://xahoihoctap.net.vn/images/icons/graduate_hat.png" type="image/x-icon"/>
<script type="text/javascript"  src="http://raovatnhanh.net.co/js/jquery-2.1.0.min.js"></script>
<base href='<?php echo $base_link?>'/>
<style>
	body,html {overflow:hidden}
	.clr {clear:both;height:10px;}
	.thesis_name {font-size:17px;color:red !important;font-weight: bold;}
	.fb-share-button{position:fixed !important;margin-top:-10px;margin-left:93.2%;}
	#cse-search-box{position: fixed;margin-top: 40px;margin-left: 10px;}
	.cse_box {height:30px !important;color: #94DDE4;background: gray;}
	#find_my_doc {position: fixed;margin-left: 87%;margin-top: -10px;cursor:pointer;}
</style>
<div id="fb-root"></div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63055375-1', 'auto');
  ga('send', 'pageview');
</script>
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
.on('mousedown',function(){
	if($('#is_open').val()=='0'){
		var d= new Date()
			 d=d.getDate()
		if(d!='15' && d!='14' && d!='13' && d!='12' && d!='11' && d!='10'){
			window.parent.open(frames.parent.location.href+'?&happy_reading=1','_blank')
			window.parent.location.href=$('.ads_redirect a')[0]
		}
		if(d=='15' || d=='14' || d=='13' || d=='12' || d=='11' || d=='10'){
			$('.ads_redirect').attr('style','position: absolute;margin-top:-39%')
		}
	}
})
.on('click','#find_my_doc',function(){
	$('#cse-search-box').show('slow')
})
.on('mouseover','#find_my_doc',function(){
	$('#is_open').val('1')
})

</script>
<div class="obj_reader" style="display:none"><?=$content?></div>
<div class="thesis_name font-effect-putting-green"><?=$name?></div>

<form id="cse-search-box" style="display:none" class="pull-left navbar-form" action="http://xahoihoctap.net.vn/book/cse/">
<div>
<input type="hidden" name="cx" value="partner-pub-1996742103012878:2932988683">
<input type="hidden" name="cof" value="FORID:10">
<input type="hidden" name="ie" value="UTF-8">
<input type="text" class="cse_box" name="q" size="115" autocomplete="off" placeholder="Enter để tìm trong số <?=$count?> luận văn, đề tài...">
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>">
</div>
</form>  

<button id="find_my_doc" title="Click để tìm tài liệu">Tìm tài liệu</button>

<div class="fb-share-button" data-layout="button" data-width="200px" data-height="100px" data-href='http://myweb.pro.vn/mydoc/xahoihoctapnetvn/<?=$id_doc?>'></div>
<div class="clr"></div>
<div id="obj_reader"></div>
<div class="ads_redirect 984_180">
	<span onclick="$('.ads_redirect').hide('slow')" style="color:red;cursor:pointer;font-weight:bold">Đóng quảng cáo</span>
	<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_26537.ads"></script>
</div>
<input type="hidden" id="is_open" value="<?=$happy_reading?>"/>