<?php

class game_model extends CI_Model {

    function SelectAll($limit, $offset, $sort_by, $sort_order) {

        //search
        $data = array('NAME' => $this->input->get_post('search'),'ID_CATEGORY'=>$this->input->get_post('id_category'),'TYPE'=>$this->input->get_post('type'));                                               
		$this->load->helper('url');
		
		/* redirect to miniclip game content
		if($this->input->get_post('id_category')=='7'){
		redirect('/play/sport', 'refresh');
		}
		*/
		$sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('PLAYED_COUNT');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'PLAYED_COUNT';
            
        // results query
        $q = $this->db->select('*')
				  ->from('game_index')
				  ->limit($limit, $offset)
				  ->order_by($sort_by, $sort_order);
                                                
        if (strlen($data['NAME'])) {
            $q->like('NAME', $data['NAME']);
        }
        
        if (strlen($data['TYPE']) && $data['TYPE'] != '0') {
            $q->like('EMBED_TYPE', $data['TYPE']);
        }
                
        if ($data['ID_CATEGORY'] != "0") {
            $q->where('ID_CATEGORY', $data['ID_CATEGORY']);
        }

        $ret['rows'] = $q->get()->result_array();         
        
        // count query
        $q = $this->db->select('COUNT(*) as count', FALSE)
		          ->from('game_index');

        if (strlen($data['NAME'])) {
            $q->like('NAME', $data['NAME']);
        }
        
        if (strlen($data['TYPE']) && $data['TYPE'] != '0') {
            $q->like('EMBED_TYPE', $data['TYPE']);
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