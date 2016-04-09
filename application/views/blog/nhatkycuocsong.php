<? include_once 'include/analyticstracking.php';?>
<meta charset="UTF-8">
<style type="text/css">
	@font-face {
	font-family: 'FontAwesome';
	src: url('/fonts/fontawesome-webfont.eot?v=4.0.3');
	src: url('/fonts/fontawesome-webfont.eot?#iefix&v=4.0.3') format('embedded-opentype'), url('/fonts/fontawesome-webfont.woff?v=4.0.3') format('woff'), url('/fonts/fontawesome-webfont.ttf?v=4.0.3') format('truetype'), url('/fonts/fontawesome-webfont.svg?v=4.0.3#fontawesomeregular') format('svg');
	font-weight: normal;
	font-style: normal;
}
/* style scroll bar*/
::-webkit-scrollbar {width: 12px; height:12px; }
::-webkit-scrollbar-thumb{background-color:#FA31E1 !important;}
.menu {
	background: url('http://myweb.pro.vn/images/top-menu-background.jpg') repeat-x !important;
}
.menu li a {
	color: #B62F2F!important;
}
.adv_left {
	position:fixed;
	margin-top: 60px;
}
.site-wrapper {
	margin-left: 175px!important;
}
</style>
<link rel="shortcut icon" href="https://www.iconexperience.com/_img/o_collection_png/green_dark_grey/512x512/plain/edit.png" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/bootstrap.min.css" />
<script type="text/javascript" src="http://xahoihoctap.net.vn/js/jquery-2.1.0.min.js"></script>
<base href="http://nhatkycuocsong.com/">

<script type="text/javascript">
$(document)
.ready(function(){
	$('#sidebar,#footer,.prl-homepage-widget,.prl-header-logo,.details-tags,#teaserads').remove()
})
.on('contextmenu','body',function(){
   //return false;	
})
</script>

<div class="adv_left" style="position:absolute">
<div id="adnet_widget_28188" type="skyscraperleft" style="display: none;"></div><script type="text/javascript">var is_load_adnet_lib = is_load_adnet_lib || 1, ad_main_content_width = ad_main_content_width || 1000;if(is_load_adnet_lib == 1) {is_load_adnet_lib = 2;if(typeof(jQuery)=='undefined') {document.write(unescape("%3Cscript src='http://s0.adnet.vn/jquery.min.js' type='text/javascript'%3E%3C/script%3E"));}document.write(unescape("%3Cscript src='http://s0.adnet.vn/js/adnet34.js' type='text/javascript'%3E%3C/script%3E"));}</script><script type="text/javascript" src="http://widget.adnet.vn/js/js.php?widget_id=28188"></script>
</div>

<?=$content?>
