<?php

require_once 'application/controllers/header.php';

class mail extends CI_Controller {

    function send($subject, $content, $mailto) {


        //gõ tiếng Việt - browser ANSI - unicode character
        $ansi_data = array("%20", "%C3%81", "%C3%80", "%C3%83", "%E1%BA%A2", "%C3%82", "%E1%BA%A0", "%C3%89", "%C3%88", "%E1%BA%BC", "%E1%BA%BA", "%C3%8A", "%E1%BA%B8", "%C3%8D", "%C3%8C", "%E1%BB%88", "%C4%A8", "%E1%BB%8A", "%C3%93", "%C3%92", "%E1%BB%8E", "%C3%95", "%C3%94", "%E1%BB%8C", "%C3%9A", "%C3%99", "%C5%A8", "%E1%BB%A6", "%E1%BB%A4", "%C4%82", "%E1%BA%AE", "%E1%BA%B0", "%E1%BA%B2", "%E1%BA%B4", "%E1%BA%B6", "%E1%BA%A4", "%E1%BA%A6", "%E1%BA%AA", "%E1%BA%A8", "%E1%BA%AC", "%C6%A0", "%E1%BB%9A", "%E1%BB%A2", "%E1%BB%9E", "%E1%BB%A0", "%E1%BB%9C", "%C3%9D", "%E1%BB%B2", "%E1%BB%B8", "%E1%BB%B6", "%E1%BA%BE", "%E1%BB%80", "%E1%BB%82", "%E1%BB%86", "%E1%BB%84", "%E1%BB%90", "%E1%BB%98", "%E1%BB%96", "%E1%BB%94", "%E1%BB%92", "%C6%AF", "%E1%BB%A8", "%E1%BB%AA", "%E1%BB%AE", "%E1%BB%B0", "%E1%BB%AC", "%C3%A1", "%C3%A0", "%E1%BA%A3", "%C3%A3", "%E1%BA%A1", "%C3%A2", "%C4%83", "%C3%A9", "%C3%A8", "%E1%BA%BD", "%E1%BA%BB", "%C3%AA", "%E1%BA%B9", "%C3%AD", "%C3%AC", "%E1%BB%89", "%C4%A9", "%E1%BB%8B ", "%C3%B3", "%C3%B2", "%E1%BB%8F", "%C3%B5", "%E1%BB%8D", "%C3%B4", "%C6%A1", "%C3%BA", "%C3%B9", "%C5%A9", "%E1%BB%A7", "%E1%BB%A5", "%C6%B0", "%E1%BA%AF", "%E1%BA%B1", "%E1%BA%B5", "%E1%BA%B3", "%E1%BA%B7", "%E1%BB%9B", "%E1%BB%9D", "%E1%BB%9F", "%E1%BB%A1", "%E1%BB%A3", "%E1%BB%B1", "%E1%BB%A9", "%E1%BB%AB", "%E1%BB%AF", "%E1%BB%AD", "%C4%91", "%C3%BD", "%E1%BB%B9", "%E1%BB%B7", "%E1%BB%B5", "%E1%BB%B3", "%E1%BB%B4", "%E1%BA%AD", "%E1%BA%A7", "%E1%BA%A5", "%E1%BA%AB", "%E1%BA%A9", "%E1%BB%99", "%E1%BB%87");
        $convert_data = array(" ", "Á", "À", "Ã", "Ả", "Â", "Ạ", "É", "È", "Ẽ", "Ẻ", "Ê", "Ẹ", "Í", "Ì", "Ỉ", "Ĩ", "Ị", "Ó", "Ò", "Ỏ", "Õ", "Ô", "Ọ", "Ú", "Ù", "Ũ", "Ủ", "Ụ", "Ă", "Ắ", "Ằ", "Ẳ", "Ẵ", "Ặ", "Ấ", "Ầ", "Ẫ", "Ẩ", "Ậ", "Ơ", "Ớ", "Ợ", "Ở", "Ỡ", "Ờ", "Ý", "Ỳ", "Ỹ", "Ỷ", "Ế", "Ề", "Ể", "Ệ", "Ễ", "Ố", "Ộ", "Ỗ", "Ổ", "Ồ", "Ư", "Ứ", "Ừ", "Ữ", "Ự", "Ử", "á", "à", "ả", "ã", "ạ", "â", "ă", "é", "è", "ẽ", "ẻ", "ê", "ẹ", "í", "ì", "ỉ", "ĩ", "ị", "ó", "ò", "ỏ", "õ", "ọ", "ô", "ơ", "ú", "ù", "ũ", "ủ", "ụ", "ư", "ắ", "ằ", "ẵ", "ẳ", "ặ", "ớ", "ờ", "ở", "ỡ", "ợ", "ự", "ứ", "ừ", "ữ", "ử", "đ", "ý", "ỹ", "ỷ", "ỵ", "ỳ", "Ỵ", "ậ", "ầ", "ấ", "ẫ", "ẩ", "ộ", "ệ");
        $sub = str_replace($ansi_data, $convert_data, $subject);
        $con = str_replace($ansi_data, $convert_data, $content);



        $this->load->model('log_model');
        $id_u = $this->log_model->getId();

        $mail = $this->db->select('*')->from('mail')->where('id_u', $id_u)->where('is_main', '1')->get()->result_array();
        $user = $this->db->select('*')->from('user')->where('id_u', $id_u)->get()->result_array();


        if ($mail != null) {
            foreach ($mail as $email)
                ;
            foreach ($user as $val)
                ;
            $from = $email['mail_account'];
            $name_sender = $val['name'];
            $password = $email['password'];

            $this->load->library('email');
            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'utf-8';
            $config['smtp_user'] = $from;
            $config['smtp_pass'] = $password;
            $config['mailtype'] = 'html';
            $config['wordwrap'] = TRUE;


            if (preg_match("/@yahoo.com/i", "$mailto")) {
                $config['smtp_host'] = 'smtp.mail.yahoo.com';
                $config['smtp_port'] = '587';
            }

            if (preg_match("/@gmail.com/i", "$mailto")) {
                $config['smtp_host'] = 'smtp.gmail.com';
                $config['smtp_port'] = '587';
            }

            $this->email->from($from, $name_sender);
            $this->email->to($mailto);
            //$this->email->cc('vietnamecosys@gmail.com');
            //$this->email->bcc('minhquanqnq@yahoo.com');
            $this->email->subject($sub);
            $this->email->message($con);

            $this->email->send();
            $debug = $this->email->print_debugger();
            //var_dump($debug);
            //echo "'$mailto'";
        }
        if ($mail == null) {
            echo 0;
        }
    }

    function input($mailto, $title, $id) {

        //gõ tiếng Việt - browser ANSI - unicode character
        $ansi_data = array("%20", "%C3%81", "%C3%80", "%C3%83", "%E1%BA%A2", "%C3%82", "%E1%BA%A0", "%C3%89", "%C3%88", "%E1%BA%BC", "%E1%BA%BA", "%C3%8A", "%E1%BA%B8", "%C3%8D", "%C3%8C", "%E1%BB%88", "%C4%A8", "%E1%BB%8A", "%C3%93", "%C3%92", "%E1%BB%8E", "%C3%95", "%C3%94", "%E1%BB%8C", "%C3%9A", "%C3%99", "%C5%A8", "%E1%BB%A6", "%E1%BB%A4", "%C4%82", "%E1%BA%AE", "%E1%BA%B0", "%E1%BA%B2", "%E1%BA%B4", "%E1%BA%B6", "%E1%BA%A4", "%E1%BA%A6", "%E1%BA%AA", "%E1%BA%A8", "%E1%BA%AC", "%C6%A0", "%E1%BB%9A", "%E1%BB%A2", "%E1%BB%9E", "%E1%BB%A0", "%E1%BB%9C", "%C3%9D", "%E1%BB%B2", "%E1%BB%B8", "%E1%BB%B6", "%E1%BA%BE", "%E1%BB%80", "%E1%BB%82", "%E1%BB%86", "%E1%BB%84", "%E1%BB%90", "%E1%BB%98", "%E1%BB%96", "%E1%BB%94", "%E1%BB%92", "%C6%AF", "%E1%BB%A8", "%E1%BB%AA", "%E1%BB%AE", "%E1%BB%B0", "%E1%BB%AC", "%C3%A1", "%C3%A0", "%E1%BA%A3", "%C3%A3", "%E1%BA%A1", "%C3%A2", "%C4%83", "%C3%A9", "%C3%A8", "%E1%BA%BD", "%E1%BA%BB", "%C3%AA", "%E1%BA%B9", "%C3%AD", "%C3%AC", "%E1%BB%89", "%C4%A9", "%E1%BB%8B ", "%C3%B3", "%C3%B2", "%E1%BB%8F", "%C3%B5", "%E1%BB%8D", "%C3%B4", "%C6%A1", "%C3%BA", "%C3%B9", "%C5%A9", "%E1%BB%A7", "%E1%BB%A5", "%C6%B0", "%E1%BA%AF", "%E1%BA%B1", "%E1%BA%B5", "%E1%BA%B3", "%E1%BA%B7", "%E1%BB%9B", "%E1%BB%9D", "%E1%BB%9F", "%E1%BB%A1", "%E1%BB%A3", "%E1%BB%B1", "%E1%BB%A9", "%E1%BB%AB", "%E1%BB%AF", "%E1%BB%AD", "%C4%91", "%C3%BD", "%E1%BB%B9", "%E1%BB%B7", "%E1%BB%B5", "%E1%BB%B3", "%E1%BB%B4", "%E1%BA%AD", "%E1%BA%A7", "%E1%BA%A5", "%E1%BA%AB", "%E1%BA%A9", "%E1%BB%99", "%E1%BB%87");
        $convert_data = array(" ", "Á", "À", "Ã", "Ả", "Â", "Ạ", "É", "È", "Ẽ", "Ẻ", "Ê", "Ẹ", "Í", "Ì", "Ỉ", "Ĩ", "Ị", "Ó", "Ò", "Ỏ", "Õ", "Ô", "Ọ", "Ú", "Ù", "Ũ", "Ủ", "Ụ", "Ă", "Ắ", "Ằ", "Ẳ", "Ẵ", "Ặ", "Ấ", "Ầ", "Ẫ", "Ẩ", "Ậ", "Ơ", "Ớ", "Ợ", "Ở", "Ỡ", "Ờ", "Ý", "Ỳ", "Ỹ", "Ỷ", "Ế", "Ề", "Ể", "Ệ", "Ễ", "Ố", "Ộ", "Ỗ", "Ổ", "Ồ", "Ư", "Ứ", "Ừ", "Ữ", "Ự", "Ử", "á", "à", "ả", "ã", "ạ", "â", "ă", "é", "è", "ẽ", "ẻ", "ê", "ẹ", "í", "ì", "ỉ", "ĩ", "ị", "ó", "ò", "ỏ", "õ", "ọ", "ô", "ơ", "ú", "ù", "ũ", "ủ", "ụ", "ư", "ắ", "ằ", "ẵ", "ẳ", "ặ", "ớ", "ờ", "ở", "ỡ", "ợ", "ự", "ứ", "ừ", "ữ", "ử", "đ", "ý", "ỹ", "ỷ", "ỵ", "ỳ", "Ỵ", "ậ", "ầ", "ấ", "ẫ", "ẩ", "ộ", "ệ");
        $to = str_replace($ansi_data, $convert_data, $mailto);
        $ti = str_replace($ansi_data, $convert_data, $title);

        $ti = 'FW :' . '' . $ti;
        $data['subject'] = $ti;
        $data['mailto'] = $to;
        $data['id'] = $id;
        $this->load->view('/mail/input', $data);
    }

    function view() {
        $arrayReceiver = $this->input->get_post('DEL');
        //var_dump( $arrayReceiver);

        $whereReceiver = "";
        if (count($arrayReceiver) > 0) {
            for ($i = 0; $i < count($arrayReceiver); $i++) {
                if ($i == count($arrayReceiver) - 1) {
                    $whereReceiver.="id_u=?";
                } else {
                    $whereReceiver.="id_u=? OR ";
                }
            }
        }


        $mail = $this->getMail($whereReceiver, $arrayReceiver);
        $data['mailto'] = $mail;
        $data['arrayReceiver'] = $arrayReceiver;
        $this->load->view('/mail/customer', $data);
    }

    function sendmail() {
        $arrayReceiver = $this->input->post('DEL');
        $whereReceiver = "";
        if (count($arrayReceiver) > 0) {
            for ($i = 0; $i < count($arrayReceiver); $i++) {
                if ($i == count($arrayReceiver) - 1) {
                    $whereReceiver.="id_u=?";
                } else {
                    $whereReceiver.="id_u=? OR ";
                }
            }
        }


        //gõ tiếng Việt - browser ANSI - unicode character
        $ansi_data = array("%20", "%C3%81", "%C3%80", "%C3%83", "%E1%BA%A2", "%C3%82", "%E1%BA%A0", "%C3%89", "%C3%88", "%E1%BA%BC", "%E1%BA%BA", "%C3%8A", "%E1%BA%B8", "%C3%8D", "%C3%8C", "%E1%BB%88", "%C4%A8", "%E1%BB%8A", "%C3%93", "%C3%92", "%E1%BB%8E", "%C3%95", "%C3%94", "%E1%BB%8C", "%C3%9A", "%C3%99", "%C5%A8", "%E1%BB%A6", "%E1%BB%A4", "%C4%82", "%E1%BA%AE", "%E1%BA%B0", "%E1%BA%B2", "%E1%BA%B4", "%E1%BA%B6", "%E1%BA%A4", "%E1%BA%A6", "%E1%BA%AA", "%E1%BA%A8", "%E1%BA%AC", "%C6%A0", "%E1%BB%9A", "%E1%BB%A2", "%E1%BB%9E", "%E1%BB%A0", "%E1%BB%9C", "%C3%9D", "%E1%BB%B2", "%E1%BB%B8", "%E1%BB%B6", "%E1%BA%BE", "%E1%BB%80", "%E1%BB%82", "%E1%BB%86", "%E1%BB%84", "%E1%BB%90", "%E1%BB%98", "%E1%BB%96", "%E1%BB%94", "%E1%BB%92", "%C6%AF", "%E1%BB%A8", "%E1%BB%AA", "%E1%BB%AE", "%E1%BB%B0", "%E1%BB%AC", "%C3%A1", "%C3%A0", "%E1%BA%A3", "%C3%A3", "%E1%BA%A1", "%C3%A2", "%C4%83", "%C3%A9", "%C3%A8", "%E1%BA%BD", "%E1%BA%BB", "%C3%AA", "%E1%BA%B9", "%C3%AD", "%C3%AC", "%E1%BB%89", "%C4%A9", "%E1%BB%8B ", "%C3%B3", "%C3%B2", "%E1%BB%8F", "%C3%B5", "%E1%BB%8D", "%C3%B4", "%C6%A1", "%C3%BA", "%C3%B9", "%C5%A9", "%E1%BB%A7", "%E1%BB%A5", "%C6%B0", "%E1%BA%AF", "%E1%BA%B1", "%E1%BA%B5", "%E1%BA%B3", "%E1%BA%B7", "%E1%BB%9B", "%E1%BB%9D", "%E1%BB%9F", "%E1%BB%A1", "%E1%BB%A3", "%E1%BB%B1", "%E1%BB%A9", "%E1%BB%AB", "%E1%BB%AF", "%E1%BB%AD", "%C4%91", "%C3%BD", "%E1%BB%B9", "%E1%BB%B7", "%E1%BB%B5", "%E1%BB%B3", "%E1%BB%B4", "%E1%BA%AD", "%E1%BA%A7", "%E1%BA%A5", "%E1%BA%AB", "%E1%BA%A9", "%E1%BB%99", "%E1%BB%87");
        $convert_data = array(" ", "Á", "À", "Ã", "Ả", "Â", "Ạ", "É", "È", "Ẽ", "Ẻ", "Ê", "Ẹ", "Í", "Ì", "Ỉ", "Ĩ", "Ị", "Ó", "Ò", "Ỏ", "Õ", "Ô", "Ọ", "Ú", "Ù", "Ũ", "Ủ", "Ụ", "Ă", "Ắ", "Ằ", "Ẳ", "Ẵ", "Ặ", "Ấ", "Ầ", "Ẫ", "Ẩ", "Ậ", "Ơ", "Ớ", "Ợ", "Ở", "Ỡ", "Ờ", "Ý", "Ỳ", "Ỹ", "Ỷ", "Ế", "Ề", "Ể", "Ệ", "Ễ", "Ố", "Ộ", "Ỗ", "Ổ", "Ồ", "Ư", "Ứ", "Ừ", "Ữ", "Ự", "Ử", "á", "à", "ả", "ã", "ạ", "â", "ă", "é", "è", "ẽ", "ẻ", "ê", "ẹ", "í", "ì", "ỉ", "ĩ", "ị", "ó", "ò", "ỏ", "õ", "ọ", "ô", "ơ", "ú", "ù", "ũ", "ủ", "ụ", "ư", "ắ", "ằ", "ẵ", "ẳ", "ặ", "ớ", "ờ", "ở", "ỡ", "ợ", "ự", "ứ", "ừ", "ữ", "ử", "đ", "ý", "ỹ", "ỷ", "ỵ", "ỳ", "Ỵ", "ậ", "ầ", "ấ", "ẫ", "ẩ", "ộ", "ệ");
        //$sub = str_replace($ansi_data, $convert_data, $subject);
        //$con = str_replace($ansi_data, $convert_data, $content);




        $this->load->model('log_model');
        $id_u = $this->log_model->getId();

        $check_mail = $this->db->select('*')->from('mail')->where('id_u', $id_u)->where('is_main', '1')->get()->result_array();
        $user = $this->db->select('*')->from('user')->where('id_u', $id_u)->get()->result_array();


        foreach ($check_mail as $email)
            ;
        foreach ($user as $val)
            ;
        $from = $email['mail_account'];
        $name_sender = $val['name'];
        $password = $email['password'];


        $this->load->library('email');
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        $config['smtp_user'] = $from;
        $config['smtp_pass'] = $password;
        $config['mailtype'] = 'html';
        $config['wordwrap'] = TRUE;



        $this->email->from($from, $name_sender);



        $mail = $this->getMail($whereReceiver, $arrayReceiver);
        foreach ($mail as $val) {
            $to = $val['EMAIL'] . ',';
            var_dump($to);

            // The "i" after the pattern delimiter indicates a case-insensitive search
            if (preg_match("/@yahoo.com/i", "$to")) {
                $config['smtp_host'] = 'smtp.mail.yahoo.com';
                $config['smtp_port'] = '587';
                echo 'yahoo';
            }

            if (preg_match("/@gmail.com/i", "$to")) {
                $config['smtp_host'] = 'smtp.gmail.com';
                $config['smtp_port'] = '587';
                echo 'gmail';
            }



            $mailto = $val['EMAIL'] . ',';
            //var_dump($mailto);
            $this->email->to('$mailto');
        }


        //$this->email->cc('vietnamecosys@gmail.com');
        //$this->email->bcc('minhquanqnq@yahoo.com');
        $this->email->subject("thử nghiệm");
        $this->email->message("Thử Nghiệm Chức Năng Gửi Mail");

        $this->email->send();
        $debug = $this->email->print_debugger();
        echo $debug;
        //echo "'$mailto'";
    }

    function getMail($where, $data) {
        $sql = "select * from user where $where";
        $q = $this->db->query($sql, $data)->result_array();
        return $q;
    }

    function config() {

        $this->load->model('log_model');
        $id_u = $this->log_model->getId();
        $user = $this->db->select('*')->from('user')->where('id_u', $id_u)->get()->result_array();
        foreach ($user as $val)
            ;


        //load header
        $header = new header();
        $header->admin('Cấu hình mail');
        $data['u_id'] = $id_u;
        $data['name'] = $val['EMAIL'];
        $this->load->view('/mail/config', $data);
    }

    function save($username, $pwd, $id_u) {
        $data = array('mail_account' => $username, 'password' => $pwd, 'id_u' => $id_u);
        $this->db->insert('mail', $data);
        echo 1;
    }

    function index() {
        $this->load->model('log_model');
        $id_u = $this->log_model->getId();
        $user = $this->db->select('*')->from('user')->where('id_u', $id_u)->get()->result_array();
        foreach ($user as $val)
            ;
        $title = 'Danh sách tài khoản mail của  ' . $val['name'];
        //load header
        $header = new header();
        $header->admin($title);

        $data['mail'] = $this->db->select('*')->from('mail')->where('id_u', $id_u)->get()->result_array();
        $this->load->view('/mail/index', $data);
    }

    function update_mail($id) {
        $this->db->where('id', $id);
        $this->db->update('mail', array('is_main' => '1'));
        echo 1;
    }

}

?>