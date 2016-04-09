<?php

class sessions extends CI_Controller {

    function getSession() {

        //session 
        $date = date('Y-m-d-H-i-s-u');
        $md5 = md5($date);
        $this->load->library('session');
        $time_session = array('md5_time' => $md5);
        $session_checkout = $this->session->userdata('md5_time_checkout');
        $session_home = $this->session->userdata('md5_time');
        if (!$session_checkout) {
            $this->session->set_userdata($time_session);
            $is_post = 1;
        }
        if ($session_checkout) {
            $is_post = 0;
        }

        $sessions = array('is_post' => $is_post, 's_checkout' => $session_checkout, 's_home' => $session_home);
        return $sessions;
    }

}

?>