<?php
	require_once 'application/controllers/header.php';
	class kiemtien extends CI_Controller{
		function index($url){
				$path=str_replace('--','/',$url);
				$site_data=$this->db->select('*')->from('mmo')->like('path',$path)->get()->result_array();								
				foreach($site_data as $val);
				if($val['id']=='3'){
							echo '<title>Website đang nâng cấp</title>';
							echo '<meta charset="UTF-8"/>';
							echo '<style type="text/css">#ads_zone16604{margin-top:-600px;margin-left:-599px}</style>';
							echo '<h3>Website đang tạm thời nâng cấp. Bạn vui lòng trở lại sau..</h3>';
							echo '<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_17760.ads"></script>';
							echo '<div style="margin-top:-600px;margin-left:598px;"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script></div>';
							echo '<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16604.ads"></script>';				
							die();
				}
				//filter path case thesonnet
				$url=str_replace('theson.net/blog','trogiup.net/news',$val['path']);
				$url=str_replace('theson.net/kiemtien','trogiup.net/kiemtien',$url);
				$url=str_replace('theson.net/wordpress/','trogiup.net/thietke/',$url);
				$url=str_replace('theson.net/lamseo/','trogiup.net/lamseo/',$url);
				//end

				$site_content= file_get_contents($url);				
				if($site_data){
					$site_content=str_replace('display: block;width: 340px;height:280px;margin: 10px auto; max-width: 100%;','display:none',$site_content);
					$site_content=str_replace('style="display:none"','class="remove";style="display:none"',$site_content);
					$site_content=str_replace('Theson.net','myweb.pro.vn',$site_content);
					$site_content=str_replace('Danny Nguyen','',$site_content);
					switch($val['referer']){
						
						//start theson.net
						case 'thesonnet': 
						//reset advertisement
						$site_content=str_replace('<!-- BOTIMG-trogiup.net -->','<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324859.js"></script>',$site_content);
						//end

						$site_content=str_replace('<div style="display: block;max-width: 340px;margin: 10px auto; width: 100%;">','<div class="remove">',$site_content);
						$site_content=str_replace('thesondotnet','quantmMr',$site_content);
						$site_content=str_replace('112267996776902055306','117876896675075411975',$site_content);
						$site_content=str_replace('<div style="display: block;max-width: 640px;margin: 0px auto; width: 100%;">','<div class="remove">',$site_content);
						$site_content=str_replace('<img','<img onerror="load_img(this)"',$site_content);
						preg_match_all('/<div class="entry-content">(.*?)<ol id="relatedposts" class="grid-100 mobile-grid-100">/s',$site_content,$matches,PREG_SET_ORDER);		
						if($matches){
							foreach($matches as $key);
						}
						else {							
							preg_match_all('/<div class="entry-content">(.*?)<footer class="entry-meta">/s',$site_content,$matches,PREG_SET_ORDER);				
							if($matches){
								foreach($matches as $key);	
							}
							else {
							
							}
						}
						if($matches) {} else {
								echo '<title>Website đang nâng cấp</title>';
								echo '<meta charset="UTF-8"/>';
								echo '<style type="text/css">#ads_zone16604{margin-top:-600px;margin-left:-599px}</style>';
								echo '<h3>Website đang tạm thời nâng cấp. Bạn vui lòng trở lại sau..</h3>';
								echo '<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_17760.ads"></script>';
								echo '<div style="margin-top:-600px;margin-left:598px;"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script></div>';
								echo '<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16604.ads"></script>';				
								die();
							}
						//end theson.net


						break;
						case 'thachphamcom':
						$site_content=str_replace('aligncenter','remove',$site_content);
						$site_content=str_replace('img','img style="display:none"',$site_content);
						preg_match_all('/<div class="entry-content">(.*?)<div class="zem_rp_wrap zem_rp_th_vertical" id="zem_rp_first">/s',$site_content,$matches,PREG_SET_ORDER);						
						if($matches){
							foreach($matches as $key);
						}
						else {											
							echo '<title>Website đang nâng cấp</title>';
							echo '<meta charset="UTF-8"/>';
							echo '<style type="text/css">#ads_zone16604{margin-top:-600px;margin-left:-599px}</style>';
							echo '<h3>Website đang tạm thời nâng cấp. Bạn vui lòng trở lại sau..</h3>';
							echo '<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_17760.ads"></script>';
							echo '<div style="margin-top:-600px;margin-left:598px;"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script></div>';
							echo '<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16604.ads"></script>';				
							die();
						}
						break;
						//end thachpham.com

						case 'kiemtientrenmangazcom':
						preg_match_all('/<article>(.*?)<div class="rltp clearfix">/s',$site_content,$matches,PREG_SET_ORDER);	
						if($matches){foreach($matches as $key);}
						else {
							echo '<title>Website đang nâng cấp</title>';
							echo '<meta charset="UTF-8"/>';
							echo '<style type="text/css">#ads_zone16604{margin-top:-600px;margin-left:-599px}</style>';
							echo '<h3>Website đang tạm thời nâng cấp. Bạn vui lòng trở lại sau..</h3>';
							echo '<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_17760.ads"></script>';
							echo '<div style="margin-top:-600px;margin-left:598px;"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script></div>';
							echo '<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16604.ads"></script>';				
							die();
						}
						break;

					}
				}
				//end if found record in db
				
				else {
					redirect('/kiemtien/danhmuc?id=1');
				}

				$header= new header();
				$header->mmo($val['name']);
				$data['content']=$key[1];
				$data['title']=$val['name'];
				$data['path']=$url;
				$this->load->view('mmo/fetch_content',$data);
		}
		function danhmuc($sort_by = 'NAME', $sort_order = 'asc', $offset = 0){
			
			//new model instance
			$this->load->model('kiemtien_model');
			//end
					
			//start pagination
			$per_page  = 12;
			$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2); 
			$results = $this->kiemtien_model->SelectAll($per_page, $offset, $sort_by, $sort_order);     
		
			$this->load->library('pagination'); 
			$config['total_rows'] = $results['num_rows'];
			$config['per_page'] = $per_page; 
			$config['next_link'] = 'Trang tiếp »'; 
			$config['prev_link'] = '« Trang sau'; 
			$config['num_tag_open'] = ''; 
			$config['num_tag_close'] = ''; 
			$config['num_links'] = 5; 
			$config['cur_tag_open'] = '<a class="currentpage">'; 
			$config['cur_tag_close'] = '</a>';
			$config['first_link'] = 'Trang đầu';
			$config['last_link'] = 'Trang cuối';
			$config['base_url'] = "http://myweb.pro.vn/kiem-tien-online";
			$config['uri_segment'] = 2; 
			$this->pagination->initialize($config);
			$pagination = $this->pagination->create_links();
			//end pagination
					
			$data['pagination']=$pagination;
			$data['mmo']=$results['rows'];
			if(isset($_REQUEST['id'])){
				$data['id']=$_REQUEST['id'];
				foreach($this->db->select('*')->from('mmo_category')->where('id',$_REQUEST['id'])->get()->result_array() as $key);
				$header= new header();
				$header->mmo($key['name']);
				$data['cate_name']=$key['name'];	
			}
			else {
				$header= new header();
				$header->mmo('Kiếm tiền Online');
				$data['cate_name']='';	
			}
			$this->load->view('mmo/danhmuc',$data);
		}

		function get_content(){
			$header= new header();
			$header->mmo('mmo');
			if($_REQUEST['page']=='17'){
				exit();
			}
			$data['page']=$_REQUEST['page']+1;
			$data['content']=file_get_contents('http://thachpham.com/category/wordpress/wordpress-tutorials/page/'.$_REQUEST['page']);
			$this->load->view('mmo/get',$data);
		}
		
		function ins_db(){
			$data=array(
				'id_category'=>'3',
				'referer'=>'thachphamcom',
				'name'=>trim($_REQUEST['name']),
				'description'=>'',
				'path'=>$_REQUEST['path']
			);
			$money_data=$this->db->select('*')->from('mmo')->where('path',$_REQUEST['path'])->get()->result_array();		
			if($money_data){
				echo '1';
			}
			else {
				$this->db->insert('mmo',$data);
				echo $this->db->insert_id();
			}		
		}

		function cse(){
			$header = new header();
			$header->mmo("Kết quả tìm kiếm");
			$this->load->view('google/cse');
		}
		//http://kiemtien.org

		//http://affiliatemarketing.vn/

		//https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=ch%C6%B0%C6%A1ng%20tr%C3%ACnh%20li%C3%AAn%20k%E1%BA%BFt%20ti%E1%BA%BFp%20th%E1%BB%8B%20c%E1%BB%A7a%20amazon

		//http://www.khuetran.com/kiem-tien-voi-amazon/

		//http://www.khuetran.com/huong-dan-xay-dung-niche-site-kiem-tien-voi-amazon/

		//https://www.google.com/search?q=niche+site&oq=niche+site&aqs=chrome..69i57j69i60&sourceid=chrome&es_sm=93&ie=UTF-8#q=niche+site+amazon

		//http://www.khuetran.com/tong-ket-thu-nhap-tu-niche-site-ktt-thang-4/

		//https://www.google.com/?gws_rd=ssl#q=n%E1%BB%99i+dung+%C4%91%E1%BB%83+ch%E1%BA%A1y+qu%E1%BA%A3ng+c%C3%A1o+adsense&start=10

	}
?>
