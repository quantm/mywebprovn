<?php class mylibrary_model extends CI_Model {
	    function user_add_book_to_lib($limit, $offset, $sort_by, $sort_order) {
       
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('ID');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'ID';
            
        // results query
		$db_init=$this->load->database('admin_education',TRUE);
        $q = $db_init->select('*')->from('ebook_index')
									->like('NAME',$_REQUEST['q_lib'])
									->limit($limit, $offset)->order_by($sort_by, $sort_order);
        $ret['rows'] = $q->get()->result_array();         
       
	   //count
		$count = $db_init->select('COUNT(*) as count', FALSE)->from('ebook_index')->like('NAME',$_REQUEST['q_lib']);
		$r_count = $count->get()->result();
		$ret['num_rows'] =$r_count[0]->count;
        return $ret;
    }
}?>