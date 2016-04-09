<?php
	require_once 'application/controllers/header.php';
	class bridge extends CI_Controller{
		function xahoihoctapnetvn($id){
			$header = new header();
			$header->luanvan('Tham khảo luận văn & tài liệu');
			
			//render view
			$data['id']=$id;
			if(isset($_REQUEST['download_guide'])){
				$data['download_guide']='1';
			}
			if(!isset($_REQUEST['download_guide'])){
				$data['download_guide']='0';
			}
			$this->load->view('luanvan/bridge',$data);
		}
	}
?>