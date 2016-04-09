<meta charset="UTF-8">
<style>
body {
	margin-top:-20px !important;
}
/* style scroll bar*/
::-webkit-scrollbar-track {}

::-webkit-scrollbar-button {}

::-webkit-scrollbar {
width: 15px;
height: 5px;
background: rgba(238, 238, 238, 0.5);
border: thin solid lightgray;
box-shadow: 0px 0px 3px #dfdfdf inset;
border-radius: 3px;
}
::-webkit-scrollbar-thumb{
background:pink;
box-shadow: 10px 10px 10px rgba(123, 92, 92, 0.62) inset;
border-radius: 5px;
}
/*end*/
</style>
<link type="image/x-icon" href="http://raovatnhanh.net.co/images/icon/news.png" rel="icon">
<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
<script type="text/javascript" src="http://raovatnhanh.net.co/js/jquery-2.1.0.min.js"></script>
<script>
$(document).ready(function(){
	$('.wrapper_top,.wrapper_bottom,#div-gpt-ad-1386757846264-5').remove()
	$('.mainmenu a,.menu_fast a,.prefix_header').each(function(){
		var link=$(this).attr('href')
			  link=link.replace('phunutoday.vn','myweb.pro.vn/phu-nu-ngay-nay/home')
		$(this).attr('href',link)
	})
	$('.pagination a').each(function(){
		var link=$(this).attr('href')
			  link='http://myweb.pro.vn/phu-nu-ngay-nay'+link
		$(this).attr('href',link)
	})
	$('.other_cat a,.most_read a,.related_right a, .item a,.news_category_content a,.news_others a,.tags a,.news_list_body a,.most_read_news a,.news_head_r a,.news_head_l a,.block_topics_default a,.relate_inner_t a').each(function(){
		var link=$(this).attr('href')
			  link=link.replace('phunutoday.vn','myweb.pro.vn/phu-nu-ngay-nay')
		$(this).attr('href',link)
	})
})
.on('error','img',function(){
	$(this).attr('src','http://raovatnhanh.net.co/images/header/my_news.png')		
})
</script>

<?=$content?>