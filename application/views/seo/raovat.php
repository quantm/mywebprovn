<html>
<head>
	<title>Thư mục rao vặt</title>
	<meta charset="UTF-8">
	<meta name='description' content='Thư mục so sánh giá sản phẩm'>
</head>
<body>

<a href="http://www.gbotvisit.com/p-1gbs-c45f0953ada164860dcfe895.html" alt="Google bot last visit powered by Gbotvisit" target="_blank"><img src="http://www.gbotvisit.com/services/gblv/gblv.php?s=c45f0953ada164860dcfe895" border="0" title="Google bot last visit powered by Gbotvisit" /></a><noscript><a href="http://www.gbotvisit.com"  alt="Google bot last visit powered by Gbotvisit">Google bot last visit powered by Gbotvisit</a></noscript>
<div style="clear:both"></div>
<?php foreach($seo as $key):?>
<?php	
		$path=str_replace('www.chotot.vn','myweb.pro.vn/rao-vat-online',$key['link'])
		//$path=str_replace('tructiep.vn','myweb.pro.vn/rao-vat-tructiep',$key['link']);
		//$path=str_replace('totdoi.vn','myweb.pro.vn/rao-vat-mua-ban',$key['link']);
		//$path=str_replace('raovat.vn','myweb.pro.vn/viet-nam-rao-vat',$key['link']);
?>
<a href='<?php echo $path;?>' data-id='<?=$key['id']?>'>
	<?=$key['name']?>
</a>
<?php endforeach;?>
</body>
</html>
