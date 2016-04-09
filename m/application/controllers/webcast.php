<?php
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
class webcast extends CI_Controller {
	function transfer($domain){	
		$url='http://'.$domain.'/';
		$trans= new web_transfer();
		$indexpage='?film';
		$base='/';
		$trans->initiate_news ($url,$indexpage); 
		$trans->converturl($url,$base);
		$content ='';
		$trans->start_transfer("mybongda.com");
		$trans->getcontent($content);
		$content=str_replace('<div id="fra_rutgon">','<div id="fra_rutgon" style="display:none">',$content);
		$content=str_replace('<div class="mtaixiu">','<div class="mtaixiu" style="display:none">',$content);
		$content=str_replace('<div id="mynhan">','<div id="mynhan" style="display:none">',$content);
		preg_match_all('/<div id="main_content">(.*?)<div id="other_content">/s',$content,$matches,PREG_SET_ORDER);
		foreach($matches as $key);
		return $key[1];
	}
	function football(){
		$header = new header();
		$header->index("Trực tiếp bóng đá K+","","");
		//$data['lich_phat_song'] = $this->transfer('mybongda.com');
		$data['title']='';
		$this->load->view('webcast/football');		
		$this->output->cache(3);
	}

}
?>