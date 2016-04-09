<?php
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
	class lang extends CI_Controller{
		function fun(){
			$header = new header();
			$header->index("Học từ vựng tiếng Anh","","");
			$this->load->view('english/vocabulary');
		}
	}
?>