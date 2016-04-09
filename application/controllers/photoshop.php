<?php
require_once 'application/controllers/header.php';
class photoshop extends CI_Controller {
	
	function phuc_che_anh_trang_den() {
	$header = new header();
	$header->mythuatweb('Photoshop - phục chế ảnh trắng đen');
	$data['description']='Mô tả';
	$this->load->view('mythuatweb/phuc_che_anh_trang_den',$data);
	}

	function blur_filter(){
	$header = new header();
	$header->mythuatweb('Photoshop - blur filter');
	$data['description']='Mô tả';
	if(isset($_REQUEST['id'])){
	switch($_REQUEST['id']){
		case '2':
		$this->load->view('mythuatweb/blur_filter_2',$data);
		break;
	}
	}
	//end if
	else {
	$this->load->view('mythuatweb/blur_filter',$data);		
	}
	}
	function chanel_blending_mode() {
	$header = new header();
	$header->mythuatweb('Photoshop - chanel and blending mode');
	$data['description']='Mô tả';
	if(isset($_REQUEST['id'])){
			switch($_REQUEST['id']){
				case '2':
				$this->load->view('mythuatweb/channel_blending_mode_2',$data);
				break;
			}
	}
	//end if
		else {
			$this->load->view('mythuatweb/channel_blending_mode',$data);		
	}

	}
	function hieu_chinh_anh_mau() {
	$header = new header();
	$header->mythuatweb('Photoshop - hiệu chỉnh ảnh màu');
	$data['description']='Mô tả';
	if(isset($_REQUEST['id'])){
		switch($_REQUEST['id']){
			case '2':
			$this->load->view('mythuatweb/hieu_chinh_anh_mau_2',$data);
			break;
			case '3':
			$this->load->view('mythuatweb/hieu_chinh_anh_mau_3',$data);
			break;
			case '4':
			$this->load->view('mythuatweb/hieu_chinh_anh_mau_4',$data);
			break;
		}
	}
	else {
		$this->load->view('mythuatweb/hieu_chinh_anh_mau',$data);
	}

	}

}
//end class
?>