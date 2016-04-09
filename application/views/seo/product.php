<html>
<head>
	<title>Thư mục so sánh giá sản phẩm</title>
	<meta charset="UTF-8">
	<meta name='description' content='Thư mục so sánh giá sản phẩm'>
</head>
<body>

<a href="http://www.gbotvisit.com/p-1gbs-c45f0953ada164860dcfe895.html" alt="Google bot last visit powered by Gbotvisit" target="_blank"><img src="http://www.gbotvisit.com/services/gblv/gblv.php?s=c45f0953ada164860dcfe895" border="0" title="Google bot last visit powered by Gbotvisit" /></a><noscript><a href="http://www.gbotvisit.com"  alt="Google bot last visit powered by Gbotvisit">Google bot last visit powered by Gbotvisit</a></noscript>
<div style="clear:both"></div>
<?php foreach($seo as $key):?>
<?php
	if(preg_match('/websosanh.vn/',$key['link'])){
	  if(preg_match('/direct.htm/',$key['link'])){
		$path=str_replace('websosanh.vn','myweb.pro.vn/mua-hang-gia-re',$key['link']);  
	  }
	  if(preg_match('/so-sanh.htm/',$key['link'])){
		$path=str_replace('websosanh.vn','myweb.pro.vn/mua-ban-gia-re',$key['link']); 
		$path=str_replace('so-sanh.htm','',$path); 
		$path=$path.'/wssv';
	  }
	}
	
	if(preg_match('/timgiare.vn/',$key['link'])){
		  $path=str_replace('timgiare.vn/products','myweb.pro.vn/gia-re',$key['link']);
		  $path=str_replace('timgiare.vn/product','myweb.pro.vn/gia-re',$path);
		  $path=$path.'/referer';
	}
	if(preg_match('/compare.vn/',$key['link'])){
		$path=str_replace('compare.vn','myweb.pro.vn/so-sanh-gia',$key['link']);
		$path=$path.'/gia-re/comvn';
	}
	if(preg_match('/www.chongiadung.com/',$key['link'])){
		$path=str_replace('www.chongiadung.com','myweb.pro.vn/chon-gia-dung',$key['link']);
	}
?>
<a href='<?php echo $path;?>' data-id='<?=$key['id']?>'>
	<?=$key['name']?>
</a>
<?php endforeach;?>
</body>
</html>
