<meta charset="UTF-8"/>
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
border-radius: 10px;
}
::-webkit-scrollbar-thumb{
background: rgba(238, 238, 238, 0.5);
border: thin solid lightgray;
box-shadow: 5px 6px 7px #B5AEAE inset;
border-radius: 10px;
}
/*end*/

.ads {
margin-top: -25px!important;;
margin-right:0px!important;
margin-left: -140px!important;;
position: absolute;
}
.517324894 {
margin-left: -18%;
}
.page {
cursor:pointer;
}
.header_logo  {
background: url('http://myweb.pro.vn/images/banner_news.png') right top no-repeat !important;
}
#contact-email {
display:none!important;
}
#ads_zone16658 {
margin-left:14%;
}
#ads_zone16658 * {
border:none!important;
}
.adv_eclick_left {
position: fixed;
margin-left:5px;
margin-top:65px;
z-index:100000;
}
.ads_ants_right {
position: absolute;
margin-left: 100.15%;
margin-top: 40px;
z-index: 100000;
}
.post .entry:before {
content: 'myweb.pro.vn'!important;
}
.ants_right_bottom {
position: fixed;
width: 300px;
height: 250px;
background-color: red;
margin-left: 78%;
margin-top: 30%;
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
<link rel="shortcut icon" href="http://xahoihoctap.net.vn/images/icons/news.jpg" type="image/x-icon"/>
<script type="text/javascript" src="http://xahoihoctap.net.vn/js/jquery-2.1.0.min.js"></script>

<div class="adv_eclick_left">
<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/519993167.js"></script>
</div>

<div class="ads_ants_right">
<div id="adnet_widget_28188" type="skyscraperright" style="display: none;"></div><script type="text/javascript">var is_load_adnet_lib = is_load_adnet_lib || 1, ad_main_content_width = ad_main_content_width || 1000;if(is_load_adnet_lib == 1) {is_load_adnet_lib = 2;if(typeof(jQuery)=='undefined') {document.write(unescape("%3Cscript src='http://s0.adnet.vn/jquery.min.js' type='text/javascript'%3E%3C/script%3E"));}document.write(unescape("%3Cscript src='http://s0.adnet.vn/js/adnet34.js' type='text/javascript'%3E%3C/script%3E"));}</script><script type="text/javascript" src="http://widget.adnet.vn/js/js.php?widget_id=28188"></script>
</div>

<?=$content?>

<script type="text/javascript">
$(document).ready(function(){
//reset link
$('a,.title_news_right a').each(function(){
var href=$(this).attr('href'),
href=href+'/13'
new_href=href.replace('kenh13.info','myweb.pro.vn/tin-tuc')
$(this).attr('href',new_href)
})
$('.home').attr('href','http://myweb.pro.vn/tin-tuc/c/xa-hoi/13')
//end
$('.logo a').removeAttr('href')
$('.page').attr('data-pagination','0')
$('.page').mouseover(function(){
if($(this).attr('data-pagination')=='0'){
var link=$(this).attr('href').split('/'),
pag_link=link[0]+'//'+link[2]+'/'+link[3]+'/'+link[4]+'/'+link[5]+'/'+link[8]+'?page='+link[7]
$(this).attr('href',pag_link)
$(this).attr('data-pagination','1')
}
})
if(document.location.href=="http://myweb.pro.vn/tin-tuc/thoat-toi-dam-o-vi-cua-quy-la-do-gia.html/13"){
alert('Tin này đã bị xóa')
open('http://myweb.pro.vn/tin-tuc/c/xa-hoi/13','_parent')
}
$('#searchform,.adsbygoogle,.share-before-single,#footer-k13,#contact-email,.fb-comments').remove()
})
</script>

<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-50476937-1', 'myweb.pro.vn');
ga('send', 'pageview');
</script>
