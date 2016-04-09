<?php
require_once 'application/models/user_model.php';

class order_model extends CI_Model {

    function SelectAll($limit, $offset, $sort_by, $sort_order) {
        $data = array('NAME' => $this->input->post('fromdate'), "COMPANY" => $this->input->post('todate'));
        $date = getdate();
        $date_order = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'];
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('ID_U', 'NAME', 'LASTNAME', 'ADDRESS', 'COMPANY', 'DEPARTMENT', 'ID_DISTRICT');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'ID_U';

        $q = $this->db->select('*')->from('order')
                ->where('ORDER_DATE', $date_order)
                ->limit($limit, $offset)
                ->order_by($sort_by, $sort_order);
        if (strlen($this->input->post('fromdate')) || strlen($this->input->post('todate'))) {
            $q->where('DATE >=', $this->input->post('fromdate'));
            $q->where('DATE <=', $this->input->post('todate'));
        }

        $ret['rows'] = $q->get()->result_array();

        $q = $this->db->select('COUNT(*) as count', FALSE)
                        ->from('order')->where('ORDER_DATE', $date_order);

        if (strlen($this->input->post('fromdate')) || strlen($this->input->post('todate'))) {
            $q->where('DATE >=', $this->input->post('fromdate'));
            $q->where('DATE <=', $this->input->post('todate'));
        }


        $tmp = $q->get()->result();

        $ret['num_rows'] = $tmp[0]->count;
        //var_dump($ret['num_rows']);
        return $ret;
    }

    function SelectOrderOneDay($limit, $offset, $sort_by, $sort_order) {
        $date = getdate();
        $date_order = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'];

        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('ID_ORDER', 'DATE_TIME', 'LASTNAME', 'ADDRESS');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'ID_U';

   $q=$this->db->select('order.*,qtht_users.*,qtht_users.LASTNAME as CUSTOMER_LASTNAME,qtht_users.NAME as CUSTOMER_NAME,paid_method.NAME as PAID_METHOD,driver.NAME as DRIVER,district.NAME as DISTRICT,receiver.NAME as RECEIVER')->from('order')
                ->join('qtht_users','qtht_users.ID_U=order.ID_U','inner')
                ->join('receiver','receiver.ID=order.ID_RECEIVER','inner')
				->join('district','district.ID=order.ID_DISTRICT','inner')
				->join('driver','driver.ID=order.ID_DRIVER','inner')
				->join('paid_method','paid_method.ID=order.ID_PAID_METHOD','inner')
				->where('ORDER_DATE', $date_order)
                ->where('IS_ORDERED', '1')
                ->limit($limit, $offset)
                ->order_by($sort_by, $sort_order);


        $ret['rows_ordered'] = $q->get()->result_array();

        $q = $this->db->select('COUNT(*) as count', FALSE)
                ->from('order')
                ->where('ORDER_DATE', $date_order)
                ->where('IS_ORDERED', '1');

        $tmp = $q->get()->result();

        $ret['num_rows_ordered'] = $tmp[0]->count;
        //var_dump($ret['num_rows']);
        return $ret;
    }
    
	function save_order_line()
	{
		$data=array(''=>$this->input->post(''));			
		$this->db->update('order_line');

	}

    function order_line_select($id_order_line)
    {
        $query=$this->db->select('order_line.*,admin_menu.NAME as ITEM,admin_menu.ID as ID_ITEM,order_status.NAME as STATUS,order_status.ID as ID_STAT')->from('order_line')
                                     ->join('admin_menu','admin_menu.ID=order_line.ID_ITEM','inner')
                                     ->join('order_status','order_status.ID=order_line.ID_STATUS','inner')
                                     ->where('order_line.ID',$id_order_line)->get()->result_array();
        return $query;
    }
    
    function getOrderLineDetail($md5)
    {
        $q=$this->db->select('order_line.*,order_line.ID as ID_ORDER_LINE,admin_menu.NAME as ITEM,order_status.NAME as STATUS')->from('order_line')
                ->join('admin_menu','admin_menu.ID=order_line.ID_ITEM','inner')
				->join('order_status','order_status.ID=order_line.ID_STATUS','inner')
				->where('MD5',$md5)
                ->get()->result_array();
            return $q;
    }

    function details($md5, $idu) {
        $data = array('DELIVERY_ADDRESS' => $this->input->post('address'), 'DELIVERY_TIME' => $this->input->post('giogiao'),
            'NOTES' => $this->input->post('ghichu'), 'IS_ORDERED' => '1', 'ID_PAID_METHOD' => $this->input->post('paid_method'),
            'ID_RECEIVER' => $this->input->post('receiver'),'ID_DRIVER' => $this->input->post('driver'),
            'ID_DISTRICT' => $this->input->post('district'),
        );
        $this->db->where('MD5', $md5);
        $this->db->update('order', $data);

        $this->db->where('ID_U', $idu);
        $this->db->update('qtht_users', array('PHONE' => $this->input->post('phone')));
        
        //$this->db->insert('order_line',array('MD5'=>$md5));
    }

    function input($id_u) {
        /*
          $str_date_temp = time();
          echo date('d/m/Y - h:i', $str_date_temp);
         */

        $date = getdate();
        $date_order = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'];
        $time_h = $date['hours'];
        $current_h = $time_h - 1;
        $time_order = $current_h . ':' . $date['minutes'] . ':' . $date['seconds'];
        $date_time = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'] . ' ' . $current_h . ':' . $date['minutes'] . ':' . $date['seconds'];
        $md5 = md5($date_time);
        $data = array('ID_U' => $id_u, 'ORDER_TIME' => $time_order, 'ORDER_DATE' => $date_order,
            'DATE_TIME' => $date_time, 'MD5' => $md5, 'IS_ORDERED' => '0');
        $this->db->insert('order', $data);
    }

    function SelectOrder($limit, $offset, $sort_by, $sort_order) {
        $date = getdate();
        $date_order = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'];

        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('ID_ORDER', 'DATE_TIME', 'LASTNAME', 'ADDRESS');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'ID_U';

        $q = $this->db->select('qtht_users.*,order.*,order.ID_DRIVER as ID_DRV, order.NOTES as GHICHU')->from('order')
                ->join('qtht_users', 'qtht_users.ID_U=order.ID_U', 'inner')
                //->join('driver','driver.ID=order.ID_DRIVER','inner')
                ->where('ORDER_DATE', $date_order)
                ->where('IS_ORDERED', '0')
                ->limit($limit, $offset)
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $q->get()->result_array();

        $q = $this->db->select('COUNT(*) as count', FALSE)
                ->from('order')
                ->where('ORDER_DATE', $date_order)
                ->where('IS_ORDERED', '0');

        $tmp = $q->get()->result();

        $ret['num_rows'] = $tmp[0]->count;
        //var_dump($ret['num_rows']);
        return $ret;
    }

	    function view_order_update($id) {
        $query = $this->db->select('order.*,receiver.NAME as RECEIVER,district.NAME as QUAN, order.ID_DRIVER as DRIVER,order.ID_DISTRICT as DISTRICT,order.DELIVERY_TIME as GIOGIAO,qtht_users.*,qtht_users.PHONE as DIENTHOAI,order.NOTES as GHICHU')->from('order')
                        ->join('qtht_users', 'qtht_users.ID_U=order.ID_U', 'inner')
                        ->join('district', 'district.ID=order.ID_DISTRICT', 'inner')
                        ->join('paid_method', 'paid_method.ID=order.ID_PAID_METHOD', 'inner')
                        ->join('receiver','receiver.ID=order.ID_RECEIVER','inner')
                        ->where('ID_ORDER', $id)->get()->result_array();
        return $query;
    }


    function getPaidMethod() {
        $q = $this->db->select('*')->from('paid_method')->get()->result_array();
        return $q;
    }

    function getReceiver() {
        $q = $this->db->select('*')->from('receiver')->get()->result_array();
        return $q;
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
        $query = $this->db->select('*')->from('order')->join('admin_menu', 'admin_menu.ID=order.ID', 'inner')->where('ID_U', $id_u)->where('ORDER_DATE', $date_order)->get()->result_array();
        return $query;
    }

    function save_order() {
        $date = getdate();
        $date_order = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'];
        $time_order = $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];
        $quantity = $this->input->post('quantity');
        $item_price = $this->input->post('price');
        $paid_row = $quantity * $item_price;
			
		/*'ID' => $this->input->post('ID') */	

        $data = array('ID_U' => $this->input->post('id_u'), 'QUANTITY' => $quantity, 'DELIVERY_TIME' => $this->input->post('delivery_time'), 'NOTES' => $this->input->post('notes'), 'ORDER_TIME' => $time_order, 'ORDER_DATE' => $date_order, 'PRICE' => $item_price, 'PAID_ROW' => $paid_row);
        $this->db->insert('order', $data);
    }
    
    function save_order_details($id)
    {
          $this->db->update('order_line',array(''));  
    }

    function save_update($id) {
        $data = array('SEX' => $this->input->post('SEX'), 'NAME' => $this->input->post('NAME'), 'LASTNAME' => $this->input->post('LASTNAME'), 'COMPANY' => $this->input->post('COMPANY'), 'ADDRESS' => $this->input->post('ADDRESS'), 'ID_DISTRICT' => $this->input->post('DISTRICT'), 'PHONE' => $this->input->post('PHONE'), 'DELIVERY_TIME' => $this->input->post('DELIVERY_TIME'), 'ID_CUSTOMER_TYPE' => $this->input->post('CUSTOMER_TYPE'), 'NOTES' => $this->input->post('NOTES'));
        echo '<html charset="UTF-8">
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
        $this->db->where('ID_U', $id);
        $this->db->update('qtht_users', $data);
    }

    function total_paid() {

        $user_data = new user_model();
        $user = $user_data->getUserDataLogin();
        foreach ($user as $id)
            ;
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

    function getItem() {
        $district = $this->db->select('*')->from('admin_menu')->get()->result_array();
        return $district;
    }

    function getOrderStatus() {
        $district = $this->db->select('*')->from('order_status')->get()->result_array();
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
        $data = array('KYHIEU_PB' => $this->input->post('kyhieu_pb'), 'NAME' => $this->input->post('name'));
        $id_dep = $this->input->post('id') + 1;
        $fk = array('ID_CQ' => $this->input->post('dep_name'), 'ID_DEP' => $id_dep);
        $this->db->insert('qtht_customers', $data);
        $this->db->insert('fk_chinhanh_donvi', $fk);
    }

    function order($id_u) {
        $date = getdate();
        $date_order = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'];
        $time_order = $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];
        $data = array('ID_U' => $id_u, 'ORDER_TIME' => $time_order, 'ORDER_DATE' => $date_order);
        var_dump($data);
        $this->db->insert('order', $data);
    }

    function orderdetail($id) {
        
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

    function update_order($id) {
        $this->db->where($id);
        $this->db->update('order', array());
    }

    function getlastid() {
        $q = $this->db->select_max('ID_DEP')->from('qtht_customers')->get()->result_array();
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

    function cancel($param) {
        $this->db->delete('order', array('MD5' => $param));
    }

}

?>