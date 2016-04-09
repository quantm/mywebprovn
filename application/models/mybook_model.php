<?php

class mybook_model extends CI_Model {

    function SelectAll($limit, $offset, $sort_by, $sort_order,$id_user_login) {
       
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('ID');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'ID';

        // results query
		$db_init=$this->load->database('admin_education',TRUE);
        $q = $db_init->select('user_ebook_category.NAME as CATEGORY,ebook_index.*')->from('fk_user_book')
									->join('ebook_index','fk_user_book.ID_BOOK=ebook_index.ID','inner')
									->join('user_ebook_category','fk_user_book.ID_CATEGORY=user_ebook_category.ID','inner')
									->where('fk_user_book.ID_U',$id_user_login)
									->limit($limit, $offset)->order_by($sort_by, $sort_order);

		if (isset($_REQUEST['q'])) {
            $q->like('ebook_index.NAME', $_REQUEST['q']);
        }
        if (isset($_REQUEST['id_category'])) {
            $q->where('fk_user_book.ID_CATEGORY', $_REQUEST['id_category']);
        }
	
        $ret['rows'] = $q->get()->result_array();         
       
	   //count
		$count = $db_init->select('COUNT(*) as count', FALSE)->from('fk_user_book')
									->join('ebook_index','fk_user_book.ID_BOOK=ebook_index.ID','inner')
									->join('user_ebook_category','fk_user_book.ID_CATEGORY=user_ebook_category.ID','inner')
									->where('fk_user_book.ID_U',$id_user_login);
		if (isset($_REQUEST['id_category'])) {
            $count->where('fk_user_book.ID_CATEGORY',$_REQUEST['id_category']);
        }
		if (isset($_REQUEST['q'])) {
            $count->like('ebook_index.NAME', $_REQUEST['q']);
        }
		$r_count = $count->get()->result();
		$ret['num_rows'] =$r_count[0]->count;
        return $ret;
    }
}

?>