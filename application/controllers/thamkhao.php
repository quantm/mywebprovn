<?php
require_once 'application/controllers/header.php';
require_once 'application/controllers/tailieu.php';
require_once 'application/controllers/web_transfer.php';
class thamkhao extends CI_Controller{
	function index($path){
		$tailieu= new tailieu();
		$tailieu->thamkhao($path);
	}
	//end function
}
?>