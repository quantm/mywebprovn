<?php
require_once 'application/controllers/header.php';
class doctruyen extends CI_Controller{
function cse(){
$header = new header();
$header->story("Kết quả tìm kiếm");
$this->load->view('google/cse');
}
function danhmuc($sort_by = 'NAME', $sort_order = 'asc', $offset = 0){
$db=$this->load->database('default',TRUE);


$this->load->model('doctruyen_model');			
$this->load->library('pagination'); 

if(isset($_REQUEST['id_category'])){
$category=$db->select('*')->from('system_story_category')->where('id',$_REQUEST['id_category'])->get()->result_array();
$header = new header();
$header->story('Tủ truyện '.$category[0]['name']);		
$cate_name=$db->select('*')->from('system_story_category')->where('id',$_REQUEST['id_category'])->get()->result_array();
$data['category_name']=$cate_name[0]['name'];
$data['id_category']=$_REQUEST['id_category'];
}
if(!isset($_REQUEST['id_category'])){
$header = new header();
$header->story('Tủ truyện của tui');			
$cate_name=$db->select('*')->from('system_story_category')->where('id','3')->get()->result_array();
$data['category_name']='Kiếm hiệp';
$data['id_category']='3';
}

//start pagination
$per_page  = 24;
$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2); 
$results = $this->doctruyen_model->SelectAll($per_page, $offset, $sort_by, $sort_order);     

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
$config['base_url'] = "http://myweb.pro.vn/doc-truyen-online";
$config['uri_segment'] = 2; 
$this->pagination->initialize($config);
//end pagination

//render view
$data['pagination']=$this->pagination->create_links();
$data['elib']=$results['rows'];
$data['count_elib']=$results['num_rows'];
$data['category_names']=$db->select('*')->from('system_story_category')->get()->result_array();
$this->load->view('doctruyen/story_shelf',$data);
}
function paging($id,$page){
$content=file_get_contents('http://webtruyen.com/story/Paging_listbook/'.$id.'/'.$page);
$content=str_replace('webtruyen.com','myweb.pro.vn/doc-truyen?fetchItem=',$content);
echo $content;
}
function view() {
if(isset($_REQUEST['fetchUrl'])){
$result=$this->db->select('*')->from('system_story')->like('path',$_REQUEST['fetchUrl'])->get()->result_array();
$content=file_get_contents($result[0]['path']);
preg_match_all('/<div class="float_left">(.*?)<fb:comments/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $key);

$header = new header();
$header->story($result[0]['name']);	

$data['content']=$key[0];
$data['thumb']=$result[0]['thumb'];
}
if(isset($_REQUEST['fetchItem'])){				
$result=$this->db->select('*')->from('system_story')->like('path',$_REQUEST['fetchItem'])->get()->result_array();
if($result){
$content=file_get_contents($result[0]['path']);
$header = new header();
$header->story($result[0]['name']);

//start www.doctruyen360.com
if($result[0]['referer']=='wwwdoctruyen360com'){
//reset 
$obj_view='<div class="adv_micro_bottom"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script></div><div class="relate_cus">';
$content=str_replace('<div class="relate_cus">',$obj_view,$content);
$content=str_replace('href="http://www.doctruyen360.com','href="/doc-truyen?fetchItem=',$content);
//end
preg_match_all('/<div id="main">(.*?)<div id="sidebar">/s',$content,$matches,PREG_SET_ORDER);
if($matches){
foreach($matches as $key);
$data['content']=$key[0];		
}
else {
redirect('http://www.myweb.pro.vn/game/');	
}
}
//end www.doctruyen360.com

//start truyendich.com
if($result[0]['referer']=='truyendichcom'){
redirect('http://www.myweb.pro.vn/game/');	
}
//end truyendich.com

//start truyen.vui1.net
if($result[0]['referer']=='truyenvui1net'){
//reset 
$content=str_replace('</h1>','</h1><base href=http://truyen.vui1.net>',$content);
$obj_view='<div class="adv_micro_bottom"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script></div><div class="relate_cus">';
$content=str_replace('<div class="relate_cus">',$obj_view,$content);
$content=str_replace('href="http://truyen.vui1.net','href="http://myweb.pro.vn/doc-truyen?fetchItem=',$content);
$content=str_replace('data-natural-','',$content);
$content=str_replace('src="/img/content/','src="http://truyen.vui1.net/img/content/',$content);
//end
preg_match_all('/<div class="panel-body">(.*?)<div class="panel-footer">/s',$content,$matches,PREG_SET_ORDER);
if($matches){
foreach($matches as $key);
echo '<base href="http://truyen.vui1.net/">';
$data['content']=$key[0];		
}
else {
redirect('/doctruyen/danhmuc?id=2');
}
}
//end truyen.vui1.net

//start webtruyen.com
if($result[0]['referer']=='webtruyencom'){
//reset 
$obj_view='<div class="adv_micro_bottom"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script></div><div id="divlistbook">';
$content=str_replace('<div id="divlistbook">',$obj_view,$content);
$content=str_replace('href="http://webtruyen.com','href="http://myweb.pro.vn/doc-truyen?fetchItem=',$content);
//end
preg_match_all('/<div class="span8">(.*?)<div class="span4">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $key);

//render view
$data['content']=$key[0];		
}
//end webtruyen.com

//render view
$data['name']=$result[0]['name'];
$data['thumb']=$result[0]['thumb'];
}

else {	
$content=file_get_contents('http://www.doctruyen360.com/'.$_REQUEST['fetchItem']);	

//start doctruyen360.com 
//reset 
$obj_view='<div class="adv_micro_bottom"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script></div><div class="relate_cus">';
$content=str_replace('<div class="relate_cus">',$obj_view,$content);
$content=str_replace('href="http://www.doctruyen360.com','href="/doc-truyen?fetchItem=',$content);
//end

//render view
$header = new header();
$header->story('Đọc truyện Online');

preg_match_all('/<div id="main">(.*?)<div id="sidebar">/s',$content,$matches,PREG_SET_ORDER);
if($matches){
foreach($matches as $key);
$data['content']=$key[0];
}

//end doctruyen360.com

if(preg_match('/Error 404 - Nothing Found/',$content)){
$content=file_get_contents('http://truyen.vui1.net/'.$_REQUEST['fetchItem']);							
if(preg_match('/Whoops, looks like something went wrong/',$content)){
$content=file_get_contents('http://webtruyen.com/'.$_REQUEST['fetchItem']);															

//start truyendich.com
if(preg_match('/Đường dẫn không hợp lệ/',$content)){
$content=file_get_contents('http://truyendich.com/'.$_REQUEST['fetchItem']);
preg_match_all('/<div class="col-md-12 fullSite">(.*?)<div class="comment clear">/s',$content,$matches,PREG_SET_ORDER);
if($matches){
foreach($matches as $key);
}
else {
preg_match_all('/<div class="leftSite col-md-8">(.*?)<div class="rightSite col-md-4">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $key);
}								

$data['content']=$key[0];	

$header = new header();
$header->story('Đọc truyện Online');
}
//end truyendich.com

//start webtruyen.com
else{
//reset 
//ads_micro_bottom
$obj_view='<div style="margin-left:-14%;margin-top:6%;" class="adv_micro_bottom"<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script></div><span class="linewel">';
//enđ

$content=str_replace('<div align="left">','<div style="display:none" align="left" class="remove">',$content);
$content=str_replace('<div align="center">','<div style="display:none" align="left" class="remove">',$content);
$content=str_replace('<span class="linewel">',$obj_view,$content);
$content=str_replace('href="http://webtruyen.com','href="http://myweb.pro.vn/doc-truyen?fetchItem=',$content);
$content=str_replace('http://webtruyen.com/story/Paging_listbook','http://myweb.pro.vn/doctruyen/paging',$content);
//end
preg_match_all('/<div class="main" style="width: 95%;">(.*?)<span class="linewel">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $key);
$data['content']=$key[0];	

$header = new header();
$header->story('Đọc truyện Online');
}
//end webtruyen.com
}						

//start truyen.vui1.net
else {	
$content=str_replace('</h1>','</h1><base href=http://truyen.vui1.net>',$content);
$content=str_replace('href="http://truyen.vui1.net/','href=http://myweb.pro.vn/doc-truyen?fetchItem=',$content);
preg_match_all('/<div class="row">(.*?)<div class="col-xs-6 col-md-4">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $key);
$data['content']=$key[0];	

$header = new header();
$header->story('Đọc truyện Online');
}
//end truyen.vui1.net
}
//end case not query the db

//render view
$data['name']='';
$data['thumb']='';
}

}
$data['share_url']='http://www.myweb.pro.vn/doc-truyen?fetchItem'.$_REQUEST['fetchItem'];
$this->load->view('doctruyen/view',$data);			
}
}
?>