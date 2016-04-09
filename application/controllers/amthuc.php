<?
require_once 'application/controllers/header.php';
class amthuc extends CI_Controller {
	function index($path){
		$food=$this->db->select('*')->from('system_food')->like('link',$path)->get()->result_array();
		$header = new header();
		$header->food($food[0]['name']);
		$content=file_get_contents($food[0]['link']);
		//reset advertisement
		$str_adv_header_left='<div class="text"><div class="header_left_adv"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324859.js"></script></div>';
		$str_adv_bottom='<div class="conbuttonads"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324908.js"></script>';
		$content=str_replace('<div class="text">',$str_adv_header_left,$content);
		$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','',$content);
		$content=str_replace('<div class="conbuttonads">',$str_adv_bottom,$content);
		//end
		preg_match_all('/<div class="content">(.*?)comment/s',$content,$matches,PREG_SET_ORDER);
		if($matches){
			foreach($matches as $key);
		}
		else {
			redirect('http://myweb.pro.vn/amthuc/danhmuc/mon-kho/');
		}
		$data['content']=$key[0];
		$data['name']=$food[0]['name'];
		$this->load->view('food/fetch_content',$data);
	}
		
	//custom search engine
	function cse(){
		$header = new header();
		$header->food('Kết quả tìm kiếm');
		$this->load->view('google/cse');
	}
	//end

	//http://naungonmoingay.com/
	function nau_ngon(){
		if(isset($_REQUEST['id'])){
			$food=$this->db->select('*')->from('system_food')->where('id',$_REQUEST['id'])->get()->result_array();
			$content=file_get_contents($food[0]['link']);
			$data['name']=$food[0]['name'];
		}

		if(isset($_REQUEST['id_item'])){
			$item='http://naungon.com/?p='.$_REQUEST['id_item'];
			$food=$this->db->select('*')->from('system_food')->where('link',$item)->get()->result_array();
			$content=file_get_contents($food[0]['link']);
			$data['name']=$food[0]['name'];
		}

		if(isset($_REQUEST['id_cat'])){
	
			if(isset($_REQUEST['paged'])){
				$url='http://naungon.com/?cat='.$_REQUEST['id_cat'].'&paged='.$_REQUEST['paged'];
			}
			else{
				$url='http://naungon.com/?cat='.$_REQUEST['id_cat'];		
			}
			$content=file_get_contents($url);
			$data['name']='Danh mục món ăn';
		}

		if(isset($_REQUEST['id_cat_top'])){
			$url='http://naungon.com/?p='.$_REQUEST['id_cat_top'];
			$content=file_get_contents($url);
			$data['name']='Danh mục món ăn';
		}

		//start reset advertisement
		$str_adv_header_left='<div class="text"><div class="header_left_adv"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324859.js"></script></div>';
		$str_adv_bottom='<div class="conbuttonads"><script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_18536.ads"></script>';
		$content=str_replace('<div class="text">',$str_adv_header_left,$content);
		$content=str_replace('http://naungon.com/ad_index.js','//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js',$content);
		$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','',$content);
		$content=str_replace('<td height="248" background="images/banner2.jpg">&nbsp;</td>','<div class="header_adv"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324908.js"></script></div>',$content);
		//end reset advertisement
		
		//reset html
		$content=str_replace('<a class="menutop" href="/?p=01">VIDEO</a>','<a class="menutop" href="http://myweb.pro.vn/nau-ngon?id_cat_top=01">VIDEO</a>',$content);
		$content=str_replace('/?cat=1','http://myweb.pro.vn/nau-ngon?id_cat=1',$content);
		$content=str_replace('?cat=84','http://myweb.pro.vn/nau-ngon?id_cat=84',$content);
		$content=str_replace('?cat=34','http://myweb.pro.vn/nau-ngon?id_cat=34',$content);
		$content=str_replace('/?cat=73','http://myweb.pro.vn/nau-ngon?id_cat=73',$content);
		$content=str_replace('<strong>naungon.com</strong>','<strong>admin</strong>',$content);
		$content=str_replace('naungon.com/blog/images/farm3.static.flickr.com/2311/2121054148_11e365cc98.jpg','myweb.pro.vn/images/chefone.png',$content);
		$content=str_replace('<!--ADVER-->','<div class="trigger_remove"></div>',$content);
		//end
		
		$data['content']=$content;
		$this->load->view('food/fetch_naungon_com',$data);
	}
	//end function

	//http://naungonmoingay.com,http://www.bepgiadinh.com,http://www.anhdaubep.com/
	function ngon_ngon(){
		if(isset($_REQUEST['id'])){
			$food=$this->db->select('*')->from('system_food')->where('id',$_REQUEST['id'])->get()->result_array();
			$content=file_get_contents($food[0]['link']);
			$data['name']=$food[0]['name'];
		}

		if(isset($_REQUEST['id_item'])){
			$item='http://naungon.com/?p='.$_REQUEST['id_item'];
			$food=$this->db->select('*')->from('system_food')->where('link',$item)->get()->result_array();
			$content=file_get_contents($food[0]['link']);
			$data['name']=$food[0]['name'];
		}

		if(isset($_REQUEST['id_cat'])){
	
			if(isset($_REQUEST['paged'])){
				$url='http://ngonngon.org/danh-muc/'.$_REQUEST['id_cat'].'&page/'.$_REQUEST['paged'];
			}
			else{
				$url='http://ngonngon.org/danh-muc/'.$_REQUEST['id_cat'];		
			}
			$content=file_get_contents($url);
			$data['name']='Danh mục món ăn';
		}

		if(isset($_REQUEST['item'])){
			$url='http://ngonngon.org'.$_REQUEST['item'];
			$content=file_get_contents($url);
			$data['name']='Danh mục món ăn';
		}

		//start reset advertisement		
		$content=str_replace('<!-- .site-header -->','<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/530052041.js"></script>',$content);//header adv

		$content=str_replace('<div id="main-menu">','<div class="header_adv"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324908.js"></script></div><div id="main-menu">',$content);//header adv

		$content=str_replace('<div style="float:left;width:333px;height:280px;overflow:hidden;">','<div class="bottom_adv"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script></div>',$content);//bottom adv
		
		$content=str_replace('<div id="main">','<div id="main"><div class="micro_left_adv"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324837.js"></script><script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16637.ads"></script><iframe src="http://lazada.go2cloud.org/aff_ad?campaign_id=15728&aff_id=56672&format=iframe&format=iframe" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" width="300" height="600"></iframe></div>',$content);//left adv
		
		$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','',$content);
		$content=str_replace('<!-- 336x280-trai -->','',$content);
		//end reset advertisement
	
		//reset html
		$content=str_replace('<a href="http://ngonngon.org','<a href="http://myweb.pro.vn/ngon-ngon?item=',$content);
		$content=str_replace('<link rel="canonical" href="http://ngonngon.org/','<link rel="canonical" href="http://myweb.pro.vn/ngon-ngon?item=/',$content);
		$content=str_replace('http://ngonngon.org/wp-includes/js/jquery/jquery.js?ver=1.11.1','',$content);
		$content=str_replace('http://ngonngon.org/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1','',$content);
		$content=str_replace('<meta property="og:url" content="http://ngonngon.org/','<meta property="og:url" content="http://myweb.pro.vn/ngon-ngon?item=/',$content);
		$content=str_replace('partner-pub-4159977197711870:8000476942','partner-pub-1996742103012878:3476546681',$content);
		$content=str_replace('<a href="http://ngonngon.org/">món ngon mỗi ngày</a>','<a href="http://myweb.pro.vn/ngon-ngon?id_cat=mon-kho-2">món ngon mỗi ngày</a>',$content);
		$content=str_replace('ngonngon.org/wp-content/uploads/2014/12/ngonngon.png','myweb.pro.vn/images/king_chef.jpg',$content);
		//end
		
		
		//prevent google analytics to call server
		$content=str_replace('//www.google-analytics.com/analytics.js','',$content);
		$content=str_replace('UA-47053354-1','',$content);
		//end
	
		
		$data['content']=$content;
		$this->load->view('food/fetch_ngon_ngon_org',$data);
	}
	//end function

	function seo(){
	$data['food']=$this->db->select('*')->from('system_food')->where('id >','18235')->get()->result_array();
	$this->load->view('food/seo',$data);
	}

	function danhmuc($item){
	$header = new header();
	$header->food('Danh mục món ăn');
	$content=file_get_contents('http://webnauan.net/'.$item.'/');
	$content=str_replace('<script type="text/javascript">','<script type="text/javascript" async>',$content);
	$content=str_replace('googletag.cmd.push','',$content);
	$middle_right_adv='<div class="ants_right_2"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324837.js"></script></div>';
	$content=str_replace('<div class="side">',$middle_right_adv,$content);
	
	//prevent google analytics to call server
	$content=str_replace('//www.google-analytics.com/analytics.js','',$content);
	$content=str_replace('UA-58255786-1','',$content);
	//end
	
	$data['content']=$content;
	$this->load->view('food/category',$data);
	}

	function pagination(){
	$header = new header();
	$header->food('name');
	$page=str_replace('_','/',$_REQUEST['page']);
	$content=file_get_contents('http://webnauan.net'.$page);
	$content=str_replace('googletag.cmd.push','',$content);
	$data['content']=$content;
	$this->load->view('food/category',$data);
	}
//http://www.bepgiadinh.com/
}
?>