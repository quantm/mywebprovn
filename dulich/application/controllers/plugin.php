<?php

class plugin extends CI_Controller {
	function autocomplete() {
			$this->load->view('plugin/autocomplete');
	}
	
	function get_game_auto_complete(){
		$data['game']=$this->db->select('*')->from('game_index')->get()->result_array();
		$this->load->view('plugin/game',$data);
	}
	function get_user_auto_complete(){
		$data['user']=$this->db->select('*')->from('qtht_users')->get()->result_array();
		$this->load->view('plugin/user',$data);
	}

}

?>