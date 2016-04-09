<html>
<head>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/enhanced.css" media="screen"/> 
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=outline">
	<link  rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/luanvannetvn/index.css"/>
	<script type="text/javascript" src="http://xahoihoctap.net.vn/js/luanvan.js"></script>
</head>
<body>
<table id="ebook_wrapper_table">					  			
<?php $condition = empty($ebook_data) || !is_array($ebook_data) ? 0 : count($ebook_data); ?>
<?php if ($condition) {
$loop = -1;
foreach ($ebook_data as $key) {                    
$loop++; ?>
<?php if ($loop && $loop % 4 == 0) { ?>
<tr>
<?php } ?>
<td style="cursor: pointer"  align="center" valign="top" width="<?php echo 100 / 4 ?>%">
<?php if ($key["THUMBS"]) { ?>
<a href="http://myweb.pro.vn/<? if($key['REFERER']=='tailieuhoctapvn') {echo 'doc-sach-tham-khao?id='.$key['ID'];} if($key['REFERER']=='luanvannetvn') {echo 'doc-luan-van?id='.$key['ID']; }?>" target="_new">
	<div class="ebook_div_item" id="ebook_div_item_<?= $key['ID'] ?>">                        
	<button id="ebook_item_<?= $key['ID'] ?>"  class="game_list btn btn-primary" >Đọc ngay</button>
	<img onerror="this.src='http://myweb.pro.vn/images/ebook/luanvan.png'" class="ebook_thumbs" src="<?=$key['THUMBS']?>" alt="<?=$key['NAME']?>"/>
	<div class="div_clear_both"></div>
	<span><?= $key['NAME'] ?></span>
	</div>
</a>
<?php } ?>
</td>
<?php }
} ?>
</tr>		
</table>      

<nav id="globalheader" class="globalheader-js svg globalheader-loaded">
      <div style="margin-top:10px;margin-left:5px"><?=$pagination?></div>
 </nav>

<input type='hidden' id='total_rows' value=' <?=$total_rows?>'/>

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
</div>


</body>
</html>



