<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<!-- start meta -->
<meta content="text/html" charset="UTF-8" http-equiv="Content-Type"/>
<meta property="og:title" content="Âm nhạc" />
<meta property="og:image" content="http://upload.wikimedia.org/wikipedia/commons/7/72/Color_map_fs.png" />
<meta property="og:type" content="music.playlist" />
<meta property="og:description" content="Âm nhạc" />
<!-- end meta  -->
<link rel="stylesheet" type="text/css" href="/css/music/css.css"/>
<script type="text/javascript"  src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	//mobile
	if(window.innerWidth <= "800" && window.innerHeight <= "640") {
	$(".category")
		.removeClass("category")
		.addClass('category_mobile')
	$("#book_detail").next().addClass('social_like_mobile')
	$(".btn_download")
	.removeClass('social_like')
	.addClass('btn_download-mobile')
	$(".btn-add-book").remove()
	}
	//end

	if($("#custom_search").val()=="1"){
		$(".search-content,.search-categories,.category,.music_header_search,.social_shared").hide()
	}

})
.on("mouseover",".language",function(){
	//$("#game_header_search").show()
})
</script>
<script type="text/javascript" src="/js/music.js"></script>
<style>
#twitter-widget-0{
	width: 90px !important;
}
.ads_music_header {
<?=$style_ads?>
}
.social_shared {
margin-top: 295px;
position: absolute;
z-index: 100;
margin-left: 70%;
}

.cse-branding-logo
{
margin-top: -8%;
margin-left: 65%;
position: absolute;
}
.music_header_search {
display: none;
margin-left: 16%;
margin-top: 6%;
position: absolute;
z-index: 900000;
}
.cse_textbox{
background-color: rgb(250, 255, 189)!important;
margin-left: 30px;
height:30px;
width:375px;
}
#cse-search-results{
display: block;
position: absolute;
margin-top: 3%;
margin-left: 15%;
z-index: 100;
}
.ads_ants_header {
position: absolute;
margin-top: 6%;
margin-left: 38%;
z-index: 1000000;
}
</style>
<script>
$(function() {
var projects = [
<?php foreach($music as $key):?> 
{
value: "<?=$key['name']?>",
label: "<?=$key['name']?>"
},
<?php endforeach;?>
];

$( "#search" ).autocomplete({
minLength: 0,
source: projects,
focus: function( event, ui ) {
$(".fa-search").attr('style','margin-left:305px')
$("#search").attr('style','width:375px')
$( "#search" ).val( ui.item.label );
return false;
},
select: function( event, ui ) {
$( "#search" ).val( ui.item.label );      
$("#game_header_search").submit()
return false;
}
})
});

$(window).scroll(show_ads);
function show_ads(){

}
</script>
</head>

<body>

<!-- start social -->
<div class="social_shared">
<div class="fb-like" data-href="http://myweb.pro.vn/music/index/'" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>

<!-- start twitter shared-->
<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<!-- end twitter shared-->

<!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->
<div  data-size="medium" class="g-plusone"></div>

<!-- Đặt thẻ này sau thẻ Nút +1 cuối cùng. -->
<script type="text/javascript">
window.___gcfg = {lang: 'vi'};

(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
po.src = 'https://apis.google.com/js/platform.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
</div>
<!-- end social -->
<div class="ads_ants_header">
	 <!--- Script ANTS - 728x90 -->
	<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script>
	<!--- end ANTS Script --> 
</div>
<?=$content?>

<div class="category">
<!--start music type-->
<h2 class="cate-title"><i class="fa fa-headphones fa-2x"></i> Thể lọai</h2>
<ul>
<li><a title="Andre Rieu" href="/music/nhackhongloi" class="_trackLink" tracking="_frombox=home_artist_vietnam">Không lời</a></li>
<li><a title="Andre Rieu" href="/music/tinhkhucbathu" class="_trackLink" tracking="_frombox=home_artist_vietnam">Tình khúc bất hủ</a></li>
<li><a title="Andre Rieu" href="/music/giangsinh" class="_trackLink" tracking="_frombox=home_artist_vietnam">Nhạc giáng sinh</a></li>
<li><a title="Andre Rieu" href="/music/dance" class="_trackLink" tracking="_frombox=home_artist_vietnam">Nhạc dance</a></li>
</ul>
<!--end music type-->

<!-- start -->
<h2 class="cate-title"><i class="fa fa-headphones fa-2x"></i> Nghệ sĩ Âu Á</h2>
<ul>
<li><a title="Andre Rieu" href="/music/index?search=Andre+Rieu" class="_trackLink" tracking="_frombox=home_artist_vietnam">Andre Rieu</a></li>
<li><a title="California Guitar Trio" href="/music/index?search=California+Guitar+Trio" class="_trackLink" tracking="_frombox=home_artist_vietnam">California Guitar Trio</a></li>
<li><a title="Francis Goya" href="/music/index?search=Francis+Goya" class="_trackLink" tracking="_frombox=home_artist_vietnam">Francis Goya</a></li>
<li><a title="Betthoven" href="/music/index?search=Betthoven" class="_trackLink" tracking="_frombox=home_artist_vietnam">Betthoven</a></li>
<li><a title="Richard Claydeman" href="/music/index?search=Richard+Claydeman" class="_trackLink" tracking="_frombox=home_artist_vietnam">Richard Claydeman</a></li>
<li><a title="Johann Sebastian Bach" href="/music/index?search=Johann+Sebastian+Bach" class="_trackLink" tracking="_frombox=home_artist_vietnam">Johann Sebastian Bach</a></li>
<li><a title="Franz Schubert" href="/music/index?search=Franz+Schubert" class="_trackLink" tracking="_frombox=home_artist_vietnam">Franz Schubert</a></li>
<li><a title="Paul Mauriat" href="/music/index?search=Paul+Mauriat" class="_trackLink" tracking="_frombox=home_artist_vietnam">Paul Mauriat</a></li>
<li><a title="Kitaro" href="/music/index?search=Kitaro" class="_trackLink" tracking="_frombox=home_artist_vietnam">Kitaro</a></li>
<li><a title="James Last" href="/music/index?search=James+Last" class="_trackLink" tracking="_frombox=home_artist_vietnam">James Last</a></li>
<li><a title="Wolfgang+Amadeus+Mozart" href="/music/index?search=Wolfgang+Amadeus+Mozart" class="_trackLink" tracking="_frombox=home_artist_vietnam">Wolfgang Amadeus Mozart</a></li>
<li><a title="Martha Argerich" href="/music/index?search=Martha+Argerich" class="_trackLink" tracking="_frombox=home_artist_vietnam">Martha Argerich</a></li>
<li><a title="Vladimir Horowitz" href="/music/index?search=Vladimir+Horowitz" class="_trackLink" tracking="_frombox=home_artist_vietnam">Vladimir Horowitz</a></li>
<li><a title="Ludwig van Beethoven" href="/music/index?search=Ludwig+van+Beethoven" class="_trackLink" tracking="_frombox=home_artist_vietnam">Ludwig van Beethoven</a></li>
<li><a title="Various Artists" href="/music/index?search=Various+Artists" class="_trackLink" tracking="_frombox=home_artist_vietnam">Various Artists</a></li>
</ul>
<!-- end-->

<h2 class="cate-title"><i class="fa fa-headphones fa-2x"></i> Ca sĩ Việt Nam</h2>
<ul>
<li><a title="Bảo Thy" href="/music/index?search=B%E1%BA%A3o+Thy" class="_trackLink" tracking="_frombox=home_artist_vietnam">Bảo Thy</a></li>
<li><a title="Bằng Cường" href="/music/index?search=B%E1%BA%B1ng+C%C6%B0%E1%BB%9Dng" class="_trackLink" tracking="_frombox=home_artist_vietnam">Bằng Cường</a></li>
<li><a title="Bích Phương " href="/music/index?search=B%C3%ADch+Ph%C6%B0%C6%A1ng+" class="_trackLink" tracking="_frombox=home_artist_vietnam">Bích Phương </a></li>
<li><a title="Bùi Anh Tuấn" href="/music/index?search=B%C3%B9i+Anh+Tu%E1%BA%A5n" class="_trackLink" tracking="_frombox=home_artist_vietnam">Bùi Anh Tuấn</a></li>
<li><a title="Cao Thái Sơn" href="/music/index?search=Cao+Th%C3%A1i+S%C6%A1n" class="_trackLink" tracking="_frombox=home_artist_vietnam">Cao Thái Sơn</a></li>
<li><a title="Cẩm Ly" href="/music/index?search=C%E1%BA%A9m+Ly" class="_trackLink" tracking="_frombox=home_artist_vietnam">Cẩm Ly</a></li>
<li><a title="Chi Dân" href="/music/index?search=Chi+D%C3%A2n" class="_trackLink" tracking="_frombox=home_artist_vietnam">Chi Dân</a></li>
<li><a title="Dương Ngọc Thái" href="/music/index?search=D%C6%B0%C6%A1ng+Ng%E1%BB%8Dc+Th%C3%A1i" class="_trackLink" tracking="_frombox=home_artist_vietnam">Dương Ngọc Thái</a></li>
<li><a title="Dương Triệu Vũ" href="/music/index?search=D%C6%B0%C6%A1ng+Tri%E1%BB%87u+V%C5%A9" class="_trackLink" tracking="_frombox=home_artist_vietnam">Dương Triệu Vũ</a></li>
<li><a title="Đàm Vĩnh Hưng" href="/music/index?search=%C4%90%C3%A0m+V%C4%A9nh+H%C6%B0ng" class="_trackLink" tracking="_frombox=home_artist_vietnam">Đàm Vĩnh Hưng</a></li>
<li><a title="Đan Trường" href="/music/index?search=%C4%90an+Tr%C6%B0%E1%BB%9Dng" class="_trackLink" tracking="_frombox=home_artist_vietnam">Đan Trường</a></li>
<li><a title="Trịnh Thăng Bình" href="/music/index?search=Tr%E1%BB%8Bnh+Th%C4%83ng+B%C3%ACnh" class="_trackLink" tracking="_frombox=home_artist_vietnam">Trịnh Thăng Bình</a></li>
<li><a title="Đông Nhi" href="/music/index?search=%C4%90%C3%B4ng+Nhi" class="_trackLink" tracking="_frombox=home_artist_vietnam">Đông Nhi</a></li>
<li><a title="Hoài Lâm" href="/music/index?search=Ho%C3%A0i+L%C3%A2m" class="_trackLink" tracking="_frombox=home_artist_vietnam">Hoài Lâm</a></li>
<li><a title="Hồ Ngọc Hà" href="/music/index?search=H%E1%BB%93+Ng%E1%BB%8Dc+H%C3%A0" class="_trackLink" tracking="_frombox=home_artist_vietnam">Hồ Ngọc Hà</a></li>
<li><a title="Hồ Quang Hiếu" href="/music/index?search=H%E1%BB%93+Quang+Hi%E1%BA%BFu" class="_trackLink" tracking="_frombox=home_artist_vietnam">Hồ Quang Hiếu</a></li>
<li><a title="Hồ Quỳnh Hương" href="/music/index?search=H%E1%BB%93+Qu%E1%BB%B3nh+H%C6%B0%C6%A1ng" class="_trackLink" tracking="_frombox=home_artist_vietnam">Hồ Quỳnh Hương</a></li>
<li><a title="HKT" href="/music/index?search=HKT" class="_trackLink" tracking="_frombox=home_artist_vietnam">HKT</a></li>
<li><a title="Khánh Phương" href="/music/index?search=Kh%C3%A1nh+Ph%C6%B0%C6%A1ng" class="_trackLink" tracking="_frombox=home_artist_vietnam">Khánh Phương</a></li>
<li><a title="Khắc Việt" href="/music/index?search=Kh%E1%BA%AFc+Vi%E1%BB%87t" class="_trackLink" tracking="_frombox=home_artist_vietnam">Khắc Việt</a></li>
<li><a title="Khởi My" href="/music/index?search=Kh%E1%BB%9Fi+My" class="_trackLink" tracking="_frombox=home_artist_vietnam">Khởi My</a></li>
<li><a title="Khổng Tú Quỳnh" href="/music/index?search=Kh%E1%BB%95ng+T%C3%BA+Qu%E1%BB%B3nh" class="_trackLink" tracking="_frombox=home_artist_vietnam">Khổng Tú Quỳnh</a></li>
<li><a title="Lâm Chấn Huy " href="/music/index?search=L%C3%A2m+Ch%E1%BA%A5n+Huy+" class="_trackLink" tracking="_frombox=home_artist_vietnam">Lâm Chấn Huy </a></li>
<li><a title="Lệ Quyên" href="/music/index?search=L%E1%BB%87+Quy%C3%AAn" class="_trackLink" tracking="_frombox=home_artist_vietnam">Lệ Quyên</a></li>
<li><a title="Lương Bích Hữu" href="/music/index?search=L%C6%B0%C6%A1ng+B%C3%ADch+H%E1%BB%AFu" class="_trackLink" tracking="_frombox=home_artist_vietnam">Lương Bích Hữu</a></li>
<li><a title="Minh Hằng" href="/music/index?search=Minh+H%E1%BA%B1ng" class="_trackLink" tracking="_frombox=home_artist_vietnam">Minh Hằng</a></li>
<li><a title="Minh Vương M4U" href="/music/index?search=Minh+V%C6%B0%C6%A1ng+M4U" class="_trackLink" tracking="_frombox=home_artist_vietnam">Minh Vương M4U</a></li>
<li><a title="Miu Lê" href="/music/index?search=Miu+L%C3%AA" class="_trackLink" tracking="_frombox=home_artist_vietnam">Miu Lê</a></li>
<li><a title="Mr. Siro" href="/music/index?search=Mr.+Siro" class="_trackLink" tracking="_frombox=home_artist_vietnam">Mr. Siro</a></li>
<li><a title="Mỹ Tâm" href="/music/index?search=M%E1%BB%B9+T%C3%A2m" class="_trackLink" tracking="_frombox=home_artist_vietnam">Mỹ Tâm</a></li>
<li><a title="Noo Phước Thịnh" href="/music/index?search=Noo+Ph%C6%B0%E1%BB%9Bc+Th%E1%BB%8Bnh" class="_trackLink" tracking="_frombox=home_artist_vietnam">Noo Phước Thịnh</a></li>
<li><a title="Ngô Kiến Huy" href="/music/index?search=Ng%C3%B4+Ki%E1%BA%BFn+Huy" class="_trackLink" tracking="_frombox=home_artist_vietnam">Ngô Kiến Huy</a></li>
<li><a title="Phạm Trưởng" href="/music/index?search=Ph%E1%BA%A1m+Tr%C6%B0%E1%BB%9Fng" class="_trackLink" tracking="_frombox=home_artist_vietnam">Phạm Trưởng</a></li>
<li><a title="Quang Dũng" href="/music/index?search=Quang+D%C5%A9ng" class="_trackLink" tracking="_frombox=home_artist_vietnam">Quang Dũng</a></li>
<li><a title="Quang Hà" href="/music/index?search=Quang+H%C3%A0" class="_trackLink" tracking="_frombox=home_artist_vietnam">Quang Hà</a></li>
<li><a title="Quang Lê" href="/music/index?search=Quang+L%C3%AA" class="_trackLink" tracking="_frombox=home_artist_vietnam">Quang Lê</a></li>
<li><a title="Trung Quân Idol" href="/music/index?search=Trung+Qu%C3%A2n+Idol" class="_trackLink" tracking="_frombox=home_artist_vietnam">Trung Quân Idol</a></li>
<li><a title="Tuấn Hưng" href="/music/index?search=Tu%E1%BA%A5n+H%C6%B0ng" class="_trackLink" tracking="_frombox=home_artist_vietnam">Tuấn Hưng</a></li>
<li><a title="Sơn Tùng M-TP " href="/music/index?search=S%C6%A1n+T%C3%B9ng+M-TP+" class="_trackLink" tracking="_frombox=home_artist_vietnam">Sơn Tùng M-TP </a></li>
<li><a title="Vĩnh Thuyên Kim" href="/music/index?search=V%C4%A9nh+Thuy%C3%AAn+Kim" class="_trackLink" tracking="_frombox=home_artist_vietnam">Vĩnh Thuyên Kim</a></li>
<li><a title="Vy Oanh" href="/music/index?search=Vy+Oanh" class="_trackLink" tracking="_frombox=home_artist_vietnam">Vy Oanh</a></li>
</ul>

<!--start-->
<h2 class="cate-title"><i class="fa fa-headphones fa-2x"></i> Ca sĩ Châu Á</h2>
<ul>
<li><a title="2NE1" href="/music/index?search=2NE1" class="_trackLink" tracking="_frombox=home_artist_chaua">2NE1</a></li>
<li><a title="2AM" href="/music/index?search=2AM" class="_trackLink" tracking="_frombox=home_artist_chaua">2AM</a></li>
<li><a title="2PM" href="/music/index?search=2PM" class="_trackLink" tracking="_frombox=home_artist_chaua">2PM</a></li>
<li><a title="4Minute" href="/music/index?search=4Minute" class="_trackLink" tracking="_frombox=home_artist_chaua">4Minute</a></li>
<li><a title="After School" href="/music/index?search=After+School" class="_trackLink" tracking="_frombox=home_artist_chaua">After School</a></li>
<li><a title="AKB48" href="/music/index?search=AKB48" class="_trackLink" tracking="_frombox=home_artist_chaua">AKB48</a></li>
<li><a title="BEAST" href="/music/index?search=BEAST" class="_trackLink" tracking="_frombox=home_artist_chaua">BEAST</a></li>
<li><a title="BIGBANG" href="/music/index?search=BIGBANG" class="_trackLink" tracking="_frombox=home_artist_chaua">BIGBANG</a></li>
<li><a title="CNBlue" href="/music/index?search=CNBlue" class="_trackLink" tracking="_frombox=home_artist_chaua">CNBlue</a></li>
<li><a title="Davichi" href="/music/index?search=Davichi" class="_trackLink" tracking="_frombox=home_artist_chaua">Davichi</a></li>
<li><a title="DBSK" href="/music/index?search=DBSK" class="_trackLink" tracking="_frombox=home_artist_chaua">DBSK</a></li>
<li><a title="f(x)" href="/music/index?search=f%28x%29" class="_trackLink" tracking="_frombox=home_artist_chaua">f(x)</a></li>
<li><a title="G-Dragon" href="/music/index?search=G-Dragon" class="_trackLink" tracking="_frombox=home_artist_chaua">G-Dragon</a></li>
<li><a title="IU" href="/music/index?search=IU" class="_trackLink" tracking="_frombox=home_artist_chaua">IU</a></li>
<li><a title="KARA" href="/music/index?search=KARA" class="_trackLink" tracking="_frombox=home_artist_chaua">KARA</a></li>
<li><a title="Kim Hyun Joong" href="/music/index?search=Kim+Hyun+Joong" class="_trackLink" tracking="_frombox=home_artist_chaua">Kim Hyun Joong</a></li>
<li><a title="Lee Hi" href="/music/index?search=Lee+Hi" class="_trackLink" tracking="_frombox=home_artist_chaua">Lee Hi</a></li>
<li><a title="Miss A" href="/music/index?search=Miss+A" class="_trackLink" tracking="_frombox=home_artist_chaua">Miss A</a></li>
<li><a title="NU'EST" href="/music/index?search=NU%27EST" class="_trackLink" tracking="_frombox=home_artist_chaua">NU'EST</a></li>
<li><a title="PSY" href="/music/index?search=PSY" class="_trackLink" tracking="_frombox=home_artist_chaua">PSY</a></li>
<li><a title="SHINee" href="/music/index?search=SHINee" class="_trackLink" tracking="_frombox=home_artist_chaua">SHINee</a></li>
<li><a title="SISTAR" href="/music/index?search=SISTAR" class="_trackLink" tracking="_frombox=home_artist_chaua">SISTAR</a></li>
<li><a title="Super Junior" href="/music/index?search=Super+Junior" class="_trackLink" tracking="_frombox=home_artist_chaua">Super Junior</a></li>
<li><a title="SNSD" href="/music/index?search=SNSD" class="_trackLink" tracking="_frombox=home_artist_chaua">SNSD</a></li>
<li><a title="T-ARA" href="/music/index?search=T-ARA" class="_trackLink" tracking="_frombox=home_artist_chaua">T-ARA</a></li>
<li><a title="Trouble Maker" href="/music/index?search=Trouble+Maker" class="_trackLink" tracking="_frombox=home_artist_chaua">Trouble Maker</a></li>
<li><a title="Wonder Girls" href="/music/index?search=Wonder+Girls" class="_trackLink" tracking="_frombox=home_artist_chaua">Wonder Girls</a></li>
<li><a title="Winner" href="/music/index?search=Winner" class="_trackLink" tracking="_frombox=home_artist_chaua">Winner</a></li>
</ul>
<!--end -->

<h2 class="cate-title"><i class="fa fa-headphones fa-2x"></i> Ca sĩ Âu Mỹ</h2>
<ul>

<li><a title="Adele" href="/music/index?search=Adele" class="_trackLink" tracking="_frombox=home_artist_aumy">Adele</a></li>
<li><a title="Avril Lavigne" href="/music/index?search=Avril+Lavigne" class="_trackLink" tracking="_frombox=home_artist_aumy">Avril Lavigne</a></li>
<li><a title="Backstreet Boys" href="/music/index?search=Backstreet+Boys" class="_trackLink" tracking="_frombox=home_artist_aumy">Backstreet Boys</a></li>
<li><a title="Beyoncé" href="/music/index?search=Beyonc%C3%A9" class="_trackLink" tracking="_frombox=home_artist_aumy">Beyoncé</a></li>
<li><a title="Britney Spears" href="/music/index?search=Britney+Spears" class="_trackLink" tracking="_frombox=home_artist_aumy">Britney Spears</a></li>
<li><a title="Bruno Mars" href="/music/index?search=Bruno+Mars" class="_trackLink" tracking="_frombox=home_artist_aumy">Bruno Mars</a></li>
<li><a title="Celine Dion" href="/music/index?search=Celine+Dion" class="_trackLink" tracking="_frombox=home_artist_aumy">Celine Dion</a></li>
<li><a title="Christina Aguilera" href="/music/index?search=Christina+Aguilera" class="_trackLink" tracking="_frombox=home_artist_aumy">Christina Aguilera</a></li>
<li><a title="Demi Lovato" href="/music/index?search=Demi+Lovato" class="_trackLink" tracking="_frombox=home_artist_aumy">Demi Lovato</a></li>
<li><a title="Eminem" href="/music/index?search=Eminem" class="_trackLink" tracking="_frombox=home_artist_aumy">Eminem</a></li>
<li><a title="Enrique Iglesias" href="/music/index?search=Enrique+Iglesias" class="_trackLink" tracking="_frombox=home_artist_aumy">Enrique Iglesias</a></li>
<li><a title="Justin Bieber" href="/music/index?search=Justin+Bieber" class="_trackLink" tracking="_frombox=home_artist_aumy">Justin Bieber</a></li>
<li><a title="Justin Timberlake" href="/music/index?search=Justin+Timberlake" class="_trackLink" tracking="_frombox=home_artist_aumy">Justin Timberlake</a></li>
<li><a title="Katy Perry" href="/music/index?search=Katy+Perry" class="_trackLink" tracking="_frombox=home_artist_aumy">Katy Perry</a></li>
<li><a title="Ke$ha" href="/music/index?search=Ke%24ha" class="_trackLink" tracking="_frombox=home_artist_aumy">Ke$ha</a></li>
<li><a title="Lady GaGa" href="/music/index?search=Lady+GaGa" class="_trackLink" tracking="_frombox=home_artist_aumy">Lady GaGa</a></li>
<li><a title="Linkin Park" href="/music/index?search=Linkin+Park" class="_trackLink" tracking="_frombox=home_artist_aumy">Linkin Park</a></li>
<li><a title="One Direction" href="/music/index?search=One+Direction" class="_trackLink" tracking="_frombox=home_artist_aumy">One Direction</a></li>
<li><a title="Madonna" href="/music/index?search=Madonna" class="_trackLink" tracking="_frombox=home_artist_aumy">Madonna</a></li>
<li><a title="Maroon 5" href="/music/index?search=Maroon+5" class="_trackLink" tracking="_frombox=home_artist_aumy">Maroon 5</a></li>
<li><a title="Michael Jackson" href="/music/index?search=Michael+Jackson" class="_trackLink" tracking="_frombox=home_artist_aumy">Michael Jackson</a></li>
<li><a title="Modern Talking" href="/music/index?search=Modern+Talking" class="_trackLink" tracking="_frombox=home_artist_aumy">Modern Talking</a></li>
<li><a title="Miley Cyrus" href="/music/index?search=Miley+Cyrus" class="_trackLink" tracking="_frombox=home_artist_aumy">Miley Cyrus</a></li>
<li><a title="Mariah Carey" href="/music/index?search=Mariah+Carey" class="_trackLink" tracking="_frombox=home_artist_aumy">Mariah Carey</a></li>
<li><a title="Westlife" href="/music/index?search=Westlife" class="_trackLink" tracking="_frombox=home_artist_aumy">Westlife</a></li>
<li><a title="Rihanna" href="/music/index?search=Rihanna" class="_trackLink" tracking="_frombox=home_artist_aumy">Rihanna</a></li>
<li><a title="Shayne Ward" href="/music/index?search=Shayne+Ward" class="_trackLink" tracking="_frombox=home_artist_aumy">Shayne Ward</a></li>
<li><a title="Taylor Swift" href="/music/index?search=Taylor+Swift" class="_trackLink" tracking="_frombox=home_artist_aumy">Taylor Swift</a></li>
<li><a title="The Pussycat Dolls" href="/music/index?search=The+Pussycat+Dolls" class="_trackLink" tracking="_frombox=home_artist_aumy">The Pussycat Dolls</a></li>
<li><a title="The Wanted" href="/music/index?search=The+Wanted" class="_trackLink" tracking="_frombox=home_artist_aumy">The Wanted</a></li>
</ul>
</div>
<form id="frm_listen_music" method="post" action="/music/song/">
<input type="hidden" id="song_id" name="song_id"/>
<input type="hidden" id="paging_link" name="paging_link" value="0"/>
<input type="hidden" id="song_link" name="song_link"/>
<input type="hidden" id="song_name" name="song_name"/>
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>
</body>
</html>
