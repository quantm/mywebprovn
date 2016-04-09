<link rel="shortcut icon" href="http://xahoihoctap.net.vn/images/favicon.ico" type="image/x-icon"/>
<meta charset='UTF-8'>
<style type="text/css">
/* style scroll bar*/
::-webkit-scrollbar-track {}

::-webkit-scrollbar-button {}

::-webkit-scrollbar {
width: 15px;
height: 5px;
background: rgba(238, 238, 238, 0.5);
border: thin solid lightgray;
box-shadow: 0px 0px 3px #dfdfdf inset;
border-radius: 5px;
}
::-webkit-scrollbar-thumb{
background: rgba(184, 74, 42, 0.5);
border: thin solid lightgray;
box-shadow: 10px 10px 10px #FFFFFF inset;
border-radius: 5px;
}
/*end style scroll bar*/

#main,#header {
	margin-left:15px!important;
}
.pagination a {
	cursor:pointer;
}
#main-menu ul li a {
	font-size: 14px!important;
}
.related {
	position: absolute;
	width: 600px;
	margin-left: 200px;
	display: block;
	margin-top: -280px;
}
.micro_left_adv {
	position:absolute;
	margin-left: 50%;
	margin-top: 0px;
}
.header_left_adv {
	width: 300px;
	height: 250px;
	float: left;
}
#ssvzone_16574_items .ssvzBorder {
	background:none!important;
}
.breadcrumb {
	width: 665px!important;
}
.header_left_adv * {
	border:none!important;
}
#header #main-menu {
	margin-left: 0px!important;
	width: 978px!important;;
}
.header_adv {
	margin-left: -5px;
}
.ants_left {
	position:fixed;
	margin-top: 1%;
	margin-left:22px;
}
.eclick_right {
	position:fixed;
	margin-left:87%;
	margin-top: 1%;
}
.food_name{
	position: absolute;
	margin-top: -50px;
	margin-left: 185px;
	color: pink;
}

.pagination {
  margin-top: -145px!important;
}
.ants_header_left {
  width: 380px;
  height: 90px;
  position: absolute;
  margin-top: 13px;
  margin-left: 190px;
  z-index:1000;
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

<div class="ants_header_left">
	<!--- Script ANTS - 380x90 -->
	<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/518907464.js"></script>
	<!--- end ANTS Script -->
</div>

<!-- start left advertisement id:16623-->
<div class="ants_left"> 
		<!--- Script ANTS - 160x600 -->
		<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324811.js"></script>
		<!--- end ANTS Script --> 
</div>
<!-- end left advertisement -->

<!-- start right advertisement id:16623-->
<div class="eclick_right"> 
	<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/519993167.js"></script>
</div>
<!-- end left advertisement -->

<h3 class="food_name">
<?=$name?>
</h3>
<?=$content?>
<script type="text/javascript"  src="http:/xahoihoctap.net.vn/js/jquery-2.1.0.min.js"></script>	
<script type="text/javascript">
$(document).ready(function(){
$('.trigger_remove').next().find('img').remove()
$('#searchform,.adsbygoogle,#footer,#logoheader').remove()
$('font').html('<a href="http://myweb.pro.vn/amthuc/danhmuc/mon-kho/">Home</a>')

//reset category path
$('.menu,.category,#main').find('a').each(function(){
	var href=$(this).attr('href'),
	new_href=href.replace('ngonngon.org/danh-muc/','myweb.pro.vn/ngon-ngon?id_cat=')
	$(this).attr('href',new_href)
})
$('.listtintuc, .pagination,.breadcrumbs,.search').find('a').each(function(){
var href=$(this).attr('href'),new_href=href.replace('ngonngon.org','myweb.pro.vn/ngon-ngon?item=')
$(this).attr('href',new_href)
})
//end

})
</script>