<?php class seo extends CI_Controller{
function raovat(){
$raovat_db=$this->load->database('admin_raovatnhanh',TRUE);
$r=$raovat_db->select('*')->from('rao_vat')
->where('referer','chotot.vn')
->where('id >','328926')
->limit(3000)
->get()->result_array();
$data['seo']=$r;
$this->load->view('seo/raovat',$data);
}

function news(){
$news_db=$this->load->database('admin_news',TRUE);
$r=$news_db->select('*')->from('news')->get()->result_array();
$data['seo']=$r;
$this->load->view('seo/news',$data);
}

function getallnews(){
$news_db=$this->load->database('admin_news',TRUE);
$r=$news_db->select('*')->from('news')->get()->result_array();
$data['seo']=$r;
$this->load->view('seo/news',$data);
}

function product(){
$db=$this->load->database('compare',TRUE);
$seo=$db->select('*')->from('product_price_compare')
->where('referer','websosanh')
->where('id >','25974') //websosanh.vn
//->where('id >','540498') //compare.vn
//->where('id >','1632209')//timgiare.vn
->limit(2100)->get()->result_array();
$data['seo']=$seo;
$this->load->view('seo/product',$data);
}

function chongiadung(){
$raovat_db=$this->load->database('admin_raovatnhanh',TRUE);
$r=$raovat_db->select('*')->from('so_sanh_gia')->where('referer','www.chongiadung.com')->limit(50000)->get()->result_array();
$data['seo']=$r;
$this->load->view('seo/product',$data);
}

function allthesis () {
$db=$this->load->database('thesis_notes',TRUE);
$sql=$db->select('*')->from('ebook_index')->get()->result_array();
$data['ebook_data']=$sql;	
$this->load->view('seo/ebook',$data);
}

function allproduct(){
$db=$this->load->database('compare',TRUE);
$seo=$db->select('*')->from('product_price_compare')->get()->result_array();
$data['seo']=$seo;
$this->load->view('seo/product',$data);
}
}?>