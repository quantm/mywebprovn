<?php
class test extends CI_Controller{
function index(){	
$this->load->view('test/film_template');
}
function mobile(){	
$this->load->view('test/mobile_template');
}

function video_js(){	
$this->load->view('test/videojs');
}

function db_connect(){
$mybd=$this->load->database('admin_raovatnhanh',TRUE);
var_dump($mybd->select('*')->from('rao_vat')->limit(3)->get()->result_array());
}

function check_remote_content(){
$url='http://luanvan.net.vn/luan-van/de-tai-ung-dung-cong-nghe-thong-tin-trong-doi-moi-phuong-phap-day-hoc-53231/';
$content=file_get_contents($url);
$content=str_replace('UA-33331621-3','',$content);//luanvan.net.vn
echo $url;
echo 	$content;
}
function date_object(){
$date=getdate();
$s = $date['seconds'];
$day = $date['mday'];
echo $day; 
}


function add(){
echo $_SERVER['REMOTE_ADDR'];
}
}
?>