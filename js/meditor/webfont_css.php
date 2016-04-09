<?php
include(dirname(__FILE__). "/../library.php");

$result = $db->_select("select * from gd_webfont where now() between expire_start and expire_end  order by font_no asc");
$ar_font=array();
foreach($result as $k=>$v) {
	$ar_size = explode(',',$v['use']);
	foreach($ar_size as $each_size) {
		$ar_font[]=array(
			'size'=>$each_size,
			'code'=>$v['font_code'].'_'.sprintf('%02d',$each_size),	
		);
	}
}
?>
<? foreach($ar_font as $v): ?>
@font-face {
	font-family: <?=$v['code']?>;
	font-style:  normal;
	font-weight: normal;
	src: url(../../proc/fonteot.php?name=<?=$v['code']?>);
}
.<?=$v['code']?> {font-family:<?=$v['code']?> !important;font-size:<?=$v['size']?>pt !important}
<? endforeach; ?>