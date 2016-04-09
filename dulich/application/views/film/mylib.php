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
<table id="ebook_wrapper_table" style="margin-top: -25px !important;">					  			
<ul class="breadcrumb">
	<li class="active">
	<a class="font-effect-outline" href="/ebook/">Tất cả phim <a/>
	<span class="ebook_count"></span>
	</li>
	<span class="divider">/</span>
	<li><a class="font-effect-outline"  id="sub_category" href="#" tabindex="-1"></a></li>
	<span class="divider">/</span>
	<li class="header_pagination"></li>
</ul>
<?php $condition = empty($myvid) || !is_array($myvid) ? 0 : count($myvid); ?>
<?php if ($condition) {
$loop = -1;
foreach ($myvid as $key) {                    
$loop++; ?>
<?php if ($loop && $loop % 7 == 0) { ?>
<tr>
<?php } ?>
<td style="cursor: pointer"  align="center" valign="top" width="<?php echo 100 / 7 ?>%">
<?php if ($key["thumb"]) { ?>
<div class="ebook_div_item" id="ebook_div_item_<?= $key['id'] ?>">                          
<img class="ebook_thumbs" src="<?= $key['thumb'] ?>" >
<div class="div_clear_both"></div>
<span><?= $key['name'] ?></span>
<a href="http://myweb.pro.vn/video/view?id=<?= $key['id'] ?>" target="_new"><button id="ebook_item_<?= $key['id'] ?>"  data-href="http://myweb.pro.vn/video/view?id=<?= $key['id'] ?>" data-name="<?= $key['name'] ?>" class="game_list btn btn-primary" >Xem ngay</button></a>
</div>
<?php } ?>
</td>
<?php }
} ?>
</tr>		
</table>          

 </body>
</html>
