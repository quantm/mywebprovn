<?php
	require_once 'application/controllers/web_transfer.php';
	class dict extends CI_Controller{
		function index($word){
		$trans= new web_transfer();
		$url='http://vdict.com/fsearch.php?word='.$word.'&dictionaries=eng2vie_vie2eng_foldoc';
		$indexpage='/';
		$base='/';
		$trans->initiate_news ($url,$indexpage); 
		$trans->converturl($url,$base);
		$content ='';
		$trans->start_transfer("vdict.com");
		$trans->getcontent($content);
		$content=str_replace('HTTP/1.1','<div id="cungdau" style="display:none">',$content);
		$content=str_replace('Max-Age=','</div>',$content);
		$content=str_replace('31536000','',$content);
		/*
		foreach($this->sohoa($word) as $key){
		$content.=$key[1];
		}
		$content.=$this->wiki($word);	
		*/
		$data['content']=$content;
		$this->load->view('/dict/index',$data);
		}
		
		function speech(){
		$trans= new web_transfer();
		$url='http://text-to-speech.imtranslator.net/';
		$indexpage='/';
		$base='/';
		$trans->initiate_news ($url,$indexpage); 
		$trans->converturl($url,$base);
		$content ='';
		$trans->start_transfer("text-to-speech.imtranslator.net");
		$trans->getcontent($content);
		$content=str_replace('http://text-to-speech.imtranslator.net/tts.asp','/test/speech_iframe',$content);
		$content=str_replace('http://text-to-speech.imtranslator.net/scripts/tts.js?v=2.1.9','/js/speech/tts.js',$content);
		$content=str_replace('http://text-to-speech.imtranslator.net/VIRK/VirkClient2.js?v=2.1.9','/js/speech/client.js',$content);
		$content=str_replace('http://text-to-speech.imtranslator.net/VIRK/virk.asp','/test/virtual_keyboard',$content);
		$content=str_replace('http://text-to-speech.imtranslator.net/sockets/','http://myweb.pro.vn/sockets/',$content);
		$content=str_replace('http://text-to-speech.imtranslator.net/BANNERS/tts/300x250/2-set/default.asp','/test/default_speech',$content);
		$content=str_replace('http://text-to-speech.imtranslator.net/BANNERS/tts/300x250/2-set/default.asp','/test/default_speech',$content);
		$content=str_replace("var dmn = 'http://text-to-speech.imtranslator.net","var dmn = 'http://myweb.pro.vn",$content);
		$content=str_replace('box.asp','box.html',$content);
		$data['content']=$content;
		//preg_match_all('/<div class="main-content">(.*?)<div id="DiscussProfile">/s',$content,$matches,PREG_SET_ORDER);
		$this->load->view('speech/default',$data);
		}

		function wiki($keyword){
		$trans= new web_transfer();
		$url='http://en.wikipedia.org/wiki/'.$keyword;
		$indexpage='/';
		$base='/';
		$trans->initiate_news ($url,$indexpage); 
		$trans->converturl($url,$base);
		$content ='';
		$trans->start_transfer("en.wikipedia.org");
		$trans->getcontent($content);
		//$data['content']=$content;
		preg_match_all('/<div id="mw-content-text" lang="en" dir="ltr" class="mw-content-ltr">(.*?)<div id="toc" class="toc">/s',$content,$matches,PREG_SET_ORDER);
		foreach($matches as $key)
			return "<h2>From wikipedia</h2><br>".$key[1];
		}
		
		function sohoa($keyword){
		$trans= new web_transfer();
		$url='http://tratu.soha.vn/dict/en_vn/'.$keyword;
		$indexpage='/';
		$base='/';
		$trans->initiate_news ($url,$indexpage); 
		$trans->converturl($url,$base);
		$content ='';
		$trans->start_transfer("tratu.soha.vn");
		$trans->getcontent($content);
		preg_match_all('/<div class="main-content">(.*?)<div id="DiscussProfile">/s',$content,$matches,PREG_SET_ORDER);
		return $matches;
		}

		function en_vn($word){
		$data['content']=$this->sohoa($word);
		$this->load->view('dict/sohoa',$data);
		}

		function get_socket_connection(){
		
		}

	}
?>