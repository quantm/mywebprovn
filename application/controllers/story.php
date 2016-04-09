<?php
require_once 'application/controllers/header.php';
class story extends CI_Controller{

	function view() {
			if(isset($_REQUEST['fetchUrl'])){
				$result=$this->db->select('*')->from('system_story')->like('path',$_REQUEST['fetchUrl'])->get()->result_array();
				$content=file_get_contents($result[0]['path']);
				preg_match_all('/<div class="float_left">(.*?)<fb:comments/s',$content,$matches,PREG_SET_ORDER);
				foreach($matches as $key);
				
				//$header = new header();
				//$header->story($result[0]['name']);	
				
				$data['content']=$key[0];
				$data['thumb']=$result[0]['thumb'];
			}
			if(isset($_REQUEST['fetchItem'])){				
				$result=$this->db->select('*')->from('system_story')->like('path',$_REQUEST['fetchItem'])->get()->result_array();

				//query matches database
				if($result){

					$content=file_get_contents($result[0]['path']);
					
					//break google analytic
					$content=str_replace('UA-46095601-1','',$content);// webtruyen.com
					$content=str_replace('UA-18179572-35','',$content);// www.doctruyen360.com
					
					//start www.doctruyen360.com
					if($result[0]['referer']=='wwwdoctruyen360com'){
					//reset 
					$obj_view='<div class="adv_micro_bottom"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script></div><div class="relate_cus">';
					$content=str_replace('<div class="relate_cus">',$obj_view,$content);
					$content=str_replace('href="http://www.doctruyen360.com','href="/xem-truyen-online?referer=wwwdoctruyen360com&fetchItem=',$content);
					//end

					//bóc tách html
					preg_match_all('/<div id="main">(.*?)<div id="sidebar">/s',$content,$matches,PREG_SET_ORDER);
					if($matches){
						foreach($matches as $key);
						$data['content']=$key[0];		
						$data['name']=$result[0]['name'];
						$data['thumb']=$result[0]['thumb'];
						$data['story_chapter']=$this->get_story_chapter($result[0]['path'],$result[0]['referer']);
					}
					else {}
					
					}
					//end www.doctruyen360.com

					//start truyendich.com
					if($result[0]['referer']=='truyendichcom'){
					//reset 
					$obj_view='<div class="adv_micro_bottom"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script></div><div class="relate_cus">';
					$content=str_replace('<div class="relate_cus">',$obj_view,$content);
					$content=str_replace('href="http://www.doctruyen360.com','href="/xem-truyen-online?fetchItem=',$content);
					$content=str_replace('detailStory-table','lineleftcont',$content);
					//end
					preg_match_all('/<div class="leftSite col-md-8">(.*?)<div class="rightSite col-md-4">/s',$content,$matches,PREG_SET_ORDER);
					foreach($matches as $key);
					$data['content']=$key[0];		
					}
					//end truyendich.com

					//start truyen.vui1.net
					if($result[0]['referer']=='truyenvui1net'){
					//reset 
					
					//bóc tách html
					$content=str_replace('</h1>','</h1><base href=http://truyen.vui1.net>',$content);
					$obj_view='<div class="adv_micro_bottom"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script></div><div class="relate_cus">';
					$content=str_replace('<div class="relate_cus">',$obj_view,$content);
					$content=str_replace('href="http://truyen.vui1.net','href="http://myweb.pro.vn/xem-truyen-online?fetchItem=',$content);
					$content=str_replace('data-natural-','',$content);
					$content=str_replace('src="/img/content/','src="http://truyen.vui1.net/img/content/',$content);
					//kết thúc

					preg_match_all('/<div class="panel-body">(.*?)<div class="panel-footer">/s',$content,$matches,PREG_SET_ORDER);
						if($matches){
							foreach($matches as $key);
							echo '<base href="http://truyen.vui1.net/">';
							$data['content']=$key[0];		
						}
						else {
						redirect('/doctruyen/danhmuc?id=2');
						}
					}
					//end truyen.vui1.net

					//start webtruyen.com
					if($result[0]['referer']=='webtruyencom'){
					//reset 
					$obj_view='<div class="adv_micro_bottom"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script></div><div id="divlistbook">';
					$content=str_replace('<div id="divlistbook">',$obj_view,$content);
					$content=str_replace('href="http://webtruyen.com','href="http://myweb.pro.vn/xem-truyen-online?fetchItem=',$content);
					$content=str_replace('like.php?href=http://webtruyen.com','like.php?href=http://myweb.pro.vn/xem-truyen-online?fetchItem=',$content);
					$content=str_replace('http://admicro1.vcmedia.vn/ads_codes/ads_box_9229.ads','http://admicro1.vcmedia.vn/ads_codes/ads_box_16575.ads',$content);//reset ads
					//end

					preg_match_all('/<div class="span8">(.*?)<div class="span4">/s',$content,$matches,PREG_SET_ORDER);
					if($matches){foreach($matches as $key);}else{redirect('/doctruyen/danhmuc?id=3');}
					//render view
					$data['content']=$key[0];		
					}
					//end webtruyen.com
				
					//render view
					$data['story_chapter']=$this->get_story_chapter($result[0]['path'],$result[0]['referer']);
					$data['name']=$result[0]['name'];
					$data['thumb']=$result[0]['thumb'];
				}
				
				//if query not matches database then filter input to query the database again
				else {	
					if(!isset($_REQUEST['referer'])){
						redirect('http://myweb.pro.vn/xem-truyen-online?referer=webtruyencom&fetchItem=/mich-tien-lo/');
					}
					switch($_REQUEST['referer']){
						case 'webtruyencom':
						$path=$_REQUEST['fetchItem'];
						$path=explode('/',$path);
						$path='/'.$path[1].'/';
						$query_story=$this->db->select('*')->from('system_story')->where('referer',$_REQUEST['referer'])->like('path',$path)->get()->result_array();
						foreach($query_story as $key_query_story);
						
						//bóc tách html trang nội dung
						$url_fetch_main_content='http://webtruyen.com'.$_REQUEST['fetchItem'];
						$content=file_get_contents($url_fetch_main_content);
						$content=str_replace('http://admicro1.vcmedia.vn/ads_codes/ads_box_9229.ads','http://admicro1.vcmedia.vn/ads_codes/ads_box_16575.ads',$content);//reset ads
						$ants_bottom='<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>';
						$ants_bottom=$ants_bottom.'<div style="margin-top:5%" class="522972114" data-ants-zone-id="522972114"></div>';
						$content=str_replace('http://paragonads.vn/www/delivery/pa_ad.js',$ants_bottom,$content);//reset ads
						$header_ads='<div align="left"><div style="z-index: 10000;position: absolute;margin-top: -72px;margin-left: -20px;"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script></div>';
						$content=str_replace('<div align="left">',$header_ads,$content);
						preg_match_all('/<div class="main" style="width: 95%;">(.*?)<span class="linewel">/s',$content,$matches,PREG_SET_ORDER);				
						if($matches){foreach($matches as $key);}else{redirect('/doctruyen/danhmuc?id=3');}
				
						//render view
						$data['name']=$query_story[0]['name'];
						$data['thumb']=$query_story[0]['thumb'];
						$data['story_chapter']=$this->get_story_chapter($key_query_story['path'],$key_query_story['referer']);
						$data['content']=$key[0];
						break;	
						
						case 'wwwdoctruyen360com':								
						$fetch_url='http://www.doctruyen360.com/'.$_REQUEST['fetchItem'];
						$path=explode('-chuong-',$_REQUEST['fetchItem']);
						$path=$path[0].'/';
						$query_story=$this->db->select('*')->from('system_story')->where('referer',$_REQUEST['referer'])->like('path',$path)->get()->result_array();

						$content=file_get_contents($fetch_url);	
						
						//bóc tách html và render view
						
						$obj_advertisement='<div class="adv_micro_bottom"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script></div><div class="relate_cus">';
						$content=str_replace('<div class="relate_cus">',$obj_advertisement,$content);
						$content=str_replace('href="http://www.doctruyen360.com','href="/xem-truyen-online?referer=wwwdoctruyen360com&fetchItem=',$content);
						preg_match_all('/<div id="main">(.*?)<div id="sidebar">/s',$content,$matches,PREG_SET_ORDER);
						if($matches){foreach($matches as $key);$data['content']=$key[0];}
						else {$data['content']='';}
						if($query_story){
							$data['name']=$query_story[0]['name'];
							$data['thumb']=$query_story[0]['thumb'];
						}
						else{
							$data['name']='Đọc truyện Online';
							$data['thumb']='http://myweb.pro.vn/images/fb/logo.jpg';
						}						
						$data['story_chapter']=$this->get_story_chapter($fetch_url,$_REQUEST['referer']);
						break;

						case 'vnexpressnet':
						$url='http://vnexpress.net'.$_REQUEST['fetchItem'];
						$db=$this->load->database('thesis_notes',TRUE);
						$r=$db->select('*')->from('system_story')->where('path',$url)->where('referer','vnexpressnet')->get()->result_array();
						$content=file_get_contents($r[0]['path']);
						preg_match_all('/<div class="block_col_480">(.*?)<div class="block_col_160 right">/s',$content,$matches,PREG_SET_ORDER);
						if($matches){
							foreach($matches as $match);
							
							//render view
							$data['content']=$match[0];
							$data['name']=$r[0]['name'];
							$data['thumb']='http://haivl.top/meme/templates/If_you_know_what_i_mean.jpg';
							$data['share_url']=str_replace('vnexpress.net','myweb.pro.vn/xem-truyen-online?referer=vnexpressnet&fetchItem=',$r[0]['path']);
							$data['story_chapter']=$this->get_story_chapter($r[0]['path'],$_REQUEST['referer']);
						}
						else {}
						break;
	
						case 'ohaytv':
						$db=$this->load->database('thesis_notes',TRUE);
						$url='http://www.ohay.tv'.$_REQUEST['fetchItem'];
						$r=$db->select('*')->from('hay_hai_hot_moi_meo_dep')->where('fetch_link',$url)->get()->result_array();
						$content=file_get_contents($r[0]['fetch_link']);
						
						//bóc tách html
						$content=str_replace('pagespeed_url_hash','',$content);
						$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','',$content);
						$content=str_replace('<!-- CTV_damthihoaianh_BV -->','<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script>',$content);
						preg_match_all('/<div class="col-sm-8 content" style="float:right">(.*?)<div>/s',$content,$matches);
						
						if($matches){
							foreach($matches as $match);							
							//render view
							$content='<div class="ohaytv">'.$match[0].'</div></div>';
							$data['content']=$content;
							$data['name']=$r[0]['name'];
							$data['thumb']='http://haivl.top/meme/templates/If_you_know_what_i_mean.jpg';
							$data['share_url']=str_replace('ohay.tv','myweb.pro.vn/hay-hai-hot?referer=ohaytv&fetchItem=',$r[0]['fetch_link']);
							$data['story_chapter']=$this->get_story_chapter($r[0]['fetch_link'],$_REQUEST['referer']);
						}
						else {}
						break;

					}
				}
				//end case not query the db
		

			}
			//end query not matches database
			if(isset($_REQUEST['referer'])){
				$data['share_url']='http://www.myweb.pro.vn/xem-truyen-online?referer='.$_REQUEST['referer'].'&fetchItem='.$_REQUEST['fetchItem'];
			}
			if(!isset($_REQUEST['referer'])){
				$data['share_url']='http://www.myweb.pro.vn/xem-truyen-online?referer=webtruyencom&fetchItem='.$_REQUEST['fetchItem'];
			}
			
			//page background
			$arr_img=array();
			for($img_index=102;$img_index<127;$img_index++){
			array_push($arr_img,$img_index);
			}
			$i = rand(0, count($arr_img)-1); // generate random number size of the array

			//render view
			$data['id_image'] = "$arr_img[$i]";

			$this->load->view('doctruyen/template-web-kit-3d',$data);			
		}

		//start function
		function get_story_chapter($url,$referer){
			switch($referer){
			case 'webtruyencom':
			$content=file_get_contents($url);
			$content=str_replace('webtruyen.com','myweb.pro.vn/xem-truyen-online?referer=webtruyencom&fetchItem=',$content);
			preg_match_all('/<div class="gridlistchapter">(.*?)<div class="pagination pagination-centered">/s',$content,$matches);
			foreach($matches as $match);
			$story_chapter_related=$match[0];
			break;
			
			//load left banner advertisement
			case 'wwwdoctruyen360com':
			$story_chapter_related='<div style="margin-top:15px;margin-left:-15px;"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script></div></div>';
			break;
			
			//load left banner advertisement
			case 'vnexpressnet':
			$story_chapter_related='<div style="margin-top:15px;margin-left:-15px;"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script></div></div>';
			break;

			//load left banner advertisement
			case 'ohaytv':
			$story_chapter_related='<div style="margin-top:15px;margin-left:-15px;"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script></div></div>';
			break;


			}
			return $story_chapter_related;
		}
		//end function
}
?>