<?php 
	require_once 'application/controllers/header.php';
	require_once 'application/controllers/web_transfer.php';
	class karaoke extends CI_Controller{
	function index(){
		$header = new header();
		$header->index("Karaoke");
			
		$url='http://sannhac.com/';
		$trans= new web_transfer();
		$indexpage='?film';
		$base='/';
		$trans->initiate_news ($url,$indexpage); 
		$trans->converturl($url,$base);
		$content ='';
		$trans->start_transfer("sannhac.com");
		$trans->getcontent($content);
		var_dump($content);
		die();
		$content=str_replace("<a","<span",$content);
		$content=str_replace("Phim3s.Home.init();","",$content);
		preg_match_all('/<div id="content">(.*?)<div id="sidebar">/s',$content,$matches,PREG_SET_ORDER);
		foreach($matches as $key);
		$data['content']=$key[1];
		
		// form security
		$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
		$this->load->view('karaoke/sannhac',$data);
	}
	}
?>