<?php
class elib extends CI_Controller{
	function index(){
		$elib=$this->db->get('ebook_index',24)->result_array();
		$data['elib']=$elib;
		$data['count_elib']=count($elib);
		$this->load->view('elib/index',$data);
	}
}
?>