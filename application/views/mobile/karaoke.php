<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<title>mã số karaoke bài hát <?=$content[0]['name']?>  - Mã số karaoke Arirang, Califonia - Phiên bản Mobile </title>
<meta name="keywords" content="phien ban mobile danh cho lumia 520,lumia x,lumia 525,dien thoai nokia,dien thoai samsung,dien thoai iphone">
<meta name="description" content="mã số karaoke bài hát <?=$content[0]['name']?> - Mã số karaoke VOL 55 mới được cập nhật. Tra cứu mã số karaoke nhanh chóng và chính xác, Karaoke Arirang 5 số, California 6 số. Mạng tìm kiếm số 1 Việt Nam">
<meta name="Generator" content="www.myweb.pro.vn - Copyright 2013 All rights reserved.">
<meta name="author" content="MYWEB.PRO.VN Search Engine">
<meta name="robots" content="index,follow">
<meta name="copyright" content="MYWEB.PRO.VN">

<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/mobile/main.css">
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/mobile/mobile_karaoke.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
$(document).on('mouseover','#ui-id-1 li',function(){
	$('#fsearch').val($(this).html())
})
//mobile autocomplete search
if(window.innerWidth <= 800 && window.innerHeight <= 640) {
		//ajax	
		$.ajax({
			content:'text/html',
			type:'get',
			dataType:'json',
			url:'/ajax/get_mobile_karaoke_autocomple',
			data:{},
			success:function(data){
			var arr_name=[]
				$.each(data.song_name,function(index,value){
					arr_name.push(value.name)
				})
				$( "#fsearch").autocomplete({
				source: arr_name,
				select:function(index,value){
					$('#frmSearch').submit()
				}
				});	
			}
		})
		//end ajax
}
//end mobile autocomplete search

window.onload=function(){
$("#fsearch").keypress(function(){
	//if statement
	if($(this).val().length=='4' || $(this).val().length=='7' || $(this).val().length=='10'){

		//ajax	
		$.ajax({
			content:'text/html',
			type:'get',
			dataType:'json',
			url:'/ajax/get_karaoke_autocomple',
			data:{
				song_name:$(this).val()
			},
			success:function(data){
			var arr_name=[]
				$.each(data.song_name,function(index,value){
					arr_name.push(value.name)
				})
				$( "#fsearch").autocomplete({
				source: arr_name,
				select:function(){
					$('#frmSearch').submit()
				}
				});	
			}
		})
		//end ajax
	}
	//end if
})
}
</script>
<link rel="shortcut icon" href="http://xahoihoctap.net.vn/images/icons/karaoke-icon-md.png" type="image/x-icon"/>
</head>
<body>

<body>

<div id="content_container">
<div id="header">
<div class="nav">
<ul>
<li>
<a href="javascript:void(0)" id="nav_show" class="main-menu-link icon-menu fn-nav-show"><img src="http://xahoihoctap.net.vn/images/mobile/more.png" alt="Xem thêm"></a></li>
<li><a href="http://myweb.pro.vn/mobile/karaoke">Trang Chủ</a></li>
<li><a href="javascript:void(0)" onclick="alert('Click biểu tượng ba dấu chấm góc phải màn hình điện thoại và chọn thêm vào màn hình chính')">Đánh dấu trang</a></li>
</ul>
</div>
</div>

<!--start:body-->
<div id="main_list"> 

<div id="content_list"> 
<form name="frmSearch" id="frmSearch" method="GET" action="http://myweb.pro.vn/mobile/karaoke"  accept-charset="UTF-8"
enctype="application/x-www-form-urlencoded" autocomplete="off>
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>">
<div id="group_search">
<input type="text" placeholder="Nhập tên bài hát, tác giả, lời mở đầu..." required id="fsearch" class="fsearch" name="search">
<div id="sub_Search">
<button type="submit" class="bSubsearch">Tìm</button>
</div>
</div>
</form>
</div>

<div id="resultSong" style="background:#FFF;">

<?php foreach($content as $key):?>
<div class="song">
<p class="songID"><?=$key['id_song']?></p>
<h1 class="songName" title="<?=$key['name']?>"><?=$key['name']?></h1>
<h2 class="SongLyric"><span><?=$key['description']?></span></h2>
<h3 class="author"><?=$key['singer']?></h3>
</div>
<?php endforeach;?>
<!--- Script ANTS - 300x250 --> 
<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
<div class="530052041" data-ants-zone-id="530052041"></div>
<!--- end ANTS Script -->

</div>

<ul class="breadcrumb" style="margin-top: 10px;width: 80%;margin-left:0px">
<li class="active footer_pagination"><?=$pagination?></li>
</ul>

</body>

<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-50476937-1', 'myweb.pro.vn');
ga('send', 'pageview');
</script>

</body>
</html>