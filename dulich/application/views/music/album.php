<html>
 <head>
<!-- start meta -->
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta property="og:title" content="" />
<meta property="og:image" content="http://myweb.pro.vn/images/video/ctdlgt.png" />
<meta property="og:type" content="music.playlist" />
<meta property="og:description" content="" />
<!-- end meta  -->
<link rel="stylesheet" type="text/css" href="/css/music/my.css"/>	
 <script type="text/javascript">
 var content='';
 $(document).ready(function(){
		//begin ajax
		$.ajax({
		type:'get',
		url:'<?=$url?>',
		success:function(e){
				content=e.replace('href','data-href')
				content=e.replace('mp3.zing.vn','myweb.pro.vn')
				$('.view_album_song').append(content)
				//http://image.mp3.zdn.vn/thumb/240_240/images/avatar_default.jpg
				$(".singer-image a img").attr('src','/images/avatar-hat-240.png')			
			}
		})
		//end ajax
	$(".single-play").removeAttr('href')
	$("#_lyricContainer,.box-social").empty()
 })
.on('mousemove','body',function(){
		$('.top-wrap,.footer,meta,script,.fixed-function,.mobile-download,.music-buy').remove()
		$(".single-play").removeAttr('href')
		$("#_lyricContainer,.box-social").empty()
})
.on('mouseover','.playlist ._strCut',function(){
	$("#paging_link").val($(this).attr('href'))
	$(this).attr('href','#')
})
.on('click','.playlist ._strCut',function(){
	var check_is_submit = $(this).attr('rel');
	if(check_is_submit =='undefined')
	{
		$("#frm_listen_music").attr('action','/music/index/');
		$("#frm_listen_music").submit();
	}
})
.on('click','.single-play',function(){
	$("#album_htm5_video source").attr('src',$('#_plItem'+$(this).attr('id').replace('_itemDetail','')+' .music-function .music-download').attr('href'))
	$("#album_htm5_video").load()
})
 </script>
 </head>

 <body>
<div class="view_album_song">
<!--start ads -->
<div class="album_left_ads">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- tefl_toc_bottom -->
<ins class="adsbygoogle"
style="display:inline-block;width:300px;height:250px;margin-top:15px"
data-ad-client="ca-pub-1996742103012878"
data-ad-slot="4573980284"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<!-- end ads -->
	<div class="html_5_player_wrapper" style="margin-top: 26.5%;">
	<video id="album_htm5_video" loop controls autoplay name="media">
		<source src="<?=$song_link?>" type="audio/mpeg">
	</video>
	</div>
</div>
<form id="frm_listen_music" method="post">
<input type="hidden" id="song_id" name="song_id"/>
<input type="hidden" id="paging_link" name="paging_link" value="0"/>
<input type="hidden" id="song_link" name="song_link"/>
<input type="hidden" id="song_name" name="song_name"/>
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>
 </body>
</html>
