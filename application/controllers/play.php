<?php
require_once 'application/controllers/analytic.php';
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
class play extends CI_Controller {

function is_logged_in() {
$is_logged_in = $this->session->userdata('is_logged_in');
if (!isset($is_logged_in) || $is_logged_in != true) {
echo '<html charset="UTF-8" encoding="UTF-8"><head><title>Thành viên</title></head><body><font color=red>Bạn chưa đăng ký thành viên nên không thể chơi game trên hệ thống của chúng tôi</font><br><font color=blue><a href=/user/register/>Click vào đây để đăng ký thành viên</a></font><div style=position:absolute; left:330px; top:135px><img width=105 height=105 src=/images/key_login.png></div></body><html>';
die();
}    
}

function get_internal_game($id){
$game_data=$this->db->select('GAME_PATH')->from('game_index')->where('ID',$id)->get()->result_array();
foreach($game_data as $key);
$content=file_get_contents($key['GAME_PATH']);
echo $content;
}

//start function
function index($sort_by = 'NAME', $sort_order = 'asc', $offset = 0) {

$this->load->model('log_model');
$header = new header();	
$result=$this->db->select("*")->from("game_index")->where('id',$_REQUEST['id'])->get()->result_array();

$data['user_playing']=$this->db->select('*')->from('qtht_users')->get()->result_array();
if($result){foreach($result as $key);} else {redirect('/');}

//count game play
$count_play=$key['PLAYED_COUNT']+1;
$this->db->where('ID',$key['ID']);
$this->db->update('game_index',array('PLAYED_COUNT'=>$count_play));
//end


//game category
	$data['game_category']=$this->db->select('*')->from('game_category')->get()->result_array();
//end

$category=$this->db->select('*')->from('game_category')->where('ID',$key['ID_CATEGORY'])->get()->result_array();
if($category){
$data['category_name']=$category[0]['NAME'];
$data['category_id']=$category[0]['ID'];
}
else {
$data['category_name']='Đua xe';
$data['category_id']='1';
}
if($key['VIDEO_DESCRIPTION']!=null){
$data['is_video']="display:inline-block;";
$data['game_video']=$key['VIDEO_DESCRIPTION'];
}
else {
	$data['is_video']="display:none;";
	$data['game_video']='';
}

$data['file_name'] = ''; 
$data['pre_load'] = '';  
$data['EXTRA_STYLE'] = $key['EXTRA_STYLE'];  
$data['embed_src'] = $key['GAME_PATH'];
$data['embed_flash'] = $key['GAME_PATH'];
$data['src'] = $key['GAME_PATH'];
$data['w'] = '100%';
$data['h'] = '100%';

if($key['STYLE'] !='0'){
$data['style'] = $key['STYLE'];
}

if($key['STYLE'] =='0') {
$data['style'] = '0';
}

if($key['PLAYER_STYLE'] !=''){
$data['player_style'] = $key['PLAYER_STYLE'];
}

if($key['PLAYER_STYLE'] =='') {
$data['player_style'] = '0';
}

$data['title'] = $key['NAME'];
$data['id'] = $key['ID'];
$description=str_replace('Vuigame','website myweb.pro.vn',$key['DESCRIPTION']);
$description=stripslashes($description);
$data['description'] = str_replace('Vuigame.vn','website myweb.pro.vn',$description);;
$data['played_count'] = $key['PLAYED_COUNT'];
$data['key'] = $key['GAME_KEY'];
$data['thumbs'] = $key['THUMBS'];

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
$data['count_all_ebook'] ='1';

if($this->session->userdata('username')){
	$data['user_data']=$this->log_model->getIdUserLogin();
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
$data['search_frm']='/game/play/';
$this->load->view('header/game',$data);


if($this->session->userdata('username')){
$data['is_log']=1;
}
else{
$data['is_log']=0;
}
$array_related= explode(" ",$key['GAME_RELATED']);
$array_related_output = array();
for($i=0;$i<count($array_related);$i++){
$array_related_output=array_merge($array_related_output,$this->db->select("ID,NAME, NAME_ENG, THUMBS")->from('game_index')->where('id',$array_related[$i])->get()->result_array());
}
$data['array_related_output']=$array_related_output;


//start analytic
$analytic = new analytic();
$analytic->myweb('game');
//end analytic

switch($key['EMBED_TYPE']){
case "unity3d":
$this->load->view('game/template/unity3D',$data);	
break;

case "flash":
$this->load->view('game/template/flash',$data);		 
break;

case "webgame":
$this->load->view('game/template/frame',$data);		 
break;

case "360game":
$data['embed_src'] = '/play/get_internal_game/'.$key['ID'];
$this->load->view('game/template/frame',$data);		 
break;
}

if(preg_match('/vi.y8.com/',$key['REFERER'])){
	$content=file_get_contents($key['REFERER']);
	$content=str_replace('Y8','myweb.pro.vn',$content);
	$content=str_replace('google','myweb.pro.vn',$content);
	$data['game']=$content;
	$data['path']='';
	$data['game_name']=trim(strip_tags($key['NAME']));
	$data['id_cate']=$key['ID_CATEGORY'];
	$this->load->view('game/fetch_game',$data);
}
if(preg_match('/game.24h.com.vn/',$key['REFERER'])){
	$content=file_get_contents($key['REFERER']);
	$content=str_replace('/upload/game/','http://game.24h.com.vn/upload/game/',$content);
	preg_match_all('/<div class="choiGame-container">(.*?)<!--Right-->/s',$content,$matches,PREG_SET_ORDER);
	if($matches){foreach($matches as $val);}
	else {
		redirect('/game/');
	}

	$data['game']=$val[0];
	$data['path']='';
	$data['id_cate']=$key['ID_CATEGORY'];
	$data['game_name']=strip_tags($key['NAME']);
	$this->load->view('game/fetch_game',$data);
}

if(preg_match('/www.trochoiviet.com/',$key['REFERER'])){
	$content=file_get_contents($key['REFERER']);
	$content=str_replace('Y8','myweb.pro.vn',$content);
	$data['path']=$key['EMBED_PATH'];
	$content='<div id="trochoiviet"></div>';
	$data['game']=$content;
	$data['game_name']=strip_tags($key['NAME']);
	$data['id_cate']=$key['ID_CATEGORY'];
	$this->load->view('game/fetch_game',$data);
}

}

function pagination($sort_by = 'NAME', $sort_order = 'asc') {	
//new model instance
$this->load->model('game_model');

$per_page  = 36;
$offset = $this->input->get('offset');
$results = $this->game_model->SelectAll($per_page, $offset, $sort_by, $sort_order);
$data['game_index'] = $results['rows'];
$data['num_row_per_page'] = count($results['rows']);
$this->load->view('game/pagination', $data);
}
//end function


function save_input() {
$this->load->model('game_model');
$this->game_model->input();
redirect('/game/index');
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
$this->output->cache(3);    
}

//start function
function sport(){
$header = new header();
$header->index("Game thể thao","/game/play/","Tìm kiếm game");

$url='http://www.miniclip.com/games/genre-3/sports/en/#t-n-G';
$trans= new web_transfer();
$indexpage='?miniclip';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content ='';
$trans->start_transfer("www.miniclip.com");
$trans->getcontent($content);
preg_match_all('/<section id="games-categories">(.*?)<div class="right-content">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $key);
$data['content']=str_replace('title','target="_new"',$key[1]);
$this->load->view('game/sport',$data);

}
//end function


function insdb(){
$header = new header();
$header->index("Game trí tuệ","/game/play/","Tìm kiếm game");
$url=$_REQUEST['temp_url'];
/*
$trans= new web_transfer();
$indexpage='?miniclip';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content ='';
$trans->start_transfer("vuigame.vn");
$trans->getcontent($content);
*/
/*
preg_match_all('/<div class="mtb20">(.*?)<div style="display:none">/s',$content,$matches,PREG_SET_ORDER);
*/
$content=file_get_contents($url);
/*
preg_match_all('/<body data-twttr-rendered="true">(.*?)<div id="fb-root" class=" fb_reset">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $key);
$data['content']=$key[0];
*/
$data['content'] = $content;
$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
$this->load->view('game/get_web_game_temp_detail',$data);	
}

function dbins(){
$description=strip_tags($_REQUEST['desc']);
//$description=str_replace('vuigame.vn','myweb.pro.vn',$description);
//$description=str_replace('Vuigame.vn','myweb.pro.vn',$description);
$game_key=stripslashes($_REQUEST['game_key']);
$data=array(
"EMBED_TYPE"=>'webgame',
"ID_CATEGORY"=>"3",
"NAME"=>trim($_REQUEST['pname']),
'THUMBS'=>$_REQUEST['p_image'],
'GAME_PATH'=>$_REQUEST['flashfile'],
'GAME_KEY'=>$game_key,
'DESCRIPTION'=>trim($description),
'EXTRA_STYLE'=>"1",
'PLAYER_STYLE'=>'width:72%;height:630px;margin-left:2%;');
$this->db->insert('game_index',$data);
echo $this->db->insert_id();
}
//start function
function get_web_game(){
$header = new header();
$header->index("Ebog Game","/game/play/","Tìm kiếm game");

$url='http://www.ebog.com/unity-3d-racing-games.html';
/*
$trans= new web_transfer();
$indexpage='?miniclip';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content ='';
$trans->start_transfer("ebog.com");
$trans->getcontent($content);
$content=str_replace("<a","<span",$content);
preg_match_all('/<div class="MainGameBtom mtb20">(.*?)<div class="cate_tag_hot">/s',$content,$matches_left,PREG_SET_ORDER);
foreach($matches_left as $key);
$data['content']=$key[0];
*/
$data['content']=str_replace('<a','<span',file_get_contents($url));
$this->load->view('game/get_web_game_temp',$data);		
}
//end function

//start function game
function game($path){
$game_data=$this->db->select('game_index.*,game_category.NAME as CATEGORY_NAME')->from('game_index')
								 ->join('game_category','game_index.ID_CATEGORY=game_category.ID','inner')
								 ->like('game_index.REFERER',$path)
								 ->get()->result_array();

if($game_data){}
else {
	redirect('/game/');
}

$header= new header();
$header->game('Chơi game  '.$game_data[0]['NAME'],'frm','search');
$content=file_get_contents($game_data[0]['REFERER']);
if(preg_match('/game.24h.com.vn/',$game_data[0]['REFERER'])){
	$content=str_replace('/upload/game/','http://game.24h.com.vn/upload/game/',$content);
	preg_match_all('/<div class="choiGame-container">(.*?)<div class="centerBox-o-b-gamePage-gameplay">/s',$content,$matches,PREG_SET_ORDER);
	foreach($matches as $key);	
	$content=$key[0];
	$data['path']='';
}

if(preg_match('/www.trochoiviet.com/',$game_data[0]['REFERER'])){
	$data['path']=$game_data[0]['EMBED_PATH'];
	$content='<div id="trochoiviet"></div>';
}

if(preg_match('/vi.y8.com/',$game_data[0]['REFERER'])){
	$data['path']='';
}

$data['game_name']=trim($game_data[0]['NAME']);
$data['id_cate']=$game_data[0]['ID_CATEGORY'];
$data['cate_name']=$game_data[0]['CATEGORY_NAME'];
$data['game_category']=$this->db->select('*')->from('game_category')->get()->result_array();
$data['game']=$content;
$this->load->view('game/fetch_game',$data);
}
//end function game

}

?>