<?php
require_once 'application/controllers/header.php';
class demo extends CI_Controller
{
	function template_01(){
	$demo_db=$this->load->database('default',TRUE);
	$data['product']=$demo_db->select('*')->from('demo_product')->get()->result_array();
	$this->load->view('mau_1',$data);
	}
}
?>
