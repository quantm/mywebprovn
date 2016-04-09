<?php
require_once 'application/controllers/header.php';
class user extends CI_Controller {

// hàm kiểm tra quyền truy cập
function is_logged_in() {
$is_logged_in = $this->session->userdata('is_logged_in');
	if (!isset($is_logged_in) || $is_logged_in != true) {
	redirect('/');
	die();
	}
}
//kết thúc hàm

//start function
function account(){
$this->is_logged_in();
$this->load->model('log_model');
$this->load->model('social_model');

$header = new header();
$header->index('Tài khoản','','');

$user_log = $this->log_model->getIdUserLogin();
foreach($user_log as $key);
if($key['facebook_id']!=''&& $key['USER_IMAGE'] ==''){
	$data['user_avatar']='https://graph.facebook.com/'.$key['facebook_id'].'/picture'; 
}
if($key['facebook_id']=='' && $key['USER_IMAGE'] !='' &&  $key['facebook_id'] != $key['USER_IMAGE']){
	$data['user_avatar']=$key['USER_IMAGE'];
}
if($key['facebook_id']=='' && $key['USER_IMAGE'] ==''){
$data['user_avatar']='/images/no_avatar.png';
}
if($key['facebook_id']!='' && $key['USER_IMAGE'] !='' &&  $key['facebook_id'] != $key['USER_IMAGE']){
$data['user_avatar']=$key['USER_IMAGE'];
}
if($key['facebook_id'] == $key['USER_IMAGE'] && $key['USER_IMAGE'] !='') {
	$data['user_avatar']='https://graph.facebook.com/'.$key['facebook_id'].'/picture'; 
}
if($this->session->userdata('username')){
$data['user_data']=$user_log;
}
else{
$data['user_data'] = "-1";
}
if(isset($_REQUEST['friend_request'])){echo '<script>alert("Đã gửi lời mời kết bạn")</script>';}
$data['all_message']=$this->social_model->select_all_message();
$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
$data['tab']=$_REQUEST['tab'];

if(isset($_REQUEST['lib_book_id'])){
	$data_mylib=array("ID_U"=>$key['ID_U'],"ID_BOOK"=>$_REQUEST['lib_book_id']);
	$this->db->insert('fk_user_book',$data_mylib);
}

$this->load->view('users/account',$data);
}
//end function

//start function
function download_card_stat(){
$this->load->model('log_model');
$id_user_login=$this->log_model->getId();
$data['download_info']=$this->db->select('*')->from('qtht_users')->where('ID_U',$id_user_login)->get()->result_array();
$this->load->view('exchange/user_download_stat',$data);
}
//end function

//end

//start function
function capture(){
	$this->load->view('users/html5_capture');
}
//end function


function checkPassword($password) {
$this->load->helper('security');
$check = $this->db->select('*')->from('qtht_users')->where('PASSWORD', do_hash($password))->get()->result_array();
if ($check != null) {echo 1;} 
else {echo 0;} 
}


//start function
function validate($username, $password, $remmember_me) {
$this->load->helper('cookie');
$this->load->helper('security');
$this->load->library('session');
$validate = $this->db->select('*')->from('qtht_users')->where('PASSWORD', do_hash($password))->where('USERNAME', $username)
								  ->or_where('EMAIL', $username)->get()->result_array();
if ($validate == null) {
echo 0;
}
if ($validate != null) {
$date = getdate();
$md5_time = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'] . ' ' . $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'] . $username;
$md5 = md5($md5_time);
$data = array('username' => $username, 'is_logged_in' => true);
if ($remmember_me == 1) {
//setcookie('login_on',serialize($data),time()+3600*24,'/');
//$this->session->set_userdata(array('remember_me'=>'1'));
}

$this->session->set_userdata($data);            
$this->db->where(array('USERNAME' => $username, 'PASSWORD' => do_hash($password)));
$this->db->or_where(array('EMAIL' => $username, 'PASSWORD' => do_hash($password)));
$this->db->update('qtht_users', array('IS_LOGIN' => '1'));
foreach ($validate as $val);
$is_admin = $val['is_admin'];
if ($is_admin == 1) {
echo 1;
}
if ($is_admin != 1) {            
	echo 2;
	}
}
}
//end function


//start function
function profile() {
//new model instance
$this->load->model('log_model');
$idu=$this->log_model->getId();
$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
$user_info=$this->db->select("*")->from('qtht_users')->where('ID_U',$idu)->get()->result_array();
foreach($user_info as $key);
$data['email']=$key['EMAIL'];
$data['phone']=$key['PHONE'];
$this->load->view('users/profile',$data);
}
//end function


function facebook(){

$post_data=$this->input->get();
$avatar = "https://graph.facebook.com/" + $post_data['facebook_id'] + "/picture";   
$date = getdate();
$register_date = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'] . ' ' . $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];
if(isset($post_data['username'])){
$user_ins = array(
'EMAIL'=>$post_data['email'] ,
'facebook_id'=>$post_data['facebook_id'],
'USER_IMAGE'=>$avatar,
'USERNAME'=>$post_data['username'],
'NAME'=>$post_data['name'],
'SEX'=>$post_data['gender'],
'REGISTER_DATE' => $register_date,
);
}
else {
$user_ins = array(
'EMAIL'=>$post_data['email'] ,
'facebook_id'=>$post_data['facebook_id'],
'USER_IMAGE'=>$avatar,
'NAME'=>$post_data['name'],
'SEX'=>$post_data['gender'],
'SEX'=>$post_data['gender'],
'REGISTER_DATE' => $register_date,
);
}	

switch($post_data['type'])
{
case "login":
$check_email = $this->db->get_where('qtht_users',array('EMAIL'=>$post_data['email']))->result_array();
if ($check_email != null){            
	$this->db->where('EMAIL',$post_data['email']);
	$this->db->update('qtht_users', array('facebook_id'=>$post_data['facebook_id']));             
}
else {   
	$this->db->insert('qtht_users', $user_ins);
}

$this->db->where('facebook_id',$post_data['facebook_id']);
$this->db->update('qtht_users', array('IS_LOGIN'=>'1'));        

if(isset($post_data['username'])){$data = array('username' =>$post_data['username'],'is_logged_in' => true);}
else {$data = array('username' =>$post_data['email'],'is_logged_in' => true);}
$this->session->set_userdata($data);    
break;

case "register":
echo json_encode($user_ins);

}

}


function delete() {
$this->load->model('user_model');
$this->user_model->delete();
redirect('/user/index');
}


//start function
function update() {
	$this->load->model('log_model');
	$this->load->model('user_model');
	$this->load->model('gallery');
	$idu=$this->log_model->getId();
	$this->user_model->update($idu);
	//redirect("user/index/");
}
//end function

function success() {
$this->load->view('users/success');
}

function success_thesis_reader() {
$this->load->view('users/success_thesis_reader');
}

function check() {
$this->load->view('users/check');
}

function checkExist($query_string) {
$this->input->loadbyString($query_string);
if ($query_string != null) {
$check = $this->db->select('*')->from('qtht_users')->where('USERNAME', $query_string)->get()->result_array();

if ($check != null) {echo 1;} 
else {echo 0;}

} 
exit;
}


function checkEmail($query_string) {
$this->input->loadbyString($query_string);
if ($query_string != null) {
$check = $this->db->select('*')->from('qtht_users')->where('EMAIL', $query_string)->get()->result_array();

if ($check != null) {echo 1;} 
else {echo 0;}
}
exit;
}

function checkCaptcha($query_string) {
$this->input->loadbyString($query_string);

if ($query_string != null) {
$check = $this->db->select('*')->from('captcha')->where('word', $query_string)->get()->result_array();
if ($check != null) {
	//$this->db->where('word', $query_string);
	//$this->db->delete('captcha');
	echo 1;
} 
else {echo 0;}
}
exit;
}

function checkPhone($query_string) {
$this->input->loadbyString($query_string);
if ($query_string != null) {
$check = $this->db->select('*')->from('qtht_users')->where('PHONE', $query_string)->get()->result_array();

if ($check != null) {
echo 1;
} else {
echo 2;
}
} else {
echo 0;
}
exit;
}


//start function
function register() {        
$this->load->helper('captcha');
$vals = array(
'img_path' => './captcha/',
'img_url' => 'http://myweb.pro.vn/captcha/',
'font_patht' => './captcha/fonts/Heineken.ttf',
'expiration' => 7200,
'img_width' => '270',
'img_height' => '30'
);

$cap = create_captcha($vals);

$data = array(
'captcha_time' => $cap['time'],
'ip_address' => $this->input->ip_address(),
'word' => $cap['word']
);

$query = $this->db->insert_string('captcha', $data);
$this->db->query($query);

$expiration = time() - 7200; // Two hour limit
$this->db->query("DELETE FROM captcha WHERE captcha_time < " . $expiration);

//form validation
$this->load->library('form_validation');
$this->form_validation->set_rules('username', 'username', 'trim|required');

//set biến cho view
$this->load->model('user_model');
$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
$data ['creation_date'] = date("Y-m-d");
$data['captcha'] = $cap;

if ($this->form_validation->run() == FALSE) {
	$this->load->view('/users/input', $data);
}

else {
		$this->load->model('user_model');
		$this->user_model->input();
		redirect("/user/success/");
	}
}
//end function

//start function
function thesis_reader_register() {        
$this->load->helper('captcha');
$vals = array(
'img_path' => './captcha/',
'img_url' => 'http://myweb.pro.vn/captcha/',
'font_patht' => './captcha/fonts/Heineken.ttf',
'expiration' => 7200,
'img_width' => '270',
'img_height' => '30'
);

$cap = create_captcha($vals);

$data = array(
'captcha_time' => $cap['time'],
'ip_address' => $this->input->ip_address(),
'word' => $cap['word']
);

$query = $this->db->insert_string('captcha', $data);
$this->db->query($query);

$expiration = time() - 7200; // Two hour limit
$this->db->query("DELETE FROM captcha WHERE captcha_time < " . $expiration);

//form validation
$this->load->library('form_validation');
$this->form_validation->set_rules('username', 'username', 'trim|required');

//set biến cho view
$this->load->model('user_model');
$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
$data ['creation_date'] = date("Y-m-d");
$data['captcha'] = $cap;

if ($this->form_validation->run() == FALSE) {
	$this->load->view('users/input_thesis_reader', $data);
}

else {
		$this->load->model('user_model');
		$this->user_model->input();
		redirect("user/success_thesis_reader");
	}
}
//end function


//start function
function logout() {            
$this->load->model('log_model');
$this->db->where('USERNAME',$this->session->userdata('username'));
$this->db->update('qtht_users', array('IS_LOGIN' =>'0'));
$this->load->library('session');
$this->session->unset_userdata('username');
$this->session->sess_destroy();
redirect('/');
}
//end function
}
?>