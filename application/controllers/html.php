<?php
	require_once 'application/controllers/header.php';
	class html extends CI_Controller {
		function index(){
			$header = new header();
			$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
			
			if(!isset($_REQUEST['render'])){
				
				if(!isset($_REQUEST['category'])){
					$header->programing("Lập trình web với HTML,CSS và Javascript");
					$this->load->view('lap_trinh/html/html',$data);
				}

				if(isset($_REQUEST['category'])){
					switch($_REQUEST['category']) {				
						case 'editor':
						$header->programing("Trình soạn thảo HTML");
						$this->load->view('lap_trinh/html/editor',$data);
						break;
						case 'basic':
						$header->programing("HTML căn bản");
						$this->load->view('lap_trinh/html/basic',$data);
						break;
						case 'element':
						$header->programing("Thành phần của trang HTML");
						$this->load->view('lap_trinh/html/element',$data);
						break;
					}
				}
			}

			if(isset($_REQUEST['render'])){
				$content=$_REQUEST['render'];
				$data['render']=$content;
				$data['return']=$_REQUEST['return'];
				$this->load->view('runcode/html',$data);
			}

		}
	}
?>