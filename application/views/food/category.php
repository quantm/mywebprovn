<script type="text/javascript">
$(document).ready(function(){
	$('#header,.foot').remove()
	$('.columns,.title').find('a').each(function(){
		var href=$(this).attr('href'),new_href=href.replace('webnauan.net','myweb.pro.vn/nau-an')
			$(this).attr('href',new_href)
	})
	$('.pagination').find('a').each(function(){
		var href=$(this).attr('href'),new_href=href.replace('/','_').replace('/','_')
			$(this).attr('href',"/amthuc/pagination?page="+new_href)
	})
})
</script>

<base href="http://webnauan.net/"/>
<!-- start left advertisement id:16623-->
<div class="eclick_left"> 
<script type="text/javascript" src="http://e.eclick.vn/delivery/zone/2568.js"></script>
</div>
<!-- end left advertisement -->


<div class="eclick_right"> 
	<!--- Script ANTS - 160x600 --> 
	<script type="text/javascript">
	if(typeof window.ANTS=='undefined'||(window.ANTS&&typeof window.ANTSExcuted!='undefined'))
	   document.write('<script type="text/javascript" async="true" src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></\script>');
	document.write('<div class="519993167" data-ants-zone-id="519993167"><\/div>');
	</script> 
	<!--- end ANTS Script -->
</div>

<?=$content?>

<style type="text/css">
.ants_right_2 {
  margin-top: -35px;		
}
.eclick_left {
  position:fixed;
  margin-top: 54px;
}
.eclick_right {
  position:fixed;
  margin-left:88%;
  margin-top: 54px;
}

ul {
font-size:13px!important;		
}
.inner-wrap {
	margin-top: 70px;
}

input[type="text"] {
	width:300px!important;
	margin-left:25px!important;;
}
</style>