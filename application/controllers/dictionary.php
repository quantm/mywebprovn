<?php 
		class dictionary extends CI_Controller {
			function index(){
				$data['title'] = 'Dictionary';
				$this->load->view('dictionary/index',$data);
			}
		}
?>