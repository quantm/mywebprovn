<meta content="text/html" charset="UTF-8" http-equiv="Content-Type"/>
<script type="text/javascript" src="/js/mbook.js"></script> 
<link type="text/css" rel="stylesheet" media="all" href="/css/chat.css" /> 
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=outline">
<link  rel="stylesheet" type="text/css" href="/css/ebook.css"/>
<style>
.ebook_thumbs {
width:282px;
height:106px;
}
#ebook_wrapper_table {
margin-top:40px!important;
}
.adsense_header_ads {
width: 728px;
height: 90px;
position: absolute;
margin-left: 20%;
margin-top: -90px;
}

</style>

<!--start ads-->
<div class="adsense_header_ads">
</div>
<!--end add -->

<table id="ebook_wrapper_table">					  			
<!--
<ul class="breadcrumb">
<li class="active">
<a class="font-effect-outline" href="/ebook/">Tất cả Mbook <a/>
<span class="ebook_count">(<?=$count_all_ebook?>)</span>
</li>
<span class="divider">/</span>
<?php if($cate_name_top != ""): ?>
<li><a class="font-effect-outline"  id="sub_category" href="#" tabindex="-1"><?=$cate_name_top?></a></li>
<span class="divider">/</span>
<?php endif; ?>	
<li class="header_pagination"><?=$pagination?></li>
</ul>
-->
<body>
<?php $condition = empty($mbook) || !is_array($mbook) ? 0 : count($mbook); ?>
<?php if ($condition) {
$loop = -1;
foreach ($mbook as $key) {                    
$loop++; ?>
<?php if ($loop && $loop % 6 == 0) { ?>
<tr>
<?php } ?>
<td style="cursor: pointer"  align="center" valign="top" width="<?php echo 100 / 6	 ?>%">
<?php if ($key["thumbs"]) { ?>

<a href='<?=$key['link']?>'>
<div class="ebook_div_item" data-toggle="tooltip" data-placement="top" title="Click để mở Mbook">                        
<img class="ebook_thumbs" src="<?= $key['thumbs'] ?>" alt="<?= $key['name'] ?>">
<div class="div_clear_both"></div>
<!--<span><?= $key['name'] ?></span>-->
</div>
</a>
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
</div>
</body>



