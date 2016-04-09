<?php

class soul_model extends CI_Model {

    function SelectAll($limit, $offset, $sort_by, $sort_order) {

        //search
        $data = array('NAME' => $this->input->get_post('search'), 'ID_CATEGORY'=>$this->input->get_post('id_category'));                               
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('ID');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'ID';
            
        // results query
		$db=$this->load->database('thesis_notes',TRUE);

        $q = $db->select('*')->from(' ')
			                       ->where('REFERER','rongmotamhonnet')
			                       ->where('direct_link !=','')
			                       ->limit($limit, $offset)->order_by($sort_by, $sort_order);
                                                                 
        if (isset($_REQUEST['search'])) {
            $q->like('NAME', $data['NAME']);
        }
        
        if (isset($_REQUEST['id_category'])) {
            $q->where('ID_CATEGORY', $data['ID_CATEGORY']);
        }
		$r=$q->get()->result_array();
		if($r){
		//count
			 $count = $free_db->select('COUNT(*) as count', FALSE)->from('rong-mo-tam-hon')->where('REFERER','rongmotamhonnet')->where('direct_link !=','');
			if (isset($_REQUEST['search'])) {
				$count->like('NAME', $data['NAME']);
			}

			if (isset($_REQUEST['id_category'])) {
				$count->where('ID_CATEGORY', $data['ID_CATEGORY']);
			}
			$q_r_count = $count->get()->result();
			if($q_r_count){$r_count=$q_r_count[0]->count;}
			else {$r_count='12';}
		}else {
			if (isset($_REQUEST['id_category'])) {
				redirect('http://www.xahoihoctap.net.vn/rong-mo-tam-hon?id_category='.$_REQUEST['id_category']);
			}
			else {
				redirect('http://www.xahoihoctap.net.vn/rong-mo-tam-hon/');
			}
		} 

        $ret['rows'] =$r;          
		$ret['num_rows'] =$r_count;
        return $ret;
    }
}

?>