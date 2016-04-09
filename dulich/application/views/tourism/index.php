<html>
<head>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="/css/enhanced.css" media="screen"/> 
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=outline">
	<link  rel="stylesheet" type="text/css" href="/css/luanvannetvn/index.css"/>
	<script type="text/javascript"  src="/js/luanvan.js"></script>
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
<a href="http://myweb.pro.vn/luanvan/detail?id=<?=$key['ID']?>">
	<div class="ebook_div_item" id="ebook_div_item_<?= $key['ID'] ?>">                          
	<img class="ebook_thumbs" src="<? $file = file_get_contents($key['THUMBS'] , true);
		preg_match('/404 - File or directory not found/',$file, $matches, PREG_OFFSET_CAPTURE);
		if($matches){
			echo "http://myweb.pro.vn/images/ebook/luanvan.png";
		}
		else {
			echo $key['THUMBS'];
	}?>" alt="<?=$key['NAME']?>"/>
	<div class="div_clear_both"></div>
	<span><?= $key['NAME'] ?></span>
	<button id="ebook_item_<?= $key['ID'] ?>"  class="game_list btn btn-primary" >Đọc ngay</button>
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

<form style="display:none" action="http://myweb.pro.vn/book/cse/" class="frm_cse-search-box">
<div>
<input type="hidden" name="cx" value="partner-pub-1996742103012878:3476546681" />
<input type="hidden" name="cof" value="FORID:10" />
<input type="hidden" name="ie" value="UTF-8" />
<input type="text" style="width:325px;margin-left:45px;background:#FFFFFF url(http://www.google.com/cse/intl/en/images/google_custom_search_watermark.gif) right no-repeat" name="q" size="115" placeholder="Enter để tìm kiếm..." />
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</div>
</form>

</body>
</html>



