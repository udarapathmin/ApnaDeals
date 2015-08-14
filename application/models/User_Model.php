<?php

class User_Model extends CI_Model {

    public function login($username, $password) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    //User Functions
    public function listusers(){
        $this->db->select('*');
        $this->db->from('users');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function adduser($user) {

        if ($this->db->insert('users', $user)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //Category Functions
    public function listcategories(){
        $this->db->select('*');
        $this->db->from('categories');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    //City Functions
    public function listcities(){
        $this->db->select('*');
        $this->db->from('cities');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

}
    