<meta charset="UTF-8"/>
<title>Chỉ mục đọc truyện</title>
<?php foreach($content as $key):?>
<?
$path=str_replace('truyendich.com','myweb.pro.vn/xem-truyen-online?fetchItem=',$key['path']);
$path=str_replace('webtruyen.com','myweb.pro.vn/xem-truyen-online?referer=webtruyencom&fetchItem=',$path);
$path=str_replace('www.doctruyen360.com','myweb.pro.vn/xem-truyen-online?fetchItem=',$path);
$path=str_replace('truyen.vui1.net','myweb.pro.vn/xem-truyen-online?fetchItem=',$path);
$path=str_replace('vnexpress.net','myweb.pro.vn/xem-truyen-online?referer=vnexpressnet&fetchItem=',$path);
$path=str_replace('ohay.tv','myweb.pro.vn/hay-hai-hot?referer=ohaytv&fetchItem=',$path);
?>
<a title="<?=$key['id']?>" href="<?=$path?>"><?=$key['name']?></a>
<?php endforeach;?>