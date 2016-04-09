<?php
	class chat extends CI_Controller {	
    function index($username)
	{
		$data['user_chat']=$username;
		$this->load->view('chat/index',$data);
	}
	
	function a()
	{
		$this->load->view('chat/samplea');
	}

	function b()
	{
		$this->load->view('chat/sampleb');
	}

	function c()
	{
		$this->load->view('chat/samplec');
	}
	
    
    function send($uid_receiver,$uid_sender,$smiley,$text_chat)
	{ 
	   //new model instance;
      $this->load->model('user_model');
      $this->load->model('log_model');  
      $this->load->model('chat_model'); 
       
      //gõ tiếng Việt - browser ANSI - unicode character
      $url_chat_data = array("%20","%C3%81","%C3%80","%C3%83","%E1%BA%A2","%C3%82","%E1%BA%A0","%C3%89","%C3%88","%E1%BA%BC","%E1%BA%BA","%C3%8A","%E1%BA%B8","%C3%8D","%C3%8C","%E1%BB%88","%C4%A8","%E1%BB%8A","%C3%93","%C3%92","%E1%BB%8E","%C3%95","%C3%94","%E1%BB%8C","%C3%9A","%C3%99","%C5%A8","%E1%BB%A6","%E1%BB%A4","%C4%82","%E1%BA%AE","%E1%BA%B0","%E1%BA%B2","%E1%BA%B4","%E1%BA%B6","%E1%BA%A4","%E1%BA%A6","%E1%BA%AA","%E1%BA%A8","%E1%BA%AC","%C6%A0","%E1%BB%9A","%E1%BB%A2","%E1%BB%9E","%E1%BB%A0","%E1%BB%9C","%C3%9D","%E1%BB%B2","%E1%BB%B8","%E1%BB%B6","%E1%BA%BE","%E1%BB%80","%E1%BB%82","%E1%BB%86","%E1%BB%84","%E1%BB%90","%E1%BB%98","%E1%BB%96","%E1%BB%94","%E1%BB%92","%C6%AF","%E1%BB%A8","%E1%BB%AA","%E1%BB%AE","%E1%BB%B0","%E1%BB%AC","%C3%A1","%C3%A0","%E1%BA%A3","%C3%A3","%E1%BA%A1","%C3%A2","%C4%83","%C3%A9","%C3%A8","%E1%BA%BD","%E1%BA%BB","%C3%AA","%E1%BA%B9","%C3%AD","%C3%AC","%E1%BB%89","%C4%A9","%E1%BB%8B ","%C3%B3","%C3%B2","%E1%BB%8F","%C3%B5","%E1%BB%8D","%C3%B4","%C6%A1","%C3%BA","%C3%B9","%C5%A9","%E1%BB%A7","%E1%BB%A5","%C6%B0","%E1%BA%AF","%E1%BA%B1","%E1%BA%B5","%E1%BA%B3","%E1%BA%B7","%E1%BB%9B","%E1%BB%9D","%E1%BB%9F","%E1%BB%A1","%E1%BB%A3","%E1%BB%B1","%E1%BB%A9","%E1%BB%AB","%E1%BB%AF","%E1%BB%AD","%C4%91","%C3%BD","%E1%BB%B9","%E1%BB%B7","%E1%BB%B5","%E1%BB%B3","%E1%BB%B4","%E1%BA%AD","%E1%BA%A7","%E1%BA%A5","%E1%BA%AB","%E1%BA%A9");
      $convert_chat_data=array(" ","Á","À","Ã","Ả","Â","Ạ","É","È","Ẽ","Ẻ","Ê","Ẹ","Í","Ì","Ỉ","Ĩ","Ị","Ó","Ò","Ỏ","Õ","Ô","Ọ","Ú","Ù","Ũ","Ủ","Ụ","Ă","Ắ","Ằ","Ẳ","Ẵ","Ặ","Ấ","Ầ","Ẫ","Ẩ","Ậ","Ơ","Ớ","Ợ","Ở","Ỡ","Ờ","Ý","Ỳ","Ỹ","Ỷ","Ế","Ề","Ể","Ệ","Ễ","Ố","Ộ","Ỗ","Ổ","Ồ","Ư","Ứ","Ừ","Ữ","Ự","Ử","á","à","ả","ã","ạ","â","ă","é","è","ẽ","ẻ","ê","ẹ","í","ì","ỉ","ĩ","ị","ó","ò","ỏ","õ","ọ","ô","ơ","ú","ù","ũ","ủ","ụ","ư","ắ","ằ","ẵ","ẳ","ặ","ớ","ờ","ở","ỡ","ợ","ự","ứ","ừ","ữ","ử","đ","ý","ỹ","ỷ","ỵ","ỳ","Ỵ","ậ","ầ","ấ","ẫ","ẩ");
      $content=str_replace($url_chat_data,$convert_chat_data,$text_chat);
             
      //assign model value
      $md5=md5($uid_receiver+$uid_sender);
      $smiley_1=$this->chat_model->getSmileyR1();
      $this->chat_model->SaveChatData($uid_sender,$uid_receiver,$smiley,$content,$md5);
      $user_offline=$this->chat_model->getOfflineUser($uid_receiver);   
      $sender=$this->log_model->getUsernameLogin(); 
      $chat_view=$this->chat_model->getChatData($md5);
      foreach($sender as $value);
      
      //set variable for web view
      $data['chat_view']=$chat_view;
      $data['smiley_1']=$smiley_1;
      $data['offline']=$user_offline;
      $data['online_offline']=$this->user_model->getUser();
      $data['idu_sender']=$value['ID_U'];           
      $data['idu_receiver']=$uid_receiver;
      $this->load->view('/chat/AjaxChatBox',$data);        
	}


function smiley($uid_receiver,$uid_sender,$smiley)
	{ 
	   //new model instance;
      $this->load->model('user_model');
      $this->load->model('log_model');  
      $this->load->model('chat_model'); 
             
      //assign model value
      $md5=md5($uid_receiver+$uid_sender);
      $smiley_1=$this->chat_model->getSmileyR1();
      $this->chat_model->SaveSmiley($uid_sender,$uid_receiver,$smiley,$md5);
      $user_offline=$this->chat_model->getOfflineUser($uid_receiver);   
      $sender=$this->log_model->getUsernameLogin(); 
      $chat_view=$this->chat_model->getChatData($md5);
      foreach($sender as $value);
      
      //set variable for web view
      $data['chat_view']=$chat_view;
      $data['smiley_1']=$smiley_1;
      $data['offline']=$user_offline;
      $data['online_offline']=$this->user_model->getUser();
      $data['idu_sender']=$value['ID_U'];           
      $data['idu_receiver']=$uid_receiver;
      $this->load->view('/chat/AjaxChatBox',$data);        
	}
        
    function box($uid_sender,$uid_receiver)
	{ 
	   //new model instance;
      $this->load->model('user_model');
      $this->load->model('log_model');
      $this->load->model('chat_model'); 
             
      //assign model value
      $smiley_1=$this->chat_model->getSmileyR1();
      $md5=md5($uid_receiver+$uid_sender);
      $user_offline=$this->chat_model->getOfflineUser($uid_receiver);   
      $sender=$this->log_model->getUsernameLogin(); 
      $chat_view=$this->chat_model->getChatData($md5);
      foreach($sender as $value);
      
      //set variable for web view
      $data['chat_view']=$chat_view;
      $data['smiley_1']=$smiley_1;
      $data['offline']=$user_offline;
      $data['online_offline']=$this->user_model->getUser();
      $data['idu_sender']=$value['ID_U'];           
      $data['idu_receiver']=$uid_receiver;
      $this->load->view('/chat/AjaxChatBox',$data);        
	}
	
 }
 
?>