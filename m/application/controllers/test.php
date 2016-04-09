<?php
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
class test extends CI_Controller {

    function music(){
	$header = new header();
	$header->index("Nhạc quê hương");
	/*
	if(isset($_REQUEST['id'])){
	$path=str_replace('http://mp3.zing.vn/','',$_REQUEST['id']);
	$url=$_REQUEST['id'];
	}

	else {
	$path = "/";
	$url="http://mp3.zing.vn/tim-kiem/bai-hat.html";
	}

	$indexpage = "?quehuong"; 

	$trans= new web_transfer();
	$indexpage='/';
	$base='/';
	$trans->initiate_news ($url,$indexpage); 
	$trans->converturl($url,$base);
	$content ='';
	$trans->start_transfer("mp3.zing.vn");
	$trans->getcontent($content);
	$data['content']=$content;
	var_dump($content);
	die();
	*/
	$zing_data=file_get_contents('http://mp3.zing.vn/tim-kiem/bai-hat.html?q=a%20time%20for%20us');
	preg_match_all('/<div class="search-content">(.*?)<div class="sidebar">/s',$zing_data,$matches,PREG_SET_ORDER);
	foreach($matches as $key);
	$data['content']=$key[1];
	$this->load->view('test/music',$data);
	}
	function video_audio() {
		$data['content']='content';
        $this->load->view('test/test', $data);
    }
    function speech(){
	$this->load->view('/test/speech_engine');
	}
    function map()
    {
        $data['title']='Bản đồ';
        $this->load->view('test/map',$data);
    }
	function default_speech(){
		$this->load->view('/test/speech/default');
	}
	function speech_iframe(){
	$this->load->view('test/speech_iframe');
	}


	function virtual_keyboard(){
	$this->load->view('test/vir');
	}
	function game()
	{
		$this->load->view('test/game');
	}
	
    function draggable_object()
    {
        $data['title']='Draggable Content';
        $this->load->view('test/dragable-content',$data);
    }

	function sms()
	{
		$this->load->view('/test/sms');
	}
	
	function showhidediv()
	{
		$this->load->view('/test/test');
	}
    function google()
    {
        $this->load->view('test/google');
    }
	function autocomplete(){
	$this->load->view('/plugin/autocomplete');
	} 
	//start function
	function get_doc_server(){
	if($_REQUEST['page']=='197'){
	exit();
	}
	$data['content']=file_get_contents('http://doan.edu.vn/do-an/mon-dai-cuong/?page='.$_REQUEST['page']);	
	$data['page']=$_REQUEST['page']+1;
	$this->load->view('test/get',$data);
	}
	//end function

	//start function
	function get_tl_server(){
	if($_REQUEST['id']=='370'){
		exit();
	}
	//$data=$this->db->select('*')->from('ebook_index')->where('id',$_REQUEST['id'])->where('REFERER','tailieuhoceduvn')->get()->result_array();
	//foreach($data as $key);
	$data['content']=file_get_contents('http://luanvan365.com/luan-van/khoa-hoc-xa-hoi/?page='.$_REQUEST['id']);	
	//$data['content']=file_get_contents($key['direct_link']);	
	$data['id']=$_REQUEST['id'];
	$data['next_id']=$_REQUEST['id']+1;
	$this->load->view('test/timtailieuvn',$data);
	}
	//end function
	function update_link(){
	$this->db->where('id',$_REQUEST['id']);
	$this->db->where('REFERER','tailieuhoceduvn');
	$this->db->update('ebook_index',array('direct_link'=>$_REQUEST['new_path']));

	}
	function voer(){
	echo file_get_contents('https://voer.edu.vn/');
	}
}

?>

<!--http://www.zbook.vn/-->