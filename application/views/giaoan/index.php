<html>
<head>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/enhanced.css" media="screen"/> 
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=outline">
	<link  rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/luanvannetvn/index.css"/>
	<script type="text/javascript" src="http://xahoihoctap.net.vn/js/giaoan.js"></script>
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
<?php if ($key["thumb"]) { ?>
<a href="/tham-khao-giao-an?id=<?=$key['id']?>">
	<div class="ebook_div_item" id="ebook_div_item_<?= $key['id'] ?>">                          
	<button id="ebook_item_<?= $key['id'] ?>"  class="game_list btn btn-primary" >Đọc ngay</button>
	<img class="ebook_thumbs" src="<?=$key['thumb']?>" alt="<?=$key['name']?>" onerror="this.src='/images/icons/doc.png'"/>
	<div class="div_clear_both"></div>
	<span><?= $key['name'] ?></span>
	</div>
</a>
<?php } ?>
</td>
<?php }
} ?>
</tr>		
</table>         

<!--
<div class='adv_ants_left'>
<div class="ads_box_17677" id="ads_box_17677">
	<script type="text/javascript" src="http://e.eclick.vn/delivery/zone/2568.js"></script>
</div>
</div>
-->
<nav id="globalheader" class="globalheader-js svg globalheader-loaded">
      <div style="margin-top:10px;margin-left:5px"><?=$pagination?></div>
 </nav>

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

<input type='hidden' id='total_rows' value=' <?=$total_rows?>'>

</body>
</html>



