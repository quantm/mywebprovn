<?php

require_once 'application/models/common.php';
require_once 'application/models/log_model.php';

class home_menu_model extends CI_Model {

    function getchildmenu() {
        $result = $this->db->select('*')->from('qtht_menus')->join('qtht_actions', 'qtht_menus.actid=qtht_actions.id_act')->get()->result_array();
        return $result;
    }

    function getallmenu() {
        $q = $this->db->query('select * from menu_dropdown')->result_array();
        return $q;
    }

    function getmenuByUser() {

        $user = $this->session->userdata('username');
        $q = $this->db->select('*')->from('menu_home')
                ->join('fk_user_menu', 'fk_user_menu.ID_MENU=menu_home.ID', 'inner')
                ->join('qtht_users', 'qtht_users.ID_U=fk_user_menu.ID_U', 'inner')
                ->where('USERNAME', $user);
        return $q->get()->result_array();
    }
    function date_object()
    {
     $date_object=$this->db->select('*')->from('date_object')->get()->result_array();
     if($date_object!=null)
     {
     foreach($date_object as $date_row);
     return $date_row['VALUE'];
     }
    }
    function getDropdownMenuByUserRight() {
        $user = log_model::getIdUserLogin();
        foreach ($user as $id)
            ;
        $id_u = $id['ID_U'];
        $menu = $this->db->query('SELECT m.`ID_PARENT` as ID_PARENT, m.`ID_MENU` as ID_CHILD, m.`NAME` as NAME, fk.`ID_MENU` AS FK_ID_CHILD
FROM `menu_dropdown` m
     inner join `menu_dropdown` on m.`ID_PARENT` = `menu_dropdown`.`ID_MENU`
     inner join `fk_user_menu_dropdown` fk on fk.`ID_MENU` = m.`ID_MENU`
     inner join `qtht_users` u on u.`ID_U` = fk.`ID_U`
where u.`ID_U` =?', $id_u)->result();

        return $menu;
    }

    function getParent() {

        $user = log_model::getIdUserLogin();
        foreach ($user as $id)
            ;
        $id_u = $id['ID_U'];
        $q = $this->db->select('*')->from('menu_dropdown_parent')
                ->join('fk_user_menu_dropdown ', 'fk_user_menu_dropdown.ID_MENU = menu_dropdown_parent.ID ', 'inner')
                ->join('qtht_users ', 'qtht_users.ID_U = fk_user_menu_dropdown.ID_U ', 'inner')
                ->where('qtht_users.ID_U', $id_u);
        return $q->get()->result_array();
    }

    function getChild() {
        $q = $this->db->query('select CH.`NAME` AS CHILD, CH.`URL` AS URL 
                from `menu_dropdown_parent` PR
                inner join `menu_dropdown_child` CH on PR.`ID` = CH.`ID_PARENT');
        return $q->result_array();
    }

    function headermenu() {


        $menuData = array();
        ProjectCommon::GetTree(&$menuData, "view_menus", "ID_MNU", "ID_MNU_PARENT", 1, 1);
        for ($i = 0; $i < count($menuData); $i++) {
            $menuData[$i]['ACTID'] = $actid;
        }
        $menuData = array_values($menuData);
        $menu->menu = ProjectCommon::buildMenuUL_LI(&$menuData);
        return $menu;
    }

    function getTrichyeu_vbxinykien() {
        $nguoinhan = $this->session->userdata('username');
        $q = $this->db->select('TRICHYEU,NGAYDEN,WF_CONTENT,qtht_users.NAME')->from('vb_vbden')
			->join('qtht_users', 'qtht_users.ID_U=vb_vbden.NGUOITAO', 'inner')
			->where('TYPE', '1')
			->where('NGUOINHAN', $nguoinhan)
			->get()->result_array();
        return $q;
    }

    function getTrichyeu_vbduocgiao() {
        $nguoinhan = $this->session->userdata('username');
        $q = $this->db->select('TRICHYEU,NGAYDEN,WF_CONTENT,qtht_users.NAME')->from('vb_vbden')->join('qtht_users', 'qtht_users.ID_U=vb_vbden.NGUOITAO', '')->where('NGUOINHAN', $nguoinhan)->where('TYPE', '2')->get()->result_array();
        return $q;
    }

    function getTrichyeu_ykienlanhdao() {
        $nguoinhan = $this->session->userdata('username');
        $q = $this->db->select('TRICHYEU,NGAYDEN,WF_CONTENT,qtht_users.NAME')->from('vb_vbden')->join('qtht_users', 'qtht_users.ID_U=vb_vbden.NGUOITAO', '')->where('NGUOINHAN', $nguoinhan)->where('TYPE', '2')->get()->result_array();
        return $q;
    }

    function count_vbxinykien() {
        $nguoinhan = $this->session->userdata('username');
        $q = $this->db->select('COUNT(*) as count', FALSE)->from('vb_vbden')->where('NGUOINHAN', $nguoinhan)->where('TYPE', '1');
        $tmp = $q->get()->result();
        $ret['count_vbxinykien'] = $tmp[0]->count;
        return $ret;
    }

    function count_ykienlanhdao() {
        $nguoinhan = $this->session->userdata('username');
        $q = $this->db->select('COUNT(*) as count', FALSE)->from('vb_vbden')->where('NGUOINHAN', $nguoinhan)->where('TYPE', '2');
        $tmp = $q->get()->result();
        $ret['count_ykienlanhdao'] = $tmp[0]->count;
        return $ret;
    }

    function getUserMenuByGroup() {
        $isleader = $this->session->userdata('username');
        $this->db->select('NAME')->from('qtht_groups')
                ->join('fk_users_groups', 'fk_users_groups.ID_G=qtht_groups.ID_G', 'inner')
                ->where('fk_users_groups.ID_U', $isleader
                )
                ->get()->result_array();
    }

}

?>