<?php

class chat_model extends CI_Model {

    function getCompanyName() {
        $query = $this->db->select('company.*,company.NAME as TENCONGTY')->from('company')
                        ->get()->result_array();
        return $query;
    }

    function getChatUserAsSales()
    {
        $query=$this->db->query("select u.IS_LOGIN as LOGIN_STAT,u.ID_U , concat(u.LASTNAME,' ',u.NAME) as CUSTOMER_NAME from qtht_users u where u.TYPE=?",'12')->result_array();
        return $query;
    }
        function getChatUserAsCustomer()
    {
        $query=$this->db->query("select u.IS_LOGIN as LOGIN_STAT, u.ID_U , concat(u.LASTNAME,' ',u.NAME) as CUSTOMER_NAME from qtht_users u where u.TYPE=?",'1')->result_array();
        return $query;
    }
    function getCustData($name) {
        $cust = $this->db->select('qtht_users.*,qtht_users.IS_LOGIN as LOGIN_STAT,qtht_users.ID_U as ID_CUSTOMER,qtht_users.LASTNAME as HO,qtht_users.NAME as TEN')
                        ->from('qtht_users')
                        ->join('company','company.ID=qtht_users.ID_COMPANY','inner')
                        ->like('ID_COMPANY', $name)
                        ->or_like('qtht_users.NAME', $name)
                        ->get()->result_array();
        //var_dump($cust);
        return $cust;
    }

	function getUserType($id)
	{
		$query=$this->db->select('*')->from('qtht_users')->where('ID_U',$id)->get()->result_array();
		return $query;
	}

	function getNameforPanelCustomer()
	{
		$name=$this->db->select('qtht_users.*,qtht_users.IS_LOGIN as LOGIN_STAT,qtht_users.ID_U as ID_CUSTOMER,qtht_users.LASTNAME as HO,qtht_users.NAME as TEN')->from('qtht_users')->where('TYPE','12')->get()->result_array();
		return $name;
	}

	function getChatData($md5)
	{
		$chat_query = $this->db->query("select u.ID_U, c.PATH_SMILEY as ICON,c.CONTENT,u.IS_LOGIN as LOGIN_STAT, concat(u.LASTNAME,' ',u.NAME) as CHAT_USER from qtht_users u inner join chat c on u.ID_U=c.ID_U where u.IS_LOGIN=? AND c.MD5=?", array(1, $md5))->result_array();
		return $chat_query;
	}
	
	function getOfflineUser($id_u_receive)
	{
		$q=$this->db->query("select u.ID_U as ID,u.IS_LOGIN as LOGIN_STAT, concat(u.LASTNAME,' ',u.NAME) as CHAT_RECEIVER from qtht_users u where u.ID_U=?",$id_u_receive)->result_array();
		return $q;
	}

    function SaveChatData ($id_sender,$id_receiver,$smiley,$text_chat_data,$md5)
    {
        $data=array('ID_SEND'=>$id_sender,'ID_RECEIVE'=>$id_receiver,'ID_U'=>$id_sender,'CONTENT'=>$text_chat_data,'MD5'=>$md5,'PATH_SMILEY'=>$smiley);
        $this->db->insert('chat',$data);
    } 
    
    function SaveSmiley ($id_sender,$id_receiver,$smiley,$md5)
    {
        $data=array('ID_SEND'=>$id_sender,'ID_RECEIVE'=>$id_receiver,'ID_U'=>$id_sender,'MD5'=>$md5,'PATH_SMILEY'=>$smiley);
        $this->db->insert('chat',$data);
    }
    
	function getSmileyR1()
	{
		$q=$this->db->select('*')->from('chat_smiley')->where('ROW','1')->get()->result_array();
		return  $q;
	}
	
	function getSmileyR2()
	{
		$q=$this->db->select('*')->from('chat_smiley')->where('ROW','2')->get()->result_array();
		return  $q;
	}
	
	function getSmileyR3()
	{
		$q=$this->db->select('*')->from('chat_smiley')->where('ROW','3')->get()->result_array();
		return  $q;
	}

}

?>
