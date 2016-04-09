<link rel="shortcut icon" href="http://xahoihoctap.net.vn/images/favicon.ico" type="image/x-icon"/>
<meta charset='windows-1258'>
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

#wp_page_numbers {
  margin-top: 10px;
  width: 100%;
  background: white;
  margin-bottom: 10px;
}
#wp_page_numbers ul, #wp_page_numbers li, #wp_page_numbers a {
  background: white;
  padding: 0;
  margin-left:5px;
  border: none;
  text-decoration: none;
  font-weight: normal;
  font-style: normal;
  list-style: none;
  text-transform: none;
  text-indent: 0px;
  font-variant: normal;
  text-align: left;
  line-height: 12px;
  letter-spacing: 0px;
  word-spacing: 0px;
  font-size: 14px;
  cursor:pointer;
  font-family: Arial;
}
#wp_page_numbers ul {
  width: 100%;
  display: inline-flex;
}

#wp_page_numbers li.page_info {
  float: left;
  display: block;
  padding: 3px;
  padding-left: 5px;
  padding-right: 5px;
  margin-right: 2px;
  color: #666;
  font-size: 11px;
  border: 1px solid #bfbfbf;
}
.related {
  position: absolute;
  width: 600px;
  margin-left: 200px;
  display: block;
  margin-top: -280px;
}
.header_left_adv {
  width: 300px;
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
  margin-top: 3%;
}
.ads_ants_right {
  position:fixed;
  margin-left:87%;
  margin-top: 3%;
}
.food_name{
  position: absolute;
  margin-top: -50px;
  margin-left: 185px;
  color: pink;
}
input[type="image"] {
	margin-top: -25px!important;
	margin-left: 145px!important;
}
.st {
  display: block;
  PADDING-LEFT: 20px;
  PADDING-TOP: 6px;
  PADDING-BOTTOM: 6px;
  BACKGROUND: url(mndl.gif) no-repeat 2 -2px;
  background-color: #ffffff;
  text-align: left;
  font-size: 12px;
  font-family: Verdana,Helvetica, Tahoma,Arial;
  color: #000000;
  font-weight: bold;
  width: 100%px;
  height: 16px;
  text-decoration: none;
}
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


<!-- start left advertisement id:16623-->
<div class="eclick_left"> 
<!--- Script ANTS - 160x600 -->
<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/519993167.js"></script>
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


<script type="text/javascript"  src="http:/myweb.pro.vn/js/jquery-2.1.0.min.js"></script>	
<script type="text/javascript">
$(document).ready(function(){
	$('.trigger_remove').next().find('img').remove()
	$('#searchform').remove()
	$('font').html('<a href="http://myweb.pro.vn/amthuc/danhmuc/mon-kho/">Home</a>')
	
	//reset category path
	$('.menu').each(function(){
		var href=$(this).attr('href'),new_href=href.replace('/?cat','/nau-ngon?id_cat')
			$(this).attr('href',new_href)
	})
	$('.postmeta').find('a').each(function(){
		var href=$(this).attr('href'),new_href=href.replace('/?cat','/nau-ngon?id_cat')
			$(this).attr('href',new_href)
	})
	$('.menutop').each(function(){
		var href=$(this).attr('href'),
			new_href=href.replace('index.php','http://myweb.pro.vn/nau-ngon?id_cat=1')
			$(this).attr('href',new_href)
	})
	//end

	//reset pagination path
	$('#wp_page_numbers a').removeAttr('href')
	$('#wp_page_numbers a').click(function(){
		var link='/nau-ngon?id_cat=';
			link=link+document.location.href.split('=')[1]+'&paged='+$(this).html();
			window.open(link,'_new')
	})
	//end

	$('#content a').each(function(){
		var href=$(this).attr('href'),new_href=href.replace('/?p','/nau-ngon?id_item')
			$(this).attr('href',new_href)
	})
})
</script>