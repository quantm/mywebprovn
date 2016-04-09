<?php
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
class life extends CI_Controller
{		function mydb(){
		return $this->load->database('default',TRUE);
		}
		function lam_sao($path){
			if($path){
				$absolute_path='http://lamsao.com/'.$path;
				$mydb=$this->load->database('default',TRUE);
				$ehow=$mydb->select('*')->from('system_how')->where('link',$absolute_path)->get()->result_array();
				if($ehow){
					$content=file_get_contents($ehow[0]['link']);
				}
				else {
						$content=file_get_contents($absolute_path);
				}
			}
			else {
				$content=file_get_contents('http://www.lamsao.com/');
			}
			if(isset($_REQUEST['q'])){
				$q=urlencode($_REQUEST['q']);
				$content=file_get_contents('http://www.lamsao.com/tim-kiem.html?q='.$q);
			}
			$content=str_replace('/Images/lamsaode/Icon2.ico?v=2','http://myweb.pro.vn/images/favicon.ico',$content);
			$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','',$content);
			
			//reset html
			$content=str_replace('placeholder="Làm sao ..."','placeholder="Làm sao, gõ vào đây để tìm..."',$content);//meta tag
			$content=str_replace('160625467447897','1375147869435383',$content);//meta tag
			$content=str_replace('yl3SzOuJQLfSaU2_Zk-Y_Te-j3F8nKelYDU538gIxcw','google1f27fa1ab8b2540d',$content);//meta tag
			$content=str_replace('content="DKT"','content="myweb.pro.vn"',$content);//meta tag
			$content=str_replace('content="http://www.lamsao.com/','content="http://www.myweb.pro.vn/lam-sao/',$content);//meta tag
			$content=str_replace('rel="canonical" href="http://www.lamsao.com/','rel="canonical" href="http://www.myweb.pro.vn/lam-sao/',$content);
			$content=str_replace('/video/tim-kiem.html?q=','http://myweb.pro.vn/lam-sao?q=',$content);
			$content=str_replace('/gallery/tim-kiem.html?q=','http://myweb.pro.vn/lam-sao?q=',$content);
			$content=str_replace('/hoidap/tim-kiem.html?q=','http://myweb.pro.vn/lam-sao?q=',$content);
			$content=str_replace('/tim-kiem.html?q=','http://myweb.pro.vn/lam-sao?q=',$content);
			$content=str_replace('/Resources/Skins/Default/Images/Logo_org.png?v=1.1','http://myweb.pro.vn/images/favicon.ico',$content);
			//end

			//reset advertisement
			$str_header_adv='<div id="ctl00_cphMain_ctl00_TopPane" class="top_pane" width="1000px"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324908.js"></script>';//header adv
			$str_bottom_right_adv='<div id="blog-bizweb"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324837.js"></script>';//bottom right adv
			$str_right_adv='<div id="ctl00_cphMain_ctl00_RightPane" class="right_pane" width="300px"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324859.js"></script>';//right adv
			$str_inpage_to_replace="<script>(adsbygoogle = window.adsbygoogle || []).push({});<\/script>";
		
			$content=str_replace('margin: 10px auto 0; width: 340px;','margin: 10px auto 30px; width:0px;height:0px',$content);//in page adv
			$content=str_replace('<div id="blog-bizweb">',$str_bottom_right_adv,$content);//bottom right adv
			$content=str_replace('<div id="ctl00_cphMain_ctl00_TopPane" class="top_pane" width="1000px">',$str_header_adv,$content);//header adv
			$content=str_replace('<div id="ctl00_cphMain_ctl00_RightPane" class="right_pane" width="300px">',$str_right_adv,$content);//right adv
			$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','',$content);
			//end

			$data['content']=$content;
			$this->load->view('ehow/lamsaocom',$data);
		}
		function seo(){
			$mydb=$this->load->database('default',TRUE);
			$data['ehow']=$mydb->select('*')->from('system_how')->get()->result_array();
			$this->load->view('ehow/seo',$data);
		}
		
}
?>