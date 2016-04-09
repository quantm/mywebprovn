<?php
require_once 'application/controllers/header.php';
class vieclam extends CI_Controller {
		function index(){
		$this->load->model('log_model');
		$header = new header();	
		$header->index('Việc làm');

		foreach($this->log_model->getUsernameLogin() as $val);
		$data['user_chat']=$val['USERNAME'];
		$data['user']=$this->db->select('*')->from('qtht_users')->get()->result_array();
		$this->load->view('vieclam/index',$data);
		}
     }
?>