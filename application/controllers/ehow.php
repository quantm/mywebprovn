<?php
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
class ehow extends CI_Controller
{		function mydb(){
		return $this->load->database('default',TRUE);
		}
		function lam_sao($path){
			echo '<title>Website đang nâng cấp</title>';
			echo '<meta charset="UTF-8"/>';
			echo '<style type="text/css">#ads_zone16604{margin-top:-600px;margin-left:-599px}</style>';
			echo '<h3>Website đang tạm thời nâng cấp. Bạn vui lòng trở lại sau để đọc nhiều bài hướng dẫn hữu ích nhé.</h3>';
			echo '<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_17760.ads"></script>';
			echo '<div style="margin-top:-600px;margin-left:598px;"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script></div>';
			echo '<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16604.ads"></script>';
		}
		
}
?>