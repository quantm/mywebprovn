<?php 
require_once 'application/controllers/analytic.php';
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
class video extends CI_Controller{
function index(){

if(isset($_REQUEST['type'])){
	if(isset($_REQUEST['search'])){
	$url='http://phim3s.net/search?keyword='.$_REQUEST['search'];
	}
	if(!isset($_REQUEST['search'])){
	$url='http://phim3s.net/'.$_REQUEST['link'];
	}
}
if(!isset($_REQUEST['type'])){
	if(isset($_REQUEST['search'])){
	$url='http://phim3s.net/search?keyword='.$_REQUEST['search'];
	}
	if(!isset($_REQUEST['search'])){
	$url='http://phim3s.net/the-loai/phim-hanh-dong/?order_by=liked_times&country_id=&year=';
	}
}

if(isset($_REQUEST['cx'])){
	$data['custom_search']="1";
}
if(!isset($_REQUEST['cx'])){
	$data['custom_search']="0";
}
$trans= new web_transfer();
$indexpage='?film';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content ='';
$trans->start_transfer("phim3s.net");
$trans->getcontent($content);
$content=str_replace("<a","<span",$content);
$content=str_replace("<script","<script class='remove'",$content);
$content=str_replace("Phim3s.Home.init();","",$content);
preg_match_all('/<div id="body-wrap" class="container">(.*?)<div id="footer">/s',$content,$matches,PREG_SET_ORDER);
if(!isset($_REQUEST['type'])){

if(isset($_REQUEST['search'])){
$data['is_filter']="1";
preg_match_all('/<div class="blockbody">(.*?)<div>/s',$content,$matches_body,PREG_SET_ORDER);
foreach($matches_body as $body_key);
$main_body=$body_key[1];
}
if(!isset($_REQUEST['search'])){
$data['is_filter']="0";
preg_match_all('/<div class="blockbody">(.*?)<div>/s',$content,$matches_body,PREG_SET_ORDER);
foreach($matches_body as $body_key);
$main_body=$body_key[1];
}
}
if(isset($_REQUEST['type'])){
$data['is_filter']="1";
preg_match_all('/<div class="blockbody">(.*?)<div>/s',$content,$matches_body,PREG_SET_ORDER);
$page_nav='<span class="page_nav">
<span class="desc">Page 1/ 59</span>
<span class="current">1</span>
<span class="item"><a href="?type=main_body&link='.$_REQUEST["link"].'page-2/">2</a></span>
<span class="item"><a href="?type=main_body&link='.$_REQUEST["link"].'page-3/">3</a></span>
<span class="item"><a href="?type=main_body&link='.$_REQUEST["link"].'page-4/">4</a></span>
<span class="item"><a href="?type=main_body&link='.$_REQUEST["link"].'page-5/">5</a></span>
<span class="item"><a href="?type=main_body&link='.$_REQUEST["link"].'page-6/">6</a></span>
<span class="item"><a href="?type=main_body&link='.$_REQUEST["link"].'page-7/">7</a></span>
<span class="item"><a href="?type=main_body&link='.$_REQUEST["link"].'page-8/">8</a></span>
<span class="item"><a href="?type=main_body&link='.$_REQUEST["link"].'page-9/">9</a></span>
<span class="item"><a href="?type=main_body&link='.$_REQUEST["link"].'page-10/">10</a></span>
<span class="item"><a href="?type=main_body&link='.$_REQUEST["link"].'page-11/">11</a></span>
<span class="item"><a href="?type=main_body&link='.$_REQUEST["link"].'page-12/">12</a></span>
<span class="item"><a href="?type=main_body&link='.$_REQUEST["link"].'page-13/">13</a></span>
<span class="item"><a href="?type=main_body&link='.$_REQUEST["link"].'page-14/">14</a></span>
<span class="item"><a href="?type=main_body&link='.$_REQUEST["link"].'page-15/">15</a></span>
<span class="next">...</span>
<span class="item"><a href="?type=main_body&link='.$_REQUEST["link"].'/page-59/">59</a></span>
<span class="item"><a href="'.$_REQUEST["link"].'/page-2/">Next</a></span>
</span>';
	if(count($matches)=="0"){
		redirect('/video/');
	}
foreach($matches_body as $body_key);
$main_body=$body_key[1].$page_nav;
}
foreach($matches as $key);
$data['content']=$key[1];
$data['main_body']=$main_body;

// form security
$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
$data['autocomplete']=$this->db->select("*")->from('film')->get()->result_array();

//user is login
$this->load->model('log_model');
$user_log = $this->log_model->getIdUserLogin();
$is_logged_in = $this->session->userdata('is_logged_in');
if (!isset($is_logged_in) || $is_logged_in != true) {
$data['is_logged'] = "0";
}
else{
$data['is_logged'] = "1";
}
if($this->session->userdata('username')){
	$data['user_data']=$user_log;
}
else{
	$data['user_data'] = "-1";
}
//end

//start analytic
$analytic = new analytic();
$analytic->myweb('general');
//end analytic

$this->load->view('film/index',$data);
}


//start function get_film
function get_film(){
	$query=$this->db->select("*")->from('film')->where('NAME',$_REQUEST['name'])->get()->result_array();
	//save in db
	if(count($query)=="0"){
	$url='http://phim3s.net/'.$_REQUEST['fetch_id'].'xem-phim/';
	$data_ins=array("description"=>$_REQUEST['description'],"name"=>$_REQUEST['name'],'link'=>$url,'thumb'=>$_REQUEST['thumbs'],'internal_link'=>$_REQUEST['fetch_id']);
	$this->db->insert('film',$data_ins);
	echo '0';
	}
	if(count($query)!="0"){
	echo '1';
	}

}
//end

function get_film_description($link){		
$url='http://phim3s.net/'.$link;
$trans= new web_transfer();
$indexpage='?film';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content ='';
$trans->start_transfer("phim3s.net");
$trans->getcontent($content);
$content=str_replace("Phim3s.Home.init();","",$content);
$content=str_replace("Phim3s.Net","myweb.pro.vn",$content);
$content=str_replace("Phim3s","myweb.pro.vn",$content);
preg_match_all('/<div id="content">(.*?)<div id="sidebar">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $key);
return $key[1];

}

//start function view
function view(){
if(!isset($_REQUEST['fetch_id']) && !isset($_REQUEST['id'])){
redirect('/video/');
}
if(isset($_REQUEST['fetch_id'])){
$link=$_REQUEST['fetch_id'];
$data['link']=$link;
$data['name']=$this->input->post('name');
$data['thumbs']=$_REQUEST['thumbs'];

$query=$this->db->select("*")->from('film')->where('NAME',$_REQUEST['name'])->get()->result_array();
//save in db
if(count($query)=="0"){
$url='http://phim3s.net/'.$link.'xem-phim/';
$data_ins=array("name"=>$_REQUEST['name'],'link'=>$url,'thumb'=>$_REQUEST['thumbs'],'internal_link'=>$_REQUEST['fetch_id']);
$this->db->insert('film',$data_ins);
$data['id']=$this->db->insert_id();
}
if(count($query)=="1"){
foreach($query as $key_video);
$data['id']=$key_video['id'];
}
//end save in db
}

if(isset($_REQUEST['id'])){
foreach($this->db->select("*")->from('film')->where('id',$_REQUEST['id'])->get()->result_array() as $vid_id);
$data['link']=$vid_id['internal_link'];
$data['name']=$vid_id['name'];
$data['id']=$_REQUEST['id'];
$data['thumbs']=$vid_id['thumb'];
$link=$vid_id['internal_link'];
}

$url='http://phim3s.net/'.$link.'/xem-phim/';
$trans= new web_transfer();
$indexpage='?film';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content ='';
$trans->start_transfer("phim3s.net");
$trans->getcontent($content);
$content=str_replace('data/images/flags/vn.png','/images/vn.png',$content);
$content=str_replace("<script","<kaka",$content);
$content=str_replace('<a','<button',$content);
preg_match_all('/<div class="serverlist">(.*?)<div>/s',$content,$matches,PREG_SET_ORDER);
if(count($matches)=="0"){
redirect('/video/');
}
foreach($matches as $key);
$data['content']=$key[1];
$data['film_description']=$this->get_film_description($link);

//user is login
$this->load->model('log_model');
$user_log = $this->log_model->getIdUserLogin();
$is_logged_in = $this->session->userdata('is_logged_in');
if (!isset($is_logged_in) || $is_logged_in != true) {
$data['is_logged'] = "0";
}
else{
$data['is_logged'] = "1";
}
if($this->session->userdata('username')){
	$data['user_data']=$user_log;
}
else{
	$data['user_data'] = "-1";
}
//end

//start analytic
$analytic = new analytic();
$analytic->myweb('video');
//end analytic

$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
$this->load->view('film/view',$data);

}
//end view function

//start function
function add_my_video(){
$this->load->model('log_model');
$id_u=$this->log_model->getId();
$data_book_check=$this->db->select('*')->from('fk_user_video')
				  ->where('ID_U',$id_u)
				  ->where('ID_VIDEO',$_REQUEST['video_id'])
				  ->get()->result_array();
if($data_book_check){
		echo "1";
	}
else{
		$data_myvid=array("ID_U"=>$id_u,"ID_VIDEO"=>$_REQUEST['video_id']);
		$this->db->insert('fk_user_video',$data_myvid);
		echo "0";
	}

}
//end function
//start my vid function
function myvid(){
$this->load->model('log_model');
$id_u=$this->log_model->getId();
$data_mylib=$this->db->select('*')
		 ->from('film')
	     ->join('fk_user_video','fk_user_video.ID_VIDEO=film.id','inner')
	     ->where('ID_U',$id_u)
		 ->get()->result_array();
if($data_mylib){
	$data['myvid']=$data_mylib;
}
else{
	$data_mylib=$this->db->select('*')
		 ->from('film')
	     ->join('fk_user_video','fk_user_video.ID_VIDEO=film.id','inner')
	     ->where('ID_U','83')
		 ->get()->result_array();
	$data['myvid']=$data_mylib;
}
$this->load->view('film/mylib',$data);
}
//end

function play(){
$this->load->view('video_ads/examples/simple/index');
}
}
//end class
?>