<style type="text/css">

.blink {
	background-color:#B8FFC1;
}

h2, h3 {
margin-left: 1%;
font-size: 20px;
color: rgb(236, 110, 110);		
}
p {
margin-left:1%;
font-size:15px;
}
body {
overflow-x:hidden;	
}
.content_wrapper {
background-color: #FFFFFF;
position: absolute;
margin-top: 220px;
width: 80%;
margin-left: 15%;
}
img {
max-width:800px;
} 
.entry-caption {
margin-left: 1%;
margin-top: 7px;
font-size: 15px !important;
}
.mmo_title {
margin-left: 1%;
font-size: 25px;
color: rgb(19, 98, 17);
}
.adv_eclick_left {
width: 160px;
height:600px;
position: fixed;
margin-left: 25px;
margin-top: 30px;
z-index:10000;
}
.ads_micro_sticky {
	position: fixed;
    margin-top: -3090px;
    margin-left: 63%;
}
#advZoneSticky {
left: 1046px!important;
top: 43px!important;
}
.ads_ants_header {
	position:absolute;
	margin-top:30px;
	margin-left:205px;
	z-index:10000;
}

.lazada_affiliate_header {
	position:absolute;
	margin-top:30px;
	margin-left:205px;
	z-index:1000;
}

.lazada_affiliate_left {
  position: fixed;
  margin-top: 35px;
  margin-left: 5px;
  z-index:10000;
}
</style>

<div class="adv_eclick_left">
	<!--- Script ANTS - 160x600 -->
<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324811.js"></script>
<!--- end ANTS Script -->
</div>

<div class="lazada_affiliate_left">
<!--- Script ANTS - 160x600 --> 
<script type="text/javascript">
    if(typeof window.ANTS=='undefined'||(window.ANTS&&typeof window.ANTSExcuted!='undefined'))
       document.write('<script type="text/javascript" async="true" src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"><\/script>');
    document.write('<div class="517324811" data-ants-zone-id="517324811"><\/div>');
</script> 
<!--- end ANTS Script -->
</div>


<div class="ads_ants_header">
<!--- Script ANTS - 980x90 -->
<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324908.js"></script>
<!--- end ANTS Script -->
</div>

<div class="lazada_affiliate_header">
<!--- Script ANTS - 728x90 --> 
<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
<div class="517324894" data-ants-zone-id="517324894"></div>
<!--- end ANTS Script -->
</div>

<!-- content_wrapper--><div class='content_wrapper'>
<h2 class='mmo_title'><?=$title?></h2>
<?=$content?>


<div class="ads_micro_sticky">
<!--- Script ANTS - 300x250 --> 
<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
<div class="530580154" data-ants-zone-id="530580154"></div>
<!--- end ANTS Script -->
</div>


</div><!--//content_wrapper-->


<script type='text/javascript'>
	$.fn.flash = function(duration, iterations) {
		duration = duration || 1000; // Default to 1 second
		iterations = iterations || 1; // Default to 1 iteration
		var iterationDuration = Math.floor(duration / iterations);

		for (var i = 0; i < iterations; i++) {
			this.fadeOut(iterationDuration).fadeIn(iterationDuration);
		}
		return this;
	}
	var ads_zone16553_index=0
	$(window).scroll(function(){
		ads_zone16553_index++
		if(ads_zone16553_index==1 || ads_zone16553_index==10 || ads_zone16553_index==50){
			$('#ads_zone16553').flash(1200,3)
		}
	})

	$(document).ready(function(){
		//disable flex context menu
		$("html,body,object,embed").bind("contextmenu",function(){
		   return false;
		}); 
		//end

		$('.content_wrapper').append('<div id="comment" class="fb-comments tab-pane  fade in active" data-width="auto"  data-href="http://myweb.pro.vn/kiemtien/index/<?=$path?>"  data-numposts="5" data-colorscheme="dark"></div>');
		$('#___person_0,.adsbygoogle,#fsb-social-bar,#branding,#secondary,#colophon,#comments,meta,.remove,.timkiem,.entry-meta,#related,#respond').remove()
		$('.entry-caption').next().remove()
		$('.mmo_title').next().remove()
		$('.yarpp-related').find('a').each(function(){
			var link=$(this).attr('href')
				.replace('http://kiemtientrenmangaz.com','')
				.replace('/','--')
				.replace('/','--')
				$(this).attr('href','http://myweb.pro.vn/kiemtien/index/'+link)
				
		})
		$('.serie-list').find('a').each(function(){
			var link=$(this).attr('href')
				.replace('http://thachpham.com','')
				.replace('/','--')
				.replace('/','--')
				$(this).attr('href','http://myweb.pro.vn/kiemtien/index/'+link)
				
		})
	})
	function load_img(obj){
		obj.src='http://www.myweb.pro.vn/images/mmo.png';
	}
</script>