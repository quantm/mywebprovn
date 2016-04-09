<?php
require_once 'application/controllers/header.php';
class mbook extends CI_Controller
{		

function ctdlgt()
{
$header = new header();
$header->index("Cấu trúc dữ liệu và giải thuật","/mbook/index","Tìm kiếm Mbook");
$data['title']='';

if(isset($_REQUEST['id'])){
$data['id_element']=$_REQUEST['id'];
}
else {
$data['id_element']='0';
}

$this->load->view('/mbook/ctdlgt',$data);
}

function pttkhttt()
{
$header = new header();
$header->index("Phân tích thiết kế hệ thống thông tin","/mbook/index","Tìm kiếm Mbook");
$data['title']='';

if(isset($_REQUEST['id'])){
$data['id_element']=$_REQUEST['id'];
}
else {
$data['id_element']='0';
}


$this->load->view('/mbook/pttkhttt',$data);
}

function pttkpm(){
$header = new header();
$header->index("Phân tích và thiết kế phần mềm","/mbook/index","Tìm kiếm Mbook");
$data['title']='';
if(isset($_REQUEST['id'])){
$data['id_element']=$_REQUEST['id'];
}
else {
$data['id_element']='0';
}

$this->load->view('/mbook/pttkpm',$data);
}

//start function
function index(){
	redirect('/');
	if(!isset($_REQUEST['id'])){
		$db_init=$this->load->database('admin_education',TRUE);
		$data['mbook']=$db_init->select('*')->from('mbook')->get()->result_array();
		$this->load->view('/mbook/index',$data);
		$this->output->cache(3);
		$header = new header();
		$header->index("Mbook","/mbook/index","Tìm kiếm Mbook");
	}
	else {
	$book_data=$this->db->select('*')->from('ebook_index')->where('REFERER','mbook')->where('id',$_REQUEST['id'])->get()->result_array();
	foreach($book_data as $key);
	$data['title']=$key['NAME'];
	$data['share_id']=$_REQUEST['id'];
	$data['description']=$key['DESCRIPTION'];
	$data['path']=$key['path'];
	$data['thumbs']=$key['THUMBS'];

	//header
	$header = new header();
	$header->book($key['NAME']);
	
	//body
	$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
	$this->load->view('mbook/pdf',$data);
	}
}
//end function
}
?>