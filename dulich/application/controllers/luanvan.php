<?php
require_once 'application/controllers/analytic.php';
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
class luanvan extends CI_Controller
{

function index($sort_by = 'NAME', $sort_order = 'asc', $offset = 0)
{
//new model instance
 $this->load->model('luanvan_model');

$per_page  = 12;
$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2); 
$results = $this->luanvan_model->SelectAll($per_page, $offset, $sort_by, $sort_order);     
//pagination
$this->load->library('pagination'); 
$config['total_rows'] = $results['num_rows'];
$config['per_page'] = $per_page; 
$config['next_link'] = 'Trang tiếp »'; 
$config['prev_link'] = '« Trang sau'; 
$config['num_tag_open'] = ''; 
$config['num_tag_close'] = ''; 
$config['num_links'] = 10; 
$config['cur_tag_open'] = '<a class="currentpage">'; 
$config['cur_tag_close'] = '</a>';
$config['first_link'] = 'Trang đầu';
$config['last_link'] = 'Trang cuối';
$config['base_url'] = "http://myweb.pro.vn/luanvan/";
$config['uri_segment'] = 2; 
$this->pagination->initialize($config);
$pagination = $this->pagination->create_links();

//query the db
$query_ebook_category = 'SELECT *, ebook_category.name as CATEGORY_EBOOK FROM (SELECT sho.ID, sho.NAME as NAME_EBOOK, sho.ID_CATEGORY, count(*) AS counting FROM ebook_index AS sho GROUP BY sho.ID_CATEGORY ) obj_hash_tag INNER JOIN ebook_category ON ebook_category.id = obj_hash_tag.ID_CATEGORY ORDER BY obj_hash_tag.counting DESC';

//render view
$data['ebook_data'] = $results['rows'];     
$data['total_rows']=$results['num_rows'];
$data['pagination'] = $pagination;
$data['count_all_ebook'] = $results['num_rows'];
$data['csrf_test_name'] = $this->security->get_csrf_hash();
$data['category_ebook'] = $this->db->query($query_ebook_category)->result_array(); 
$header = new header();
$header->luanvan("Thư viện luận văn");

//start analytic
$analytic = new analytic();
$analytic->myweb('general');
//end analytic

$this->load->view('luanvan/index',$data);
}

//start detail function
function detail(){
$header_title = '';
if(!isset($_REQUEST['id'])){
	redirect('/luanvan/index/');
}
else{
	redirect('/doc-luan-van?id='.$_REQUEST['id']);
	//case id exist in the database then render to html
	if($_REQUEST['id']!="-1"){
		$book_data=$this->db->select('ebook_index.*,ebook_category.NAME as CATE_NAME')
											->from('ebook_index')
											->join('ebook_category','ebook_category.id=ebook_index.ID_CATEGORY','inner')
											->where('REFERER','luanvannetvn')
											->where('ebook_index.ID',$_REQUEST['id'])->get()->result_array();	
		if($book_data){
			foreach($book_data as $key);
			$data['book_title']=$key['NAME'];
			$data['book_description']=$key['DESCRIPTION'];
			$data['book_thumbs']=$key['THUMBS'];
			$data['share_id']=$key['ID'];
			$data['cate_name']=$key['CATE_NAME'];
			$data['id_cate']=$key['ID_CATEGORY'];
			$header_title = $key['NAME'];	
		}
		else{
			redirect("/luanvan/index/");
		}
	}
	//end

	//start if
	if($_REQUEST['id']=="-1"){
		$book_data=$this->db->select('ebook_index.*,ebook_category.NAME as CATE_NAME')
									->from('ebook_index')
									->join('ebook_category','ebook_category.id=ebook_index.ID_CATEGORY','inner')
									->where('REFERER','luanvannetvn')
									->where('ebook_index.NAME',$_REQUEST['book_title'])->get()->result_array();	
		if($book_data){
			foreach($book_data as $key);
			$data['book_title']=$key['NAME'];
			$data['book_description']=$key['DESCRIPTION'];
			$data['book_thumbs']=$key['THUMBS'];
			$data['cate_name']=$key['CATE_NAME'];
			$data['id_cate']=$key['ID_CATEGORY'];
			$data['share_id']=$key['ID'];
			$header_title = $key['NAME'];	
		}
		else{
			$data=array('REFERER'=>'luanvannetvn',
						'NAME'=>strip_tags(trim($_REQUEST['book_title'])),
						'DESCRIPTION'=>'',
						'ID_CATEGORY'=>'8',
						'path'=>'http://luanvan.net.vn'.$_REQUEST['path'],
						'THUMBS'=>$_REQUEST['book_thumbs']);
			$this->db->insert('ebook_index',$data);
			$header_title = $_REQUEST['book_title'];
			$data['book_title']=$_REQUEST['book_title'];
			$data['cate_name']='Chưa phân loại';
			$data['id_cate']='8';
			$data['book_description']='';
			$data['book_thumbs']=$_REQUEST['book_thumbs'];
			$data['share_id']=$this->db->insert_id();	
		}
	}
	//end if
}


$header = new header();
$header->luanvan($header_title );
if(isset($_REQUEST['path'])){
	$content=file_get_contents('http://luanvan.net.vn/'.$_REQUEST['path']);
}
else{
	$content=file_get_contents($key['path']);
}
$data['content']=str_replace('Scale=0.95','Scale=1.00',$content);
$data['csrf_test_name'] = $this->security->get_csrf_hash(); 

//start analytic
$analytic = new analytic();
$analytic->myweb('book');
//end analytic
//login pop-up  
if(isset($_REQUEST['type'])){
	$data['type']=$_REQUEST['type'];
}
else{
	$data['type']='0';
}
//end
$this->load->view('/luanvan/detail',$data);
}
//end detail function

//start detail function
function doc_luan_van(){
$header_title = '';
if(!isset($_REQUEST['id'])){
	redirect('/luanvan/index/');
}
else{
	//case id exist in the database then render to html
	if($_REQUEST['id']!="-1"){
			$book_data=$this->db->select('ebook_index.*,ebook_category.NAME as CATE_NAME')
											->from('ebook_index')
											->join('ebook_category','ebook_category.id=ebook_index.ID_CATEGORY','inner')
											->where('REFERER','luanvannetvn')
											->where('ebook_index.ID',$_REQUEST['id'])->get()->result_array();	
		if($book_data){
			foreach($book_data as $key);
			$next_id=$key['ID']+1;
			$data['book_title']=$key['NAME'];
			$data['book_description']=$key['DESCRIPTION'];
			$data['book_thumbs']=$key['THUMBS'];
			$data['share_id']=$key['ID'];
			$data['next_id']=$next_id;
			$data['cate_name']=$key['CATE_NAME'];
			$data['id_cate']=$key['ID_CATEGORY'];
			$header_title = $key['NAME'];	
		}
		else{
			$next=$_REQUEST['id']+1;
			redirect("http://m.myweb.pro.vn/doc-luan-van?id=".$next);
			//11854
		}
	}
	//end

	//start if
	if($_REQUEST['id']=="-1"){
		$book_data=$this->db->select('ebook_index.*,ebook_category.NAME as CATE_NAME')
									->from('ebook_index')
									->join('ebook_category','ebook_category.id=ebook_index.ID_CATEGORY','inner')
									->where('REFERER','luanvannetvn')
									->where('ebook_index.NAME',$_REQUEST['book_title'])->get()->result_array();	
		if($book_data){
			foreach($book_data as $key);
			$data['book_title']=$key['NAME'];
			$data['book_description']=$key['DESCRIPTION'];
			$data['book_thumbs']=$key['THUMBS'];
			$data['cate_name']=$key['CATE_NAME'];
			$data['id_cate']=$key['ID_CATEGORY'];
			$data['share_id']=$key['ID'];
			$header_title = $key['NAME'];	
		}
		else{
			$data=array('REFERER'=>'luanvannetvn',
						'NAME'=>strip_tags(trim($_REQUEST['book_title'])),
						'DESCRIPTION'=>'',
						'ID_CATEGORY'=>'8',
						'path'=>'http://luanvan.net.vn'.$_REQUEST['path'],
						'THUMBS'=>$_REQUEST['book_thumbs']);
			$this->db->insert('ebook_index',$data);
			$header_title = $_REQUEST['book_title'];
			$data['book_title']=$_REQUEST['book_title'];
			$data['book_description']='';
			$data['cate_name']='Chưa phân loại';
			$data['id_cate']='8';
			$data['book_thumbs']=$_REQUEST['book_thumbs'];
			$data['share_id']=$this->db->insert_id();	
		}
	}
	//end if
}

if(isset($_REQUEST['path'])){
	$content=file_get_contents('http://luanvan.net.vn/'.$_REQUEST['path']);
}
else{
	$content=file_get_contents($key['path']);
}
$data['content']=str_replace('Scale=0.95','Scale=1.00',$content);
$data['csrf_test_name'] = $this->security->get_csrf_hash(); 

//start analytic
$analytic = new analytic();
$analytic->myweb('book');
//end analytic
//login pop-up  
if(isset($_REQUEST['type'])){
	$data['type']=$_REQUEST['type'];
}
else{
	$data['type']='0';
}
//end
$this->load->view('/luanvan/detail',$data);
}
//end doc_luan_van function

//start view function
function view(){
if(!isset($_REQUEST['book_id'])){
redirect('/book/index/');
}
$data_book=$this->db->select('*')->from('ebook_index')->where('path',$_REQUEST['book_id'])->or_where('id',$_REQUEST['book_id'])->get()->result_array();
foreach($data_book as $key);
$header = new header();
$header->index($key['NAME'],"/book/index","Enter để tìm sách tham khảo, luận văn...");
$data['book_title']=$key['NAME'];
$data['book_thumbs']=$key['THUMBS'];
$data['embed_src']=$key['path'];
$data['book_description']=$key['DESCRIPTION'];
$data['share_id']=$key['ID'];
$this->load->view('book/view',$data);
}
//end view function

//start function mylib
function mylib(){
$this->load->model('log_model');
$id_u=$this->log_model->getId();
$data_mylib=$this->db->select('*')
		 ->from('ebook_index')
	     ->join('fk_user_book','fk_user_book.ID_BOOK=ebook_index.ID','inner')
	     ->where('ID_U',$id_u)
		 ->get()->result_array();
	
	if($data_mylib){
		$data['mylib']=$data_mylib;
	}

	else{
		$data_mylib=$this->db->select('*')
		 ->from('ebook_index')
	     ->join('fk_user_book','fk_user_book.ID_BOOK=ebook_index.ID','inner')
	     ->where('ID_U','83')
		 ->get()->result_array();
		$data['mylib']=$data_mylib;
	}

$this->load->view('/book/mylib',$data);
}

function mylibcheckexist(){
$this->load->model('log_model');
$id_u=$this->log_model->getId();
$data_book_check=$this->db->select('*')->from('fk_user_book')
				  ->where('ID_U',$id_u)
				  ->where('ID_BOOK',$_REQUEST['book_to_add'])
				  ->get()->result_array();
if($data_book_check){
	echo "1";
}
else {
	echo "0";
}

}
//end

function cse(){
	$header = new header();
	$header->book("Kết quả tìm kiếm");
	$this->load->view('google/cse');
}

function count_book_download () {
	$query = $this->db->select("*")->from("ebook_index")->where("ID",$this->input->get_post('book_id'))->get()->result_array();
	foreach($query as $key){
	$count=$key['DOWNLOADED']+1;
	$arr=array('DOWNLOADED'=>$count);
	$this->db->where("ID",$this->input->get_post('book_id'));
	$this->db->update("ebook_index", $arr);
	}
}

function count_book_view () {
	$query = $this->db->select("*")->from("ebook_index")->where("ID",$this->input->get_post('book_id'))->get()->result_array();
	foreach($query as $key){
	$count=$key['VIEW']+1;
	$arr=array('VIEW'=>$count);
	$this->db->where("ID",$this->input->get_post('book_id'));
	$this->db->update("ebook_index", $arr);
	}
}

//start function comment
function comment(){
	$this->load->model('log_model');
	$id_u=$this->log_model->getId();
	$date = getdate();
	$comment_date = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'] . ' ' . $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];
	foreach($this->db->select('*')->from('qtht_users')->where('ID_U',$id_u)->get()->result_array() as $user);
	$data=array("ID_U"=>$id_u,"ID_BOOK"=>$_REQUEST['id_book'],"COMMENT"=>$_REQUEST['content'],"DATE"=>$comment_date);
	$this->db->insert('fk_user_book_comment',$data);
	
	if($user['facebook_id']!=''&& $user['USER_IMAGE'] ==''){$user_avatar='https://graph.facebook.com/'.$user['facebook_id'].'/picture';}
	if($user['facebook_id']=='' && $user['USER_IMAGE'] !='' &&  $user['facebook_id'] != $user['USER_IMAGE']) {$user_avatar=$user['USER_IMAGE'];}
	if($user['facebook_id']=='' && $user['USER_IMAGE'] =='') {$user_avatar='/images/no_avatar.png';}
	if($user['facebook_id']!='' && $user['USER_IMAGE'] !='' &&  $user['facebook_id'] != $user['USER_IMAGE']){$user_avatar=$user['USER_IMAGE'];}
	if($user['facebook_id'] == $user['USER_IMAGE'] && $user['USER_IMAGE'] !=''){$user_avatar='https://graph.facebook.com/'.$user['facebook_id'].'/picture';}

	echo '<div class="book_user_comment"><img style="width: 32px!important;" class="user_avatar" src="'.$user_avatar.'" alt="'.$user['NAME'].'"><span class="user_comment">'.$user['NAME'].'</span><span class="comment_content">'.$_REQUEST['content'].'</span></div>';
}
//end function comment

function all(){
$header = new header();
$header->index("Tủ sách học tập","/book/index","Enter để tìm sách tham khảo, luận văn...");
$data['book']=$this->db->select('*')->from('ebook_index')->get()->result_array();
$this->load->view('book/all',$data);	
$this->output->cache(3);
}

function get_book(){
	$data=array('ID_CATEGORY'=>'8',
				'REFERER'=>'luanvannetvn',
				'NAME'=>trim($_REQUEST['name']),
				'DESCRIPTION'=>$_REQUEST['description'],
				'path'=>'http://luanvan.net.vn'.$_REQUEST['path'],
				'THUMBS'=>$_REQUEST['thumbs']);
	$book_data=$this->db->select('*')->from('ebook_index')->where('path',$_REQUEST['path'])->get()->result_array();		
	if($book_data){
		echo '1';
	}
	else {
			$this->db->insert('ebook_index',$data);
			echo $this->db->insert_id();
	}
}
//start function
function get_luan_van(){
if($_REQUEST['page']=="6408"){
	exit();
}
$header = new header();
$header->book('LUAN_VAN');
$content=file_get_contents('http://luanvan.net.vn/default.aspx?page='.$_REQUEST['page']);	
//$content=file_get_contents('http://luanvan.net.vn/luan-van/ngoai-ngu/?page=6');	
$data['main']=$content;
$data['pagination']='';
$data['left']='';
$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
$data['type']='';
$data['page']=$_REQUEST['page']+1;
$this->load->view('luanvan/get',$data);
}
//end function


//start function
function in_luan_van(){
$data=$this->db->select('*')->from('ebook_index')->where('id',$_REQUEST['id'])->get()->result_array();
foreach($data as $key);
$count_print=$key['PAPER_PRINT']+1;
$this->db->where('ID',$_REQUEST['id']);
$this->db->update('ebook_index',array('PAPER_PRINT'=>$count_print));
$data['print_path']=$_REQUEST['print_path'];
$data['print_name']=$_REQUEST['book_title'];
$this->load->view('luanvan/print',$data);
}
//end function

function check_file_path(){
	$file = file_get_contents($_REQUEST['path'], true);
	preg_match('/Not Found/',$file, $matches, PREG_OFFSET_CAPTURE);
	if($matches){
		echo "false";
	}
	else {
		echo "true";
	}
}

function t()
{	
	$content=file_get_contents('http://tailieuhoctap.vn/chi-tiet-sach/228-nganh-van-hoa-du-lich/thoi-trang-lam-dep/37125-bai-tap-mat-xa-de-co-vong-1-cang-tron-san-chac');
	var_dump($content);
}

function test(){
echo '<base href="http://en.bookfi.org/">';
echo file_get_contents('http://en.bookfi.org/g/25+greatest+science+books+of+all+time');
}
}
?>