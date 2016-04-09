<?php

require_once 'application/models/log_model.php';
class message_model extends CI_Model {

    public $_id_chude = 0;
    public $_extsearch = "";
    public $_danhan = null;
    public $_id_u = "";

    function chudeCombo($data, $sel) {
        $html = "";
        $html .= "<option value='0'>-Chọn chủ đề -</option>";
        foreach ($data as $row) {
            $html .= "<option value='" . $row["id_chude"] . "' " . ($row["id_chude"] == $sel ? "selected" : "") . ">" . $row["ten_chude"] . "</option>";
        }
        return $html;
    }

    public function setDaNhan($value) {
        $this->_danhan = $value;
    }

    /**
     * return _danhan
     *
     * @return int
     */
    public function getDaNhan() {
        return $this->_danhan;
    }

    public function setValueIdChuDe($value) {
        $this->_id_chude = $value;
    }

    /**
     * get IdChuDe
     *
     * @return int
     */
    public function getValueIdChuDe() {
        return $this->_id_chude;
    }

    public function SelectAll_Chude() {
        $q = $this->db->select('*')->from('tinnhan_chude')->get()->result_array();
        return $q;
    }

    public function count_draft() {
       $log = new log_model();
        $idu = $log->getIdUserLogin();
        foreach($idu as $user);
        $idu=$user['ID_U'];
        $q = $this->db->select('count(*) as count')->from('tinnhan_thongtin')
                        ->where('nguoitao', $idu)
                        ->where('hienthi', '1')
                        ->where('draft', '1')->get()->result();
        return $q;
    }

    public function count_sent() {
       $log = new log_model();
        $idu = $log->getIdUserLogin();
        foreach($idu as $user);
        $idu=$user['ID_U'];
        $q = $this->db->select('count(*) as count')->from('tinnhan_thongtin')
                        ->where('nguoitao', $idu)
                        ->where('hienthi', '1')
                        ->where('draft', '0')->get()->result();
        return $q;
    }

    public function SelectAllForInbox() {
        
		//lấy id người dùng đăng nhập
		$log = new log_model();
        $idu = $log->getIdUserLogin();
        foreach($idu as $user);
        $idu=$user['ID_U'];
   
			
		$search=$this->input->post('search');
		$nguoigui=$this->input->post('nguoigui');
		$filter_object=$this->input->post('filter_object');
		$filterBySelect=$this->input->post('filterBySelect');	

        $q = $this->db->select("tinnhan_thongtin.*,qtht_users.*,tinnhan_nhan.*")->from('tinnhan_thongtin')
                        ->join('tinnhan_nhan', 'tinnhan_nhan.id_thongtin=tinnhan_thongtin.id_thongtin', 'inner')
                        ->join('qtht_users', 'qtht_users.ID_U=tinnhan_thongtin.nguoitao', '')
						->like('tieude',$search)
						->like('qtht_users.EMP_NAME',$nguoigui)
						->like('tinnhan_thongtin.id_chude',$filter_object)
						->like('danhan', $filterBySelect)
                        ->where('tinnhan_nhan.nguoinhan', $idu)
						->where('tinnhan_nhan.hienthi',1)
						->get()->result_array();
	

        return $q;
    }

	public function sent_items_data()
	{
		//lấy id người dùng đăng nhập
		$log = new log_model();
        $idu = $log->getIdUserLogin();
        foreach($idu as $user);
        $id_u=$user['ID_U'];
   
		$result=$this->db->query("select tt.tieude as TITLE,tt.ngaytao as NGAYGUI,tt.id_thongtin as ID	
									from `tinnhan_thongtin` tt  
									where tt.`nguoitao`=?",$id_u)->result_array();
		return $result;
								  
	}

    public function viewinbox($id) {
	$log = new log_model();
        $idu = $log->getIdUserLogin();
        foreach($idu as $user);
        $idu=$user['ID_U'];
        $q = $this->db->select('tinnhan_thongtin.*,qtht_users.*,tinnhan_nhan.*')->from('tinnhan_thongtin')
                        ->join('tinnhan_nhan', 'tinnhan_nhan.id_thongtin=tinnhan_thongtin.id_thongtin', 'inner')
                        ->join('qtht_users', 'qtht_users.ID_U=tinnhan_thongtin.nguoitao', 'inner')
                        ->where('tinnhan_nhan.nguoinhan',$idu)
                        ->where('tinnhan_thongtin.id_thongtin', $id)
                        ->get()->result_array();
        return $q;
    }

    public function select_attachment() {
        $log = new log_model();
        $idu = $log->getIdUserLogin();
        foreach($idu as $user);
        $idu=$user['ID_U'];
        $id_thongtin = $this->input->post('id_tinnhan');
        $q = $this->db->select('*')->from('gen_filedinhkem')
                        ->join('tinnhan_thongtin', 'tinnhan_thongtin.id_thongtin=gen_filedinhkem.id_thongtin', 'inner')
                        ->where('tinnhan_thongtin.id_thongtin', $id_thongtin)
                        ->get()->result_array();
        return $q;
        ;
    }

    function getStatus() {
        $log = new log_model();
        $idu = $log->getIdUserLogin();
        foreach($idu as $user);
        $idu=$user['ID_U'];
        $data = array('danhan' => $this->input->post('dannhan'),'hienthi'=>$this->input->post('view'));
        $this->db->where('id_thongtin',$this->input->post('id_tinnhan'));
        $this->db->where('nguoinhan' ,$idu);
        $this->db->update('tinnhan_nhan', $data);
    }

    public function getInboxTitle() {
        $q = $this->db->select('tieude')->from('tinnhan_thongtin')->get()->result_array();
    }

    public function count_inbox() {

         $log = new log_model();
        $idu = $log->getIdUserLogin();
        foreach($idu as $user);
        $idu=$user['ID_U'];
        $result = $this->db->select('COUNT(tinnhan_thongtin.id_thongtin) as C')->select('SUM(tinnhan_nhan.danhan) as UNREAD')->from('tinnhan_nhan')
                ->join('tinnhan_thongtin', 'tinnhan_thongtin.id_thongtin=tinnhan_nhan.id_thongtin', 'inner')
                ->where('nguoinhan', $idu)
                ->where('tinnhan_nhan.hienthi', '1');
        $tmp = $result->get()->result();
        $res['count_inbox'] = $tmp[0]->C;
        $res['count_unread'] = $tmp[0]->UNREAD;
        return $res;
    }

    function getNguoiNhan($id_thongtin) {
        $q = $this->db->select('tinnhan_nhan.*,qtht_users.*')->from('tinnhan_nhan')
                        ->join('qtht_users', 'qtht_users.ID_U=tinnhan_nhan.nguoinhan', 'inner')
                        ->where('id_thongtin', $id_thongtin)
                        ->get()->result_array();
        return $q;
    }

    function getNguoiNhan_cc($id_thongtin) {
        $q = $this->db->select('tinnhan_nhan.*,qtht_users.*')->from('tinnhan_nhan')
                        ->join('qtht_users', 'qtht_users.ID_U=tinnhan_nhan.nguoinhan', 'inner')
                        ->where('id_thongtin', $id_thongtin)
                        ->where('is_cc', '1')
                        ->get()->result_array();
        return $q;
    }

    public function getNguoiGui($id_thongtin) {
        $q = $this->db->select('tinnhan_nhan.danhan,qtht_users.USERNAME as nguoigui,qtht_users.EMP_NAME as tennguoigui')
                        ->from('tinnhan_nhan')
                        ->join('qtht_users', 'qtht_users.ID_U=tinnhan_nhan.nguoinhan', 'inner')
                        ->where('id_thongtin', $id_thongtin)
                        ->get()->result_array();
        return $q;
    }

    function arr_user_nguoinhan($user) {
        $html = '';
        $html.="var ARR_NGUOINHAN= new Array();";
        for ($i = 0; $i < count($user); $i++) {
            $html.="ARR_NGUOINHAN[" . $i . "] = new Array('" . $user[$i]['ID_DEP'] . "','" . $user[$i]['USERNAME'] . "','" . $user[$i]['EMP_NAME'] . "');";
        }
        return $html;
    }

    function getId_Thongtin() {
        $q = $this->db->select_max('id_thongtin')->from('tinnhan_thongtin')->get()->result_array();
        if ($q != "") {
            return $q;
        }
    }

    function getId_Nguoinhan($whereUser, $data) {

        $sql = "select * from qtht_users where $whereUser";
        //$sql='select * from qtht_users where  USERNAME=? OR USERNAME=? OR USERNAME=? OR USERNAME=?';
        $q = $this->db->query($sql, $data)->result_array();
        return $q;
    }

    function getId_Nguoinhan_cc($whereUser_cc, $data) {
        $sql = "select * from qtht_users where $whereUser_cc";
        $q = $this->db->query($sql, $data)->result_array();
        return $q;
    }

    function arr_user_nguoinhan_cc($user) {
        $html = '';
        $html.="var ARR_NGUOINHAN_CC= new Array();";
        for ($i = 0; $i < count($user); $i++) {
            $html.="ARR_NGUOINHAN_CC[" . $i . "] = new Array('" . $user[$i]['ID_DEP'] . "','" . $user[$i]['USERNAME'] . "','" . $user[$i]['EMP_NAME'] . "');";
        }
        return $html;
    }

    function getIdNguoigui() {
        $nguoigui = $this->session->userdata('username');
        $q = $this->db->select('*')->from('qtht_users')->where('USERNAME', $nguoigui)->get()->result_array();
        return $q;
    }

}

?>
