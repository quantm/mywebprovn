<?php
require_once 'application/controllers/header.php';
class luanvan extends CI_Controller
{

function index($sort_by = 'NAME', $sort_order = 'desc', $offset = 0)
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
$config['num_links'] = 5; 
$config['cur_tag_open'] = '<a class="currentpage">'; 
$config['cur_tag_close'] = '</a>';
$config['first_link'] = 'Trang đầu';
$config['last_link'] = 'Trang cuối';
$config['base_url'] = "http://myweb.pro.vn/luanvan/";
$config['uri_segment'] = 2; 
$this->pagination->initialize($config);
$pagination = $this->pagination->create_links();

//render view
$data['ebook_data'] = $results['rows'];     
$data['total_rows']=$results['num_rows'];
$data['pagination'] = $pagination;
$data['count_all_ebook'] = $results['num_rows'];
$data['csrf_test_name'] = $this->security->get_csrf_hash();

$header = new header();
$header->luanvan("Thư viện luận văn");

$this->load->view('luanvan/index',$data);
}

//start detail function
function detail(){
	if(!isset($_REQUEST['id'])){
		redirect('/luanvan/index/');
	}
	else{
		redirect('/doc-luan-van?id='.$_REQUEST['id']);
	}
}
//end detail function

//start function do_an
function do_an($path){
	$this->doc_luan_van($path);
}
//end function do_an

//start doc_luan_van function
function doc_luan_van($path){
$header_title = '';

$free_db=$this->load->database('admin_education',TRUE);

//text notes
if(isset($_REQUEST['textnotes'])){
	echo '<input type="hidden" id="is_textnotes" value="1">';
}
//end

if($path) {
	$book_data=$free_db->select('*')
											->from('ebook_index')
											->like('path',$path)->get()->result_array();	
		if($book_data){
			foreach($book_data as $key);
			redirect('http://myweb.pro.vn/mydoc/xahoihoctapnetvn/'.$_REQUEST['id']);
			$data['book_title']=$key['NAME'];
			$data['book_description']=$key['DESCRIPTION'];
			$data['book_thumbs']=$key['THUMBS'];
			$data['share_id']=$key['ID'];
			$header_title = $key['NAME'];	
		}
		else{
			$redirect_path='http://xahoihoctap.net.vn?referer=1&referer_search='.$path;
			redirect($redirect_path);
		}
}
//end if

if(!isset($_REQUEST['id'])){
	if($path){}
	else {			
			echo '<script type="text/javascript" src="/js/ga.js"></script>';
			echo '<meta charset="UTF-8"/>';
			echo '<h2 style="color:red">Website đang nâng cấp</h2>';
			die('<title>Website đang nâng cấp</title><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');
	}
}
else{
	redirect('http://myweb.pro.vn/mydoc/xahoihoctapnetvn/'.$_REQUEST['id']);
	//case id exist in the database then render to html
	if($_REQUEST['id']!="-1"){			
		$book_data=$free_db->select('*')
											->from('ebook_index')									
											->where('ID',$_REQUEST['id'])->get()->result_array();	
		if($book_data){
			foreach($book_data as $key);
			$data['book_title']=$key['NAME'];
			$data['book_description']=$key['DESCRIPTION'];
			$data['book_thumbs']=$key['THUMBS'];
			$data['share_id']=$key['ID'];
			$header_title = $key['NAME'];	
		}
		else{
			$redirect_path='http://myweb.pro.vn/mydoc/xahoihoctapnetvn/'.$_REQUEST['id'];
			redirect($redirect_path);
		}
	}
	//end

	//start if
	if($_REQUEST['id']=="-1"){

	}
	//end if
}

$header = new header();
$header_title=$header_title.' -Thư viện luận văn www.myweb.pro.vn';
$header->luanvan($header_title);

$content=file_get_contents($key['path']);

//reset html
$content=str_replace('Click Like Website luanvan365.com nhé bạn!','',$content);
$content=str_replace('Vui Lòng click vào','',$content);
$content=str_replace('/images/banner.jpg','http://xahoihoctap.net.vn/images/banner.jpg',$content);
$content=str_replace('Luận văn liên quan','',$content);
$content=str_replace('Tài liệu liên quan','',$content);
$content=str_replace('bên dưới để tải tài liệu :','',$content);
//end

//remove client adv
$content=str_replace('<div class="post-adv">','<div class="remove" style="display:none">',$content);//top_header_adv
$content=str_replace('<div class="sidebar-right-adv">','<div class="remove" style="display:none">',$content);//right_adv
//end

//reset path
$content=str_replace('/luan-van/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
$content=str_replace('/tai-lieu/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
$content=str_replace('/do-an/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
$content=str_replace('/giao-an/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
$content=str_replace('http://ebook.net.vn/ebook/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
//end


//base link
if(preg_match('/zun.vn/',$key['path'])){
	if(preg_match('/SwfFile=http:/',$content)){}
	else {
		$content=str_replace('SwfFile=','SwfFile=http://zun.vn/',$content);
	}
	$data['base_link']='http://zun.vn/';
}
if(preg_match('/thuvienluanvan.info/',$key['path'])){
	if(preg_match('/SwfFile=http:/',$content)){}
	else {
		$content=str_replace('SwfFile=','SwfFile=http://thuvienluanvan.info/',$content);
	}
	$data['base_link']='http://thuvienluanvan.info/';
}
if(preg_match('/monhoc.vn/',$key['path'])){
	if(preg_match('/SwfFile=http:/',$content)){}
	else {
		$content=str_replace('SwfFile=','SwfFile=http://monhoc.vn/',$content);
	}
	$data['base_link']='http://monhoc.vn/';
}
if(preg_match('/giaoan.com.vn/',$key['path'])){
	if(preg_match('/SwfFile=http:/',$content)){}
	else {
		$content=str_replace('SwfFile=','SwfFile=http://giaoan.com.vn/',$content);
	}
	$data['base_link']='http://giaoan.com.vn/';
}
if(preg_match('/giaoanmau.com/',$key['path'])){
	if(preg_match('/SwfFile=http:/',$content)){}
	else {
		$content=str_replace('SwfFile=','SwfFile=http://giaoanmau.com/',$content);
	}
	$data['base_link']='http://giaoanmau.com/';
}
if(preg_match('/thuviengiaoan.vn/',$key['path'])){
	if(preg_match('/SwfFile=http:/',$content)){}
	else {
		$content=str_replace('SwfFile=','SwfFile=http://thuviengiaoan.vn/',$content);
	}
	$data['base_link']='http://thuviengiaoan.vn/';
}

if(preg_match('/baigiang.co/',$key['path'])){
	if(preg_match('/SwfFile=http:/',$content)){}
	else {
			$content=str_replace('SwfFile=','SwfFile=http://baigiang.co/',$content);
	}
	$data['base_link']='http://baigiang.co/';
}

if(preg_match('/giaoan.co/',$key['path'])){
	if(preg_match('/SwfFile=http:/',$content)){}
	else {
			$content=str_replace('SwfFile=','SwfFile=http://giaoan.co/',$content);
	}
	$data['base_link']='http://giaoan.co/';
}
if(preg_match('/www.dethimau.vn/',$key['path'])){
	if(preg_match('/SwfFile=http:/',$content)){}
	else {
			$content=str_replace('SwfFile=','SwfFile=http://dethimau.vn/',$content);
	}
	$data['base_link']='http://www.dethimau.vn/';
}
if(preg_match('/baigiangdientu.vn/',$key['path'])){
	if(preg_match('/SwfFile=http:/',$content)){}
	else {
			$content=str_replace('SwfFile=','SwfFile=http://baigiangdientu.vn/',$content);
	}
	$data['base_link']='http://baigiangdientu.vn/';
}
if(preg_match('/doan.edu.vn/',$key['path'])){
	if(preg_match('/SwfFile=http:/',$content)){}
	else {
			$content=str_replace('SwfFile=','SwfFile=http://doan.edu.vn/',$content);
	}
	$data['base_link']='http://doan.edu.vn/';
}
if(preg_match('/thuvientailieu.vn/',$key['path'])){
	$content=str_replace('relevant-docs-close','dong-lien-quan',$content);
	if(preg_match('/SwfFile=http:/',$content)){}
	else {
			$content=str_replace('SwfFile=','SwfFile=http://thuvientailieu.vn/',$content);
	}
	$data['base_link']='http://thuvientailieu.vn/';
}

if(preg_match('/zbook.vn/',$key['path'])){
	if(preg_match('/SwfFile=http:/',$content)){}
	else {
			$content=str_replace('SwfFile=','SwfFile=http://zbook.vn/',$content);
	}
	$data['base_link']='http://zbook.vn/';
}

if(preg_match('/luanvan.net.vn/',$key['path'])){
	if(preg_match('/SwfFile=http:/',$content)){}
	else {
			$content=str_replace('SwfFile=','SwfFile=http://luanvan.net.vn/',$content);
	}
	$data['base_link']='http://luanvan.net.vn/';
}

if(preg_match('/luanvan365.com/',$key['path'])){
	$content=str_replace('	<span>Thông Tin Khuyến Mãi</span>','<div class="remove"></div>',$content);
	$content=str_replace('/images/thu-vien-luan-van-do-an-tot-nghiep-dai-hoc-thac-si-tien-si.png','http://xahoihoctap.net.vn/images/banner.jpg',$content);
	$content=str_replace('SwfFile=','SwfFile=http://luanvan365.com',$content);
	$content=str_replace('<p></p>','',$content);//fix UI
	$data['base_link']='http://luanvan365.com/';
}

if(preg_match('/luanvan.co/',$key['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
			$content=str_replace('SwfFile=','SwfFile=http://luanvan.co/',$content);
		}
		$data['base_link']='http://luanvan.co/';
}

if(preg_match('/tailieu.tv/',$key['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
			$content=str_replace('SwfFile=','SwfFile=http://tailieu.tv/',$content);
		}
		$data['base_link']='http://tailieu.tv/';
}

if(preg_match('/doc.edu.vn/',$key['path'])){
	if(preg_match('/SwfFile=http:/',$content)){}
	else {
			$content=str_replace('SwfFile=','SwfFile=http://doc.edu.vn/',$content);
	}
	$data['base_link']='http://doc.edu.vn/';
}

if(preg_match('/tai-lieu.com/',$key['path'])){
	if(preg_match('/SwfFile=http:/',$content)){}
	else {
			$content=str_replace('SwfFile=','SwfFile=http://tai-lieu.com/',$content);
	}
	$data['base_link']='http://tai-lieu.com/';
}
if(preg_match('/timtailieu.vn/',$key['path'])){
	if(preg_match('/SwfFile=http:/',$content)){}
	else {
			$content=str_replace('SwfFile=','SwfFile=http://timtailieu/',$content);
	}
	$data['base_link']='http://timtailieu.vn/';
}
if(preg_match('/ebook.net.vn/',$key['path'])){
	if(preg_match('/SwfFile=http:/',$content)){}
	else {
			$content=str_replace('SwfFile=','SwfFile=http://ebook.net.vn/',$content);
	}
	$data['base_link']='http://ebook.net.vn/';
}
///end

// flex object
$content=str_replace('ZoomTransition=easeOut','FitWidthOnLoad=true',$content);
$content=str_replace('Scale=0.95','Scale=1.00&FitWidthOnLoad=true',$content);
$content=str_replace('Scale=1','Scale=1.00&FitWidthOnLoad=true',$content);
//end

//jquery conflict
$content=str_replace('//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js?ver=1.7.1','',$content);
$content=str_replace('/js/jquery.min.js?ver=1.7.1','',$content);
//end

//prevent google analytics to call server
$content=str_replace('//www.google-analytics.com/analytics.js','',$content);
$content=str_replace('UA-33331621-3','',$content);//luanvan.net.vn
$content=str_replace('UA-37269087-2','',$content);//doc.edu.vn
$content=str_replace('UA-33331621-4','',$content);//doan.edu.vn
$content=str_replace('UA-55851350-3','',$content);//giaoan.com.vn
$content=str_replace('UA-53513450-1','',$content);//thuviengiaoan.vn
$content=str_replace('UA-45765526-1','',$content);//thuvientailieu.vn
$content=str_replace('UA-33331621-1','',$content);//timtailieu.vn
$content=str_replace('UA-40567487-3','',$content);//tai-lieu.com
$content=str_replace('UA-40567487-2','',$content);//tailieu.tv
$content=str_replace('UA-40567487-1','',$content);//luanvan.co
$content=str_replace('UA-43842669-1','',$content);//luanvan365.com
$content=str_replace('UA-37269087-3','',$content);//zbook.vn
$content=str_replace('UA-45765526-3','',$content);//ebook.net.vn
$content=str_replace('UA-55858407-3','',$content);//monhoc.vn
$content=str_replace('UA-57804822-1','',$content);//monhoc.vn
$content=str_replace('UA-37269087-1','',$content);//zun.vn
//end

//play game for relaxing
if(preg_match('/nopreview.swf/',$content)){
echo '<script>alert("File đã bị người dùng xóa, Bạn có thể chơi game Line bên dưới để giải trí một tý");</script>';
$content=str_replace('/images/nopreview.swf','http://files.vuongquocgame.com/swf/Line98.swf?1435053269.4817',$content);
}

if(isset($_REQUEST['relax'])){
		$content=str_replace($key['direct_link'],'http://files.vuongquocgame.com/swf/Line98.swf?1435053269.4817',$content);
		$content=str_replace('/images/FlexPaperViewer.swf','http://files.vuongquocgame.com/swf/Line98.swf?1435053269.4817',$content);
		$data['is_relax']='1';
}
else {
		$data['is_relax']='0';
}
//end

//facebooker name
//$content=str_replace('<div class="doc-preview">','<div class="facebooker_profile"><iframe src="http://myweb.pro.vn/facebook/getprofile"></div><div class="doc-preview">',$content);//top_header_adv
//end

//render view

//login pop-up  
if(isset($_REQUEST['type'])){
	$data['type']=$_REQUEST['type'];
}
else{
	$data['type']='0';
}
//end

if($key['direct_link']){
	$data['is_update']='0';
}
else {
	$data['is_update']='1';
}

//modal download guide and modal related thesis
if(isset($_REQUEST['is_modal_download_guide'])){
	$data['is_modal_download_guide']='1';
}
if(!isset($_REQUEST['is_modal_download_guide'])) {
	$data['is_modal_download_guide']='0';
}
//end

//mousedown open ads 
if(isset($_REQUEST['happy_reading'])){
	$data['happy_reading']='1';
}
else{
	$data['happy_reading']='0';
}
//end

$data['content']=$content;
$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
$data['like']=$key['LIKE_COUNT'];
if($path){
	$this->load->view('/luanvan/view',$data);
}
else {
	$this->load->view('/luanvan/detail',$data);
}

}
//end doc_luan_van function

function cse(){
	$header = new header();
	$header->book("Kết quả tìm kiếm");
	$this->load->view('google/cse');
}

}
?>