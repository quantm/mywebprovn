<?php
	class chuyen_huong extends CI_Controller{
		function tai_lieu($id){
			$data['id']=$id;
			$this->load->view('redirect/thesis',$data);
		}
	}
?>