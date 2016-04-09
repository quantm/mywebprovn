<?php
class marketing_consumer extends CI_Controller{
	//start function tttd
	function tttd($path_element_1,$path_element_2,$referer){
		if($referer){}else{redirect('http://myweb.pro.vn/tiep-thi-tieu-dung/tttdheadermenu/home/1');}
		switch($referer){
			//tttd.vn
			case '1':
			if($path_element_1=='tttdheadermenu'){
				if($path_element_2=='home'){
				$url='http://tttd.vn/';
				}
				else {
					$url='http://tttd.vn/'.'/'.$path_element_2;
				}
			}
			else {
				$url='http://tttd.vn/'.$path_element_1.'/'.$path_element_2;
			}
			
			$data['content']=$this->filter_template($url);
			$this->load->view('tiep_thi_tieu_dung/tttdvn',$data);
			break;
		}

	} 
	//end function tttd
	

	function search($keyword)
	{
		$url='http://tttd.vn/tu-khoa-tim-kiem/'.$keyword;
		$data['content']=$this->filter_template($url);
		$this->load->view('tiep_thi_tieu_dung/tttdvn',$data);
	}
	//start function filter_template
	function filter_template($url){
		$content=file_get_contents($url);
			
			//break google analytic
			$content=str_replace('UA-44233731-1','',$content);
			$content=str_replace(" ga('create', '', 'tttd.vn')","",$content);
			//end

			//bóc tách html
			$content=str_replace('http://tttd.vn//favicon.ico','http://xahoihoctap.net.vn/images/favicon.ico',$content);
			$content=str_replace('http://tttd.vn//favicon.ico','http://xahoihoctap.net.vn/images/favicon.ico',$content);
			$content=str_replace('http://tttd.vn/tu-khoa-tim-kiem','http://myweb.pro.vn/marketing_consumer/search',$content);
			$content=str_replace('http://tttd.vn/images/logos/logo.png','http://xahoihoctap.net.vn/images/header/tttd.png',$content);
			//kết thúc

			//reset link
			$content=str_replace('data-href="http://tttd.vn/','data-href="http://myweb.pro.vn/tiep-thi-tieu-dung/',$content);
			//end

			//reset adv
			$str_right='<div class="block_banners banners_1 blocks_banner blocks1 block" id="block_id_481">';
			$str_right_ad=$str_right.'<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>';
			$content=str_replace($str_right,$str_right_ad,$content);
			$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','',$content);
			$content=str_replace('//admicro1.vcmedia.vn/ads_codes/ads_box_16448.ads','//admicro1.vcmedia.vn/ads_codes/ads_box_16637.ads',$content);
			$content=str_replace('//admicro1.vcmedia.vn/ads_codes/ads_box_16460.ads','//admicro1.vcmedia.vn/ads_codes/ads_box_17760.ads',$content);
			$content=str_replace('http://static.novanet.vn/embed.js','//e-vcdn.anthill.vn/delivery-ants/zone/517324837.js',$content);
			$content=str_replace('http://e.eclick.vn/delivery/zone/2521.js','//e-vcdn.anthill.vn/delivery-ants/zone/522972114.js',$content);//300x250
			$content=str_replace('http://e.eclick.vn/delivery/zone/2522.js','//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js',$content);//300x385
			$content=str_replace('http://e.eclick.vn/delivery/zone/2524.js','//admicro1.vcmedia.vn/ads_codes/ads_box_16577.ads',$content);//300x250
			$adv_300x385='<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>';
			$content=str_replace('<!--Ad360.vn-ad-6607-300-250-start -->',$adv_300x385,$content);//300x385
			$content=str_replace('ads_box_16418','ads_box_16573',$content);//300x385
			$adv_336x280='<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324875.js"></script>';
			$content=str_replace('<!--Ad360.vn-ad-6732-530-100-start -->',$adv_336x280,$content);//bottom adv
			$content=str_replace('<!-- 3td 300x250 -->','<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324859.js"></script>',$content);//header adv
			$content=str_replace('//pagead2.googlesyndication.com/pagead/show_ads.js','//e-vcdn.anthill.vn/delivery-ants/zone/517324859.js',$content);//header adv
			//end

			return $content;
	}
	//end function filter_template
}
?>