<?php
class kakaka extends CI_Controller {
	function index($path_1,$path_2){
	$url="http://funny.topdev.vn/".$path_1."/".$path_2;
	$content=file_get_contents($url);
	$content=str_replace('<h2 class="description"></h2>','<div style="position:fixed;margin-top: -25px;margin-left: 55px;"><script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script><div class="517324894" data-ants-zone-id="517324894"></div></div',$content);
	$content=str_replace('a href="http://funny.topdev.vn','a href="http://myweb.pro.vn/kakaka',$content);
	$content=str_replace('property="og:url" content="http://funny.topdev.vn','property="og:url" content="http://myweb.pro.vn/kakaka',$content);
	$content=str_replace('http://funny.topdev.vn/wp-content/uploads/2015/08/topdev338.png','http://myweb.pro.vn/images/fun.png',$content);
	$content=str_replace('http://funny.topdev.vn/wp-content/uploads/2015/08/favicon.png','http://myweb.pro.vn/images/fun.png',$content);
	$content=str_replace('UA-67374464-1','',$content);
	$data['content']=$content;
	$this->load->view('fun/funnytopdevvn',$data);
	}
}
?>