<?php

class admin_model extends CI_Model {

    function SelectAll($limit, $offset, $sort_by, $sort_order) {

        $data = array('NAME' => $this->input->post('name'),
            'ADDRESS' => $this->input->post('address'),
            'PHONE' => $this->input->post('phone'),
        );
    
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('ID', 'NAME', 'PRICE', 'DATE');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'ID';

        $q = $this->db->select('*')->from('admin_menu')
                ->limit($limit, $offset)
                ->order_by($sort_by, $sort_order);

        //query data
        if (strlen($data['NAME'])) {
            $q->like('NAME', $data['NAME']);
        }
        $result['rows'] = $q->get()->result_array();

        //count row data
        $q = $this->db->select('COUNT(*) as count', FALSE)->from('admin_menu');
        if (strlen($data['NAME'])) {
            $q->like('NAME', $data['NAME']);
        }
        $tmp = $q->get()->result();
        $result['num_rows'] = $tmp[0]->count;
        return $result;
    }
	
function getmenu()
	{
			$menu=$this->db->select('*')->from('admin_menu')->get()->result_array();
			return $menu;
	}
function getmenu_com_2() {

        $result = $this->db->select('*')->from('admin_menu')
                        ->where('TYPE', 1)
                        ->where('DATE', 1)
                        ->get()->result_array();
        return $result;
    }

    function getmenu_com_3() {

        $result = $this->db->select('*')->from('admin_menu')
                        ->where('TYPE', 1)
                        ->where('DATE', 2)
                        ->get()->result_array();
        return $result;
    }

    function getmenu_com_4() {

        $result = $this->db->select('*')->from('admin_menu')
                        ->where('TYPE', 1)
                        ->where('DATE', 3)
                        ->get()->result_array();
        return $result;
    }

    function getmenu_com_5() {

        $result = $this->db->select('*')->from('admin_menu')
                        ->where('TYPE', 1)
                        ->where('DATE', 4)
                        ->get()->result_array();
        return $result;
    }

    function getmenu_com_6() {

        $result = $this->db->select('*')->from('admin_menu')
                        ->where('TYPE', 1)
                        ->where('DATE', 5)
                        ->get()->result_array();
        return $result;
    }

	function getmenu_spagetti_2() {

        $result = $this->db->select('*')->from('admin_menu')
                        ->where('TYPE', 3)
                        ->where('DATE', 1)
                        ->get()->result_array();
        return $result;
    }

    function getmenu_spagetti_3() {

        $result = $this->db->select('*')->from('admin_menu')
                        ->where('TYPE', 3)
                        ->where('DATE', 2)
                        ->get()->result_array();
        return $result;
    }

    function getmenu_spagetti_4() {

        $result = $this->db->select('*')->from('admin_menu')
                        ->where('TYPE', 3)
                        ->where('DATE', 3)
                        ->get()->result_array();
        return $result;
    }

    function getmenu_spagetti_5() {

        $result = $this->db->select('*')->from('admin_menu')
                        ->where('TYPE', 3)
                        ->where('DATE', 4)
                        ->get()->result_array();
        return $result;
    }

    function getmenu_spagetti_6() {

        $result = $this->db->select('*')->from('admin_menu')
                        ->where('TYPE', 3)
                        ->where('DATE', 5)
                        ->get()->result_array();
        return $result;
    }


    function getmenu_soi_2() {
        $result = $this->db->select('*')->from('admin_menu')
                        ->where('TYPE', 2)
                        ->where('DATE', 1)
                        ->get()->result_array();
        return $result;
    }

    function getmenu_soi_3() {
        $result = $this->db->select('*')->from('admin_menu')
                        ->where('TYPE', 2)
                        ->where('DATE', 2)
                        ->get()->result_array();
        return $result;
    }

    function getmenu_soi_4() {
        $result = $this->db->select('*')->from('admin_menu')
                        ->where('TYPE', 2)
                        ->where('DATE', 3)
                        ->get()->result_array();
        return $result;
    }

    function getmenu_soi_5() {
        $result = $this->db->select('*')->from('admin_menu')
                        ->where('TYPE', 2)
                        ->where('DATE', 4)
                        ->get()->result_array();
        return $result;
    }

    function getmenu_soi_6() {
        $result = $this->db->select('*')->from('admin_menu')
                        ->where('TYPE', 2)
                        ->where('DATE', 5)
                        ->get()->result_array();
        return $result;
    }
    function viewupdate($query_array) {
        $q = $this->db->select('*')->from('admin_menu')->where('ID', $query_array);
        return $q->get()->result_array();
    }

    function update() {
        $temp_path='/Upload/Temp/';
        if($_FILES['userfile']['name']!='')
        {
            $filepath = $temp_path . $_FILES['userfile']['name'];
        }
        if($_FILES['userfile']['name']!='')
        {
            $filepath='/images/echaylogo_web4-update.png';
        }
        $data = array('NAME' => $this->input->post('name'),
            'IMAGE' => $filepath,
            'TYPE' => $this->input->post('type'),
            'VIEW' => $this->input->post('view'),
            'DATE' => $this->input->post('date'),
            'PRICE' => $this->input->post('price'),
            'DESCRIPTION'=>$this->input->post('description'),
            );
        $this->db->update('admin_menu', $data, array('ID' => $this->input->post('id')));
    }

    function delete_menu() {
        $idarray = $this->input->post('DEL');

        $counter = 0;
        while ($counter < count($idarray)) {
            if ($idarray[$counter] > 0) {
                try {
                    $where = 'ID = ' . $idarray[$counter];
                    $this->db->delete('admin_menu', $where);
                } catch (Exception $er) {
                    $adderror = $adderror . $idarray[$counter] . ' ; ';
                };
            }
            $counter++;
        }
    }
    
    
    function set_menu_yes() {
        $idarray = $this->input->post('DEL');

        $counter = 0;
        while ($counter < count($idarray)) {
            if ($idarray[$counter] > 0) {
                try {
                    $this->db->where('ID',$idarray[$counter]);
                    $this->db->update('admin_menu',array('VIEW'=>'1'));
                } catch (Exception $er) {
                    $adderror = $adderror . $idarray[$counter] . ' ; ';
                };
            }
            $counter++;
        }
    }
    
        function set_menu_no() {
        $idarray = $this->input->post('DEL');

        $counter = 0;
        while ($counter < count($idarray)) {
            if ($idarray[$counter] > 0) {
                try {
                    $this->db->where('ID',$idarray[$counter]);
                    $this->db->update('admin_menu',array('VIEW'=>'0'));
                } catch (Exception $er) {
                    $adderror = $adderror . $idarray[$counter] . ' ; ';
                };
            }
            $counter++;
        }
    }

    function getMaxIdFood() {
        $result = $this->db->select_max('ID')->from('admin_menu')->get()->result_array();
        return $result;
    }

    function input_menu() {
        $temp_path='/Upload/Temp/';
        $filepath = $temp_path . $_FILES['userfile']['name'];
        $data = array('NAME' => $this->input->post('FOOD'), 'DATE' => $this->input->post('date'),
            'PRICE' => $this->input->post('PRICE'),'IMAGE'=>$filepath,
            'TYPE'=>$this->input->post('type'),'VIEW'=>$this->input->post('view'),
			'DESCRIPTION'=>$this->input->post('description'));
            //var_dump($data);
        $this->db->insert('admin_menu', $data);
    }

}

?>