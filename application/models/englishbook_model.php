<?php

class englishbook_model extends CI_Model {

    function SelectAll($limit, $offset, $sort_by, $sort_order) {

        //search
        $data = array('NAME' => $this->input->get_post('search'), 'ID_CATEGORY'=>$this->input->get_post('id_category'));                               
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('ID');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'ID';
            
        // results query
		$q = $this->db->select('ebook_category_en.name as CATEGORY,ebook_index_en.id as ID,ebook_index_en.name as NAME,ebook_index_en.string_referer as REFERER,ebook_index_en.description as DESCRIPTION,ebook_index_en.id_category as ID_CATEGORY,ebook_index_en.THUMBS')->from('ebook_index_en')
							   ->join('ebook_category_en','ebook_category_en.id=ebook_index_en.id_category','inner')
							   ->limit($limit, $offset)->order_by($sort_by, $sort_order);

        //13563
		//11000
		if (strlen($data['NAME'])) {
            $q->like('NAME', $data['NAME']);
        }
        
        if ($data['ID_CATEGORY'] != "0") {
            $q->where('ID_CATEGORY', $data['ID_CATEGORY']);
        }
		
        $ret['rows'] = $q->get()->result_array();         
        
        // count query
        $q = $this->db->select('COUNT(*) as count', FALSE)
                ->from('ebook_index');

        if (strlen($data['NAME'])) {
            $q->like('NAME', $data['NAME']);
        }

        if ($data['ID_CATEGORY'] != "0") {
            $q->where('ID_CATEGORY', $data['ID_CATEGORY']);
        }
        
        $tmp = $q->get()->result();

        $ret['num_rows'] = $tmp[0]->count;       
        return $ret;
    }
}

?>