<?php
	require_once 'application/controllers/header.php';
	require_once 'application/controllers/nhaccuatui.php';
	require_once 'application/controllers/video.php';
	class getlink extends CI_Controller{
		//start function
		function nhaccuatui_audio(){
			$db=$this->load->database('default',TRUE);
			$header = new header();
			$header->getlink("Get link mp3 server nhaccuatui.com");
			$data=array();
			if(isset($_REQUEST['text_get_link'])){
				if(preg_match('/http/',$_REQUEST['text_get_link'])){
						$r=$db->select('*')
								 ->from('music_index')
								 ->where('referer','nhaccuatui')
								 ->where('type','audio')
								 ->where('fetch_link',$_REQUEST['text_get_link'])				
								 ->get()->result_array();
				}
				else {
						$r=$db->select('*')
								 ->from('music_index')
								 ->where('referer','nhaccuatui')
								 ->where('type','audio')
								 ->like('name',$_REQUEST['text_get_link'])				
								 ->limit(300) 
								->get()->result_array();
				}

				$link = new nhaccuatui();
				if($r){
					$media=$link->get_nhaccuatui_link($r[0]['fetch_link']);
					$json=array('link'=>$media,'name'=>$r[0]['name'],'arr_link'=>$r);
					echo json_encode($json);
					die();
				}
				else {
					if(preg_match('/http/',$_REQUEST['text_get_link'])){
						$media=$link->get_nhaccuatui_link($_REQUEST['text_get_link']);
						$json=array('link'=>$media,'name'=>'');
						echo json_encode($json);
						die();
					}
					else {
						$json=array('link'=>'0','name'=>'');
						echo json_encode($json);
						die();
					}
				}

				echo $media;
				die();
			}
			$data['csrf_test_name']=$this->security->get_csrf_hash();
			$this->load->view('getlink/audio_nhaccuatui',$data);
		}
		//end function

		//start function
		function get_link_zing_api(){
			$db=$this->load->database('default',TRUE);
			$header = new header();
			$header->getlink("Get link mp3 server mp3.zing.vn qua API");	
			
			if(isset($_REQUEST['text_get_link'])){
				if(preg_match('/http/',$_REQUEST['text_get_link'])){
						$r=$db->select('*')
								 ->from('music_index')
								 ->where('referer','mp3zing')
								 ->where('type','audio')
								 ->where('fetch_link',$_REQUEST['text_get_link'])				
								 ->get()->result_array();
				}
				else {
						$r=$db->select('*')
								 ->from('music_index')
								 ->where('referer','mp3zing')
								 ->where('type','audio')
								 ->like('name',$_REQUEST['text_get_link'])				
								 ->limit(300) 
								->get()->result_array();
				}

				$link = new nhaccuatui();
				if($r){
					$media=$link->get_zing_audio($r[0]['fetch_link']);
					$json=array('link'=>$media,'name'=>$r[0]['name'],'arr_link'=>$r);
					echo json_encode($json);
					die();
				}
				else {
					if(preg_match('/http/',$_REQUEST['text_get_link'])){
						$media=$link->get_zing_audio($_REQUEST['text_get_link']);
						$json=array('link'=>$media,'name'=>'');
						echo json_encode($json);
						die();
					}
					else {
						$json=array('link'=>'0','name'=>'');
						echo json_encode($json);
						die();
					}
				}

				echo $media;
				die();
			}

			$data['csrf_test_name']=$this->security->get_csrf_hash();
			$this->load->view('getlink/media_zing_api',$data);
		}
		//end function

		//start function
		function get_link_zing_mp4(){
			$db=$this->load->database('default',TRUE);
			$header = new header();
			$header->getlink("Get link mp4 server mp3.zing.vn qua API");	
			
			if(isset($_REQUEST['text_get_link'])){
				if(preg_match('/http/',$_REQUEST['text_get_link'])){
						$r=$db->select('*')
								 ->from('music_index')
								 ->where('referer','mp3zing')
								 ->where('type','video')
								 ->where('fetch_link',$_REQUEST['text_get_link'])				
								 ->get()->result_array();
				}
				else {
						$r=$db->select('*')
								 ->from('music_index')
								 ->where('referer','mp3zing')
								 ->where('type','video')							
								 ->like('name',$_REQUEST['text_get_link'])				
								 ->limit(300) 
								->get()->result_array();
				}

				$link = new nhaccuatui();
				if($r){
					$media=$link->get_zing_video($r[0]['fetch_link']);
					$json=array('link'=>$media,'name'=>$r[0]['name'],'arr_link'=>$r);
					echo json_encode($json);
					die();
				}
				else {
					if(preg_match('/http/',$_REQUEST['text_get_link'])){
						$media=$link->get_zing_video($_REQUEST['text_get_link']);
						$json=array('link'=>$media,'name'=>'');
						echo json_encode($json);
						die();
					}
					else {
						$json=array('link'=>'0','name'=>'');
						echo json_encode($json);
						die();
					}
				}

				echo $media;
				die();
			}

			$data['csrf_test_name']=$this->security->get_csrf_hash();
			$this->load->view('getlink/video_zing_api',$data);
		}
		//end function

		//start function
		function get_link_clipvn(){
			$db=$this->load->database('default',TRUE);
			$header = new header();
			$header->getlink("Get link mp4 server clip.vn");	
			
			if(isset($_REQUEST['text_get_link'])){
				if(preg_match('/http/',$_REQUEST['text_get_link'])){
						$r=$db->select('*')
								 ->from('film')
								 ->where('referer','clipvn')
								 ->where('fetch_link',$_REQUEST['text_get_link'])				
								 ->get()->result_array();
				}
				else {
						$r=$db->select('*')
								 ->from('film')
								 ->where('referer','clipvn')
								 ->like('name',$_REQUEST['text_get_link'])				
								 ->limit(300) 
								->get()->result_array();
				}

				$link = new video();
				if($r){
					$get = file_get_contents('compress.zlib://'.$r[0]['fetch_link']);
					if($get){} else{redirect('http://myweb.pro.vn/video?id_category=9');}
					preg_match("/Clip.App.clipId = '(.*)';/U",$get,$id);
					preg_match_all("#<enclosure url='(.*?)' duration='([0-9]+)' id='(.*?)' type='(.*?)' quality='([0-9]+)' (.*?) />#is", $link->get_clipvn($id[1]), $data);
					$media=$data[1][0];
					$json=array('link'=>$media,'name'=>$r[0]['name'],'arr_link'=>$r);
					echo json_encode($json);
					die();
				}
				else {
					if(preg_match('/http/',$_REQUEST['text_get_link'])){
						$get = file_get_contents('compress.zlib://'.$_REQUEST['text_get_link']);
						if($get){} else{redirect('http://myweb.pro.vn/video?id_category=9');}
						preg_match("/Clip.App.clipId = '(.*)';/U",$get,$id);
						preg_match_all("#<enclosure url='(.*?)' duration='([0-9]+)' id='(.*?)' type='(.*?)' quality='([0-9]+)' (.*?) />#is", $link->get_clipvn($id[1]), $data);
						$media=$data[1][0];
						$json=array('link'=>$media,'name'=>'');
						echo json_encode($json);
						die();
					}
					else {
						$json=array('link'=>'0','name'=>'');
						echo json_encode($json);
						die();
					}
				}

				echo $media;
				die();
			}

			$data['csrf_test_name']=$this->security->get_csrf_hash();
			$this->load->view('getlink/clipvn',$data);
		}
		//end function

		//start function
		function get_link_keeng_vn(){
			$db=$this->load->database('default',TRUE);
			$header = new header();
			$header->getlink("Get link download server keeng.vn");	
			
			if(isset($_REQUEST['text_get_link'])){
				if(preg_match('/http/',$_REQUEST['text_get_link'])){
						$r=$db->select('*')
								 ->from('music_index')
								 ->where('referer','www.keeng.vn')
								 ->where('fetch_link',$_REQUEST['text_get_link'])				
								 ->get()->result_array();
				}
				else {
						$r=$db->select('*')
								 ->from('music_index')
								 ->where('referer','www.keeng.vn')
								 ->like('name',$_REQUEST['text_get_link'])				
								 ->limit(300) 
								->get()->result_array();
				}

				$link = new nhaccuatui();
				if($r){
					$media=$link->get_link_keeng_vn($r[0]['fetch_link']);
					$json=array('link'=>$media,'name'=>$r[0]['name'],'arr_link'=>$r);
					echo json_encode($json);
					die();
				}
				else {
					if(preg_match('/http/',$_REQUEST['text_get_link'])){
						$media=$link->get_link_keeng_vn($_REQUEST['text_get_link']);	
						$json=array('link'=>$media,'name'=>'','arr_link'=>$media);
						echo json_encode($json);
						die();
					}
					else {
						$json=array('link'=>'0','name'=>'');
						echo json_encode($json);
						die();
					}
				}

				echo $media;
				die();
			}

			$data['csrf_test_name']=$this->security->get_csrf_hash();
			$this->load->view('getlink/keengvn',$data);
		}
		//end function
		
		//start function
		function get_link_meme_vn(){
			$db=$this->load->database('default',TRUE);
			if(isset($_REQUEST['text_get_link'])){
				if(preg_match('/http/',$_REQUEST['text_get_link'])){
						$r=$db->select('*')
								 ->from('film')
								 ->where('referer','memevn')
								 ->where('fetch_link',$_REQUEST['text_get_link'])				
								 ->get()->result_array();
				}
				else {
						$r=$db->select('*')
								 ->from('film')
								 ->where('referer','memevn')
								 ->like('name',$_REQUEST['text_get_link'])				
								 ->limit(300) 
								->get()->result_array();
				}
				$link= new video();
				if($r){
					$video=$link->get_memevn($r[0]['fetch_link']);
					$json=array('link'=>$video,'name'=>$r[0]['name'],'arr_link'=>$r);
					echo json_encode($json);
					die();
				}
				else {
					if(preg_match('/http/',$_REQUEST['text_get_link'])){
						$video=$link->get_memevn($_REQUEST['text_get_link']);						
						$json=array('link'=>$video,'name'=>'');
						echo json_encode($json);
						die();
					}
					else {
						$json=array('link'=>'0','name'=>'');
						echo json_encode($json);
						die();
					}
				}
			}
			$header = new header();
			$header->getlink("Get link video server www.meme.vn");	
			
			$data['csrf_test_name']=$this->security->get_csrf_hash();
			$this->load->view('getlink/meme_vn',$data);
		}
		//end function	

		//start function
		function get_v_nhaccuatui(){
			$db=$this->load->database('default',TRUE);
			if(isset($_REQUEST['text_get_link'])){
				if(preg_match('/http/',$_REQUEST['text_get_link'])){
						$r=$db->select('*')
								 ->from('film')
								 ->where('referer','memevn')
								 ->where('fetch_link',$_REQUEST['text_get_link'])				
								 ->get()->result_array();
				}
				else {
						$r=$db->select('*')
								 ->from('film')
								 ->where('referer','memevn')
								 ->like('name',$_REQUEST['text_get_link'])				
								 ->limit(300) 
								->get()->result_array();
				}
				$link= new video();
				if($r){
					$video=$link->get_memevn($r[0]['fetch_link']);
					$json=array('link'=>$video,'name'=>$r[0]['name'],'arr_link'=>$r);
					echo json_encode($json);
					die();
				}
				else {
					if(preg_match('/http/',$_REQUEST['text_get_link'])){
						$video=$link->get_memevn($_REQUEST['text_get_link']);						
						$json=array('link'=>$video,'name'=>'');
						echo json_encode($json);
						die();
					}
					else {
						$json=array('link'=>'0','name'=>'');
						echo json_encode($json);
						die();
					}
				}
			}
			$header = new header();
			$header->getlink("Get link video server v.nhaccuatui.com");	
			
			$data['csrf_test_name']=$this->security->get_csrf_hash();
			$this->load->view('getlink/v_nhaccuatui_com',$data);
		}
		//end function	
		
		//start
		function get_playlist_v_nhaccuatui(){
			$xml_playlist='http://v.nhaccuatui.com/flash/xml?key='.$_REQUEST['episode_key'];
			$data = explode('<item>',file_get_contents($xml_playlist));
			$episode_id=$_REQUEST['episode_id'];
			$link = explode('<location><![CDATA[',$data[$episode_id]);
			$link = explode(']]></location>', $link[1]);
			echo $link[0]; 
		}
		//end
		
		//start function
		function get_link_google_drive(){
			$get = file_get_contents($_REQUEST['link']);
			$cat = explode(',["fmt_stream_map","', $get); $cat = explode('"]', $cat[1]);
			$cat = explode(',', $cat[0]);
			foreach($cat as $link){
			$cat = explode('|', $link);
			$links = str_replace(array('\u003d', '\u0026'), array('=', '&'), $cat[1]);
			if($cat[0] == 37) {$f1080p = $links;}
			if($cat[0] == 22) {$f720p = $links;}
			if($cat[0] == 59) {$f480p = $links;}
			if($cat[0] == 43) {$f360p = $links;}
			}
			$arr_link=array();
			if(isset($f1080p)){
			array_push($arr_link,$f720p);
			array_push($arr_link,$f480p);
			array_push($arr_link,$f480p);
			array_push($arr_link,$f1080p);
			} elseif(isset($f720p)){
			array_push($arr_link,$f720p);
			array_push($arr_link,$f480p);
			array_push($arr_link,$f360p);
			array_push($arr_link,$f480p);
			array_push($arr_link,$f360p);
			} else {
			array_push($arr_link,$f360p);
			}
			$json=array('arr_link'=>$arr_link);
			echo json_encode($json);
		}
		//end function
	}
?>