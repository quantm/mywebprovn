<?php

class social_model extends CI_Model {
function select_all_message(){
	return $this->db->select('*')->from('social_message')->get()->result_array();
}
}

?>