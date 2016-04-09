<base href="http://khoahoc.tv"/>
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
<meta charset="UTF-8"/>
<style type="text/css" media="screen">	

/* style scroll bar*/
::-webkit-scrollbar-track {}

::-webkit-scrollbar-button {}

::-webkit-scrollbar {
  width: 15px;
  height: 5px;
  background: rgba(238, 238, 238, 0.5);
  border: thin solid lightgray;
  box-shadow: 0px 0px 3px #dfdfdf inset;
  border-radius: 10px;
}
::-webkit-scrollbar-thumb{
  background: rgba(238, 238, 238, 0.5);
  border: thin solid lightgray;
  box-shadow: 5px 6px 7px #B5AEAE inset;
  border-radius: 10px;
}
/*end*/

#container {
  margin-top: 100px;
}
.ants_header {
  position: absolute;
  margin-top: -115px;
  margin-left: 200px;
}

.ads_ants_left {
  float: left;
  height: auto;
  width: auto;
  margin-left: 35px;
  margin-top: -95px;
  position: fixed;
}
#leftNav,#rPanel1 {
	margin-left: 6%!important;
}
#header {
	margin-top:-7px!important;
}
.adv_micro_top {
	position:absolute;
	margin-left: 10px;
	margin-top: 5px;
}
.adv_micro_left {
	position: fixed;
	margin-top: 3.95%;
	margin-left: 3%;
}
#headNav {
	width: 99%;
	margin-left: 9px;
}
#frmMain {
	  margin-left: 5%;
}
.advertisement_hightlight {
  background: bisque!important;
}
#frmSearch {
  margin-left: 30%;
  width: 100%;
}
.ants_right_bottom {
	position: fixed;
	width: 300px;
	height: 250px;
	margin-left: 78%;
	margin-top: 22%;
}
.adv_right_content {
  position: fixed;
  width: 160px;
  height: 600px;
  margin-left: 78%;
  margin-top: 0px;
  display: none;
}
.blink {
	background-color:#7DF264;
}
.blink_rose {
	background-color:#DD9BC1;
	height: 110px;
	width: auto;
}
#headNav {
  width: 73.5%!important;
  margin-left: 200px!important;
}
#topBannerX {
  margin-left: 40px!important;
  margin-top: 3px!important;;
  position: absolute!important;;
  z-index: 10000!important;;
}
#botLink {
border-bottom:none!important;
} 
.ads_micro_header {
  z-index: 100000;
  display: none;
  position: fixed;
  margin-top: 21.5%;
  margin-left: 14.2%;
  width: 980px;
  height: 184px;
}
.close_advertisement {
	cursor:pointer;
}
</style>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50476937-1', 'myweb.pro.vn');
  ga('send', 'pageview');

</script>
<script type="text/javascript" src="http://myweb.pro.vn/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript">
var scroll_index=0;
//show middle advertisement when user scroll browser window
$(window).scroll(function(){
scroll_index++;
if(scroll_index=='25'){
		$('.adv_right_content').show('slow')	
		$('.adv_micro_right').hide('slow')
	}
})
//end middle adverstisement proccess

//start ready function
$(document).ready(function(){
	$('.adsbygoogle,#imLogo,.pnlLeftNavPromo,.ga-ft-336x280,#copyright').remove()
	$('#frmSearch').attr('action','http://myweb.pro.vn/congnghe')
	

	//reset header and bottomrelated post
	$('#divContent blockquote,.relatedNews').find('a').each(function(){
		var query=$(this).attr('href')
		$(this).attr('href','http://myweb.pro.vn/congnghe?siteUrl='+query)
	})
	//end

	//reset left category path
	$('.leftSide a').each(function(){
		var path=$(this).attr('href')
		$(this).attr('href','http://myweb.pro.vn/congnghe?siteUrl='+path)

	})
	$('.wbd a').each(function(){
		var path=$(this).attr('href')
			  path=path.replace('http://vndoc.com/','http://myweb.pro.vn/tai-lieu-pdf/')
			  path=path+'/vndoccom';
		$(this).attr('href',path)

	})
	//end

	//reset main content item path
	$('.midSide i').find('a').each(function(){
		var query=$(this).attr('href').split('/')[2];
		$(this).attr('href','http://myweb.pro.vn/congnghe?query='+query)
	})

	$('.title1,.ls-title').each(function(){
		var path=$(this).attr('href'), new_path='',
			current_path=document.location.href.replace('http://myweb.pro.vn/congnghe?siteUrl=http://khoahoc.tv/','')
			current_path=current_path.replace('index.aspx','')
			for(var i=0;i<1000;i++){
			current_path=current_path.replace('index'+i+'.aspx','')
			}
			if(current_path.match('query=')){
				new_path=path
			}
			else {
				new_path=current_path+path;
			}
			$(this).attr('href','http://myweb.pro.vn/congnghe?siteUrl='+new_path)
	})
	//end
	
	//reset each bottom article item link
	$('.ls-tags a').each(function(){
		var path=$(this).attr('href').split('/')[2]
		$(this).attr('href','http://myweb.pro.vn/congnghe?query='+path)	
	})
	//end

	//reset each bottom page item link
	$('.spl_links2 a').each(function(){
		var path=$(this).attr('href'),current_path='',new_path=''
			if(document.location.href.match('khoahoc.tv')){
				current_path=document.location.href.split('=')[1].replace('http://khoahoc.tv','').replace('index.aspx','')
				new_path=current_path+path.split('/')[0]
			}
			else {
				new_path=path
			}
		$(this).attr('href','http://myweb.pro.vn/congnghe?siteUrl='+new_path)	
	})
	//end

	//reset bottom related subject
	if($('.c').width()=='684'){
		$('.h').next().find('a').each(function(){
			var path=$(this).attr('href')
			$(this).attr('href','http://myweb.pro.vn/congnghe?siteUrl='+path)
		})
	}
	//end
	
	//reset navigation
	$('.catMore').next().find('a').each(function(){
			var path=$(this).attr('href')
			$(this).attr('href','http://myweb.pro.vn/congnghe?siteUrl='+path)
	})
	$('.lsFooter').find('a').each(function(){
			var path='http://khoahoc.tv'+$(this).attr('href')
			$(this).attr('href','http://myweb.pro.vn/congnghe?siteUrl='+path)
	})
	//end
	//reset header link
	var item_technology=$('.item-congnghemoi a').attr('href'),
		item_explorer=$('.item-khampha a').attr('href')	,
		item_life=$('.item-doisong a').attr('href')
		
	$('.item-congnghemoi a').attr('href','http://myweb.pro.vn/congnghe?siteUrl='+item_technology)
	$('.item-khampha a').attr('href','http://myweb.pro.vn/congnghe?siteUrl='+item_explorer)
	$('.item-doisong a').attr('href','http://myweb.pro.vn/congnghe?siteUrl='+item_life)
	//end

	setInterval(function(){
		$(".adv_micro_right .adv_item, .adv_micro_right .adv_items").toggleClass("blink");
	 },3075)

	setInterval(function(){
		$(".adv_micro_left .adv_item, .adv_micro_left .adv_items").toggleClass("blink_rose");
	 },3075)
})
//end ready function
</script>
<link rel="shortcut icon" href="http://khoahoc.tv/photos/icons/vu-tru.png" type="image/x-icon"/>
<div class="ants_header">
	<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16556.ads"></script>
</div>

<div class="ads_ants_left" style="position:absolute;margin-left: 15px !important;">

</div>

<div  data-advertisement="0" class="adv_right_content"></div>

<div class="adv_micro_right"></div>


<!-- start ads micro right -->
<div class="ants_right_bottom">
	<!--- Script ANTS - 300x250 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="530580154" data-ants-zone-id="530580154"></div>
	<!--- end ANTS Script -->
</div>
<!--//-->

<script type="text/javascript" src="http://myweb.pro.vn/js/advertisement.js"></script>

<?=$content?>
