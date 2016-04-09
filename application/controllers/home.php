<?php
require_once 'application/controllers/header.php';
class home extends CI_Controller {

public function privacy() {
//header
$header = new header();
$header->index("Chính sách bảo mật",'','');

$this->load->view('home/privacy');
}	

public function sitemap()  {
	$this->load->model('log_model');

	if(isset($_REQUEST['q'])){
		$data['search']='1';
	}
	if(!isset($_REQUEST['q'])){
		$data['search']='0';
	}

	if(isset($_REQUEST['register_success'])){
		$data['reg']='1';
	}
	if(!isset($_REQUEST['register_success'])){
		$data['reg']='0';
	}

	//user session
	if($this->session->userdata('username')){
		$data['user_data_session']=$this->log_model->getIdUserLogin();
	}
	else{
		$data['user_data_session'] = "-1";
	}
	$data['user_data']=$this->db->select('*')->from('qtht_users')->limit(36)->get()->result_array();
	$this->load->view('home/sitemap',$data);
}

public function about() {
//header
$header = new header();
$header->index("Giới thiệu",'','');

$this->load->view('home/intro');
}	

function contact() {
$this->load->model('log_model');
$user_id='';

//header
$header = new header();
$header->index("Liên hệ",'','');

//proccessing
$is_logged_in = $this->session->userdata('is_logged_in');
if (!isset($is_logged_in) || $is_logged_in != true) {
$user_id='0';
$data['name']='';
$data['email']='';
}
else{
$user_id=$this->log_model->getId();
$user_data=$this->db->select('NAME,EMAIL')->from('qtht_users')->where('ID_U',$user_id)->get()->result_array();
foreach($user_data as $key);
$data['name']=$key['NAME'];
$data['email']=$key['EMAIL'];
}
//end proccessing
if(isset($_REQUEST['csrf_test_name'])){
	$date = getdate();
	$date_send = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'] . ' ' . $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];
	$data=array('DATE_SEND'=>$date_send,'ID_U'=>$user_id,'EMAIL'=>$_REQUEST['email'],'NAME'=>$_REQUEST['name'],'CONTENT'=>$_REQUEST['content']);
	$this->db->insert('qtht_contact',$data);
}
//view
$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
$this->load->view('home/contact',$data);
}


function login() {

//new model instance
$this->load->model('home_menu_model');
$this->load->model('log_model');
$this->load->model('user_model');
$this->load->model('admin_model');

$data['leader'] = $this->home_menu_model->getUserMenuByGroup();
$data['emp_id'] = $this->log_model->getIdUserLogin();
$data['title'] = 'Welcome';

$this->load->library('session');
$this->session->sess_destroy();
$data['date_applied']=$this->home_menu_model->date_object();
$this->load->view('header/default', $data);
//$this->load->view('product', $data);
$this->load->view('footer');
}

//start function
function analytic(){

}
//end function

}

?>