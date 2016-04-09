<?php
require_once 'application/models/log_model.php';
class user_model extends CI_Model {

function SelectAll()
{
$query=$this->db->select('*')->from('qtht_users')->get()->result_array();
return $query;
}
function delete() {
$idarray = $this->input->post('DEL');

$counter = 0;
while ($counter < count($idarray)) {
if ($idarray[$counter] > 0) {
try {
$where = 'ID_U = ' . $idarray[$counter];
$this->db->delete('qtht_users', $where);
} catch (Exception $er) {
$adderror = $adderror . $idarray[$counter] . ' ; ';
};
}
$counter++;
}
}

function getMaxUserId() {
$max = $this->db->select_max('ID_U')->from('qtht_users')->get()->result_array();
return $max;
}


function changepassword() {
$user_log = new log_model();
$log = $user_log->getIdUserLogin();
foreach ($log as $id);
$id_user = $id['ID_U'];

$temp_path = '/Upload/user/';
$filepath = $temp_path . $_FILES['userfile']['name'];


$update_password = md5($this->input->post('newpassword'));
$update_data = array($id_user, md5($this->input->post('oldpassword')));
$status=$this->input->post('status_text');
//var_dump($oldpassword);
$this->db->query("update qtht_users set PASSWORD='$update_password',USER_IMAGE='$filepath',STATUS_TEXT='$status' where ID_U=? and PASSWORD=?", $update_data);
}



function listuser($limit, $offset, $sort_by, $sort_order) {

$data = array('sex' => $this->input->post('sex'),
'USERNAME' => $this->input->post('username'),
'NAME' => $this->input->post('name'),
'ID_CV' => $this->input->post('chucvu'),
'ID_CQ' => $this->input->post('coquan'),
'ID_DEP' => $this->input->post('dep'),
'fromdate' => $this->input->post('fromdate'),
'todate' => $this->input->post('todate'),
'SEARCH_STRING' => $this->input->post('SEARCH_STRING')
);

//var_dump($data);

$sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
$sort_columns = array('ID_U', 'CHUCVU', 'USERNAME', 'NAME', 'EMAIL', 'DEPARTMENT', 'COQUAN', 'SEX');
$sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'ID_U';

// results query

$q = $this->db->select('*')
->from('qtht_users')
->limit($limit, $offset)
->order_by($sort_by, $sort_order);


if (strlen($data['USERNAME'])) {
$q->like('USERNAME', $data['USERNAME']);
}
if (strlen($data['NAME'])) {
$q->like('qtht_users.NAME', $data['NAME']);
}

if (strlen($data['ID_CV'])) {
$q->like('qtht_users.ID_CV', $data['ID_CV']);
}
if (strlen($data['ID_CQ'])) {
$q->like('qtht_users.ID_CQ', $data['ID_CQ']);
}

if (strlen($data['SEARCH_STRING'])) {
$q->like('NAME', $data['SEARCH_STRING']);
}

if (strlen($data['fromdate'])) {
$q->like('CREATION_DATE', $data['fromdate']);
}
if (strlen($data['todate'])) {
$q->like('CREATION_DATE', $data['todate']);
}



if (strlen($data['ID_DEP'])) {
$q->like('qtht_users.ID_DEP', $data['ID_DEP']);
}

if ($data['sex']) {
$q->like('sex', $data['sex']);
}

$ret['rows'] = $q->get()->result_array();
//var_dump($ret['rows']);
// count query

$q = $this->db->select('COUNT(*) as count', FALSE)
->from('qtht_users');

if (strlen($data['USERNAME'])) {
$q->like('USERNAME', $data['USERNAME']);
}
if (strlen($data['NAME'])) {
$q->like('qtht_users.NAME', $data['NAME']);
}

if (strlen($data['ID_CV'])) {
$q->like('qtht_users.ID_CV', $data['ID_CV']);
}

if (strlen($data['ID_CQ'])) {
$q->like('qtht_users.ID_CQ', $data['ID_CQ']);
}

if (strlen($data['ID_DEP'])) {
$q->like('qtht_users.ID_DEP', $data['ID_DEP']);
}

if ($data['sex']) {
$q->like('sex', $data['sex']);
}

if (strlen($data['fromdate'])) {
$q->like('CREATION_DATE', $data['fromdate']);
}
if (strlen($data['todate'])) {
$q->like('CREATION_DATE', $data['todate']);
}

if (strlen($data['SEARCH_STRING'])) {
$q->like('NAME', $data['SEARCH_STRING']);
}

$tmp = $q->get()->result();

$ret['num_rows'] = $tmp[0]->count;
//var_dump($ret['num_rows']);
return $ret;
}

function validate() {

$this->db->where('USERNAME', $this->input->post('username'));
$this->db->where('PASSWORD', md5($this->input->post('password')));

$this->db->or_where('EMAIL', $this->input->post('username'));
$this->db->where('PASSWORD', md5($this->input->post('password')));

$query = $this->db->get('qtht_users');
if ($query->num_rows == 1) {
$this->db->where('USERNAME', $this->input->post('username'));
$this->db->update('qtht_users',array('IS_LOGIN'=>'1'));
return true;
}
}



function getUser() {
$q = $this->db->select('*')->from('qtht_users');
return $q->get()->result_array();
}

function getLoginType($type)
{
$q=$this->db->select('*')->from('qtht_users')->where('USERNAME',$type)->or_where('EMAIL',$type)->get()->result_array();
RETURN $q;
}

function getUserDataLogin() {
$username = $this->session->userdata('username');
$email = $this->session->userdata('username');
$q = $this->db->query("select u.ID_U,u.STATUS_TEXT as STATUS, u.USERNAME,u.EMAIL, u.ADDRESS,u.PHONE, dist.NAME as DISTRICT,dr.NAME as DRIVERNAME, concat(u.LASTNAME,' ',u.NAME) as EMP from qtht_users u inner join district dist on u.ID_DISTRICT=dist.ID inner join fk_driver_district fk on fk.ID_DISTRICT=u.ID_DISTRICT  inner join driver dr on dr.ID=fk.ID_DRIVER where u.USERNAME=? OR u.EMAIL=?", array($username, $email))->result_array();
return $q;
}

function getMaxIdUserOrder() {
$user_log = new log_model();
$log = $user_log->getIdUserLogin();
foreach ($log as $id);
$id_user = $id['ID_U'];
$q = $this->db->select_max('ID_ORDER')->from('order')->where('ID_U', $id_user)->get()->result_array();
return $q;
}

function getUrlUserAvartar() {
$user_log = new log_model();
$log = $user_log->getIdUserLogin();
foreach ($log as $id);
$id_avartar = $id['ID_U'];
$q = $this->db->select('*')->from('qtht_users')->where('ID_U', $id_avartar)->get()->result_array();
return $q;
}


static function driverBox($data, $sel) {
$html = "";
foreach ($data as $row) {
$html .= "<option value='" . $row["ID_DRIVER"] . "' " . ($row["ID_DRIVER"] == $sel ? "selected" : "") . ">" . $row["NAME"] . "</option>";
}
return $html;
}



function districtBox($data, $sel) {
$html = "";
$html .= "<option value='0'>- Chọn quận/huyện -</option>";
foreach ($data as $row) {
$html .= "<option value='" . $row["ID"] . "' " . ($row["ID"] == $sel ? "selected" : "") . ">" . $row["NAME"] . "</option>";
}
return $html;
}

function chucvuBox($data, $sel) {
$html = "";
foreach ($data as $row) {
$html .= "<option value='" . $row["ID_CV"] . "' " . ($row["ID_CV"] == $sel ? "selected" : "") . ">" . $row["NAME"] . "</option>";
}
return $html;
}

function userBox($data, $sel) {
$html = "";
$html .= "<option value='0'>-Chọn người-</option>";
foreach ($data as $row) {
$html .= "<option value='" . $row["ID_U"] . "' " . ($row["ID_U"] == $sel ? "selected" : "") . ">" . $row["NAME"] . "</option>";
}
return $html;
}

function coquanBox($data, $sel) {
$html = "";
foreach ($data as $row) {
$html .= "<option value='" . $row["ID_CQ"] . "' " . ($row["ID_CQ"] == $sel ? "selected" : "") . ">" . $row["NAME"] . "</option>";
}
return $html;
}

function departmentBox($data, $sel) {
$html = "";
foreach ($data as $row) {
$html .= "<option value='" . $row["ID_DEP"] . "' " . ($row["ID_DEP"] == $sel ? "selected" : "") . ">" . $row["NAME"] . "</option>";
}
return $html;
}

function getMenuDropdown() {
$result = $this->db->select('menu_dropdown_parent.NAME AS DROPDOWN,menu_dropdown_parent.ID AS ID')->from('menu_dropdown_parent');
$ret['rows'] = $result->get()->result_array();
$result = $this->db->select('COUNT(*) as count', FALSE)->from('menu_dropdown_parent');

$tmp = $result->get()->result();
$ret['num_rows'] = $tmp[0]->count;

return $ret;
}


function department_options() {
$rows = $this->db->select('name')
->from('qtht_departments')
->get()->result();

$department_options = array('' => '');
foreach ($rows as $row) {
$department_options[$row->name] = $row->name;
}

return $department_options;
}

//start function
function update($idu) {
$this->load->helper('security');
$data = array(
'PHONE' => $this->input->post('phone'),           
'PASSWORD' => do_hash($this->input->post('newpass')),           
'EMAIL' => $this->input->post('email'),
'USER_IMAGE' => $this->input->post('account_img_avatar'),
);
//$this->db->where('id', $this->input->post('id'));
$this->db->update('qtht_users', $data, array('ID_U' =>$idu));

}
//end function

function input() {
$this->load->helper('security');
$date = getdate();
$register_date = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'] . ' ' . $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];
$data = array(
'USERNAME' => $this->input->post('username'),
'SEX' => $this->input->post('sex'),
'PHONE' => $this->input->post('phone'),
'ADDRESS' => $this->input->post('address'),
'NAME' => $this->input->post('name'),
'EMAIL' => $this->input->post('email'),
'LASTNAME' => $this->input->post('lastname'),
'ID_DISTRICT' => $this->input->post('district'),
'COMPANY' => $this->input->post('cty'),
'TYPE' => $this->input->post('type'),
'REGISTER_DATE' => $register_date,
'facebook_id'=>$this->input->post('register_facebook_id'),
'PASSWORD' => do_hash($this->input->post('password')),
);
$db_init=$this->load->database('admin_education',TRUE);
$db_init->insert('qtht_users', $data);
$data = $this->db->insert('qtht_users', $data);
return $data;
}

}
