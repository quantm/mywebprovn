<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <head>
 <link rel="stylesheet" href="/css/tailieuhoctap/my.css" type="text/css">
 <link  rel="stylesheet" type="text/css" href="/css/ebook.css"/>
 <style>
#ebook_wrapper_table{
background:url('/images/background/mylib_giasach.png');
height: 800px !important;
width: 1075px !important;
margin-top: 318px!important;
position: absolute;
}
.admintable tr {
height:auto !important;
}
 </style>
 <script type="text/javascript"  src="/js/tailieuhoctap/mylib.js"></script>
 </head>

 <body>
<table id="ebook_wrapper_table">					  			
<ul class="breadcrumb">
	<li class="active">
	<a class="font-effect-outline" href="/ebook/">Tất cả tài liệu <a/>
	<span class="ebook_count"></span>
	</li>
	<span class="divider">/</span>
	<li><a class="font-effect-outline"  id="sub_category" href="#" tabindex="-1"></a></li>
	<span class="divider">/</span>
	<li class="header_pagination"></li>
</ul>
<?php $condition = empty($mylib) || !is_array($mylib) ? 0 : count($mylib); ?>
<?php if ($condition) {
$loop = -1;
foreach ($mylib as $key) {                    
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
<a href="<?if($key['REFERER']!="mbook") echo 'http://myweb.pro.vn/book/detail?id='.$key['ID'];if($key['REFERER']=="mbook") echo 'http://myweb.pro.vn/mbook?id='.$key['ID']?>" target="_new"><button id="ebook_item_<?= $key['ID'] ?>"  data-href="http://myweb.pro.vn/book/detail?id=<?= $key['ID'] ?>" data-name="<?= $key['NAME'] ?>" class="game_list btn btn-primary" >Đọc ngay</button></a>
</div>
<?php } ?>
</td>
<?php }
} ?>
</tr>		
</table>          

 </body>
</html>
