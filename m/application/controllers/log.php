<?php

class log extends CI_Controller {

    function index() {

        //new model instance
        $this->load->model('user_model');
        $query = $this->user_model->validate();
        if ($query) {
            $data = array(
                'username' => $this->input->post('username'),
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);
            redirect('/home/');
        } else { // incorrect username or password
            if ($this->input->post('username') != '' || $this->input->post('password') != '') {
                $data['err'] = 'Tên đăng nhập và mật khẩu không đúng';
            }
            if ($this->input->post('username') == '' || $this->input->post('password') == '') {
                $data['err'] = '';
            }
            $data['title'] = 'Đăng nhập hệ thống';
            $this->load->view('/users/login', $data);
        }
    }

    function logout() {
        $this->load->library('session');
		$this->db->where('USERNAME',$this->session->userdata('username'));
		$this->db->update('qtht_users',array('IS_LOGIN'=>'0'));
        $this->session->sess_destroy();
        redirect('/');
    }


}

?>
