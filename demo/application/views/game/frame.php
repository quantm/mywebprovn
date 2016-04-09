<style>
	.game_item_wrapper {
	margin-top: 25px !important;
	position:absolute !important;
	}
	.game_ads_right {
		position:fixed;
	}
	.game_item_wrapper iframe {

	}
	.game_ads_left {
	margin-left: 88%;
	margin-top: 40px;
	position: absolute;
	}
	#globalheader {
		width:99.8% !important;
		margin-left:1px;
	}
</style>
<link  rel="stylesheet" type="text/css" href="/css/game/game_item.css"/>
<!-- start ads left -->
<div class="game_ads_left">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ebook_index_left -->
<ins class="adsbygoogle"
     style="display:inline-block;width:120px;height:600px"
     data-ad-client="ca-pub-1996742103012878"
     data-ad-slot="5784968680"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<!-- end ads left -->

<script type="text/javascript">
$(document).ready(function(){
	$("#globalheader").attr('style','margin-top: 0% !important;')
	$("#globalnav")
	.attr('style','margin-left: 15% !important;')	
	.append('<li><span class="footer_span"><a target="_new" href="/guide/game_unity">Hướng dẫn cài Unity Web Player</a></span></li>')
})
</script>

<div class="game_item_wrapper">
<iframe height="<?=$h?>" width="<?=$w?>" src="<?=$src?>" scrolling="no" frameborder="0" allowtransparency="true"></iframe>

<?$this->load->view('footer')?>
</div>