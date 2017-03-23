<?php

class User extends CI_Model {
    public $tbl_name = 'users';

    //Check unique login
    public function check_login($username){
        $this->db->where('username', $username);
        $query=$this->db->get($this->tbl_name);
        $result=$query->result_array();
        if(empty($result[0]['username']))
            return '';
        else
            return $result[0]['username'];
    }

    //Add new user
    public function add($set = NULL){
        if(!empty($set['password'])){
            $set['password'] = md5($set['password']);
        }
        $this->db->insert($this->tbl_name, $set);
        return $this->db->insert_id();
    }

    //Update user info
    public function update($set = NULL, $id = NULL){
        $this->db->where('id', $id);
        if(!empty($set['password'])){
            $set['password'] = md5($set['password']);
        }
        else{
            unset($set['password']);
        }
        $this->db->set($set);
		return $this->db->update($this->tbl_name);
	}

    //Delete user
    public function delete($id){
        $this->db->where('id', $id);
        return $this->db->delete($this->tbl_name);
    }

    //Get user by id
    public function get_user($id){
        $this->db->where('id', $id);
        $query=$this->db->get($this->tbl_name);
        $result=$query->result_array();
        return $result[0];
    }

    //Get only 1 row user, using for check auth
    public function row($where_arr = array()){
        if(isset($where_arr) && isset($where_arr['password'])) {
            $where_arr['password'] = md5($where_arr['password']);
            foreach ($where_arr as $key => $val)
                $this->db->where($key, $val);

            $this->db->limit(1);
            $query = $this->db->get($this->tbl_name);
            if($query->num_rows()){
                $result = $query->result_array();
                return $result[0];
            }
            else{
                return false;
            }
        }
    }
}