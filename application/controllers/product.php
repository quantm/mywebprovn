<?php
	require_once 'application/controllers/header.php';
	class product extends CI_Controller{
		function index(){
			$header= new header();
			$header->product();
			$url='http://websosanh.vn/dien-thoai-may-tinh-bang/cat-85.htm';
			$data['content']=$this->filter_websosanhvn_template($url);
			$this->load->view('product/websosanhvn',$data);
		}
				
		//google cse
		function cse(){			
		$header= new header('Kết quả tìm kiếm');
		$header->product();
		echo '<title>Kết quả tìm kiếm</title>';
		$this->load->view('google/cse');
		}
		//end
		
		//start function danh_muc_gia_re
		function danh_muc_gia_re($path_element_1,$path_element_2){
			$url='http://timgiare.vn/'.$path_element_1.'/'.$path_element_2;
					
			$header= new header();
			$header->product();
			
			$data['content']=$this->filter_timgiare_template($url);
			$this->load->view('product/timgiarevn',$data);
		}
		//end function danh_muc_gia_re
		
		//start function tim_gia_re
		function tim_gia_re($path_element_1,$path_element_2,$path_element_3){
				$url='http://timgiare.vn/products/'.$path_element_1.'/'.$path_element_2.'/'.$path_element_3;
				if($path_element_3=='referer'){
						$url='http://timgiare.vn/products/'.$path_element_1.'/'.$path_element_2;
				}
				if($path_element_2=='referer'){
						$url='http://myweb.pro.vn/tim-gia-re-nhat/'.$path_element_1;
						redirect($url);
				}
			$header= new header();
			$header->product();

			$data['content']=$this->filter_timgiare_template($url);
			$this->load->view('product/timgiarevn',$data);
		}
		//end function tim_gia_re

		//start function tim_gia_re_1
		function tim_gia_re_1($path_element_1){
			$url='http://timgiare.vn/products/'.$path_element_1;

			$header= new header();
			$header->product();

			$data['content']=$this->filter_timgiare_template($url);
			$this->load->view('product/timgiarevn',$data);
		}
		//end function tim_gia_re_1

		//start compare function
		function compare($path_element_1,$path_element_2,$referer){
		
		$header= new header();
		$header->product();
		
		if($referer){}else {redirect('/so-sanh-gia');}
		if($path_element_1){}else {redirect('/so-sanh-gia');}
		if($path_element_2){}else {redirect('/so-sanh-gia');}
		
		//start switch
		switch($referer){

			case 'wssv':
			$absolute_path_compare='http://websosanh.vn/'.$path_element_1.'/'.$path_element_2.'/so-sanh.htm';
			$data['content']=$this->filter_websosanhvn_template($absolute_path_compare);
			$this->load->view('product/websosanhvn',$data);
			break;

			case 'wssv-category':
			$url='http://websosanh.vn/'.$path_element_1.'/'.$path_element_2;
			$data['content']=$this->filter_websosanhvn_template($url);
			$this->load->view('product/websosanhvn',$data);
			break;

			case 'comvn':
			$url='http://www.compare.vn/'.$path_element_1;
			$data['content']=$this->filter_comparevn_template($url);
			$this->load->view('product/comparevn',$data);
		}
		//end switch

		}
		//end compare function
		
		//start filter_timgiare_template function
		function filter_timgiare_template($url){
				$content=file_get_contents($url);
				$content=str_replace("UA-12316593-5","",$content);
			
				//reset advertisement
				$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','',$content);
				$content=str_replace('<!-- Quang Cao 1 300x250 -->','<div style="position:absolute;margin-top: 255px;margin-left:-25px;z-index:500"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324859.js"></script></div>',$content);
				$content=str_replace('<!-- Quang cao 2 300x250 -->','<div style="position: absolute;margin-top:-245px;margin-left:-25px;z-index:500"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/522972114.js"></script></div>',$content);
				$content=str_replace('<!-- Quang cao 3 728x90 -->','<div class="ads"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/519011620.js"></script></div>',$content); //519011620 -ants
				//end

				//filter html
				$content=str_replace('<header>','<header style="display:none">',$content);
				$content=str_replace('Timgiarevn.com là','',$content);
				$content=str_replace('| TimGiaRe.vn','| Tìm giá rẻ nhất-Sản phẩm tốt nhất',$content);
				//end

				if($content){} else {redirect('/');}
				return $content;
		}
		//end filter_timgiare_template function

		//start filter_comparevn_template function
		function filter_comparevn_template($url){
			$content=file_get_contents($url);
			$content=str_replace('//www.google-analytics.com/analytics.js','',$content);
			
			//reset html
			$content=str_replace('So Sánh Việt</title>','Tìm giá rẻ nhất - Sản phẩm tốt nhất</title>',$content);
			$content=str_replace('<header id="header">','<header id="header" style="display:none">',$content);
			$content=str_replace('btn-save','btn-redirect',$content);
			$content=str_replace('NHẬN BÁO GIẢM GIÁ','',$content);
			$content=str_replace('Cảm ơn bạn đã sử dụng Compare.vn','',$content);
			$content=str_replace('<footer id="footer">','<footer id="footer" style="display:none">',$content);
			$content=str_replace('<div class="col-xs-6 col-md-4 aside-right">','<div class="col-xs-6 col-md-4 row_remove" style="display:none">',$content);
			$content=str_replace('http://www.compare.vn/den-noi-ban','http://myweb.pro.vn/go-shop-online',$content);
			$content=str_replace('<a href="http://www.compare.vn','<a href="http://myweb.pro.vn/so-sanh-gia',$content);
			$content=str_replace('.html','.html/gia-re/comvn',$content);
			//end
			
			//insert ads
			 $content=str_replace('<div class="button-bar">','<div class="ads_ants" style="position:absolute;margin-top:52px;margin-left:155px;"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/518907464.js"></script></div><div class="button-bar">',$content);
			//end

			//reset meta tag and social sharing
			$content=str_replace('<link href="http://compare.vn/','<link href="http://myweb.pro.vn/so-sanh-gia/',$content);
			$content=str_replace('data-href="http://www.compare.vn','data-href="http://myweb.pro.vn/so-sanh-gia',$content);	
			$content=str_replace('content="http://www.compare.vn','content="http://myweb.pro.vn/so-sanh-gia',$content);
			//end

			if($content){} else {
				echo '<title>Website đang nâng cấp</title>';
				echo '<meta charset="UTF-8"/>';
				echo '<style type="text/css">#ads_zone16604{margin-top:-600px;margin-left:-599px}</style>';
				echo '<h3>Website đang tạm thời nâng cấp. Bạn vui lòng trở lại sau để tìm được nhiều mặt hàng giá rẻ nhé...</h3>';
				echo '<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_17760.ads"></script>';
				echo '<div style="margin-top:-600px;margin-left:598px;"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script></div>';
				echo '<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16604.ads"></script>';
				die();
			}
			return $content;
		}

		//start filter_websosanhvn_template function
		function filter_websosanhvn_template($url){
			
			$content=file_get_contents($url);
			if($content){} else {
				redirect('/');
			}

			//break google analytic
			$content=str_replace('//www.google-analytics.com/analytics.js','',$content);
			$content=str_replace('UA-30888425-1','',$content);
			//end
	
			//reset html
			$content=str_replace('<div class="header">','<div class="header" style="display:none">',$content);
			$content=str_replace('<div class="footer" id="footer">','<div class="footer" id="footer" style="display:none">',$content);
			$content=str_replace('<div class="allright">','<div class="allright" style="display:none">',$content);
			$content=str_replace('<div id="rates" class="rates">','<div id="rates" class="rates" style="display:none">',$content);
			$content=str_replace('<h5 class="link reduce-price colorbox">','<h5 class="link reduce-price colorbox" style="display:none">',$content);
			$content=str_replace('<div id="all-rate">','<div id="all-rate"  style="display:none">',$content);
			$content=str_replace('<div id="Zone_Adv_AdvProduct1"','<div id="Zone_Adv_AdvProduct1" style="display:none"',$content);
			$content=str_replace('<div class="top-comment"','<div class="top-comment" style="display:none"',$content);
			$content=str_replace('/IconwSS.ico','',$content);
			$content=str_replace(', websosanh.vn','',$content);
			//end
				
			//reset javascript
			$content=str_replace('setTimeout(go, 5000)','setTimeout(go, 1000000)',$content);
			$content=str_replace('setTimeout("display()", 1000)','setTimeout("display()", 200000)',$content);
			//end

			//remove or combine javascript in one file for reducing excution time - optimize broswer loading speed#
			$content=str_replace('<script src="/Scripts/function.js?v=0.34" type="text/javascript"></script>','',$content);
			$content=str_replace('<script src="/Scripts/jquery-ui.min.js" type="text/javascript"></script>','',$content);
			$content=str_replace('<script src="/Scripts/jquery1.9.1.min.js" type="text/javascript"></script>','',$content);
			$content=str_replace('<script src="/js1/jquery-ui.min.js" type="text/javascript"></script>','',$content);
			$content=str_replace('<script src="/js1/home.js?v=2.12" type="text/javascript"></script>','',$content);
			$content=str_replace('<script src="/js1/bootstrap.min.js" type="text/javascript"></script>','',$content);
			$content=str_replace('<script src="/js1/jquery1.9.1.min.js" type="text/javascript"></script>','',$content);
			$content=str_replace('<script src="/js1/jquery.min.js" type="text/javascript"></script>','',$content);
			$content=str_replace('<script src="/js1/user-comment-v1.js?v=0.10" type="text/javascript"></script>','',$content);
			$content=str_replace('/js1/FunctionAll.js?v=2.16','',$content);
			$content=str_replace('/js1/FunctionAll.js','',$content);
			
			$str_paging='result=result.replace("websosanh.vn","myweb.pro.vn/redirect");$("#ajaxLoading").html(result);$("#ajaxLoading .store-item-col2  a").each(function(){var href=$(this).attr("href").replace("websosanh.vn","myweb.pro.vn/redirect");$(this).attr("href",href);});$("#ajaxLoading .store-item-col1  a").each(function(){var href=$(this).attr("href").replace("websosanh.vn","myweb.pro.vn/shop-ban-san-pham");$(this).attr("href",href);$(this).attr("target","_parent")});';

			$content=str_replace('$("#ajaxLoading").html(result);',$str_paging,$content);
			//end

			//css combination - optimize broswer loading speed
			$content=str_replace('/css1/bootstrap1.css','',$content);	
			$content=str_replace('/css1/jquery-ui.css','',$content);	
			$content=str_replace('/css1/comment.css?v=2.12','',$content);	
			$content=str_replace('/css1/font-awesome.css','',$content);	
			$content=str_replace('/css1/main.css?v=2.12','',$content);	
			$content=str_replace('/css1/main.css?v=2.15','',$content);	
			$content=str_replace('/css1/chosen.min.css','',$content);	
			$content=str_replace('/css1/cate.css?v=2.12','',$content);	
			$content=str_replace('/css1/detail.css?v=2.12','',$content);	
			$content=str_replace('/css1/detail.css?v=2.13','',$content);	
			$content=str_replace('/css1/detail.css?v=2.14','',$content);	
			$content=str_replace('/css1/detail.css?v=2.15','',$content);	
			$content=str_replace('/css1/main-res.css?v=2.12','',$content);	
			$content=str_replace('/css1/animate.css?v=2.12','',$content);	
			$content=str_replace('/css1/vallenato.css','',$content);	
			$content=str_replace('/css1/slider.css','',$content);	
			$content=str_replace('/CSS/colorbox.css','',$content);	
			$content=str_replace('/css/slick.css','',$content);	
			$content=str_replace('/CSS/cate.css?v=0.34','http://xahoihoctap.net.vn/css/product_redirect.css',$content);//redirect page	

			//$content=str_replace('/CSS/cate.css?v=0.34','http://xahoihoctap.net.vn/css/product_compare.css',$content);	
			//$content=str_replace('/css1/cate.css?v=2.12','http://xahoihoctap.net.vn/css/product_compare.css',$content);	
			//$content=str_replace('<link href="/css1/comment.css?v=2.12" rel="stylesheet" type="text/css">','',$content);
			//end
			
	
			$content=str_replace('| websosanh.vn','',$content);
			$content=str_replace('- websosanh.vn','',$content);
			$content=str_replace('/img/logo1.png','http://xahoihoctap.net.vn/images/header/product_compare_price.jpg',$content);
			$content=str_replace('a href="http://websosanh.vn','a href="http://myweb.pro.vn',$content);	
			$content=str_replace('so-sanh.htm','wssv',$content);	
			$content=str_replace('dụng websosanh','dụng công cụ so sánh giá tại website <a href="http://myweb.pro.vn/home/sitemap" target="_new"><span style="color:red;font-weight:bold">myweb.pro.vn</span></a>',$content);	
			$content=str_replace('../../../images/logowss.png','',$content);
			$content=str_replace('title="Websosanh.vn"','title="myweb.pro.vn"',$content);
			$content=str_replace('<h1>  Websosanh.vn </h1>','chỉ mục của chúng tôi',$content);
			$content=str_replace('/Images/404.jpg','http://xahoihoctap.net.vn/images/myweb.pro.vn_error404.jpg',$content);
			$content=str_replace('var url = "/compare/" + label + ".htm"','var url = "http://myweb.pro.vn/click-compare-items/compare/" + label + ".htm"',$content);
			//end
			
			//reset path
			$content=str_replace('/Ajax/Company/','http://myweb.pro.vn/Ajax/Company/',$content);
			$content=str_replace('https://www.facebook.com/websosanhvietnam','href="https://www.facebook.com/__',$content);
			$content=str_replace('href="http://websosanh.vn/cua-hang','href="http://myweb.pro.vn/shop-ban-san-pham/cua-hang',$content);
			$content=str_replace('<a rel="nofollow" target="_blank" href="http://websosanh.vn/','<a rel="nofollow" target="_parent" href="http://myweb.pro.vn/redirect/',$content);
			$content=str_replace('/Ajax/V1/Product/','http://myweb.pro.vn/Ajax/Product/',$content);
			$content=str_replace('/Public/ProductMaps.ashx','http://websosanh.vn/Public/ProductMaps.ashx',$content);
			//end

			//reset meta tag and social sharing
			$content=str_replace('<link href="http://websosanh.vn/','<link href="http://myweb.pro.vn/so-sanh-gia/',$content);
			$content=str_replace('data-href="http://websosanh.vn','data-href="http://myweb.pro.vn/so-sanh-gia',$content);	
			$content=str_replace('content="http://websosanh.vn','content="http://myweb.pro.vn/so-sanh-gia',$content);
			//end

			//reset advertisement
			$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','',$content);	
			$middle_top_websosanh_adv_728x90='<div class="box-ads-desktop">';
			$ants_middle_top_728x90='<div class="box-ads-desktop"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script>';
			$content=str_replace($middle_top_websosanh_adv_728x90,$ants_middle_top_728x90,$content);	
			
			$left_websosanh_adv='<div class="box-ads-fix" style="min-height: 650px;">';
			$ants_left_300x600='<div class="box-ads-fix" style="min-height:650px;position:fixed;bottom:-75px;display:none">';
			$content=str_replace($left_websosanh_adv,$ants_left_300x600,$content);	
			//end

			return $content;
		}
		//end filter_websosanhvn_template function

		function redirect($path_element_1, $path_element_2, $path_element_3){
			$url='http://websosanh.vn/'.$path_element_1.'/'.$path_element_2.'/'.$path_element_3.'/direct.htm';
			$header= new header();
			$header->product();
			$data['content']=$this->filter_websosanhvn_template($url);
			$this->load->view('product/websosanhvn_redirect',$data);
		}

		function redirect_inner($path_element_1, $path_element_2, $path_element_3){
			$url='http://myweb.pro.vn/redirect/'.$path_element_1.'/'.$path_element_2.'/'.$path_element_3.'/direct.htm';
			redirect($url);
			exit();
			$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
			$data['url']=$url;
			$this->load->view('product/websosanhvn_redirect_inner',$data);
		}
		
		function go_shop_online($path_element_1,$path_element_2){
			if($path_element_1=='comvntoshop'){
				$url='http://'.$path_element_2;
			}
			else {
				$url='http://wwww.compare.vn/den-noi-ban/'.$path_element_1.'/'.$path_element_2.'?page=1';
			}
			$data['url']=$url;
			$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
			$this->load->view('product/comparevn_redirect',$data);
		} 
		function paging($path_element_1, $path_element_2, $path_element_3){
			if(!isset($_REQUEST['page_filter'])){
				$url='http://websosanh.vn/'.$path_element_1.'/'.$path_element_2.'/'.$path_element_3;
			}
			if(isset($_REQUEST['page_filter'])){
				$url='http://websosanh.vn/'.$path_element_1.'/'.$path_element_2.'/'.$path_element_3.'/'.$_REQUEST['page_filter'];
			}

			$header= new header();
			$header->product();
			$data['content']=$this->filter_websosanhvn_template($url);
			$this->load->view('product/websosanhvn',$data);
		}

		function compare_items($path_element_1, $path_element_2){
			$url='http://websosanh.vn/'.$path_element_1.'/'.$path_element_2;
			$header= new header();
			$header->product();
			$data['content']=$this->filter_websosanhvn_template($url);
			$this->load->view('product/websosanhvn_click_compare_and_shop',$data);
		}
		function search(){
			if(isset($_REQUEST['q'])){
						
			}
			else {
				redirect('http://myweb.pro.vn/so-sanh-gia/sach-tieng-viet-khac/cat-217.htm/wssv-category');
			}
			$url='http://websosanh.vn/s/'.urlencode($_REQUEST['q']).'.htm';
			
			$header= new header();
			$header->product();
			
			$data['content']=$this->filter_websosanhvn_template($url);
			$this->load->view('product/websosanhvn',$data);
		}
	}
?>