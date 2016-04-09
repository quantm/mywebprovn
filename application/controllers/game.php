<?php
require_once 'application/controllers/analytic.php';
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
class game extends CI_Controller {

function is_logged_in() {
$is_logged_in = $this->session->userdata('is_logged_in');
	if (!isset($is_logged_in) || $is_logged_in != true) {
		redirect('/');
	}    
}


//start function
function play() {

//kiểm tra đã đăng nhập
//$this->is_logged_in();

//new model instance
$this->load->model('game_model');
$this->load->model('log_model');

//assign value for model
$user_data = $this->log_model->getIdUserLogin();

$sort_by = 'NAME';
$sort_order = 'desc';
$offset = 0;
$per_page  = 24;

$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2); 
$results = $this->game_model->SelectAll($per_page, $offset, $sort_by, $sort_order);

//pagination
$this->load->library('pagination'); 
$config['total_rows'] = $results['num_rows'];
$config['per_page'] = $per_page; 
$config['next_link'] = 'Tiếp »'; 
$config['prev_link'] = '« Sau'; 
$config['num_tag_open'] = ''; 
$config['num_tag_close'] = ''; 
$config['num_links'] = 10; 
$config['cur_tag_open'] = '<a class="currentpage">'; 
$config['cur_tag_close'] = '</a>';
$config['last_link'] = 'Cuối';
$config['base_url'] = "http://myweb.pro.vn/game/";
$config['uri_segment'] = 2; 
$this->pagination->initialize($config);
$pagination = $this->pagination->create_links();


//set variable for view
$data['fields'] = array( 'ID' => 'ID', 'NAME' => 'Tên');
$data['game_index'] = $results['rows'];     
$data['total_rows']=$results['num_rows'];
$data['title'] = 'Tổng hợp những game mới nhất';
$data['pagination'] = $pagination;
$data['count_game_quantity'] = $results['num_rows'];

if (isset($_REQUEST['name_category'])){
$data['cate_name'] = $this->input->get_post('name_category');
$data['cate_name_top'] = $this->input->get_post('name_category');
}
else {
$data['cate_name'] = "";
$data['cate_name_top'] = "";
}

if (isset($_REQUEST['count_category_item'])){
$data['count_category_item']=$_REQUEST['count_category_item'];
}  
else {
$data['count_category_item'] = "0";
}

if (isset($_REQUEST['id_category'])){
$data['id_category']=$_REQUEST['id_category'];
}  
else {
$data['id_category'] = "0";
}

if (isset($_REQUEST['type'])){
$data['type']=$_REQUEST['type'];
}  
else {
$data['type'] = "0";
}

//asign view variable
$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
$data['count_all_game'] = $this->db->count_all('game_index');
$data['count_all_ebook'] = 1;

if($this->session->userdata('username')){
	$data['user_data']=$user_data;
}
else{
	$data['user_data'] = "-1";
}
$is_logged_in = $this->session->userdata('is_logged_in');
if (!isset($is_logged_in) || $is_logged_in != true) {
$data['is_logged'] = "0";
}
else{
$data['is_logged'] = "1";
}

//load view
$data['count_unity_game'] = count($this->db->select('*')->from('game_index')->where("EMBED_TYPE","unity3d")->get()->result_array()); 
$data['count_flash_game'] = count($this->db->select('*')->from('game_index')->where("EMBED_TYPE","flash")->get()->result_array());
$data['count_shockwave_game'] = count($this->db->select('*')->from('game_index')->where("EMBED_TYPE","shockwave")->get()->result_array());
$data['search_key']= $this->input->get_post('search');
$query_game_category = 'SELECT *, game_category.NAME as CATEGORY_GAME FROM (SELECT sho.NAME as NAME_GAME, sho.ID_CATEGORY, count(*) AS counting FROM game_index AS sho GROUP BY sho.ID_CATEGORY ) obj_hash_tag INNER JOIN game_category ON game_category.ID = obj_hash_tag.ID_CATEGORY ORDER BY obj_hash_tag.counting DESC';
$query_ebook_category = 'SELECT *, ebook_category.NAME as CATEGORY_EBOOK FROM (SELECT sho.ID, sho.NAME as NAME_EBOOK, sho.ID_CATEGORY, count(*) AS counting FROM ebook_index AS sho GROUP BY sho.ID_CATEGORY ) obj_hash_tag INNER JOIN ebook_category ON ebook_category.ID = obj_hash_tag.ID_CATEGORY ORDER BY obj_hash_tag.counting DESC';
$data['category_game'] = $this->db->query($query_game_category)->result_array(); 
$data['category_ebook'] = array();
$data['search_frm']='/game/play/';
$data['search_placeholder']='Enter để tìm game';

$this->load->view('header/game', $data);
$this->load->view('game/index', $data);
}
//end function


function unity($name)
{
$data['name']=$name;
$this->load->view("game/webgame/unity",$data);
}

function flash($name)
{
$data['name']=$name;
$this->load->view("game/webgame/flash",$data);
}


function pagination($sort_by = 'NAME', $sort_order = 'asc') {	
//new model instance
$this->load->model('game_model');

$per_page  = 24;
$offset = $this->input->get('offset');
$results = $this->game_model->SelectAll($per_page, $offset, $sort_by, $sort_order);
$data['game_index'] = $results['rows'];
$data['num_row_per_page'] = count($results['rows']);
$this->load->view('game/pagination', $data);
}

function analytic (){
$query = $this->db->select("*")->from("analytic")->get()->result_array();
	foreach($query as $key){
	$count=$key['count']+1;
	$arr=array('count'=>$count);
	$this->db->update("analytic", $arr);
	}
}

function count_click_play () {
$query = $this->db->select("*")->from("game_index")->where("ID",$this->input->get_post('game_id'))->get()->result_array();
foreach($query as $key){
$count=$key['PLAYED_COUNT']+1;
$arr=array('PLAYED_COUNT'=>$count);
$this->db->where("id",$this->input->get_post('game_id'));
$this->db->update("game_index", $arr);
}
}

function load_game_list(){	    
$this->play();
//$this->output->cache(3);        
}

function input() {
$this->load->model('log_model');
$this->load->model('game_model');
$log_u = $this->log_model->getUsernameLogin();

$data['title'] = 'Thêm mới game';
$data['uid'] = $log_u;

$this->load->view('header/header_home', $data);
$this->load->view('game/input', $data);
$this->load->view('footer');
}

//start function
function fetch(){
$get=$this->input->get();
$header = new header();
$header->index($get['name'],"/game/play","Tìm kiếm game");
$data['w'] = "100%";
$data['h'] = "100%";
$data['src'] = 'http://www.miniclip.com'.$get['link'].'webgame.php';
$data['title'] = $get['link'];
$this->load->view('game/frame', $data);
}
//end function

//start function
function usergame(){
$this->load->model('log_model');
$user_log = $this->log_model->getIdUserLogin();
foreach($user_log as $key);
$data_mygame=array("ID_U"=>$key['ID_U'],"ID_GAME"=>$_REQUEST['id_game']);

$data_game_check=$this->db->select('*')->from('fk_user_game')
				      ->where('ID_U',$id_u)
				      ->where('ID_GAME',$_REQUEST['id_game'])
				      ->get()->result_array();
if($data_game_check){
	echo "1";
}
else {
	$this->db->insert('fk_user_game',$data_mygame);
	echo "0";
}

}
//end function


//start mygame function
function mygame(){
$this->load->model('log_model');
$user_id = $this->log_model->getId();
$data_mygame=$this->db->select('*')
		 ->from('game_index')
	     ->join('fk_user_game','fk_user_game.ID_GAME=game_index.ID','inner')
	     ->where('ID_U',$user_id)
		 ->get()->result_array();
	if($data_mygame){
			$data['mygame']=$data_mygame;
	}
	else {
			$data_mygame=$this->db->select('*')
					 ->from('game_index')
					 ->join('fk_user_game','fk_user_game.ID_GAME=game_index.ID','inner')
					 ->where('ID_U','83')
					 ->get()->result_array();
			$data['mygame']=$data_mygame;
	}

$this->load->view('/game/mygame',$data);


}
//end mygame function
}

//end class
?>