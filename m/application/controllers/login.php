<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
  TRẦN MINH QUÂN */

class login extends CI_Controller {
    function logout() {            
		$this->load->model('log_model');
        $this->db->where('USERNAME',$this->session->userdata('username'));
        $this->db->update('qtht_users', array('IS_LOGIN' =>'0'));
		$this->load->library('session');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        redirect('/');
    }

}

?>
