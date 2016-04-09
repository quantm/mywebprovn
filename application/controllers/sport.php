<?php
	class sport extends CI_Controller {
		function football(){
			$content=file_get_contents('http://mybongda.com/');
			$content=str_replace('http://i.imgur.com/EOc4hdO.png','http://myweb.pro.vn/images/myfootball.png',$content);
			$data['content']=$content;
			$this->load->view('sport/football',$data);
		}
	}
?>