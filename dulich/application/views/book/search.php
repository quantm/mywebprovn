<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
</head>
<body>	
<div id="ja-content-main" class="ja-content-main clearfix">
<div class="blog">
<?php foreach($search_data as $key):?>  
<div class="items-row cols-1 row-0 clearfix">
<div class="border-bottom-blog item column-1">
<div class="contentpaneopen">
<h3 class="contentheading">
	<span web_referer="<?=$key['REFERER']?>" title="<?php echo $key['NAME'];?>" href="<?php echo $key['path'];?>">
	<?php echo $key['NAME'];?>
	<span href="#"></span>
	</span>
</h3>
<div class="article-tools clearfix">

</div>

<span href=""<?php echo $key['path'];?>">
<div class="khung_hinh khung_hinh_nho khung_hinh_blog">
	<a href="/book/detail?id=<?php echo $key['ID'];?>" title="<?php echo $key['NAME'];?>" ><img title="<?php echo $key['NAME'];?>" src="<?php echo $key['THUMBS'];?>" width="120" height="160" alt="<?php echo $key['NAME'];?>"></a></div>
	<div class="intro ">
	<h4><?php echo $key['DESCRIPTION'];?><br></h4>
</div>
<div class="item-separator"></div>
<div style="float: right; margin-right: 10px;">
<a title="<?php echo $key['NAME'];?>" style="margin-top: -30px;font-size: 13px!important;font-weight:bold;"class="readon btn btn-inverse blog-chitiet" href="/book/detail?id=<?php echo $key['ID'];?>"> Xem chi tiết ...</a>
</div> 
</span>
</div>
</div>
</div>
<?php endforeach;?>
</div>
</div>
</body>
</html>
