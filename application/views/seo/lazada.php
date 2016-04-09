<html>
<head>
	<title>Thư mục liên kết tiếp thị lazada.vn</title>
	<meta charset="UTF-8">
	<meta name='description' content='Thư mục so sánh giá sản phẩm'>
</head>
<body>
<?php foreach($seo as $key):?>
<? $path=str_replace('http://ho.lazada.vn/SHAfyw?url=','',$key['URL']);
    $path=str_replace('http://ho.lazada.vn/SHAfyq?url=','',$path);
    $path=str_replace('http://ho.lazada.vn/SHAh0S?url=','',$path);
	$path=str_replace('http%3A%2F%2Fwww.lazada.vn','',$path);
	$path=urldecode($path);
	$path=str_replace('?offer_id={offer_id}&affiliate_id={affiliate_id}&offer_name={offer_name}_{offer_file_id}&affiliate_name={affiliate_name}&transaction_id={transaction_id}','',$path);
?>
<a href='http://www.myweb.pro.vn/mua-ban-online<?=$path?>' data-id="<?=$key['id']?>">
	<?=$key['product_name']?>
</a>
<?php endforeach;?>
</body>
</html>


