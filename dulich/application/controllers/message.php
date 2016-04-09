<?php

class message extends CI_Controller {

      function __construct() {

        parent::__construct(CI_Controller::get_instance());
        $this->is_logged_in();
    }

    //kiểm tra quyền truy cập
    function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            echo '<html><title>Quyền truy cập</title><meta charset="utf-8"><font color=red>Bạn không có quyền truy cập vào trang này</font><br><font color=blue><a href=/log/login/>Trở về trang đăng nhập</a></font><div style=position:absolute; left:330px; top:135px><img width=105 height=105 src=/images/key_login.png></div><html>';
            die();
        }
    }

	function sent()
		{
			//load menu header
        $data['title'] = 'Tin nhắn nội bộ';
        $this->load->model('home_menu_model');
        $this->load->view('header', $data);

		$this->load->model('message_model');
		

		$data['sent_item']=$this->message_model->sent_items_data();
		$count_inbox = $this->message_model->count_inbox();
		$data['unread'] = $count_inbox['count_inbox'];
		$data['sent_item']=$this->message_model->sent_items_data();
		$data['auto']='';
		$this->load->view('message/sent',$data);

		}

	function index() {

//load menu header
        $data['title'] = 'Tin nhắn nội bộ';
        $this->load->model('home_menu_model');
        $data['emp_name'] = $this->home_menu_model->getUsernameLogin();
        $this->load->view('header', $data);

        //get variable from post
        $search=$this->input->post('search');
	$nguoigui=$this->input->post('nguoigui');
	$danhan = $this->input->post('danhan');
        
        //new model instance
        $this->load->model('message_model');
        
        //assign value for model
        $count_inbox = $this->message_model->count_inbox();
        
        //assign variable for view
        $data_message['search']=$search;
        $data_message['danhan']=$danhan;
		$data_message['auto']='';
		$data_message['nguoigui']=$nguoigui;
        $data_message['unread'] = $count_inbox['count_inbox'];
        $data_message['message_data'] = $this->message_model->SelectAllForInbox();
        $data_message['subject'] = $this->message_model->SelectAll_Chude();  

// form view form
        $this->load->view('/message/index', $data_message);
    }
    

	function delete()
	{
		 //new model instance
        $this->load->model('log_model');
        $user=$this->log_model->getIdUserLogin();
        foreach($user as $id);
        $nguoitao=$id['ID_U'];


		$idarray = $this->input->post('DEL');
		$counter=0;
		while ( $counter < count($idarray )) 
			{
						try 
						{
							$data=array( "hienthi"=>0);												
		                	$where = 'id_thongtin = ' . $idarray[$counter].' AND nguoinhan='.$nguoitao;		                	
		                	$this->db->update('tinnhan_nhan',$data,$where);	                	
							
						}
						catch(Exception $er){ echo $er;exit;}
				$counter++;
			}
			redirect('/message/index/');
	}



    function inbox($id) {
        //load menu header
        $data['title'] = 'Hộp thư đến';
        $this->load->model('home_menu_model');
        $data['emp_name'] = $this->home_menu_model->getUsernameLogin();
        $this->load->view('header', $data);

        // $today = date("Y-m-d H:i:s");
        //Get variable from view		
        $formData = $this->input->post();
        $id = (int) $formData['id_tinnhan'];


        //new model instance

        $this->load->model('message_model');
        $this->message_model->getStatus();

        //set variable for view
        $data['content'] = $this->message_model->viewinbox($id);
        $data['chude'] = $this->message_model->SelectAll_Chude();
        $data['drafts'] = $this->message_model->count_draft();
        $data['sent'] = $this->message_model->count_sent();
        $dataInbox = $this->message_model->count_inbox();

        if (count($dataInbox) > 0) {
            $data['inbox '] = $dataInbox['count_inbox'];
            $data['unread'] = $dataInbox['count_inbox'] - $dataInbox['count_unread'];
        }



        //view	
        $count_inbox = $this->message_model->count_inbox();
        $data['unread'] = $count_inbox['count_inbox'];
        $data['message'] = $this->message_model->SelectAllForInbox();
        $data['guitu'] = $this->message_model->getNguoiNhan($id);
        $data['receive_cc'] = $this->message_model->getNguoiNhan_cc($id);
        $data['attachment'] = $this->message_model->select_attachment();
        $data['id'] = $id;
        $this->load->view('/message/inbox', $data);
    }

    function input() {
//load menu header
        $data['title'] = 'Tin nhắn nội bộ';
        $this->load->model('home_menu_model');
        $data['emp_name'] = $this->home_menu_model->getUsernameLogin();
        $this->load->view('header', $data);

//get variable from post
        $FormData = $this->input->post();
        $idreply = (int) $FormData['idreply'];
		$id=$FormData['id'];
		$date=getdate();
//new model instance
        $this->load->model('user_model');
        $this->load->model('message_model');
//phản hồi
        if ($idreply > 0) {
            $data_reply = $this->db->select('*')->from('tinnhan_thongtin')->where('id_thongtin', $idreply)->get()->result_array();
            foreach ($data_reply as $data)
                ;
            if (count($data_reply) > 0) {
                $dateTime = new DateTime($data['ngaytao']);
                $data_nguoitao = $this->user_model->getName($data['nguoitao']);
                $data['message_content'] = "<br><br><br><u>Vào lúc " . $dateTime->format("H:i") . ", Ngày " . $dateTime->format("d/m/Y") . " " . $data_nguoitao["NGUOITAO"] . " đã viết</u>:";
                $data['message_content'].="<div style='border-left-style:double; border-left-width:2px; border-bottom-color:#0033FF'>";
                $data['message_content'].="<table width=100%>";
                $data['message_content'].="<tr><td>";
                if ($data_nguoitao != null) {
                    $data['message_content'].="&nbsp;&nbsp;Gửi từ : " . $data_nguoitao["NGUOITAO"] . "<i>(" . $data_nguoitao["TENNGUOITAO"] . ")</i>";
                } else {
                    $data['message_content'].="&nbsp;&nbsp;Gửi từ : Noname";
                }

                $data['message_content'].="<br>&nbsp;&nbsp;Tiêu đề : " . $data['tieude'];
                $data['message_content'].="<br>&nbsp;&nbsp;<u>Nội dung</u>";
                $data['message_content'].="</td></tr>";
                $data['message_content'].="<tr><td>";
                $data['message_content'].=$data['noidung'];
                $data['message_content'].="</td></tr></table>";
                $data['message_content'].="</div>";
            }
        }

//set variable for view
        $data['usernamedata'] = $this->user_model->getUser();
        $data['dep'] = $this->user_model->getDepartment();
        $data['nguoigui'] = $this->message_model->getIdNguoigui();
        $data['id'] = $this->message_model->getId_Thongtin();
		$data['idTemp']=$id;
		$data['type']=-6;
		$data['year']=$date['year'];
        $data['subject'] = $this->message_model->SelectAll_Chude();

// form view form
        $this->load->view('/message/input', $data);
    }

    function Save() {


        $today = date("Y-m-d H:i:s");

//Get value from view
        $formData = $this->input->post();
        $nguoitao = $formData['nguoigui'];
        $id = $formData['id'];
        $id_thongtin = $id + 1;
//$page = $formData["page"];
        $filter_object = $formData["filter_object"];

//Get array of sent user
        $arrayUsers = split(";", $formData["nguoinhan"]);
        $whereUser = "";
        if (count($arrayUsers) > 0) {
            for ($i = 0; $i < count($arrayUsers); $i++) {
                if ($i == count($arrayUsers) - 1) {
                    $whereUser.="USERNAME=?";
                } else {
                    $whereUser.="USERNAME=? OR ";
                }
            }
        }

//get nguoi dung cc 

        $arrayUser_ccs = split(";", $formData["nguoinhan_cc"]);

        $whereUsercc = "";
        if (count($arrayUser_ccs) > 0) {
            for ($j = 0; $j < count($arrayUser_ccs); $j++) {
                if ($j == count($arrayUser_ccs) - 1) {
                    $whereUsercc.="USERNAME=?";
                } else {
                    $whereUsercc.="USERNAME=? OR ";
                }
            }
        }


        $this->load->model('message_model');
        $this->load->model('user_model');
        if ($formData != null) {

//data for insert or update.
            $data = array(
                'id_chude' => $filter_object,
                'thongtinlienquan' => ($formData['thongtinlienquan'] > 0 ? $formData['thongtinlienquan'] : null),
                'nguoitao' => $nguoitao,
                'tieude' => $formData['tieude'],
                'noidung' => stripslashes($formData['message_content']),
                'ngaytao' => $today,
                'fw_or_re' => ($formData['fw_or_re'] > 0 ? $formData['fw_or_re'] : null),
                'hienthi' => 1,
                'draft' => 0,
            );

            $this->db->insert('tinnhan_thongtin', $data);
			$this->db->query("update gen_filedinhkem set ID_WORK='0', ID_PR='0' where ID_THONGTIN=?",$id_thongtin);

//Người nhận

            $dataUsers = $this->message_model->getId_Nguoinhan($whereUser, $arrayUsers);
//var_dump($dataUsers);

            if (count($dataUsers) > 0) {

                if ($id == '') {
                    $id = 1;
                }

                foreach ($dataUsers as $row) {

                    $datatemp = array
                        (
                        'nguoinhan' => $row['ID_U'],
                        'id_thongtin' => $id_thongtin,
                        'ngaygui' => $today,
                    );
                    $this->db->insert('tinnhan_nhan', $datatemp);
                    $this->db->insert("tinnhan_gen", array("ID_U_SEND" => $nguoitao, "ID_U_RECEIVE" => $row['ID_U'], "NOIDUNG" => $formData['tieude'], "LINK" => "/message/index/", "DATE_SEND" => date("Y-m-d H:i:s")));
                }
            }

//người nhận cc

            $dataUsers = $this->message_model->getId_Nguoinhan_cc($whereUsercc, $arrayUser_ccs);

            if (count($dataUsers) > 0) {
                foreach ($dataUsers as $row) {

                    $datatemp = array
                        (
                        'nguoinhan' => $row['ID_U'],
                        'ngaygui' => $today,
                       'id_thongtin' => $id_thongtin,
                        'is_cc' => 1
                    );
                    $this->db->insert('tinnhan_nhan', $datatemp);
                    $this->db->insert("tinnhan_gen", array("ID_U_SEND" => $nguoitao, "ID_U_RECEIVE" => $row['ID_U'], "NOIDUNG" => $formData['tieude'], "LINK" => "/message/index/", "DATE_SEND" => date("Y-m-d H:i:s")));
                }
            }
            redirect('/message/index/');
        }
        else
            redirect('/message/input/');
    }

}

?>
