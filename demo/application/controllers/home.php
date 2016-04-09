<?php
require_once 'application/controllers/header.php';
class home extends CI_Controller {

public function privacy() {

//header
$header = new header();
$header->index("Chính sách bảo mật",'','');

$this->load->view('home/privacy');
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
	$data=array('ID_U'=>$user_id,'EMAIL'=>$_REQUEST['email'],'NAME'=>$_REQUEST['name'],'CONTENT'=>$_REQUEST['content']);
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
$date = getdate();
$pageview_date = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'];
$pageview=$this->db->select('pageview')->from('analytic_'.$_REQUEST['type'].'')->where('date',$pageview_date)->get()->result_array();

//start switch
switch($_REQUEST['type']){
//general analytic
case "general":
if($pageview){
	foreach($pageview as $key);
	$pageview=$key['pageview']+1;
	$update=array('pageview'=>$pageview);
	$this->db->where('date',$pageview_date);
	$this->db->update('analytic_general',$update);
}
else {
	$this->db->insert('analytic_general',array("pageview"=>"1","date"=>$pageview_date));
}
break;
//end general

//book analytic
case "book":
if($pageview){
	foreach($pageview as $key);
	$pageview=$key['pageview']+1;
	$update=array('pageview'=>$pageview);
	$this->db->where('date',$pageview_date);
	$this->db->update('analytic_book',$update);
}
else {
	$this->db->insert('analytic_book',array("pageview"=>"1","date"=>$pageview_date));
}
break;
//end book analytic

//game analytic
case "game":
if($pageview){
	foreach($pageview as $key);
	$pageview=$key['pageview']+1;
	$update=array('pageview'=>$pageview);
	$this->db->where('date',$pageview_date);
	$this->db->update('analytic_game',$update);
}
else {
	$this->db->insert('analytic_game',array("pageview"=>"1","date"=>$pageview_date));
}
break;
//end game analytic

//game analytic
case "music":
if($pageview){
	foreach($pageview as $key);
	$pageview=$key['pageview']+1;
	$update=array('pageview'=>$pageview);
	$this->db->where('date',$pageview_date);
	$this->db->update('analytic_music',$update);
}
else {
	$this->db->insert('analytic_music',array("pageview"=>"1","date"=>$pageview_date));
}
break;
//end game analytic

//video analytic
case "video":
if($pageview){
	foreach($pageview as $key);
	$pageview=$key['pageview']+1;
	$update=array('pageview'=>$pageview);
	$this->db->where('date',$pageview_date);
	$this->db->update('analytic_video',$update);
}
else {
	$this->db->insert('analytic_video',array("pageview"=>"1","date"=>$pageview_date));
}
break;
//end video analytic

}
//end switch

}
//end function

}

?>