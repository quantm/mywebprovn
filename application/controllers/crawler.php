<?php
class crawler extends CI_Controller{
	function fetch(){
		echo file_get_contents('http://vndoc.com/');
	}
}
?>