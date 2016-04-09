<?php class company extends CI_Controller{
	function info($path){		
		$path_element=split('-',$path);
		$path_last_element=str_replace('htm','.htm',end($path_element));
		$path=str_replace(end($path_element),$path_last_element,$path);
		$url='http://www.hosocongty.vn/'.$path;
		$data['content']=$this->filter_template($url);
		$this->load->view('company/hosocongtyvn',$data);
	}
	function detail($path){
		$url='http://www.hosocongty.vn/'.$path;
		$data['content']=$this->filter_template($url);
		$this->load->view('company/hosocongtyvn',$data);
	}
	function filter_template($url){
		$content=file_get_contents($url);

		if($content){} else {
			echo '<title>Website đang nâng cấp</title>';
			echo '<meta charset="UTF-8"/>';
			echo '<style type="text/css">#ads_zone16604{margin-top:-600px;margin-left:-599px}</style>';
			echo '<h3>Website đang tạm thời nâng cấp. Bạn vui lòng trở lại sau để đọc tìm thông tin công ty.</h3>';
			echo '<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_17760.ads"></script>';
			echo '<div style="margin-top:-600px;margin-left:598px;"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script></div>';
			echo '<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16604.ads"></script>';
			exit();
		}

		$content=str_replace('UA-50410523-18','',$content);
		
		//reset advertisement
		$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','',$content);
		$content=str_replace('<!-- HoSoCongTy.336x280 -->','',$content);
		$content=str_replace('<!-- MyFont300x250 -->','',$content);
		$content=str_replace('<div class="box_com">','<div class="box_com"><h3>Công ty này chưa có chi nhánh nào</h3><script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_17691.ads"></script>',$content);
		//end
		
		//reset javascript
		$content=str_replace('<a href="http://www.hosocongty.vn" target="_blank">Hồ Sơ Công Ty</a>','<a href="http://www.myweb.pro.vn" target="_blank">Kênh thông tin tổng hợp</a>',$content);
		$content=str_replace('<a href=".','<a href="http://www.myweb.pro.vn/thong-tin-cong-ty',$content);
		//end

		//reset html
		$content=str_replace('<form method="get" action="search.php">','<form method="get" action="http://myweb.pro.vn/tim-kiem-cong-ty">',$content);
		$content=str_replace('http://www.hosocongty.vn/uploads/background/fieldsunrise-wallpaper-1920x1080.jpg','',$content);
		$content=str_replace('Mobile Version','',$content);
		$content=str_replace(', Phiên bản thử nghiệm','Phiên bản thử nghiệm',$content);
		$content=str_replace('nevicom.ico','http://xahoihoctap.net.vn/images/favicon.ico',$content);
		$content=str_replace('002458992370649418142:8_7ylfcusyq','partner-pub-1996742103012878:4800332684',$content);
		//end

		return $content;
	}
	function paging(){
	$url='http://www.hosocongty.vn/search.php?_cookie='.$_REQUETS['_cookie'].'key='.$_REQUETS['key'].'ot='.$_REQUETS['ot'].'p='.$_REQUETS['p'].'curpage='.$_REQUETS['curpage'].'last_id='.$_REQUETS['curpage'];
	echo $url;
	die();
	}	
	function search(){
		$url='http://www.hosocongty.vn/search.php?key='.$_REQUEST['key'].'&'.'ot='.$_REQUEST['ot'].'&p='.$_REQUEST['p'];
		$data['content']=$this->filter_template($url);
		$this->load->view('company/hosocongtyvn',$data);
	}
}
?>