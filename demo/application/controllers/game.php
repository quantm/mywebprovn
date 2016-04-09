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
function play($sort_by = 'NAME', $sort_order = 'desc', $offset = 0) {

//kiểm tra đã đăng nhập
//$this->is_logged_in();

//new model instance
$this->load->model('game_model');
$this->load->model('log_model');

//assign value for model
$user_data = $this->log_model->getIdUserLogin();

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
$data['keyword'] = $this->db->select("*")->from("game_index")->get()->result_array();    
$data['count_all_game'] = $this->db->count_all('game_index');
$data['count_all_ebook'] = $this->db->count_all('ebook_index');

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

$data['game']=$this->db->select('*')->from('game_index')->get()->result_array();

//load view
$data['count_unity_game'] = count($this->db->select('*')->from('game_index')->where("EMBED_TYPE","unity3d")->get()->result_array()); 
$data['count_flash_game'] = count($this->db->select('*')->from('game_index')->where("EMBED_TYPE","flash")->get()->result_array());
$data['count_shockwave_game'] = count($this->db->select('*')->from('game_index')->where("EMBED_TYPE","shockwave")->get()->result_array());
$data['search_key']= $this->input->get_post('search');
$query_game_category = 'SELECT *, game_category.NAME as CATEGORY_GAME FROM (SELECT sho.NAME as NAME_GAME, sho.ID_CATEGORY, count(*) AS counting FROM game_index AS sho GROUP BY sho.ID_CATEGORY ) obj_hash_tag INNER JOIN game_category ON game_category.ID = obj_hash_tag.ID_CATEGORY ORDER BY obj_hash_tag.counting DESC';
$query_ebook_category = 'SELECT *, ebook_category.NAME as CATEGORY_EBOOK FROM (SELECT sho.ID, sho.NAME as NAME_EBOOK, sho.ID_CATEGORY, count(*) AS counting FROM ebook_index AS sho GROUP BY sho.ID_CATEGORY ) obj_hash_tag INNER JOIN ebook_category ON ebook_category.ID = obj_hash_tag.ID_CATEGORY ORDER BY obj_hash_tag.counting DESC';
$data['category_game'] = $this->db->query($query_game_category)->result_array(); 
$data['category_ebook'] = $this->db->query($query_ebook_category)->result_array();
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

function c17_332 () {
$header = new header();
$header->index("Game Crypt Raider",'/game/play/','Tìm kiếm game');
$data['w'] = "100%";
$data['h'] = "100%";
$data['title'] = "Crypt Raider";
$data['src'] ='http://www.miniclip.com/games/crypt-raider/en/loader.swf';
$this->load->view('game/frame',$data);
$this->output->cache(3);
}


/* start unity 3 D */
function c5_327(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://85playgames.eval.hwcdn.net/games/machine-war.unity3d';
$data['title'] = 'Đại chiến Rôbốt';
$header = new header();
$header->index("Trò chơi Đại chiến Rôbốt",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c1_326(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://myweb.pro.vn/games/3d-hd/car_race/MotorWars2_1396427178.unity3d';
$data['title'] = 'Đua xe hủy diệt';
$header = new header();
$header->index("Trò chơi Đua xe hủy diệt",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c1_321(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://www.martiangames.com/games/TrafficSlamArena/traffic-slam-arena.unity3d';
$data['title'] = 'Đua xe hủy diệt';
$header = new header();
$header->index("Trò chơi Đua xe hủy diệt",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}


function c1_320(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://martiangames.com/games/Fast5/fast-5.unity3d';
$data['title'] = 'Fast and Furios';
$header = new header();
$header->index("Game Fast and Furios",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}


function c16_316(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://eboggames.eval.hwcdn.net/games/race-the-sun.unity3d';
$data['title'] = 'Solar Plane Race';
$header = new header();
$header->index("Game Solar Plane Race",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c2_315(){
$data['w'] ="60%";
$data['h'] = "100%";
$data['embed_src'] = 'http://eboggames.eval.hwcdn.net/games/defense-is-duty.unity3d';
$data['title'] = 'Nhiệm vụ phòng thủ';
$header = new header();
$header->index("Trò chơi Nhiệm vụ phòng thủ",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c3_92(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://d1bawjkskzwchq.cloudfront.net/9/runningman.unity3d';
$header = new header();
$header->index("Game Marine Interstellar Man",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c1_318(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://chat.kongregate.com/gamez/0013/8940/live/Overtorque.unity3d';
$data['title'] = "Đua xe biểu diễn";
$header = new header();
$header->index("Trò chơi đua xe biểu diễn",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c17_317(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://eboggames.eval.hwcdn.net/games/train-crisis-lite.unity3d';
$data['title'] = "Hướng dẫn tàu hỏa";
$header = new header();
$header->index("Trò chơi hướng dẫn tàu hỏa",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c5_25(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://vuigame.vcdn.vn/upload/data/BattlewithWaybigBen10_1383143759.unity3d?id=16319&cp=';
$header = new header();
$header->index("Game Ben tiêu diệt quái vật",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c1_314() {
$header = new header();
$header->index("Game Car Racing",'/game/play/','Tìm kiếm game');
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://eboggames.eval.hwcdn.net/games/track-racing.unity3d';
$data['title'] = "Car Racing";    
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c1_313() {
$header = new header();
$header->index("Game Car Parking",'/game/play/','Tìm kiếm game');
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://eboggames.eval.hwcdn.net/games/crazy-parking.unity3d';
$data['title'] = "Car Parking";    
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c1_312() {
$header = new header();
$header->index("Đua xe bắn súng",'/game/play/','Tìm kiếm game');
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://eboggames.eval.hwcdn.net/games/burnin-rubber-crash-n-burn.unity3d';
$data['title'] = "Đua xe bắn súng";    
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c6_311() {
$header = new header();
$header->index("Game MU",'/game/play/','Tìm kiếm game');
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://eboggames.eval.hwcdn.net/games/mu-game.unity3d';
$data['title'] = "MU";    
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c11_310() {
$header = new header();
$header->index("Game Star War",'/game/play/','Tìm kiếm game');
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://eboggames.eval.hwcdn.net/games/lego-star-wars-yoda-chronicles.unity3d';
$data['title'] = "Star War";    
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c1_309() {
$header = new header();
$header->index("Trò chơi Đường đua sa mạc",'/game/play/','Tìm kiếm game');
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://eboggames.eval.hwcdn.net/games/desert-run.unity3d';
$data['title'] = "Đường đua sa mạc";    
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c16_308() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://eboggames.eval.hwcdn.net/games/air-war-3d-classic.unity3d';
$data['title'] = "Air War 3D";
$header = new header();
$header->index("Game Air War 3D",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c2_190() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://criticalstrikeportable.com/game/critical_strike_portable.unity3d';
$data['title'] = "Counter Strike";
$header = new header();
$header->index("Game Counter Strike",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c2_116() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://media.y8.com/system/contents/68574/original/typocalypse-3d-unity-3d.unity3d?1389070791';
$data['title'] = "Typocalypse 3D";
$header = new header();
$header->index("Game Typocalypse 3D",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c1_214() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = '/games/3d-hd/car_race/track-racing.unity3d';
$data['title'] = "Track Racing";
$header = new header();
$header->index("Game Track Racing",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c7_91() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['title'] = "Brazil Volley Ball";
$data['embed_src'] = 'http://www.gamesflare.org/games/2013-1/super-volleyball-brazil.unity3d';
$header = new header();
$header->index("Game Brazil Volley Ball",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}


/* start flash */
function c5_104 () {
$data['w'] = "70%";
$data['h'] = "100%";
$data['embed_flash'] ='https://www.miniclip.com/games/hurry-up-bob-2/en/hurry%20up%20bob%202%20miniclip.swf';
$data['title'] = 'Kim tự tháp';
$header = new header();
$header->index("Trò chơi Kim tự tháp",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c7_76 () {
$data['w'] = "70%";
$data['h'] = "100%";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201111/18/4c50bb32ed7309f59f427934cb3481f1.swf';
$data['title'] = 'Billard';
$header = new header();
$header->index("Billard",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c7_27 () {
$data['w'] = "70%";
$data['h'] = "100%";
$data['embed_flash'] ='/games/flash/tennis-champions.swf';
$data['title'] = 'Tennis';
$header = new header();
$header->index("Tennis",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}
function c18_335 () {
$data['w'] = "70%";
$data['h'] = "100%";
$data['embed_flash'] ='http://vuigame.vcdn.vn/upload/data/doraemontomau_1358853210.swf?id=8666&cp=&bestscore=';
$data['title'] = 'Đôrêmon tô màu';
$header = new header();
$header->index("Trò chơi Đôrêmon tô màu",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}


function c9_136 () {
$data['w'] = "70%";
$data['h'] = "100%";
$header = new header();
$header->index("Aldin",'/game/play/','Tìm kiếm game');
$data['embed_flash'] ='http://master.trochoiviet.com/games/modules/Nintendo/games/loader.swf?rom=UUd1W4u9';
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c9_137 () {
$data['w'] = "70%";
$data['h'] = "100%";
$data['embed_flash'] ='http://master.trochoiviet.com/games/modules/Nintendo/games/loader.swf?rom=x5Y5W5Wg';
$header = new header();
$header->index("Super Contra",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c9_135 () {
$data['w'] = "70%";
$data['h'] = "100%";
$data['embed_flash'] ='http://master.trochoiviet.com/games/modules/Nintendo/games/loader.swf?rom=PRgLfpvI';
$header = new header();
$header->index("Natra",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}


function c9_138 () {
$data['w'] = "70%";
$data['h'] = "100%";
$header = new header();
$header->index("Street Fighter",'/game/play/','Tìm kiếm game');
$data['embed_flash'] ='http://master.trochoiviet.com/games/modules/Nintendo/games/loader.swf?rom=dW8kO1Ft';
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c9_334 () {
$data['w'] = "70%";
$data['h'] = "100%";
$header = new header();
$header->index("Mario",'/game/play/','Tìm kiếm game');
$data['embed_flash'] ='http://master.trochoiviet.com/games/modules/Nintendo/games/loader.swf?rom=V424Gedv';
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c9_139 () {
$data['w'] = "70%";
$data['h'] = "100%";
$header = new header();
$header->index("Chip and Dale",'/game/play/','Tìm kiếm game');
$data['embed_flash'] ='http://master.trochoiviet.com/games/modules/Nintendo/games/loader.swf?rom=xmRlR2Wf';
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c9_142 () {
$data['w'] = "70%";
$data['h'] = "100%";
$header = new header();
$header->index("Ninja",'/game/play/','Tìm kiếm game');
$data['embed_flash'] ='http://master.trochoiviet.com/games/modules/Nintendo/games/loader.swf?rom=nUgTBz5z';
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c9_140 () {
$data['w'] = "70%";
$data['h'] = "100%";
$header = new header();
$header->index("Bomber Man");
$data['embed_flash'] ='http://master.trochoiviet.com/games/modules/Nintendo/games/loader.swf?rom=CVefMGf4';
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c9_141 () {
$data['w'] = "70%";
$data['h'] = "100%";
$header = new header();
$header->index("Jackal",'/game/play/','Tìm kiếm game');
$data['embed_flash'] ='http://master.trochoiviet.com/games/modules/Nintendo/games/loader.swf?rom=gGpDpv4H';
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c17_127 () {
$data['w'] = "70%";
$data['h'] = "100%";
$data['title'] = "Bắn trứng khủng long";
$header = new header();
$header->index("Trò chơi Bắn trứng khủng long",'/game/play/','Tìm kiếm game');
$data['embed_flash'] ='http://vuigame.vcdn.vn/upload/data/bantrung1351143916_do_1389857735.swf';
$data['title'] = 'Bắn trứng khủng long';
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c17_328(){
$data['w'] = "60%";
$data['h'] = "100%";
$data['embed_flash']='http://gameflashviet.com/wp-content/games/chiec-non-ky-dieu.swf';
$data['title'] = "Chiếc nón kỳ diệu";
$header = new header();
$header->index("Trò chơi Chiếc nón kỳ diệu",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c19_323 () {
$data['w'] = "100%";
$data['h'] = "530px";
$data['embed_flash'] ='http://eboggames.eval.hwcdn.net/games/temple-of-the-lotus.swf';
$data['title'] = 'Temple of the Lotus';
$header = new header();
$header->index("Game Temple of the Lotus",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c17_324 () {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://eboggames.eval.hwcdn.net/games/the-artists-apartment.swf';
$data['title'] = 'Căn hộ của họa sĩ';
$header = new header();
$header->index("Căn hộ của họa sĩ",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c5_193 () {
$data['w'] = "100%";
$data['h'] = "530px";
$data['embed_flash'] ='http://vuigame.vcdn.vn/upload/data/BleachNaruto_do_1389098749.swf?id=9325&cp=&bestscore=';
$data['title'] = 'Game Bleach VS Naruto';
$header = new header();
$header->index("Game Bleach VS Naruto",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c1_197() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://media.y8.com/system/contents/69780/original/offroader-v3.unity3d?1390990204';
$data['title'] = "Off Roader";
$header = new header();
$header->index("Game Off Roader",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c2_191() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://vuigame.vcdn.vn/upload/data/Combat3_1383190111.unity3d?id=16342&cp=';
$data['title'] = "Đột kích";
$header = new header();
$header->index("Trò chơi Đột kích",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c1_194() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://vuigame.vcdn.vn/upload/data/BurninRubberCrash_1383723964.unity3d?id=16552&cp=';
$data['title'] = "Xạ thủ xa lộ";
$header = new header();
$header->index("Trò chơi Xạ thủ xa lộ",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c3_192() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://vuigame.vcdn.vn/upload/data/LegendaryHeroes_1383142030.unity3d?id=16312&cp=';
$data['title'] = 'Anh hùng huyền thoại';
$header = new header();
$header->index("Trò chơi Anh hùng huyền thoại",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c16_108() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://media.y8.com/system/contents/72161/original/earth_wars_web.unity3d?1394721974';
$data['title'] = "Earth War";
$header = new header();
$header->index("Game Earth War",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c5_188 () {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://vuigame.vcdn.vn/upload/data/ninjago-the-final-battle_1383122716.unity3d?id=16301&cp=';
$data['title'] = "Ninja 3D";
$header = new header();
$header->index("Game Ninja 3D",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c5_39() {
$data['w']="100%";
$data['h']="100%";
$header = new header();
$data['title'] = "Đại náo Thiếu Lâm Tự";
$header->index("Trò chơi Đại náo Thiếu Lâm Tự",'/game/play/','Tìm kiếm game');
$data['embed_src'] = '/games/3d-hd/vo_thuat/DesafioPequim_1384327339.unity3d';
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c1_rush_world(){	
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = '/games/3d-hd/car_race/rush_world.unity3d';
$header = new header();
$header->index("Game Rail Rush World",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash_unity_y8_com',$data);
$this->output->cache(3);
}

function c2_6(){	
$data['w'] = "100%";
$data['h'] = "100%";
$data['title'] = "Kill Storm";
$data['embed_src'] = 'http://eboggames.eval.hwcdn.net/games/killstorm-demo.unity3d';
$header = new header();
$header->index("Game Kill Storm",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}


function contract_war(){
$this->load->view('game/war/contract_war');
$this->output->cache(3);
}

function c16_189 () {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://vuigame.vcdn.vn/upload/data/Killstorm_1396868565.unity3d?id=20457&cp=';
$data['title'] = "Trực thăng chiến đấu";
$header = new header();
$header->index("Trò chơi Trực thăng chiến đấu",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c16_47(){
$data['embed_src'] = 'http://vuigame.vcdn.vn/upload/data/WarInTheSkies_1388651234.unity3d?id=18026&cp=';
$data['w']="100%";
$data['h']="100%";
$data['title'] = "War in the Sky";
$header = new header();
$header->index("Game War in the Sky",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c1_48(){
$data['embed_src'] = 'http://vuigame.vcdn.vn/upload/data/3dFerrariF458_1389167090.unity3d?id=18170&cp=';
$data['w']="100%";
$data['h']="100%";
$data['title']='Drive Ferrari';
$header = new header();
$header->index("Game Drive Ferrari",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}


function c1_122() {
$data['embed_src'] ='http://www.shockwave.com/content/200mph-thunder-road/sis/200mph_thunder_road.unity3d';
$data['w'] = "100%";
$data['h'] = "100%";
$data['title'] = "Tia sét đường phố";
$header = new header();
$header->index("Trò chơi Tia sét đường phố",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c5_103() {  
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = '/games/3d-hd/minotaur-labyrinth.unity3d';
$data['title'] = "Bò mộng Minotaur";
$header = new header();
$header->index("Trò chơi Bò mộng Minotaur",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}


function c7_106() {
$data['embed_src'] ='/games/3d-hd/car_race/wild-kart.unity3d';
$data['w'] = "60%";
$data['h'] = "100%";
$header = new header();
$data['title'] = "Đua xe thể thao";
$header->index("Trò chơi Đua xe thể thao",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}


function c16_109() {
$data['embed_src'] = 'http://games.gahe.com/13/Jets-Of-War.unity3d';
$data['w']="100%";
$data['h']="100%";
$data['title'] = "Jet of War";
$header = new header();
$header->index("Game Jet of War",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c5_299() {
$data['embed_src'] = 'http://eboggames.eval.hwcdn.net/games/angry-bots.unity3d';
$data['w'] = "100%";
$data['h'] =  "100%";
$data['title'] = "Rôbô nổi giận";
$header = new header();
$header->index("Trò chơi Rôbô nổi giận",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D');
$this->output->cache(3);
}

function c3_110() {
$data['embed_src'] = '/games/3d-hd/strategy_war/age-of-wind-2.unity3d';
$data['w']="100%";
$data['h']="100%";
$data['title'] = "Đại chiến trên biển";
$header = new header();
$header->index("Trò chơi đại chiến trên biển",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c1_112() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = '/games/3d-hd/car_race/flash-drive.unity3d';
$data['title'] = "Flash Drive";
$header = new header();
$header->index("Game Flash Drive",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c3_500() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = '/games/3d-hd/WarInTheSkies_1388651234.unity3d';
$data['title'] = "Trận chiến trên không";
$header = new header();
$header->index("Trò chơi trận chiến trên không",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c10_113() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = '/games/3d-hd/war/tank-derby.unity3d';
$data['title'] = "Tank Derby";
$header = new header();
$header->index("Game Tank Derby",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c6_114() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = '/games/3d-hd/supah-ninjas.unity3d';
$data['title'] = "Super Ninja";
$header = new header();
$header->index("Game Super Ninja",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c7_177() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = '/games/3d-hd/kung-fu-chop.unity3d';
$data['title'] = "Kungfu Chop";
$header = new header();
$header->index("Game Kungfu Chop",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}


/* start iframe loading */
function c1_306() {
$header = new header();
$header->index("Trò chơi Đua xe hủy diệt",'/game/play/','Tìm kiếm game');
$data['w'] = "100%";
$data['h'] = "100%";
$data['src'] = 'http://www.miniclip.com/games/total-wreckage/en/webgame.php';
$data['title'] = "Đua xe hủy diệt";
$this->load->view('game/frame', $data);
$this->output->cache(3);
}

function c1_331() {
$header = new header();
$header->index("Trò chơi Đua xe",'/game/play/','Tìm kiếm game');
$data['w'] = "100%";
$data['h'] = "100%";
$data['src'] = 'http://www.carracinggames.biz/files/file/speeding.dir';
$data['title'] = "Đua xe";
$this->load->view('game/frame', $data);
$this->output->cache(3);
}

function c1_330() {
$header = new header();
$header->index("Trò chơi Đua xe tải",'/game/play/','Tìm kiếm game');
$data['w'] = "100%";
$data['h'] = "100%";
$data['src'] = 'http://www.carracinggames.biz/files/file/RvPM-Racing.dir';
$data['title'] = "Đua xe tải";
$this->load->view('game/frame', $data);
$this->output->cache(3);
}

function c1_329(){  
$header = new header();
$header->index("Game Ford Moto Racing",'/game/play/','Tìm kiếm game');
$data['w'] = "100%";
$data['h'] = "100%";
$data['src'] = 'http://www.carracinggames.biz/files/file/fordflattrack.dir';
$data['title'] = "Ford Moto Racing";
$this->load->view('game/frame', $data);
$this->output->cache(3);
}

/*begin shockwave type*/
function c1_305(){
$header = new header();
$header->index("Trò chơi tay Đua rừng già",'/game/play/','Tìm kiếm game');
$data['title'] = "Tay đua rừng già";
$data['h'] = "100%";
$data['w'] = "100%";
$data['src'] = "http://www.miniclip.com/games/offroad-4x4/en/webgame.php";
$this->load->view("game/frame",$data);
$this->output->cache(3);
}

function c1_199(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['file_name'] = "blues_bikers.dcr";
$data['embed_shockwave'] ='http://www.miniclip.com/games/blues-bikers/en/blues_bikers.dcr';
$data['pre_load'] = 'http://www.miniclip.com/games/blues-bikers/en/gameloader.dcr';
$data['title'] = "Moto Racing";
$header = new header();
$header->index("Moto Racing",'/game/play/','Tìm kiếm game');
$this->load->view('game/shockwave',$data);
$this->output->cache(3);
}

function c1_325(){
$header = new header();
$header->index("Đường đua khóa lửa");
$this->load->view('game/html/shockwave.html');
$this->output->cache(3);
}


function c1_322(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['file_name'] = "";
$data['pre_load'] = '';
$data['embed_shockwave'] ='http://www.martiangames.com/swf/spykarts.dcr';
$data2 ['title'] = "Đua xe chiến đấu";
$header = new header();
$header->index("Trò chơi Đua xe chiến đấu",'/game/play/','Tìm kiếm game');
$this->load->view('game/shockwave_martian_games',$data);
$this->output->cache(3);
}

function c7_203(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['file_name'] = "karate_king.dcr";
$data['embed_shockwave'] ='http://www.miniclip.com/games/karate-king/en/karate_king.dcr';
$data['pre_load'] = 'http://www.miniclip.com/games/karate-king/en/gameloader.dcr';
$data['title'] = "Karate King";
$header = new header();
$header->index("Game Karate King",'/game/play/','Tìm kiếm game');
$this->load->view('game/template/shockwave',$data);
$this->output->cache(3);
}

function c1_205(){
$data['w'] = "50%";
$data['h'] = "100%";
$data['src'] ='http://solfware.comule.com/gamesshockwave/braap-braap.dcr';
$data['title'] = "Motor Rider";
$header = new header();
$header->index("Game Motor Rider",'/game/play/','Tìm kiếm game');
$this->load->view('game/frame',$data);
$this->output->cache(3);
}

function c1_207(){    
$data['w'] = "592px";
$data['h'] = "448px";
$data['embed_shockwave'] ='http://www.miniclip.com/games/turbo-racing/en/turbo_racingg.dcr';
$data['pre_load'] = 'http://www.miniclip.com/games/turbo-racing/en/gameloader.dcr';
$data['title'] = "Race Turbo";
$data['file_name'] = "turbo_racingg.dcr";
$header = new header();
$header->index("Game Race Turbo",'/game/play/','Tìm kiếm game');
$this->load->view('game/shockwave',$data);
$this->output->cache(3);
}

function c1_118() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = '/games/3d-hd/motor_race/StuntMania3D.unity3d';
$header = new header();
$data['title'] = "Đua môtô mạo hiểm";
$header->index("Trò chơi đua môtô mạo hiểm",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c5_121() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = '/games/3d-hd/proto-bat-bot.unity3d';
$data['title'] = "Batman Robo";
$header = new header();
$header->index("Game Batman Robo",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c1_198() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = '/games/3d-hd/madagascar-3.unity3d';
$data['title'] = "Đường đua Madagascar";
$header = new header();
$header->index("Trò chơi đường đua Madagascar",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c1_298() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = '/games/3d-hd/streets-of-gotham.unity3d';
$data['title'] = "Streets of Gotham";
$header = new header();
$header->index("Game Streets of Gotham",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c3_200() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = '/games/3d-hd/water-wars.unity3d';
$data['title'] = "Trận chiến trên biển";
$header = new header();
$header->index("Trò chơi trận chiến trên biển",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c5_202() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = '/games/3d-hd/wrath-of-the-titans.unity3d';
$data['title'] = "Game Wrath of the Titans";
$header = new header();
$header->index("Game Wrath of the Titans",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c1_338() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://www.smartjeux.com/wp-content/games/unity/T/traffic-talent-2.unity3d';
$data['title'] = "Game Traffic Talent";
$header = new header();
$header->index("Game Traffic Talent",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c10_204() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = '/games/3d-hd/metal-cavalry.unity3d';
$header = new header();
$data['title'] = "3D Tank Metal Cavalry";
$header->index("Game 3D Tank Metal Cavalry",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c5_36() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = '/games/3d-hd/abysus-arena.unity3d';
$header = new header();
$data['title'] = "Rex diệt quái vật";
$header->index("Rex diệt quái vật",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
//$this->output->cache(3);
}

function c13_81(){
$data['w'] = "100%";
$data['h'] = "600px";
$data['src'] = 'http://www.miniclip.com/games/8-ball-pool-multiplayer/en/webgame.php';
$data['title'] ="Trò chơi Bida";
$header = new header();
$header->index("Trò chơi Bida",'/game/play/','Tìm kiếm game');
$this->load->view('game/frame',$data);
$this->output->cache(3);
}

function c7_212(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['file_name'] = '';
$data['pre_load'] = '';  
$data['embed_shockwave'] ='http://www.miniclip.com/games/european-soccer-champions/en/european_soccer_champions.dcr';
$data['title'] = "PES 2014";
$header = new header();
$header->index("Game PES 2014",'/game/play/','Tìm kiếm game');
$this->load->view('game/template/shockwave',$data);
$this->output->cache(3);
}

function c1_99() {
$data['embed_src'] = "/games/3d-hd/car_race/MotorWars2_1396427178.unity3d";
$data['w'] = "100%%";
$data['h']= "100%";
$data['title'] = "Cuộc chiến Motor";
$header = new header();
$header->index("Trò chơi Cuộc chiến Môtô",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D', $data);
$this->output->cache(3);
}

function c1_15() {     
$data['embed_src'] = '/games/3d-hd/motor_race/motocross nitro.unity3d';
$data['w']="100%";
$data['h']="100%";
$data['title'] = "Đua mô tô địa hình";
$header = new header();
$header->index("Trò chơi đua mô tô địa hình",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D', $data);
$this->output->cache(3);
}

function c2_304() {
$header = new header();
$header->index("Pipe",'/game/play/','Tìm kiếm game');
$this->load->view("game/race/pipe");
$this->output->cache(3);
}

function c1_101() {
$data['embed_src'] = "/games/3d-hd/car_race/lose-the-heat-3.unity3d";
$data['w']="100%";
$data['h']="100%";
$data['title'] = "Đua xe với cảnh sát";
$header = new header();
$header->index("Trò chơi Đua xe với cảnh sát",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D', $data);
$this->output->cache(3);
}

function c2_120() {
$data['embed_src'] = "/games/3d-hd/shooting/half-life-v.unity3d";
$data['w']="100%";
$data['h']="100%";
$data['title'] = "Bắn Half Life";
$header = new header();
$header->index("Trò chơi bắn Half Life",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D', $data);
$this->output->cache(3);
}

function c3_38() {
$data['embed_src'] = "http://vuigame.vcdn.vn/upload/data/lego-star-wars-yoda-chronicles_1383211801.unity3d?id=16435&cp=";
$data['w']="100%";
$data['h']="100%";
$data['title']= "Cuộc chiến các vì sao";
$header = new header();
$header->index("Trò chơi cuộc chiến các vì sao",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D', $data);
$this->output->cache(3);
}

function c16_143(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://cdn.flonga.com/games/swf/battle-gear-missile-attack.swf';
$data['title'] = "Trận chiến tên lửa";
$header = new header();
$header->index("Trò chơi trận chiến tên lửa",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_86(){
$data['w'] = "100%";
$data['h'] = "100%";
$header = new header();
$header->index("Game Battle Gear",'/game/play/','Tìm kiếm game');
$data['title'] = "Battle Gear";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201112/05/e0149a138834d7bfb564408b7dcc1287.swf';
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c15_180(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://www.musipedia.org/3Dpiano.swf';	
$data['title'] = "Piano Practice";
$header = new header();
$header->index("Game Type Piano",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c7_219(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://nguyenhuuhuan.org/2010/uploads/games/caro.swf';
$data['title'] = "Cờ Caro";
$header = new header();
$header->index("Trò chơi cờ caro",'/game/play/','Tìm kiếm game');	
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c18_272 () {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://www.hellochao.vn/images/games/DoDungTrongNha2.swf?v=313';
$data['title'] = "Đồ dùng phòng khách";
$header = new header();
$header->index("Trò chơi tiếng Anh - Đồ dùng phòng khách",'/game/play/','Tìm kiếm game');	
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c18_273 () {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://www.hellochao.vn/images/games/MusicRoom.swf?v=313';
$data['title'] = "Đồ dùng phòng học nhạc";
$header = new header();
$header->index("Trò chơi tiếng Anh - Đồ dùng phòng học nhạc",'/game/play/','Tìm kiếm game');	
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c17_271(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://socvui3.vcmedia.vn/upload/Pikachu-Pokemon/Pikachu-Pokemon.swf';
$data['title'] = "Pokemon Pikachu";
$header = new header();
$header->index("Trò chơi Pokemon Pikachu",'/game/play/','Tìm kiếm game');	
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c17_14(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://vuigame.vcdn.vn/upload/data/candy-crush_do_1394797748.swf';
$data['title'] = "Candy Crush";
$header = new header();
$header->index("Candy Crush",'/game/play/','Tìm kiếm game');	
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c15_178(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://virtualpiano.net/wp-content/themes/twentyfourteen-child/page-templates/vponline/Host.swf';
$data['title'] = "Tập đánh đàn Piano";
$data['element_content'] =  $this->db->select("*")->from('system_object')
->where('id_element','178')
->order_by('name_element')	
->get()->result_array();	

$header = new header();
$header->index("Trò chơi tập đánh đàn Piano",'/game/play/','Tìm kiếm game');
$this->load->view('music/flash',$data);
//$this->output->cache(3);
}

function ajax_c15_flash_grand_piano()
{
$data['element_content']=$this->db->select("*")->from('system_object')->where('id_element','178')->like('name_element', $this->input->get_post('music_sheet'))->get()->result_array();
$this->load->view('music/search_result',$data);
}

function tank_large(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://miniclip.tankionline.com/tutorial/src/tutorial.swf';
$data['title'] = "Bắn xe tăng";
$header = new header();
$header->index("Trò chơi bắn xe tăng",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_217(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://eboggames.eval.hwcdn.net/games/battlefield-arena.swf';
$data['title'] = "Trận chiến Arena";
$header = new header();
$header->index("Trò chơi trận chiến Arena",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c1_216(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://www.ploko.com/content/3DBugattiRacing.swf';
$data['title'] = "Đua siêu xe Bugatti";
$header = new header();
$header->index("Trò chơi đua siêu xe Bugatti",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}


function c1_22 () {
$data['src'] = "http://www.unity3dgames.net/3d_games/dcr/off-road-velociraptor-safari.html";
$data['w']="100%";
$data['h']="100%";
$data['title'] = "Đua xe bắt thú";
$header = new header();
$header->index("Trò chơi Đua xe bắt thú",'/game/play/','Tìm kiếm game');
$this->load->view('game/frame', $data);
$this->output->cache(3);
}

function c3_105() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='/games/flash/strategic_war/gw9358.swf';
$data['title'] = "Nghệ thuật phòng thủ";
$header = new header();
$header->index("Trò chơi nghệ thuật phòng thủ",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c1_57() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201203/13/04465840cea317f3ce6f82c0848ea217.swf';
$data['title'] = "Đua xe";
$header = new header();
$header->index("Trò chơi đua xe",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_58() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201112/07/2330407459a72c9cd53165f80799f7d3.swf';
$data['title'] = "Commandos";
$header = new header();
$header->index("Trò chơi Commandos 2",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}


function c1_17() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201111/13/c546b932f10e8ea4c6139c36baebc088.swf';
$data['title'] = "Đua xe bãi biển";
$header = new header();
$header->index("Trò chơi Đua xe bãi biển",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}


function c10_160() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://www.military.thetazzone.com/SeaBattles/seahawk.swf';
$data['title'] = "Đại bàng cất cánh";
$header = new header();
$header->index("Trò chơi Đại bàng cất cánh",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c10_146() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://eboggames.eval.hwcdn.net/games/tank-hero.swf';
$data['title'] ="Anh hùng xe tăng";
$header = new header();
$header->index("Trò chơi anh hùng xe tăng",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c10_150() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://www.military.thetazzone.com/LandBattles/tank2008.swf';
$data['title'] ="Xe tăng";
$header = new header();
$header->index("Trò chơi Xe tăng",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_169() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://cdn.flonga.com/games/swf/battle-for-darkness.swf';
$data['title'] = "Trận chiến bóng đêm";
$header = new header();
$header->index("Trò chơi trận chiến bóng đêm",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_163() {
$data['w'] = "60%";
$data['h'] = "100%";
$data['embed_flash'] ='http://cdn.flonga.com/games/swf/warlords-2-rise-of-demons.swf';
$data['title'] = "Warlord";
$header = new header();
$header->index("Trò chơi Warlord",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c10_151() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://www.military.thetazzone.com/LandBattles/tank2010release.swf';
$data['title'] = "Xe tăng";
$header = new header();
$header->index("Trò chơi xe tăng",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c10_158() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://www.military.thetazzone.com/LandBattles/raging-steel.swf';
$data['title'] = "Xe tăng";
$header = new header();
$header->index("Trò chơi bắn xe tăng",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c10_145() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://www.military.thetazzone.com/MoreWar/3dtanks.swf';
$data['title'] = "Xe tăng";
$header = new header();
$header->index("Trò chơi bắn xe tăng",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c1_67() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201110/18/b18020eef45598a762346a0b1c95ad71.swf';
$data['title'] = "Đua xe môtô";
$header = new header();
$header->index("Trò chơi đua xe môtô",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c1_124() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://game.24h.com.vn/upload/game/2011-05-27/1306458303_Game_DuaXeThamHiem.swf';
$data['title'] = "Đua xe thám hiểm";
$header = new header();
$header->index("Trò chơi đua xe thám hiểm",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c1_33() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://vuigame.vcdn.vn/upload/data/duaxejeep_1354186332.swf';
$data['title'] = 'Đua xe Jeep';
$header = new header();
$header->index("Trò chơi đua xe Jeep",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c1_206() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://www.esemdesign.com/games/flash/games/stunt-bike-deluxe.swf';
$data['title'] = "Đua xe địa hình";
$header = new header();
$header->index("Trò chơi đua xe địa hình",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_201() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='/games/flash/dungeon-king.swf';
$data['title'] = "Vua địa ngục";
$header = new header();
$header->index("Trò chơi vua địa ngục",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c1_85() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201111/21/b59b8411c5f37991ca8ece1a4239b40a.swf';
$data['title'] = 'Xe tải địa hình';
$header = new header();
$header->index("Trò chơi Xe tải địa hình",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c1_60() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201303/22/5c08241f566204e9c72636ac65781175.swf';
$data['title'] = "Đua xe đường phố";
$header = new header();
$header->index("Trò chơi đua xe đường phố",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c11_79() {
$data['w'] = "60%";
$data['h'] = "100%";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201112/05/6e5647e1ad6f2e9b5456e3112eb0c134.swf';
$data['title'] = "Đế chế Glalaldur";
$header = new header();
$header->index("Trò chơi đế chế Glalaldur",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_68() {
$data['w'] = "60%";
$data['h'] = "100%";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201202/13/6d576a15aa4c8e021ec7486be0d8d028.swf';
$data['title'] = "Epic War";
$header = new header();
$header->index("Trò chơi Epic War",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_52() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201110/13/887204e6751ddd491731d77c72862515.swf';
$data['title'] = "Fraction War";
$header = new header();
$header->index("Game Faction War",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c11_183() {
$data['w'] = "59%";
$data['h'] = "100%";
$data['embed_flash'] ='http://cdn.flonga.com/games/swf/empire-of-the-galaldur.swf';
$data['title'] = "Đế chế Galaldur";
$header = new header();
$header->index("Game đế chế Galaldur",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_186() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://cdn.flonga.com/games/swf/necropolis-defense.swf';
$data['title'] = "Trận phòng thủ Necropolis";
$header = new header();
$header->index("Game trận phòng thủ Necropolis",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_37() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://vuigame.vcdn.vn/upload/data/dantran4441_1345886669.swf';
$data['title'] = "Dàn trận";
$header = new header();
$header->index("Game dàn trận",'/game/play/','Tìm kiếm game'); 
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c2_70() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201112/05/d075467a58f5252fb312e110b31d0c88.swf';
$data['title'] = 'Jungle Rampage';
$header = new header();
$header->index("Trò chơi Jungle Rampage",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_69() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201112/08/099eedf85646c55239a6ccd78945a0b7.swf';
$data['title'] = 'Star Craft';
$header = new header();
$header->index("Trò chơi Star Craft",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_74() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201111/22/82e8f4e7b31a0c04c238f50372ba2501.swf';
$data['title'] = 'Star Craft';
$header = new header();
$header->index("Trò chơi Start Craft",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_181() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://cdn.flonga.com/games/swf/strike-force-heroes-2.swf';
$data['title'] = "Trận chiến anh hùng";
$header = new header();
$header->index("Trò chơi trận chiến anh hùng",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_62() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201201/18/1eabffe0d90fd22d354a707447e0b1fa.swf';
$data['title'] = 'Game Transformer';
$header = new header();
$header->index("Game Transformer",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c1_170() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://cdn.flonga.com/games/swf/madness-on-wheels.swf';
$data['title'] ='Đua xe bắn súng';
$header = new header();
$header->index("Game đua xe bắn súng",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c1_29() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://cdn.fupa.com/swf/concept-car-parking/ConceptCarParking.swf';
$data['title'] = 'Car Parking';
$header = new header();
$header->index("Game tập đậu xe",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_168() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://cdn.flonga.com/games/swf/warfare-1917.swf';
$data['title'] = "WarFare";
$header = new header();
$header->index("Game WarFare",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_64() {
$data['w'] = "100%";
$data['h'] = "475  px";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201110/20/6a954f5e41ba2af315d3f2edc655d37a.swf';
$data['title'] = 'Warfare 1917';
$header = new header();
$header->index("Game Warfare 1917",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c17_5 () {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='/games/flash/angry-birds.swf';
$data['title'] = 'Angry Bird';
$header = new header();
$header->index("Game Angry Bird",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_87 () {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201111/02/a763b11caf878b64e2408073d59932a4.swf';
$data['title'] = 'Star Craft';
$header = new header();
$header->index("Game Star Craft",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_182() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://cdn.flonga.com/games/swf/resort-empire.swf';
$data['title'] ='Đế chế Resort';
$header = new header();
$header->index("Game đế chế Resort",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c2_94() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://gmswffiles.brothersoft.com/action/siege-master-914.swf';
$data['title'] = 'Bắn đá';
$header = new header();
$header->index("Game bắn đá",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_184() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://cdn.flonga.com/games/swf/alexander-dawn-of-an-empire.swf';
$data['title'] = 'Đế chế Alexander';
$header = new header();
$header->index("Game đế chế Alexander",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c11_185() {
$data['w'] = "100%";
$data['h'] = "475px";
$data['embed_flash'] ='http://cache.armorgames.com/files/games/fallen-empire-14809.swf?v=1400378077';
$data['title'] = "Đế chế Fallen";
$header = new header();
$header->index("Game đế chế Fallen",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_77 () {
$data['w'] = "60%";
$data['h'] = "100%";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201110/11/71380a10d55f5f92534391976697a3f7.swf';
$data['title'] = 'Game Miragine War';
$header = new header();
$header->index("Game Miragine War",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c1_213() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_src'] = 'http://static.miniclipcdn.com/games/turbo-racing-3/en/TurboRacing3.unity3d';
$data['title'] ='Race Turbo';
$header = new header();
$header->index("Game Race Turbo",'/game/play/','Tìm kiếm game');
$this->load->view('game/unity3D',$data);
$this->output->cache(3);
}

function c11_4(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://media.goodgamestudios.com/games/empire/goodgameempire.swf?201';
$data['title'] ='Xây dựng đế chế';
$header = new header();
$header->index("Game đế chế",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_16(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://www.gamingdelight.com/games/ageofwar.swf';
$data['title'] = 'Age of War';
$header = new header();
$header->index("Game Age of War",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c10_126(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://www.trochoivn.net/data/3acfd7b2-c406-49fe-b939-ef02df31a780.swf';
$data['title'] = 'Nintendo City Battle';
$header = new header();
$header->index("Game Nintendo City Battle",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c10_155(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://www.military.thetazzone.com/LandBattles/thebattlenew.swf';
$data['title'] = 'Game Battle';
$header = new header();
$header->index("Game Battle",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);

}

function c10_157(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://www.military.thetazzone.com/LandBattles/battlefield2a.swf';
$data['title'] = 'Trận chiến xe tăng';
$header = new header();
$header->index("Game trận chiến xe tăng",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c10_152(){
$data['w'] = "60%";
$data['h'] = "100%";
$data['embed_flash'] ='http://www.military.thetazzone.com/LandBattles/battle-royale-game.swf';
$data['title'] = 'Xe tăng chiến đấu';
$header = new header();
$header->index("Trò chơi Xe tăng chiến đấu",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c2_19 (){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201112/05/cf32572d916eb2e79f6eecb610048845.swf';
$data['title'] = 'Bắn súng';
$header = new header();
$header->index("Trò chơi bắn súng",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c4_28 (){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='/games/flash/1276308071_kimcuongfull3.swf';
$data['title'] = 'Xếp Kim cương';
$header = new header();
$header->index("Game xếp Kim cương",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c1_21 (){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201111/18/74c78114cbce3c983ae54a62ba370a29.swf';
$data['title'] = 'Cơn sốt đường phố';
$header = new header("Trò chơi cơn sốt đường phố",'/game/play/','Tìm kiếm game');
$header->index();
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c9_7 (){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://vuigame.vcdn.vn/upload/data/contra-25th-anniversary_do_1389770891.swf?pre=&amp;id=10334';
$data['title'] = 'Contra Rambo';
$header = new header();
$header->index("Game Contra Rambo",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c5_9 (){
$data['w'] = "80%";
$data['h'] = "100%";
$data['embed_flash'] ='http://vuigame.vcdn.vn/upload/data/power-rangers-samurai-spirit_1352794077.swf?pre=&amp;id=6578';
$data['title'] = 'Ninja';
$header = new header();
$header->index("Game Ninja",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c5_11 (){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://vuigame.vcdn.vn/upload/data/daichientamquoc_do_1371193235.swf?pre=&amp;id=12095';
$data['title'] = 'Đại chiến Tam quốc';
$header = new header();
$header->index("Trò chơi Đại chiến Tam quốc",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c1_127(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://vuigame.vcdn.vn/upload/data/bantrung1351143916_do_1389857735.swf?pre=&amp;id=6148';
$data['title'] = 'Bắn trứng khủng long';
$header = new header();
$header->index("Game bắn trứng khủng long",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c7_1(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='/games/flash/chess/Co Tuong.swf';
$data['title'] = 'Cờ tướng';
$header = new header();
$header->index("Game cờ tướng",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c10_159(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://www.military.thetazzone.com/LandBattles/tankdestroyer2.swf';
$data['title'] = 'Xe tăng hủy diệt';
$header = new header();
$header->index("Game xe tăng hủy diệt",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_111(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://games.sify.com/images/games/flash/theempire.swf';
$data['title'] = 'Đế chế (Phiên bản Flash)';
$header = new header();
$header->index("Game đế chế",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c3_156(){
$data['w'] = "100%";
$data['h'] = "475px";
$data['embed_flash'] ='http://www.military.thetazzone.com/LandBattles/massive-war.swf';
$data['title'] = 'Game Massive War';
$header = new header();
$header->index("Game Massive War",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c1_26(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='/games/flash/dua-xe-hoi-xuyen-viet.swf';
$data['title'] = 'Đua xe hơi xuyên Việt';
$header = new header();
$header->index("Trò chơi đua xe hơi xuyên Việt",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c11_211(){
$data['w'] = "100%";
$data['h'] = "475px";
$data['embed_flash'] ='http://flash.7k7k.com/cms/cms10/20130308/1531012065/theemptie2.swf';
$data['title'] = 'Đế chế (Phiên bản Flash)';
$header = new header();
$header->index("Game Đế chế",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function nitro_tank() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='';
$header = new header();
$header->index("Trò chơi xe tăng chiến đấu",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash_nitro_tank',$data);      
$this->output->cache(3);
}

function c3_215() {
$data['w'] = "100%px";
$data['h'] = "475px";
$data['embed_flash'] ='http://eboggames.eval.hwcdn.net/games/galaxy-battleground.swf';
$data['title'] ='Chiến tranh Thiên hà';
$header = new header();
$header->index("Trò chơi Chiến tranh Thiên hà",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);      
$this->output->cache(3);
}


function c11_96(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://337game.eleximg.com/337/freegame/uploads/201111/01/a2b731af757174ccc0e582a5f38ea035.swf';
$data['title'] = 'Game Dracojan Skies';
$header = new header();
$header->index("Game Dracojan Skies",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);      
$this->output->cache(3);
}

function c6_31(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://vuigame.vcdn.vn/upload/data/tethiendaithanh_protected_1390365605.swf?pre=&id=9924';
$data['title'] = "Tề thiên đại thánh";
$header = new header();
$header->index("Trò chơi Tề thiên đại thánh",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);      
$this->output->cache(3);
}

function c2_319(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://www.miniclip.com/games/crush-the-castle-2/en/crushthecastle2.swf';
$data['title'] = 'Phá hủy lâu đài';
$header = new header();
$header->index("Trò chơi phá hủy lâu đài",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);      
$this->output->cache(3);
}


function c6_32(){
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://vuigame.vcdn.vn/upload/data/daihoivolam_do_1374654235.swf?pre=&amp;id=8199';
$data['title'] = 'Đại Hội Võ Lâm';
$header = new header();
$header->index("Game Đại Hội Võ Lâm",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);      
$this->output->cache(3);
}

function c7_2() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://85playgames.eval.hwcdn.net/games/badminton-3d.swf';
$data['title']="Cầu lông";
$header = new header();
$header->index("Trò chơi  Đánh cầu lông",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);      
$this->output->cache(3);
}

function c2_3() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='/games/flash/shooting/game_attack_arc.swf';
$data['title'] = 'Game bắn pháo';
$header = new header();
$header->index("Game bắn pháo",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);      
$this->output->cache(3);
}


function c2_125() {
$data['w'] = "1125px";
$data['h'] = "100%";
$data['embed_flash'] ='http://www.trochoivn.net/data/tranchienxetang.swf';
$header = new header();
$data['title'] = 'Trận chiến xe tăng';
$header->index("Trò chơi Trận chiến xe tăng",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);      
$this->output->cache(3);
}


function c1_307 () {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://assets.kongregate.com/gamez/0017/6679/live/AmericanRacing2.swf';
$data['title'] = 'American Racing';
$header = new header();
$header->index("Game American Racing",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c6_274 () {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://vuigame.vcdn.vn/upload/data/SailorMoonwudi_secure_1358392509.swf';
$data['title'] = "Thủy thủ mặt trăng";
$header = new header();
$header->index("Trò chơi Thủy thủ mặt trăng",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c19_276 () {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://jwst.nasa.gov/game/telescope_final.swf';
$data['title'] = "Khám phá kính thiên văn";
$header = new header();
$header->index("Kính thiên văn",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c19_301 () {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://www.minigameviet.com/wp-content/uploads/2013/08/rubik.swf';
$data['title'] = "Xếp hình cubic";
$header = new header();
$header->index("Trò chơi Xếp hình cubic",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c5_302 () {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://www.minigameviet.com/wp-content/uploads/2013/10/Comic_Stars_Fighting.swf';
$data['title'] = "Cosmic Star Fighting";
$header = new header();
$header->index("Game Cosmic Star Fighting",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c19_297 () {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://science.hq.nasa.gov/skyspy/noaccess.swf';
$data['title'] = "Game Sky spy";
$header = new header();
$header->index("Game Sky spy",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}


function c1_278 () {
$data['w'] = "60%";
$data['h'] = "100%";
$data['embed_flash'] ='http://vuigame.vcdn.vn/upload/data/formula-racer-2012_1351675423.swf';
$data['title'] = 'Đua xe công thức 1';
$header = new header();
$header->index("Trò chơi Đua xe công thức 1",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c17_270() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://socvui3.vcmedia.vn/upload/Tim-diem-khac-biet5195907b78935/Tim-diem-khac-biet5195907b78da0.swf';
$data['title'] = 'Tìm điểm khác biệt';
$header = new header();
$header->index("Trò chơi Tìm điểm khác biệt",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c17_269 () {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://socvui3.vcmedia.vn/upload/Sudoku519a03a23b80b/Sudoku519a03a23bc39.swf';
$data['title'] = 'Game Suduko';
$header = new header();
$header->index("Game Suduko",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c17_268() {
$data['w'] = "95%";
$data['h'] = "100%";
$data['embed_flash'] ='http://socvui3.vcmedia.vn/upload/Dao-vang/Dao-vang.swf';
$data['title'] = 'Đào vàng';
$header = new header();
$header->index("Trò chơi Đào vàng",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
}

function c17_267() {
$data['w'] = "100%";
$data['h'] = "100%";
$data['embed_flash'] ='http://socvui3.vcmedia.vn/upload/Lines-98512dcb09994b4/Lines-98512dcb0999c60.swf';
$data['title'] = 'Lines 98';
$header = new header();
$header->index("Trò chơi Lines 98",'/game/play/','Tìm kiếm game');
$this->load->view('game/flash',$data);
$this->output->cache(3);
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