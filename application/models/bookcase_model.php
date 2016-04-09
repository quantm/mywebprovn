<?php

class bookcase_model extends CI_Model {

    function SelectAll($limit, $offset, $sort_by, $sort_order) {

        //search
        $data = array('NAME' => $this->input->get_post('search'), 'ID_CATEGORY'=>$this->input->get_post('id_category'));                               
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('ID');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'ID';
            
        // results query
		$mydb=$this->load->database('thesis_notes',TRUE);
        $q = $mydb->select('ebook_category.NAME as CATEGORY,ebook_index.*')->from('ebook_index')
								   ->join('ebook_category','ebook_category.id=ebook_index.ID_CATEGORY','inner')			           
								   ->where('REFERER','luanvannetvn')
			                       ->limit($limit, $offset)->order_by($sort_by, $sort_order);
                                                                 
        if (isset($_REUQUEST['search'])) {
            $q->like('NAME', $data['NAME']);
        }
        
        if (isset($_REUQUEST['id_category'])) {
            $q->where('ID_CATEGORY', $data['ID_CATEGORY']);
        }
		$r=$q->get()->result_array();
        $ret['rows'] = $r;         
		$ret['num_rows']=count($r); 
        return $ret;
    }
}

?>