<?php
          class dulich_model extends CI_Model 
          {
              function SelectAll()
              {
                  $dispatch=  $this->db->select('*')->from('order')->get()->result_array();
                  return $dispatch;
              }
          }
?>
