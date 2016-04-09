<style tyep="text/css">
.breadcrumb {
background: -webkit-gradient(linear, 0 0, 0 100%, from(rgba(0, 0, 0, .2)), color-stop(0.05, rgba(0, 0, 0, 0)), color-stop(0.97, rgba(0, 0, 0, 0)), to(rgba(0, 0, 0, .45))), -webkit-gradient(linear, 0 0, 100% 0, from(rgba(0, 0, 0, .2)), color-stop(0.002, rgba(0, 0, 0, 0)), color-stop(0.998, rgba(0, 0, 0, 0)), to(rgba(0, 0, 0, .2))), url('data:image/png;base64') no-repeat 50% 50%, -webkit-gradient(linear, 0 100%, 0 0, from(rgb(106,185,44)), color-stop(0.5, rgb(106,185,44)), color-stop(0.51, rgb(106,185,44)), to(rgb(106,185,44)));
}
.breadcrumb a {
color: white;
font-size: 14px;
text-shadow: none;
margin-left: 2px;
}
.wrapper {
	background-color: #FFFFFF;
	position: absolute;
	margin-top: 60px;
	width: 80%;
	margin-left: 11%;
	height:80%;
	overflow-y:hidden;
	font-size:17px;
}
.currentpage {
	color:red!important;
	font-weight:bold;
}
.wrapper div a:link,.currentpage {
	margin-left: 2px;
	color:#444 !important;
}
.wrapper a:focus {
	color:red!important;
}
.money-icon {
	margin-top:5px;
	margin-left:110px;
}
body {
	overflow:hidden;
	background:url('/images/seo_money.jpg');
}
.header_title {
	position: fixed;
	margin-top: 75px;
	z-index: 1000;
	margin-left: 300px;
}
.ants_right {
	position: fixed;
	margin-left: 68.9%;
	margin-top: 4.5%;
	z-index: 100;
}
</style>
<h2 class='header_title'>Sưu tầm các bài viết <?=$cate_name?></h2>

<div class="ants_right">
<!--- Script ANTS - 300x450 --> 
<script type="text/javascript">
    if(typeof window.ANTS=='undefined'||(window.ANTS&&typeof window.ANTSExcuted!='undefined'))
       document.write('<script type="text/javascript" async="true" src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"><\/script>');
    document.write('<div class="522881693" data-ants-zone-id="522881693"><\/div>');
</script> 
<!--- end ANTS Script -->
</div>

<div class='wrapper'>
<div style='margin-top:75px'>
<?php foreach($mmo as $key):?>
<i class="fa money-icon fa-dollar fa-1x"></i> <a href='/kiemtien/index/<? $path='';$path=str_replace('http://kiemtientrenmangaz.com','',$key['path']);$path=str_replace('http://thachpham.com','',$path);$path=str_replace('http://theson.net','',$path);$path=str_replace('/','--',$path); echo $path; ?>'><?=str_replace('Theson.net','',$key['name'])?></a>
<div style='clear:both'></div>
<?php endforeach?>
</div>
<ul class="breadcrumb">
			<li class="active footer_pagination"><?=$pagination?></li>
</ul>
</div>
<script type='text/javascript'>
	$(document).ready(function(){
		$('.footer_pagination').find('a').each(function(){
			var link=$(this).attr('href')
			$(this).attr('href',link+'?&id=<?=$id?>')
		})
	})
</script>
