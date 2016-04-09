<html>
<head>
	<title>Thư mục tài liệu</title>
	<meta charset="UTF-8">
	<meta name='description' content='Chỉ mục tài liệu'>
</head>
<body>
<?php foreach($elib as	$key):?>
<?
$path=str_replace('luanvan.net.vn','myweb.pro.vn',$key['path']);
$path=str_replace('luanvan365.com/','myweb.pro.vn',$path);
$path=str_replace('doan.edu.vn','myweb.pro.vn',$path);
$path=str_replace('doc.edu.vn','myweb.pro.vn',$path);
$path=str_replace('zbook.vn','myweb.pro.vn',$path);
$path=str_replace('timtailieu.vn','myweb.pro.vn',$path);
$path=str_replace('ebook.net.vn','myweb.pro.vn',$path);
$path=str_replace('thuviengiaoan.vn','myweb.pro.vn',$path);
$path=str_replace('giaoan.com.vn','myweb.pro.vn',$path);
$path=str_replace('thuvientailieu.vn','myweb.pro.vn',$path);
?>
<a title="<?=$key['ID']?>" target="_new" href="<?php echo $path; ?>">
	<?=$key['NAME']?>
</a>	
<?php endforeach;?>
</body>
</html>
