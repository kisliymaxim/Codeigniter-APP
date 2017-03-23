<?php

class Message extends CI_Model {
    public $tbl_name = 'messages';

    //Add new message
    public function add($set = NULL){
        $this->db->insert($this->tbl_name, $set);
        return $this->db->insert_id();
    }
}