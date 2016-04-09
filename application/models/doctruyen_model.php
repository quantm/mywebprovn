<?php

class doctruyen_model extends CI_Model {

    function SelectAll($limit, $offset, $sort_by, $sort_order) {
	
        //search
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('ID');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'ID';
		$db=$this->load->database('default',TRUE);
	
		$q=$db->select('*')
				   ->from('system_story')
				   ->limit($limit, $offset)->order_by($sort_by, $sort_order);
		if(isset($_REQUEST['id_category'])){$q->where('id_category',$_REQUEST['id_category']);}
		if(isset($_REQUEST['q'])){$q->like('name',$_REQUEST['q']);}
		$r=$q->get()->result_array();
        $ret['rows']=$r;

		$q_count=$db->select('*')
				   ->from('system_story');
		if(isset($_REQUEST['id_category'])){$q_count->where('id_category',$_REQUEST['id_category']);}
		if(isset($_REQUEST['q'])){$q_count->like('name',$_REQUEST['q']);}
		$r_count=$q_count->get()->result_array();
		$ret['num_rows'] = count($r_count);       
        return $ret;
    }
}

?>