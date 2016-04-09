<?php
include(dirname(__FILE__). "/../library.php");
include(dirname(__FILE__). "/../json.class.php");

$result = $db->_select("select * from gd_webfont where now() between expire_start and expire_end  order by font_no asc");
$ar_font=array();
foreach($result as $k=>$v) {
	$ar_size = explode(',',$v['use']);
	foreach($ar_size as $each_size) {
		$ar_font[]=array(
			'name'=>$v['font_name'].'('.$each_size.'pt)',
			'code'=>'web_'.$v['font_code'].'_'.sprintf('%02d',$each_size),	
		);
	}
}

echo gd_json_encode($ar_font);
?>