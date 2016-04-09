<?php class raovat extends CI_Controller{
		function index(){
			$this->chotot('tp-ho-chi-minh','mua-ban','#');
		}
		function totdoi(){
			$raovat_db=$this->load->database('admin_raovatnhanh',TRUE);
			$r=$raovat_db->select('*')->from('rao_vat')->limit(5)->get()->result_array();
			$content=file_get_contents('http://www.totdoi.vn/raovat/can-ban-suat-noi-bo-can-ho-hung-phat-2-silver-star-78m-gia-1695-ty-131286.html');
			$content=str_replace('/data/Flash/logo.png','',$content);
			$content=str_replace('UA-46119999-6','',$content);
			$content=str_replace('/public/template/images/favication.png','http://raovatnhanh.net.co/images/icon/raovat.png',$content);
			
			//render view
			if(isset($_REQUEST['view_phone'])){$data['view_phone']='1';}
			if(!isset($_REQUEST['view_phone'])){$data['view_phone']='0';}
			$data['content']=$content;
			$this->load->view('raovat/totdoi',$data);
		}

		function chotot($path_element_1,$path_element_2,$path_element_3){
			$url='http://www.chotot.vn/'.$path_element_1.'/'.$path_element_2.'/'.$path_element_3;
			$content=file_get_contents($url);
			$content=str_replace('GTM-NJQRRH','',$content);
			$content=str_replace('chotot.vn</a>','Trang chủ</a>',$content);
			$content=str_replace('//static.chotot.com.vn/img/favicon.ico?15014','http://raovatnhanh.net.co/images/icon/raovat.png',$content);
			$content=str_replace('//static.chotot.com.vn/img/favicon_vn.png?15014','http://raovatnhanh.net.co/images/icon/raovat.png',$content);
			$content=str_replace('/img/transparent.gif','http://raovatnhanh.net.co/images/header/raovat_header_banner.png',$content);
			$content=str_replace('www.chotot.vn','myweb.pro.vn/rao-vat-online',$content);
			$content=str_replace('<div id="menu-container">','<div id="menu-container"><script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script><div class="534383851" data-ants-zone-id="534383851"></div>',$content);

			//render view
			if(isset($_REQUEST['view_phone'])){$data['view_phone']='1';}
			if(!isset($_REQUEST['view_phone'])){$data['view_phone']='0';}
			$data['content']=$content;
			$this->load->view('raovat/chotot',$data);
		}

		function raovatvn($path_element_1,$path_element_2){
			if($path_element_2=='xem-tin'){$url='http://www.raovat.vn/'.$path_element_1;}
			if($path_element_2!='xem-tin'){$url='http://www.raovat.vn/'.$path_element_1.'/'.$path_element_2;}
			if(isset($_REQUEST['city_id'])){$url='http://www.raovat.vn/?'.$path_element_1;}

			$content=file_get_contents($url);
			$content=str_replace('UA-709626-1','',$content);
			$content=str_replace('<title>RaoVat.VN</title>','<title>Chợ rao vặt online</title>',$content);
			$content=str_replace('https://www.facebook.com/raovatdotvn/','https://www.facebook.com/elearningsocialvn/?ref=hl',$content);

			//reset ads
			$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js',$content);
			$content=str_replace('//pagead2.googlesyndication.com/pagead/show_ads.js','//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js',$content);
			$content=str_replace('chotot.vn</a>','Trang chủ</a>',$content);
			$content=str_replace('http://www.raovat.vn/style/images/logo.jpg','http://raovatnhanh.net.co/images/header/raovat_header_banner.png',$content);
			$content=str_replace('<div id="menu-container">','<div id="menu-container"><script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script><div class="534383851" data-ants-zone-id="534383851"></div>',$content);

			//render view
			if(isset($_REQUEST['view_phone'])){$data['view_phone']='1';}
			if(!isset($_REQUEST['view_phone'])){$data['view_phone']='0';}
			$data['content']=$content;
			$this->load->view('raovat/raovatvn',$data);
		}

		function tructiepvn($path_element_1,$path_element_2){
			$url='http://www.tructiep.vn/'.$path_element_1.'/'.$path_element_2;
			if($path_element_2=='tinh-thanh'){$url='http://www.tructiep.vn/'.$path_element_1;}
			$content=file_get_contents($url);
			$content=str_replace('<div class="538043101" data-ants-zone-id="538043101">','<div class="538043101" data-ants-zone-id="538043101">',$content);
			$content=str_replace('/ico.ico','http://raovatnhanh.net.co/images/icon/raovat.png',$content);
			$content=str_replace('/website/images/logo_tructiep_4.png','http://raovatnhanh.net.co/images/header/raovat_header_banner.png',$content);
			$data['content']=$content;
			$this->load->view('raovat/tructiepvn',$data);
		}
}?>