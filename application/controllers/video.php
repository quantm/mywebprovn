<?php 
	require_once 'application/controllers/header.php';
	require_once 'application/controllers/analytic.php';
	require_once 'application/controllers/web_transfer.php';
	class video extends CI_Controller{
		
		//start function
		function index($sort_by = 'name', $sort_order = 'desc', $offset = 0){

		//new model instance
		$this->load->model('video_model');

		$per_page  = 15;
		$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2); 
		$results = $this->video_model->SelectAll($per_page, $offset, $sort_by, $sort_order);     

		if(isset($_REQUEST['id_category'])){
			$data['id_category_pagination'] =$_REQUEST['id_category']; 
		}
		if(!isset($_REQUEST['id_category'])){
			$data['id_category_pagination'] ='1'; 
		}
		if(isset($_REQUEST['id_sub_category'])){
			$data['id_sub_category_pagination'] =$_REQUEST['id_sub_category']; 
		}
		if(!isset($_REQUEST['id_sub_category'])){
			$data['id_sub_category_pagination'] ='1'; 
		}

		//pagination
		$this->load->library('pagination'); 
		$config['total_rows'] = $results['num_rows'];
		$config['per_page'] = $per_page; 
		$config['next_link'] = 'Trang tiếp »'; 
		$config['prev_link'] = '« Trang sau'; 
		$config['num_tag_open'] = ''; 
		$config['num_tag_close'] = ''; 
		$config['num_links'] = 10; 
		$config['cur_tag_open'] = '<a class="currentpage">'; 
		$config['cur_tag_close'] = '</a>';
		$config['first_link'] = 'Trang đầu';
		$config['last_link'] = 'Trang cuối';
		$config['base_url'] = 'http://myweb.pro.vn/video/';
		$config['uri_segment'] = 2; 
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();
		
		//render view
		$data['content'] = $results['rows'];     
		$data['total_rows']=$results['num_rows'];
		$data['pagination'] = $pagination;
		if(isset($_REQUEST['search'])){
			$data['search'] = $_REQUEST['search'];
		}
		if(!isset($_REQUEST['search'])){
			$data['search'] ='';
		}
		$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
		$this->load->view('film/index',$data);
	}
	//end function
	
	//start function
	function add_my_video(){
		$this->load->model('log_model');
		$id_u=$this->log_model->getId();
		$data_book_check=$this->db->select('*')->from('fk_user_video')
		->where('ID_U',$id_u)
		->where('ID_VIDEO',$_REQUEST['video_id'])
		->get()->result_array();
		if($data_book_check){
		echo "1";
		}
		else{
		$data_myvid=array("ID_U"=>$id_u,"ID_VIDEO"=>$_REQUEST['video_id']);
		$this->db->insert('fk_user_video',$data_myvid);
		echo "0";
		}
	}
	//end function
	
	//start function
	function myvid(){
		$this->load->model('log_model');
		$id_u=$this->log_model->getId();
		$data_mylib=$this->db->select('*')
		->from('film')
		->join('fk_user_video','fk_user_video.ID_VIDEO=film.id','inner')
		->where('ID_U',$id_u)
		->get()->result_array();
		if($data_mylib){
		$data['myvid']=$data_mylib;
		}
		else{
		$data_mylib=$this->db->select('*')
		->from('film')
		->join('fk_user_video','fk_user_video.ID_VIDEO=film.id','inner')
		->where('ID_U','253')
		->get()->result_array();
		$data['myvid']=$data_mylib;
		}
		$this->load->view('film/mylib',$data);
	}
	//end function
	
	function get_memevn($url){
				$content_url=file_get_contents('compress.zlib://'.$url);
				preg_match('/<meta property="og:video" content="https:\/\/embed.meme.vn\/video\/(.*)" \/>/U', $content_url, $id);
				$embed = 'http://embed.meme.vn/embedif.php?type=clip&v='.$id[1];
				$content_embed=file_get_contents('compress.zlib://'.$embed);
				if(strpos($content_embed,'"video":[')){
						$data = explode('"video":[', $content_embed);
						$data = explode(']', $data[1]);
						preg_match_all('/"url":"(.*)"/U', $data[0], $data);	
						return $data[1][0];
				}	
				else { return '0';}
	}
	function get_clipvn($id){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://clip.vn/ajax/login');
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Requested-With: XMLHttpRequest'));
		curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, array('username' => 'quantm_video', 'password' => '012tmqnhtd', 'persistent' => 1));

		curl_setopt($ch, CURLOPT_URL, 'http://clip.vn/movies/nfo/'.$id);
		curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
		curl_setopt($ch, CURLOPT_POSTFIELDS, array('onsite' => 'clip'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}

	function htm5_video($path_referer,$path_element_2,$path_element_3){
			$db=$this->load->database('default',TRUE);
			$count = $this->db->select('COUNT(*) as count', FALSE)->from('film')->get()->result();
			$data['count'] = $count[0]->count;
			$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
			
			//page background
			$arr_img=array();
			for($img_index=102;$img_index<127;$img_index++){
				array_push($arr_img,$img_index);
			}
			$i = rand(0, count($arr_img)-1); // generate random number size of the array
			//render view
			$data['id_image'] = "$arr_img[$i]";

			switch($path_referer){
				case 'mvietcom':
				$url='http://m-viet.com/'.$path_element_2.'/'.$path_element_3.'?xem='.$_REQUEST['xem'];
				$content =file_get_contents($url);
				$content=str_replace('UA-46095601-1','',$content);
				$content=str_replace('content="http://m-viet.com','content="http://myweb.pro.vn/xem-video-tong-hop/mvietcom',$content);
				$content=str_replace('<link rel="canonical" href="http://m-viet.com','<link rel="canonical" href="http://myweb.pro.vn/xem-video-tong-hop/mvietcom',$content);
				$film=$db->select('*')->from('film')->where('fetch_link',$url)->get()->result_array();

				if($film){} else {redirect('http://myweb.pro.vn/video');}	
				
				//render view
				$data['name']=$film[0]['name'];
				$data['film_link']=$film[0]['film_link'];
				$data['thumb']=$film[0]['thumb'];
				$data['referer']=$film[0]['referer'];
				$data['content']=$content;
				$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
				$data['base']='<base href="http://m-viet.com/">';
				$this->load->view('film/template-web-kit-3d',$data);
				break;

				case 'chatvlcom':
				$url='http://chatvl.com/'.$path_element_2.'/'.$path_element_3;
				$content =file_get_contents($url);
				$content=str_replace('UA-19751128-44','',$content);
				$content=str_replace('content="http://chatvl.com','content="http://myweb.pro.vn/xem-video-tong-hop/chatvcom',$content);
				$content=str_replace('<link rel="canonical" href="http://chatvl.com','<link rel="canonical" href="http://myweb.pro.vn/xem-video-tong-hop/chatvlcom',$content);
				$film=$db->select('*')->from('film')->where('fetch_link',$url)->get()->result_array();

				//render view
				$data['name']=$film[0]['name'];
				$data['film_link']=$film[0]['film_link'];
				$data['referer']=$film[0]['referer'];
				$data['thumb']=$film[0]['thumb'];
				$data['content']=$content;
				$data['base']='<base href="http://chatvl.com/">';
				$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
				$this->load->view('film/template-web-kit-3d',$data);
				break;

				case 'muviza':
				$youtube_id=$path_element_2;

				$film=$db->select('*')->from('film')
							//->where('referer','www.muviza.com')
							->like('film_link',$youtube_id)->get()->result_array();

				$film_related=$db->select('*')->from('film')
										->where('referer','www.muviza.com')
										->where('id >',$film[0]['id'])
										->limit(8)
										->get()->result_array();	
				
				//config videojs
				$film_link=$film[0]['film_link'];
				$film_link='http://youtube.com'.$film_link;
				$config='{"poster":"http://xahoihoctap.net.vn/images/background/film_cover.jpg","controls":true,"autoplay":false,"preload":"none","techOrder":["youtube"],"src":"'.$film_link.'"}';
				
				//variable for render view
				$ads_object='<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16556.ads"></script>'; //728x110
				$htm5_video='<h1 class="video_title_vnhaccuatui font-effect-emboss">'.$film[0]['name'].'</h1><video width="800" height="600" data-setup='.$config.' class="video-js vjs-default-skin my_htm5_video"></video>';
				$content='<div class="video_object">'.$htm5_video.'<div style="clear:both"></div><div style="margin-top: 89%;margin-left: 44%;" class="music_bottom_ads">'.$ads_object.'</div></div>';

				//render view
				$data['name']=$film[0]['name'];
				$data['film_link']=$film[0]['film_link'];
				$data['referer']=$film[0]['referer'];
				$data['content']='';
				$data['thumb']=$film[0]['thumb'];
				$data['muviza_related']=$film_related;
				$data['base']='';
				$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
				$this->load->view('film/template-web-kit-3d',$data);
				break;

				case 'clipvn':
				$film=$db->select('*')->from('film')
										  ->where('referer','clipvn')
				                          ->like('fetch_link',$path_element_3)->get()->result_array();
				
				//film related
				$film_related=$db->select('*')->from('film')
										->where('referer','clipvn')
										->where('id >',$film[0]['id']-9)
										->where('id <',$film[0]['id']+9)
										->get()->result_array();	

				$get = file_get_contents('compress.zlib://'.$film[0]['fetch_link']);
				if($get){} else{redirect('http://myweb.pro.vn/video?id_category=9');}
				preg_match("/Clip.App.clipId = '(.*)';/U",$get,$id);
				preg_match_all("#<enclosure url='(.*?)' duration='([0-9]+)' id='(.*?)' type='(.*?)' quality='([0-9]+)' (.*?) />#is", $this->get_clipvn($id[1]), $data);
				if($data[1][0]){} else{redirect('http://myweb.pro.vn/video?id_category=9');}
			
				$clip_vn_video_link=$data[1][0];	
				$ads_object='<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script>'; //728x90
				$config='{"poster":"http://xahoihoctap.net.vn/images/background/film_cover.jpg","controls":true,"autoplay":true,"preload":"none"}';
				
				//variable for render view
				$htm5_video='<h1 class="video_title_vnhaccuatui font-effect-emboss">'.$film[0]['name'].'</h1><video width="800" height="600" data-setup='.$config.' class="video-js vjs-default-skin my_htm5_video" src='.$clip_vn_video_link.'></video>';
				$content='<div class="video_object">'.$htm5_video.'<div style="clear:both"></div><div style="margin-top: 89%;margin-left: 44%;" class="music_bottom_ads">'.$ads_object.'</div></div>';

				//render view
				$data['name']=$film[0]['name'];
				$data['film_link']=$film[0]['film_link'];
				$data['referer']=$film[0]['referer'];
				$data['thumb']=$film[0]['thumb'];
				$data['base']='';
				$data['id_image'] = "$arr_img[$i]";
				$data['count'] = $count[0]->count;
				$data['muviza_related']=$film_related;
				$data['content']=$content;
				$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
				$this->load->view('film/template-web-kit-3d',$data);
				break;

				case 'memevn':
				$fetch_link='http://www.meme.vn/video/'.$path_element_3;
				$film=$db->select('*')->from('film')
											 ->where('referer','memevn')
											 ->where('fetch_link',$fetch_link)->get()->result_array();
				//film related
				$film_related=$db->select('*')->from('film')
									   ->where('referer','memevn')
									   ->where('id >',$film[0]['id']-8)
									   ->where('id <',$film[0]['id']+8)
									   ->get()->result_array();	

				$memevn_video_link=$this->get_memevn($film[0]['fetch_link']);
				$ads_object='<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script>'; //728x90
				$htm5_video='<video id="html_5_video" autoplay preload="auto" poster="http://xahoihoctap.net.vn/images/loading_video_html_5.gif" controls src='.$memevn_video_link.'></video>';
				$content='<div class="video_object"><h3 class="font-effect-emboss video-title">'.$film[0]['name'].'</h3><div style="clear:both"></div>'.$htm5_video.'<div style="clear:both"></div><div style="margin-top: 89%;margin-left: 44%;" class="music_bottom_ads">'.$ads_object.'</div></div>';
				//render view
				$data['name']=$film[0]['name'];
				$data['film_link']=$film[0]['film_link'];
				$data['referer']=$film[0]['referer'];
				$data['thumb']=$film[0]['thumb'];
				$data['base']='';
				$data['muviza_related']=$film_related;
				$data['content']=$content;
				$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
				$this->load->view('film/template-web-kit-3d',$data);
				break;

				case 'vnhaccuatui':
				$fetch_link='http://v.nhaccuatui.com/'.$path_element_2.'/'.$path_element_3;
				$film=$db->select('*')->from('film')
											 ->where('referer','v.nhaccuatui.com')
											 ->like('fetch_link',$fetch_link)											 
											 ->get()->result_array();
				if($film){}else {
					echo '<meta charset="UTF-8"/>';
					die('<h1>Không tìm thấy <a href="/video">Trang chủ</a></h1><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');
				}
				$content=file_get_contents($film[0]['fetch_link']);
				$data['name']=$film[0]['name'];
				$data['film_link']=$film[0]['film_link'];
				$data['referer']=$film[0]['referer'];
				$data['thumb']=$film[0]['thumb'];
				$data['base']='';
				$data['muviza_related']=array();
				if(!isset($_REQUEST['episode_id'])){
					$data['content']=$content.'<input type="hidden" id="episode_id" value="1">';
				}
				if(isset($_REQUEST['episode_id'])) {
					$data['content']=$content.'<input type="hidden" id="episode_id" value="'.$_REQUEST['episode_id'].'">';
				}
				$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
				$this->load->view('film/template-web-kit-3d',$data);
				break;

				case 'megabox':
				$fetch_link='http://phim.megabox.vn/'.$path_element_2.'/'.$path_element_3;
				$film=$db->select('*')->from('film')
											 ->where('referer','megabox.vn')
											 ->like('fetch_link',$fetch_link)											 
											 ->get()->result_array();
				
				//film related
				$film_related=$db->select('*')->from('film')
									   ->where('referer','megabox.vn')
									   ->where('id <',$film[0]['id'])
									   ->limit(8)
									   ->get()->result_array();

				$link=explode('/',$film[0]['fetch_link']);
				$link=explode('html',$link[4]);
				$link=end(explode('-',$link[0]));
				$link=str_replace('.','',$link);
				
				//render view
				$data['name']=$film[0]['name'];
				$data['film_link']=$film[0]['film_link'];
				$data['referer']=$film[0]['referer'];
				$data['thumb']=$film[0]['thumb'];
				$data['base']='';
				$data['muviza_related']=$film_related;
				$data['content']=$link;
				$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
				$this->load->view('film/template-web-kit-3d',$data);
				break;

				case 'nguoibanviet':
				$fetch_link='http://nguoibanviet.com/'.$path_element_2.'/'.$path_element_3;
				$film=$db->select('*')->from('film')
											 ->where('referer','nguoibanviet.com')
											 ->like('fetch_link',$fetch_link)											 
											 ->get()->result_array();
				//film related
				$film_related=$db->select('*')->from('film')
									   ->where('referer','nguoibanviet.com')
									   ->where('id >',$film[0]['id'])
									   ->limit(10)
									   ->get()->result_array();	

				if($film){}else {
					echo '<meta charset="UTF-8"/>';
					die('<h1>Không tìm thấy <a href="/video">Trang chủ</a></h1><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');
				}
			
				if(strlen($film[0]['name'])<80){$film_name=$film[0]['name'];}
				if(strlen($film[0]['name'])>=80){$film_name=substr($film[0]['name'],0,78)."...";}
				$content=file_get_contents($film[0]['fetch_link'].'/xem-phim');
				
				//render view
				$data['name']=$film_name;
				$data['film_link']=$film[0]['film_link'];
				$data['referer']=$film[0]['referer'];
				$data['thumb']=$film[0]['thumb'];
				$data['base']='';
				$data['muviza_related']=$film_related;
				$data['content']=$content;
				$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
				$this->load->view('film/template-web-kit-3d',$data);
				break;

				case 'zingtv':
				$fetch_link='http://tv.zing.vn/'.$path_element_2.'/'.$path_element_3;
				$film=$db->select('*')->from('film')
											 ->where('referer','tv.zing.vn')
											 ->like('fetch_link',$fetch_link)											 
											 ->get()->result_array();
				if($film){}else {
					echo '<meta charset="UTF-8"/>';
					die('<h1>Không tìm thấy <a href="/video">Trang chủ</a></h1><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');
				}

				//film related
				$film_related=$db->select('*')->from('film')
									   ->where('referer','tv.zing.vn')
									   ->where('id >',$film[0]['id'])
									   ->limit(11)
									   ->get()->result_array();	
				
				$get_zingtv_link='http://getlinkfs.com/getfile/zingtv.php?link='.$film[0]['fetch_link'];
				$content=file_get_contents($get_zingtv_link);
				$data['name']=$film[0]['name'];
				$data['film_link']=$film[0]['film_link'];
				$data['referer']=$film[0]['referer'];
				$data['thumb']=$film[0]['thumb'];
				$data['base']='';
				$data['muviza_related']=$film_related;
				$data['content']=$content;
				$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
				$this->load->view('film/template-web-kit-3d',$data);
				break;

				case 'vietsubhd':
					echo '<meta charset="UTF-8"/>';
					die('<h1>Không tìm thấy <a href="/video">Trang chủ</a></h1><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');
				break;

				case 'phimbathu':
					echo '<meta charset="UTF-8"/>';
					die('<h1>Không tìm thấy <a href="/video">Trang chủ</a></h1><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');
				break;

				case 'direct_link':
				$fetch_link='http://'.$path_element_2.'/'.$path_element_3;

				$film=$db->select('*')->from('film')
											 ->where('referer','direct_link')
											 ->like('fetch_link',$fetch_link)											 
											 ->get()->result_array();
				//film related
				$film_related=$db->select('*')->from('film')
									   ->where('referer','direct_link')
									   ->where('id <',$film[0]['id'])
									   ->limit(10)
									   ->get()->result_array();	

				if($film){}else {
					echo '<meta charset="UTF-8"/>';
					die('<h1>Không tìm thấy <a href="/video">Trang chủ</a></h1><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');
				}
				$data['name']=$film[0]['name'];
				$data['film_link']=$film[0]['film_link'];
				$data['referer']=$film[0]['referer'];
				$data['thumb']=$film[0]['thumb'];
				$data['base']='';
				$data['muviza_related']=$film_related;
				$data['content']='';
				$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
				$this->load->view('film/template-web-kit-3d',$data);
				break;

			}
			//end switch 
	}
	

}?>