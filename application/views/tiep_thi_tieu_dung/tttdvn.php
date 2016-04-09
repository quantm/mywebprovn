<? include_once 'include/analyticstracking.php';?>
<base href="http://tttd.vn/">
<meta charset="UTF-8"/>
<link rel="shortcut icon" href="http://xahoihoctap.net.vn/images/favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/bootstrap.min.css" />
<style type="text/css">

/* style horizontal scroll bar */
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

#ads_zone16598 * {
	border:none!important;
}
.ssvzBorder {
	background:transparent!important;
}
.wrapper_mainmenu {
	background: url('http://myweb.pro.vn/images/top-menu-background.jpg') repeat-x !important;
}
.mainmenu ul.menus_level_0 li.item {
	margin-top: -5px;
}
.intro_close_adv {
	color:red;
}
.ants_adv_header {
  position: absolute;
  margin-left: 30%;
  margin-top: 10px;
}
</style>
<div class="ants_adv_header">
<!--- Script ANTS - 728x90 --> 
<script type="text/javascript">
    if(typeof window.ANTS=='undefined'||(window.ANTS&&typeof window.ANTSExcuted!='undefined'))
       document.write('<script type="text/javascript" async="true" src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"><\/script>');
    document.write('<div class="517324894" data-ants-zone-id="517324894"><\/div>');
</script> 
<!--- end ANTS Script -->
</div>
<?=$content?>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" async src="http://xahoihoctap.net.vn/js/bootstrap.js"></script>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/countdown/jquery.plugin.js" charset="utf-8"></script>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/countdown/jquery.countdown.js" charset="utf-8"></script>
<script type="text/javascript" src="http://xahoihoctap.net.vn/js/tttd.js"></script>

<!-- start ads_micro_header advertisement -->
<div class="modal hide fade" data-advertisement="1"  id="adv_temp" style="height: 400px;width: 80%;margin-left: -43%;">

<div class="modal-header" style="border-bottom:none!important">
	<p>Quảng cáo sẽ đóng sau : 	<span class="intro_close_adv"></span> giây</p>
</div>

<div class="modal-body">
	<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324908.js"></script>
	<div class="ads_box_18500" style="margin-left: 16px;margin-top: 3px;">
		<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_18500.ads"></script>
	</div>
</div>

</div>
<!-- end  ads_micro_header advertisement  -->

<input type='hidden' id="hidden_countdown"/>