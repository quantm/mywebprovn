<?php
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
class blog extends CI_Controller
{
		function index(){
			$header= new header();
			$header->blog('Du lich');
		}

		function tour(){
			$header= new header();
			$header->blog('Tour du lịch');
			$content=file_get_contents('http://mytour.vn/tour/');
			$content=str_replace('http://www.google-analytics.com/analytics.js','',$content);
			preg_match_all('/<div id="wrapper_content">(.*?)<div class="clear">/s',$content,$match,PREG_SET_ORDER);
			preg_match_all('/<div class="wrapper_content_bottom"(.*?)<div class="clear">/s',$content,$match_bottom,PREG_SET_ORDER);
			foreach($match as $key);
			foreach($match_bottom as $key_bottom);
			$data['content']=str_replace('http://mytour.vn/tour','http://myweb.pro.vn/xem-tour',$key[0].$key_bottom[0]);
			$this->load->view('tourism/tour_ads_mirco',$data);
		}

		function life($link,$referer){
			$db=$this->load->database('default',TRUE);
			if($referer){
			}
			else {
					redirect('http://myweb.pro.vn/cuoc-song/cuoc-song/lncs');
			}
			switch($referer) {
				case 'lncs':
				$query=$db->select('*')->from('system_life')
										  ->where('referer','langnhincuocsongcom')
										  ->like('path',$link)
										  ->get()->result_array();
				if($query){
					$data['post_title']=$query[0]['name'];
					$url=$query[0]['path'];
				}
				else {

					$data['post_title']='Blog Cuộc Sống';
					$arr=array('cuoc-song','gia-dinh','hon-nhan','tam-su','tinh-yeu','tu-vi','thoi-trang','lam-dep');
					$url_0='http://langnhincuocsong.com/'.$arr[0].'/'.$link;
					$check_url_0=file_get_contents($url_0);
					if(preg_match('/Nội dung bạn tìm kiếm không tồn tại !/',$check_url_0)){

					}
					else {
						$url=$url_0;
					}
				}
				$content=file_get_contents($url);

				//reset advertisement
				$ants_300x250_1='<li class="widget widget_text" id="text-2"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324859.js"></script>';
				$ants_300x250_2='<div class="phai-baiviet-ad300x250"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/522972114.js"></script>';
				$ants_300x600_1='<div class="ads4-desktop"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>';
				$ants_2='<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324859.js"></script>';
				$admicro='<li class="widget widget_text" id="text-20"><script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16575.ads"></script>';
				$str_facebook_fanpage_right='https://www.facebook.com/fanlangnhincuocsong';
				$str_facebook_recommend_right='data-site="http://langnhincuocsong.com"';
				$str_facebook_right='https://www.facebook.com/fanlangnhincuocsong';
				$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','',$content);
				$content=str_replace($str_facebook_fanpage_right,'https://www.facebook.com/pages/Blog-Cu%E1%BB%99c-S%E1%BB%91ng/395095187348829?ref=hl',$content);
				$content=str_replace($str_facebook_recommend_right,'-',$content);
				$content=str_replace('<li class="widget widget_text" id="text-2">',$ants_300x250_1,$content);
				$content=str_replace('<div class="phai-baiviet-ad300x250">',$ants_300x250_2,$content);
				$content=str_replace('http://langnhincuocsong.com/wp-content/uploads/2014/09/ctv.jpg','',$content);
				$content=str_replace('<li class="widget widget_text" id="text-20">',$admicro,$content);
				$content=str_replace('<div class="ads4-desktop">',$ants_300x600_1,$content);
				//end
				
				//reset header object
				$header_logo='http://langnhincuocsong.com/wp-content/themes/langnhincuocsong/custom/images/logos.png';
				$header_link='<a href="http://langnhincuocsong.com" title="Lặng nhìn cuộc sống"';

				$cuoc_song='<a href="http://langnhincuocsong.com/cuoc-song">Cuộc sống</a>';
				$content=str_replace($cuoc_song,'<a href="http://myweb.pro.vn/cuoc-song/cuoc-song/lncs">Cuộc sống</a>',$content);				
				
				$gia_dinh='<a href="http://langnhincuocsong.com/gia-dinh">Gia Đình</a>';
				$content=str_replace($gia_dinh,'<a href="http://langnhincuocsong.com/gia-dinh/gia-dinh/lncs">Gia Đình</a>',$content);				

				$tam_su='<a href="http://langnhincuocsong.com/tam-su">Tâm sự</a>';
				$content=str_replace($tam_su,'<a href="http://langnhincuocsong.com/tam-su/tam-su/lncs">Tâm sự</a>',$content);
				
				$tinh_yeu='<a href="http://langnhincuocsong.com/tinh-yeu">Tình Yêu</a>';
				$content=str_replace($tinh_yeu,'<a href="http://langnhincuocsong.com/tinh-yeu/tinh-yeu/lncs">Tình yêu</a>',$content);				
				
				$hon_nhan='<a href="http://langnhincuocsong.com/hon-nhan">Hôn Nhân</a>';
				$content=str_replace($hon_nhan,'<a href="http://myweb.pro.vn/hon-nhan/hon-nhan/lncs">Hôn Nhân</a>',$content);				

				$tu_vi='<a href="http://langnhincuocsong.com/tu-vi">Tử Vi</a>';
				$content=str_replace($tu_vi,'<a href="http://myweb.pro.vn/tu-vi/tu-vi/lncs">Tử vi</a>',$content);		
				
				$thoi_trang='<a href="http://langnhincuocsong.com/thoi-trang">Thời Trang</a>';
				$content=str_replace($thoi_trang,'<a href="http://myweb.pro.vn/thoi-trang/thoi-trang/lncs">Thời trang</a>',$content);				
				
				$lam_dep='<a href="http://langnhincuocsong.com/lam-dep">Đẹp +</a>';
				$content=str_replace($lam_dep,'<a href="http://myweb.pro.vn/lam-dep/lam-dep/lncs">ĐẸP+</a>',$content);				
				
				$content=str_replace($header_logo,'/images/logo_blog_life.png',$content);				
				$content=str_replace($header_link,'<a href="http://myweb.pro.vn" title="Lặng nhìn cuộc sống"',$content);				
				$content=str_replace('<a href="http://langnhincuocsong.com/gui-bai-len-web">Gửi bài lên web</a>','<a href="http://myweb.pro.vn/lam-sao">Làm sao?</a>',$content);				
				//end
				
				//reset page link
				for($i=0;$i<10;$i++){
				$content=str_replace('<a class="cke_li_a_title cke_li_a_title-'.$i.'" href="http://langnhincuocsong.com/','<a class="cke_li_a_title cke_li_a_title-'.$i.'" href="http://myweb.pro.vn/',$content);		
				}
				$content=str_replace('<fb:like href="http://langnhincuocsong.com/','<fb:like href="http://myweb.pro.vn/',$content);				
				$content=str_replace('<a href="http://langnhincuocsong.com','<a href="http://myweb.pro.vn',$content);				
				$content=str_replace('<a class="cke_li_a_title cke_li_a_title-6" href="http://langnhincuocsong.com','<a class="cke_li_a_title cke_li_a_title-6" href="http://myweb.pro.vn',$content);				
				$content=str_replace('data-href="http://langnhincuocsong.com','data-href="http://myweb.pro.vn',$content);	
				$content=str_replace('.html','.html/lncs',$content);				
				//end

				//reset html
				$content=str_replace('<img','<img onerror="img_err(this)"',$content);			
				$content=str_replace('tuyen-cong-tac-vien-ho-tro-mang-xa-hoi','',$content);			
				//end

				//prevent google analytics to call server
				$content=str_replace('//www.google-analytics.com/analytics.js','',$content);
				$content=str_replace('UA-50701531-4','',$content);
				//end

				$data['content']=$content;
				$this->load->view('blog/langnhincuocsong',$data);
				break;

				case 'nkcs':
				$query=$db->select('*')->from('system_life')
										  ->where('referer','nhatkycuocsongcom')
										  ->like('path',$link)
										  ->get()->result_array();
				if($query){
					$data['post_title']=$query[0]['name'];
					$url=$query[0]['path'];
				}
				else {

					$data['post_title']='Blog Cuộc Sống';
					$arr=array('cuoc-song','gia-dinh','hon-nhan','tam-su','tinh-yeu','tu-vi','thoi-trang','lam-dep');
					$url_0='http://nhatkycuocsong.com/'.$arr[0].'/'.$link;
					$check_url_0=file_get_contents($url_0);
					if(preg_match('/Nội dung bạn tìm kiếm không tồn tại !/',$check_url_0)){

					}
					else {
						$url=$url_0;
					}
				}
				$content=file_get_contents($url);
			
				//reset advertisement
				$content=str_replace('//admicro1.vcmedia.vn/ads_codes/ads_code_7444.ads','//admicro1.vcmedia.vn/ads_codes/ads_box_16598.ads',$content);
				$content=str_replace('http://admicro1.vcmedia.vn/ads_codes/ads_box_7444.ads','//admicro1.vcmedia.vn/ads_codes/ads_box_16598.ads',$content);
				$content=str_replace('//admicro1.vcmedia.vn/ads_codes/ads_code_11352.ads','//admicro1.vcmedia.vn/ads_codes/ads_box_17063.ads',$content);
				$content=str_replace('http://admicro1.vcmedia.vn/ads_codes/ads_box_11352.ads','//admicro1.vcmedia.vn/ads_codes/ads_box_17063.ads',$content);
				//end
				
				//reset header object
				$header_logo='http://langnhincuocsong.com/wp-content/themes/langnhincuocsong/custom/images/logos.png';
				$header_link='<a href="http://langnhincuocsong.com" title="Lặng nhìn cuộc sống"';

				$home_page='<a href="/"><i class="fa fa-home"></i>Trang chủ</a>';
				$content=str_replace($home_page,'<a href="http://myweb.pro.vn/cuoc-song/cuoc-song/nkcs"><i class="fa fa-home"></i>Trang chủ</a>',$content);			
				$cuoc_song='<a href="/cuoc-song"><i class="fa fa-coffee"></i>Cuộc sống</a>';
				$content=str_replace($cuoc_song,'<a href="http://myweb.pro.vn/cuoc-song/cuoc-song/nkcs"><i class="fa fa-coffee"></i>Cuộc sống</a>',$content);				
				$blog_radio='<a href="/blog-radio"><i class="fa fa-music"></i>Blog Radio</a>';
				$content=str_replace($blog_radio,'<a style="display:none" data-href="#"><i class="fa fa-music"></i>Blog Radio</a>',$content);
				
				$tinh_yeu='<a href="/tinh-yeu"><i class="fa fa-umbrella"></i>Tình yêu</a>';
				$content=str_replace($tinh_yeu,'<a href="http://myweb.pro.vn/tinh-yeu/tinh-yeu/nkcs"><i class="fa fa-umbrella"></i>Tình yêu</a>',$content);				
				$link_how='<a href="/about-us.html"><i class="fa fa-envelope"></i>Giới thiệu</a>';
				$content=str_replace($link_how,'<a style="display:none" data-href="#"><i class="fa fa-envelope"></i>Làm sao?</a>',$content);				

				$video='<a href="/video"><i class="fa fa-video-camera"></i>Video</a>';
				$content=str_replace($video,'<a style="display:none" data-href="#"><i class="fa fa-video-camera"></i>Video</a>',$content);		
				
				$chuyen_la='<a href="/chuyen-la"><i class="fa fa-video-camera"></i>Chuyện lạ</a>';
				$content=str_replace($chuyen_la,'<a style="display:none" data-href="/chuyen-la"><i class="fa fa-video-camera"></i>Chuyện lạ</a>',$content);		
				
				$lam_sao='<a href="/kheo-tay-hay-lam"><i class="fa fa-flash"></i>Khéo tay hay làm</a>';
				$content=str_replace($lam_sao,'<a href="http://myweb.pro.vn/lam-sao">Làm sao ?</a>',$content);				
				
				$content=str_replace($header_logo,'/images/logo_blog_life.png',$content);				
				$content=str_replace($header_link,'<a href="http://myweb.pro.vn" title="Lặng nhìn cuộc sống"',$content);				
				$content=str_replace('<a href="http://langnhincuocsong.com/gui-bai-len-web">Gửi bài lên web</a>','<a href="http://myweb.pro.vn/lam-sao">Làm sao?</a>',$content);				
				//end

				//prevent google analytics to call server
				$content=str_replace('//www.google-analytics.com/analytics.js','',$content);
				$content=str_replace('UA-18780047-13','',$content);
				//end

				//reset html
				$content=str_replace('<link rel="canonical" href="http://nhatkycuocsong.com','<link rel="canonical" href="http://myweb.pro.vn',$content);	
				$content=str_replace('data-href="http://nhatkycuocsong.com','data-href="http://myweb.pro.vn',$content);	
				$content=str_replace('<fb:like href="http://nhatkycuocsong.com/','<fb:like href="http://myweb.pro.vn/',$content);		
				$content=str_replace('/images/fav.png','',$content);
				//end
			
				$data['content']=$content;
				$this->load->view('blog/nhatkycuocsong',$data);
				break;
			}

			
				
		}

		function xem_tour($path1,$path2){
			$header= new header();
			if(isset($_REQUEST['title'])){
					$header->blog($_REQUEST['title']);
			}
			else {
					$header->blog('Thông tin du lịch');
			}
			if(isset($_REQUEST['page'])){
				$path='http://mytour.vn/tour/'.$path1.'/'.$path2."?page=".$_REQUEST['page'];
			}
			else {
				$path='http://mytour.vn/tour/'.$path1.'/'.$path2;
			}
			$content=file_get_contents($path);
			$content=str_replace('http://mytour.vn/tour','http://myweb.pro.vn/register-tour',$content);
			$data['content']=$content;
			$this->load->view('tourism/fetch_tourism_data',$data);
		}

		function register_tour($path){
			$header= new header();
			if(isset($_REQUEST['title'])){	
				$header->blog($_REQUEST['title']);
			}
			else{
				$header->blog('Tour du lịch');
			}
			$content=file_get_contents('http://mytour.vn/tour/'.$path);
			$content=str_replace('href','data-href',$content);
			$content=str_replace('themes/js','js',$content);
			$data['content']=$content;
			$this->load->view('tourism/fetch_tourism_data',$data);
		}
		
		function dulich($path){
			$path =str_replace('--','/',$path);
			$data_tourism=$this->db->select('*')->from('tourism')->like('link',$path)->get()->result_array();
			$header= new header();
			$header->blog($data_tourism[0]['name']);
			$content=file_get_contents($data_tourism[0]['link']);
			if($content){
			//do nothing
			}
			else {
				redirect('/tour-du-lich-blog');
			}

			$content=str_replace('<script','<script async',$content);
			$content=str_replace('dulich.vnexpress.net','myweb.pro.vn/blog/dulich',$content);
			$content=str_replace('tuc/','tuc--',$content);
			$content=str_replace('dong/','dong--',$content);
			$content=str_replace('van/','van--',$content);
			$content=str_replace('photo/','photo--',$content);
			$content=str_replace('video/','video--',$content);
			$data['content']=$content;
			$this->load->view('tourism/fetch_tourism_data',$data);
		}
		function seo_blog_tourism(){
		$data['seo']=$this->db->select('*')->from('tourism')->get()->result_array();
		$this->load->view('tourism/seo',$data);
		}
}
?>
