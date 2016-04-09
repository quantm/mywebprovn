<?php
	require_once 'application/controllers/web_transfer.php';
	class sockets extends CI_Controller {
		function tts(){
			$trans= new web_transfer();
			$get=$this->input->get();
			$url="http://text-to-speech.imtranslator.net/sockets/tts.asp?speed".$get['speed']."&url=".$get['url']."&dir=".$get['dir']."&B=1&ID=".$get['ID']."&chr=".$get['chr']."&vc=".$get['vc'];
			$indexpage='/';
			$base='/';
			$trans->initiate_news ($url,$indexpage); 
			$trans->converturl($url,$base);
			$content ='';
			$trans->start_transfer("text-to-speech.imtranslator.net");
			$trans->getcontent($content);
			$content=str_replace('speech.asp','dict/speech',$content);
			echo $content;
		}
	}
?>