<?php
class log_model extends CI_Model {
function getIdUserLogin() {
$username = $this->session->userdata('username');
$result = $this->db->select('*')->from('qtht_users')->where('USERNAME', $username)->or_where('EMAIL',$username)->get()->result_array();
return $result;
}

function getUsernameLogin() {
$username = $this->session->userdata('username');
$email = $this->session->userdata('username');
//$q = $this->db->select('*')->from('qtht_users')->where('USERNAME', $username)->or_where('EMAIL',$username)->get()->result_array();
$q = $this->db->query("select u.NAME, u.ID_U,u.TYPE,u.STATUS_TEXT as STATUS, u.USERNAME,u.EMAIL, concat(u.LASTNAME,' ',u.NAME) as EMP from qtht_users u where u.USERNAME=? OR u.EMAIL=?", array($username, $email))->result_array();
return $q;
}

function getId() {
foreach($this->getIdUserLogin() as $id_nguoitao);
return $id_nguoitao['ID_U'];
}

}

?>
