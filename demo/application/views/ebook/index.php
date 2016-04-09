<?php
ini_set( "display_errors", 0); 
session_start();
$_SESSION['username'] ="012quantm"; // Must be already set
?>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery-chat.js"></script>
<script type="text/javascript" src="/js/chat.js"></script> 
<link type="text/css" rel="stylesheet" media="all" href="/css/chat.css" /> 
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=outline">
<link  rel="stylesheet" type="text/css" href="/css/ebook.css"/>
<script type="text/javascript"  src="/js/ebook.js"></script>
<table id="ebook_wrapper_table">					  			
<ul class="breadcrumb">
	<li class="active">
	<a class="font-effect-outline" href="/ebook/">Tất cả ebook <a/>
	<span class="ebook_count">(<?=$count_all_ebook?>)</span>
	</li>
	<span class="divider">/</span>
	<?php if($cate_name_top != ""): ?>
	<li><a class="font-effect-outline"  id="sub_category" href="#" tabindex="-1"><?=$cate_name_top?></a></li>
	<span class="divider">/</span>
	<?php endif; ?>	
	<li class="header_pagination"><?=$pagination?></li>
</ul>
<?php $condition = empty($ebook_data) || !is_array($ebook_data) ? 0 : count($ebook_data); ?>
<?php if ($condition) {
$loop = -1;
foreach ($ebook_data as $key) {                    
$loop++; ?>
<?php if ($loop && $loop % 7 == 0) { ?>
<tr>
<?php } ?>
<td style="cursor: pointer"  align="center" valign="top" width="<?php echo 100 / 7 ?>%">
<?php if ($key["THUMBS"]) { ?>
<div class="ebook_div_item" id="ebook_div_item_<?= $key['ID'] ?>">                          
<img class="ebook_thumbs" src="<?= $key['THUMBS'] ?>" >
<div class="div_clear_both"></div>
<span><?= $key['NAME'] ?></span>
<button id="ebook_item_<?= $key['ID'] ?>"  data-href="<?= $key['path'] ?>"  data-embed="<?=$key['path']?>" data-toggle="modal"  href="#ebook_body" data-name="<?= $key['NAME'] ?>" class="game_list btn btn-primary" >Đọc ngay</button>
</div>
<?php } ?>
</td>
<?php }
} ?>
</tr>		
</table>                    

<div class="modal hide fade" id="ebook_body">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button> 
	<span id="add_to_my_library">
		   <button type="button" class="btn btn-primary">Thêm vào Thư viện của tôi</button>	
	</span>

	<span id="invite_friend_to_read">
		   <button type="button" class="btn btn-primary">Mời bạn</button>
	</span>
	<span id="ebook_title"></span>
</div>
<div class="modal-body">
	<iframe id="iframe_ebook" src="" frameborder="0"></iframe>
</div>
<div class="adsense_while_reading">
</div>	
</div>




