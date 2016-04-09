<?php

require_once 'application/models/user_model.php';

class customer_model extends CI_Model {

    function SelectAll($limit, $offset, $sort_by, $sort_order) {
        $data = array('NAME' => $this->input->post('NAME'), "COMPANY" => $this->input->post('COMPANY'));

        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('ID_U', 'NAME', 'LASTNAME', 'ADDRESS', 'COMPANY', 'DEPARTMENT', 'ID_DISTRICT');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'ID_U';

        $q = $this->db->select('qtht_users.*,district.NAME as DISTRICT,customer_type.NAME as CUST_TYPE')->from('qtht_users')
                ->where('TYPE', '1')
                ->join('district', 'district.ID=qtht_users.ID_DISTRICT', 'inner')
                ->join('customer_type', 'customer_type.ID=qtht_users.ID_CUSTOMER_TYPE', 'inner')
                ->limit($limit, $offset)
                ->order_by($sort_by, $sort_order);

        if (strlen($data['NAME'])) {
            $q->like('qtht_users.NAME', $data['NAME']);
        }

        if (strlen($data['COMPANY'])) {
            $q->like('COMPANY', $data['COMPANY']);
        }

        $ret['rows'] = $q->get()->result_array();

        $q = $this->db->select('COUNT(*) as count', FALSE)
                ->from('qtht_users');

        if (strlen($data['NAME'])) {
            $q->like('qtht_users.NAME', $data['NAME']);
        }

        if (strlen($data['COMPANY'])) {
            $q->like('COMPANY', $data['COMPANY']);
        }


        $tmp = $q->get()->result();

        $ret['num_rows'] = $tmp[0]->count;
        //var_dump($ret['num_rows']);
        return $ret;
    }


    function viewupdate($query_array) {
        $q = $this->db->select('qtht_users.*,district.NAME as DISTRICT')->from('qtht_users')->join('district', 'district.ID=qtht_users.ID_DISTRICT', 'inner')->where('qtht_users.ID_U', $query_array);
        return $q->get()->result_array();
    }

    function vieworder($query_array) {

        $q = $this->db->select('*')->from('admin_menu')->where('ID', $query_array);
        return $q->get()->result_array();
    }

    function order_detail($id_u) {
        $date = getdate();
        $date_order = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'];
        $query = $this->db->select('*')->from('order')->join('admin_menu', 'admin_menu.ID=order.ID_ORDER', 'inner')->where('ID_U', $id_u)->where('ORDER_DATE', $date_order)->get()->result_array();
        return $query;
    }

    function save_order() {
        $date = getdate();
        $date_order = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'];
        $time_order = $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];
        $quantity = $this->input->post('quantity');
        $item_price = $this->input->post('price');
        $paid_row = $quantity * $item_price;

        $data = array('ID_U' => $this->input->post('id_u'), 'QUANTITY' => $quantity, 'DELIVERY_TIME' => $this->input->post('delivery_time'), 'NOTES' => $this->input->post('notes'), 'ORDER_TIME' => $time_order, 'ORDER_DATE' => $date_order, 'PRICE' => $item_price, 'PAID_ROW' => $paid_row);
        $this->db->insert('order', $data);
    }

    function save_update($id) {
        $data = array('SEX' => $this->input->post('SEX'), 'NAME' => $this->input->post('NAME'), 'LASTNAME' => $this->input->post('LASTNAME'), 'COMPANY' =>$this->input->post('COMPANY'), 'ADDRESS' => $this->input->post('ADDRESS'), 'ID_DISTRICT' => $this->input->post('DISTRICT'), 'PHONE' => $this->input->post('PHONE'), 'DELIVERY_TIME' => $this->input->post('DELIVERY_TIME'), 'ID_CUSTOMER_TYPE' => $this->input->post('CUSTOMER_TYPE'), 'NOTES' => $this->input->post('NOTES'));
        echo '<html>
                <body onload="success();">
                </body>
                <script>
                                function success()
                                {
                                    alert("Đã cập nhật thành công");
                                    if(confirm)
                                    document.location.href="/customer/index/";
                                }
                </script>
            </html>';
        $this->db->where('ID_U',$id);
        $this->db->update('qtht_users', $data);
    }

    function total_paid() {

        $user_data = new user_model();
        $user = $user_data->getUserDataLogin();
        foreach ($user as $id);
        $id_log = $id['ID_U'];
        $date = getdate();
        $date_order = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'];
        $query = $this->db->select_sum('PAID_ROW')->from('order')->where('ID_U', $id_log)->where('ORDER_DATE', $date_order)->get()->result_array();
        return $query;
    }

    function getDistrict() {
        $district = $this->db->select('*')->from('district')->get()->result_array();
        return $district;
    }

    function getCustType() {
        $district = $this->db->select('*')->from('customer_type')->get()->result_array();
        return $district;
    }

    static function comboBox($data, $sel) {
        $html = "";
        foreach ($data as $row) {
            $html .= "<option value='" . $row["ID"] . "' " . ($row["ID"] == $sel ? "selected" : "") . ">" . $row["NAME"] . "</option>";
        }
        return $html;
    }

    function save() {
        $data = array('SEX' => $this->input->post('sex'),'ID_CUSTOMER_TYPE' => $this->input->post('customer_type'),'DELIVERY_TIME' => $this->input->post('delivery_time'),'PHONE' => $this->input->post('tel'),'ID_DISTRICT' => $this->input->post('district'),'ADDRESS' => $this->input->post('address'),'COMPANY' => $this->input->post('cty'),'LASTNAME' => $this->input->post('lastname'), 'NAME' => $this->input->post('name'),'NOTES' => $this->input->post('notes'),'TYPE'=>'1');

        $this->db->insert('qtht_users', $data);
    }

    function update($query_array) {
        $data = array('KYHIEU_PB' => $this->input->post('kyhieu_pb'), 'NAME' => $this->input->post('name'));
        $id_dep = $this->input->post('id');
        $fk = array('ID_CQ' => $this->input->post('dep_name'));
        $this->db->where('ID_DEP', $id_dep);
        $this->db->update('qtht_customers', $data);
        $this->db->where('ID_DEP', $id_dep);
        $this->db->update('fk_chinhanh_donvi', $fk);
    }

    function getlastid() {
        $q = $this->db->select_max('ID_U')->from('qtht_users')->get()->result_array();
        return $q;
    }

    function delete() {
        $idarray = $this->input->post('DEL');
        $counter = 0;
        while ($counter < count($idarray)) {
            if ($idarray[$counter] > 0) {
                //var_dump($idarray);
                try {
                    $q = $this->db->delete('qtht_users', array('ID_U' => $idarray[$counter]));
                    return $q;
                } catch (Exception $er) {
                    $adderror = $adderror . $idarray[$counter] . ' ; ';
                };
            }
            $counter++;
        }
    }

}

?>