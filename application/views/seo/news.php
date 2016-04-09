<html>
<head>
	<title>Thư mục tin tức</title>
	<meta charset="UTF-8">
	<meta name='description' content='Thư mục so sánh giá sản phẩm'>
</head>
<body>

<a href="http://www.gbotvisit.com/p-1gbs-c45f0953ada164860dcfe895.html" alt="Google bot last visit powered by Gbotvisit" target="_blank"><img src="http://www.gbotvisit.com/services/gblv/gblv.php?s=c45f0953ada164860dcfe895" border="0" title="Google bot last visit powered by Gbotvisit" /></a><noscript><a href="http://www.gbotvisit.com"  alt="Google bot last visit powered by Gbotvisit">Google bot last visit powered by Gbotvisit</a></noscript>
<div style="clear:both"></div>
<?php foreach($seo as $key):?>
<?php
	if(preg_match('/baomoisocom/',$key['referer'])){
		$path=str_replace('baomoiso.com','myweb.pro.vn/doc-bao-online',$key['link']);  
	}
	if(preg_match('/xembaomoicom/',$key['referer'])){
		$path=str_replace('xembaomoi.com','myweb.pro.vn/xem-bao-online',$key['link']);  
	}
	if(preg_match('/phunutodayvn/',$key['referer'])){
		$path=str_replace('phunutoday.vn','myweb.pro.vn/phu-nu-ngay-nay',$key['link']);  
	}
	if(preg_match('/emdepvn/',$key['referer'])){
		$path=str_replace('emdep.vn','myweb.pro.vn/em-tui-dep',$key['link']);  
	}
?>
<a href='<?php echo $path;?>' data-id='<?=$key['id']?>'>
	<?=$key['name']?>
</a>
<?php endforeach;?>
</body>
</html>
