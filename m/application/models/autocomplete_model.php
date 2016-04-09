<?php

class autocomplete_model extends CI_Model {

function getSearchData(){
    $q = $this->db->select('*')->from('product');
    return $q->get()->result_array();
}

function getAllUser() {
    $q = $this->db->select('*')->from('qtht_users')->get()->result_array();
    return $q;
}

function getGameData() {
        $query = "(SELECT * FROM (SELECT game_index.NAME as NAME_GAME, game_index.THUMBS, game_index.ID, game_index.ID_CATEGORY FROM game_index) 
                  game_join INNER JOIN game_category  ON game_join.ID_CATEGORY = game_category.ID ORDER BY game_category.`NAME` ASC)";
    $q = $this->db->query($query)->result_array($query);
    return $q;
}

}

?>