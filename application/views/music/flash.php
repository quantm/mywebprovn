<html>
<head>
<meta property="og:title" content="Trò chơi đánh đàn piano" />
<meta property="og:image" content="http://myweb.pro.vn/images/piano.png" />
<meta property="og:type" content="piano.typing" />
<meta property="og:description" content="Chơi piano bằng bàn phím máy tính" />
<link rel="canonical"  href="http://myweb.pro.vn/play/c15_178" />
<link  rel="stylesheet" type="text/css" href="/css/music.css"/> 
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />	
<script type="text/javascript" src="/js/jquery.js"></script>		
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/music.js"></script>		
<script type="text/javascript" src="/js/myvdict.js"></script>		
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- start social shared-->
<div class="social_shared">
<!-- start facebook share -->
<div class="fb-like" data-href="http://myweb.pro.vn/play/c15_178" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
<!-- end facebook shared -->
<?php require_once 'include/social_twitter_google_plus.php'?>
</div>
<!-- end social shared -->

<!-- begin ads left -->
<div class="music_ads_left">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ads_toefl_left -->
<ins class="adsbygoogle"
     style="display:inline-block;width:120px;height:400px"
     data-ad-client="ca-pub-1996742103012878"
     data-ad-slot="2609235889"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<!-- end ads left -->
<div class="fb_piano">
<iframe class="music_iframe_wrapper" frameborder="0"  src="<?=$embed_flash?>" width="<?=$w?>" height="<?=$h?>" ></iframe> 
<!-- start comment -->
<div id="comment" class="fb-comments" data-width="810px"  data-href="http://myweb.pro.vn/play/c15_178"  data-numposts="5" data-colorscheme="light"></div>
<!-- end comment -->
<div class="music_sheet_search">
<input type="text" id="txt_music_sheet-search" placeholder="Enter để tìm kiếm"/>
</div>
</div>
<div class="music_sheet">
<?php foreach($element_content as $key):?>
<div class="music_title" id="music_title_<?=$key['id']?>">
<p><?=$key['name_element']?></p>
<?php if($key['data_audio'] != null):?>
<video src="<?=$key['data_audio']?>" controls="" title="Nghe (nhạc không lời)" data-toggle="tooltip" data-placement="left"  class="html5_video"></video>
<?php endif;?>	
<?php if($key['data_audio'] == null):?>
<?php if($key['data_lyric'] != null):?><video src="<?=$key['data_lyric']?>" controls="" title="Nghe (nhạc có lời)" data-toggle="tooltip" data-placement="left"  class="html5_video"></video><?php endif;?>	
<?php endif;?>	
<?php if($key['data_lyric'] != ''):?>
<input type="hidden" value="<?=$key['data_lyric']?>"/>
<?php endif;?>	
<div class="music_key">
<? if($key['content'] != ''):?><?=$key['content']?><?php endif;?>
<? if($key['content'] == ''):?><?=$key['lyric']?><?php endif;?>

<?php if($key['data_lyric'] != null):?>
<video src="<?=$key['data_lyric']?>" controls="" title="Nghe (nhạc có lời)" data-toggle="tooltip" data-placement="left"  class="html5_video_lyric"></video>
<?php endif;?>
<div  id="music_lyric_<?=$key['id']?>" class="music_lyric">																				
<?=$key['lyric']?>						
</div>
</div>
<a class="click_to_view_lyric" data-toggle="tooltip" data-placement="right" title="<?=$key['name_element']?>"><span><?php if($key['lyric'] != ''):?><?php echo "Click để xem lời bài hát" ?><?php endif;?></span></a>
</div>
<hr>
<?php endforeach;?>
</div>

<div class="music_header_text"></div>
<div class="modal hide fade" id="if_do_dict_query">
<div class="modal-header"></div>
<div class="modal-body">
Bạn có muốn dùng chức năng tra từ điển không ?
</div>
<div class="modal-footer"></div>
</div>
</body>
</html>