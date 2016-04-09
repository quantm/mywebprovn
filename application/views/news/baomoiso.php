<style>

</style>
<script type="text/javascript" src="http://raovatnhanh.net.co/js/jquery-2.1.0.min.js"></script>
<script>
$(document).ready(function(){
	$('a').attr('target','_parent')
	$('.close,.button').remove()
	$('#wrapper a,a').each(function(){
		var link=$(this).attr('href');
			  link=link.replace('baomoiso.com','myweb.pro.vn/doc-bao-online')
		$(this).attr('href',link)
	})
})
</script>
<?=$content?>