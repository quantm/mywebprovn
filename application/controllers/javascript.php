<?php
	require_once 'application/controllers/header.php';
	class javascript extends CI_Controller {
		function index(){
			header("X-XSS-Protection: 0");
		
			$header = new header();
			$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
			
			if(!isset($_REQUEST['render'])){
				
				if(!isset($_REQUEST['category'])){
					$header->programing("Lập trình web với Javascript");
					$this->load->view('lap_trinh/javascript/javascript',$data);
				}

				if(isset($_REQUEST['category'])){
					switch($_REQUEST['category']) {				
						case 'intro':
						$header->programing("Giới thiệu JavaScript");
						$this->load->view('lap_trinh/javascript/intro_javascript',$data);
						break;
						case 'js_where_to':
						$header->programing("JavaScript có thể đặt ở đâu");
						$this->load->view('lap_trinh/javascript/js_where_to',$data);
						break;
						case 'js_output':
						$header->programing("Xuất kết quả bằng JavaScript");
						$this->load->view('lap_trinh/javascript/js_output',$data);
						break;
					}
				}
			}

			if(isset($_REQUEST['render'])){
				$content=$_REQUEST['render'];
				$data['render']=$content;
				if(isset($_REQUEST['in_page_rel'])){$data['return']=$_REQUEST['return'].$_REQUEST['in_page_rel'];}
				if(!isset($_REQUEST['in_page_rel'])){$data['return']=$_REQUEST['return'];}
				$this->load->view('runcode/html',$data);
			}

		}
	}
?>