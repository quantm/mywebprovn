<?php

class book_model extends CI_Model {

    function SelectAll($limit, $offset, $sort_by, $sort_order) {

        //search
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('ID');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'ID';
            
        // results query
		$vps_matbao=$this->load->database('admin_education',TRUE);
        $q = $vps_matbao->select('ebook_category.NAME as CATEGORY,ebook_index.*')->from('ebook_index')
								   ->join('ebook_category','ebook_category.id=ebook_index.ID_CATEGORY','inner')    
								   ->where('REFERER','tailieuhoctapvn')
								   ->or_where('REFERER','luanvannetvn')
			                       ->limit($limit, $offset)->order_by($sort_by, $sort_order);        
        if (isset($_REQUEST['id_category'])) {
            $q->where('ID_CATEGORY',$_REQUEST['id_category']);
        }
		$r= $q->get()->result_array();         
		
		//count
		$count = $vps_matbao->select('COUNT(*) as count', FALSE)->from('ebook_index')->where('REFERER','luanvannetvn')->or_where('REFERER','tailieuhoctapvn');
		if (isset($_REQUEST['id_category'])) {
            $count->where('ID_CATEGORY',$_REQUEST['id_category']);
        }
		$r_count = $count->get()->result();
        $ret['rows'] =$r;
		$ret['num_rows']=$r_count[0]->count;
        return $ret;
    }
}

?>