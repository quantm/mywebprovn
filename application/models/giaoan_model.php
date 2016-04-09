<?php

class giaoan_model extends CI_Model {

    function SelectAll($limit, $offset, $sort_by, $sort_order) {

        //search
        $data = array('NAME' => $this->input->get_post('search'), 
			'ID_CATEGORY'=>$this->input->get_post('id_category'),
			'ID_SUB_CATEGORY'=>$this->input->get_post('id_sub_category'),
		);                       
        
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('VIEW');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'VIEW';
         
		$free_db=$this->load->database('admin_education',TRUE);
		
        // results query
        $q = $free_db->select('*')->from('system_lesson_plan')->limit($limit, $offset)->order_by($sort_by, $sort_order);
                                                                 
        if (isset($_REQUEST['search'])) {
            $q->like('name', $data['NAME']);
        }
        
        if (isset($_REQUEST['id_category'])) {
            $q->where('id_category', $data['ID_CATEGORY']);
        }

        if (isset($_REQUEST['id_sub_category'])) {
            $q->where('id_sub_category', $data['ID_SUB_CATEGORY']);
        }
		$r=$q->get()->result_array();
		if($r){
		//count
			 $count = $free_db->select('COUNT(*) as count', FALSE)->from('system_lesson_plan');
			if (isset($_REQUEST['search'])) {
				$count->like('NAME', $data['NAME']);
			}

			if (isset($_REQUEST['id_category'])) {
				$count->where('ID_CATEGORY', $data['ID_CATEGORY']);
			}
			if (isset($_REQUEST['id_sub_category'])) {
				$count->where('id_sub_category', $data['ID_SUB_CATEGORY']);
			}
			  $q_r_count = $count->get()->result();
			  if($q_r_count){$r_count=$q_r_count[0]->count;}
			  else {$r_count='12';}
		}else {
			if (isset($_REQUEST['id_category'])) {
			redirect('http://www.xahoihoctap.net.vn/giaoan/index?id_category='.$_REQUEST['id_category']);
			}
			else {
			redirect('http://www.xahoihoctap.net.vn/giaoan/');
			}
		} 
		$ret['num_rows'] =$r_count;
        $ret['rows'] =$r; 
        
        return $ret;
    }
}

?>