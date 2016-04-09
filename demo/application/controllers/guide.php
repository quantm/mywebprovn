<?php
require_once 'application/controllers/header.php';
class guide extends CI_Controller{
		function game_unity() {
		$header = new header();
		$header->index("Hướng dẫn cài box game Unity",'','');
		$this->load->view('guide/game_unity');
		}
}
?>