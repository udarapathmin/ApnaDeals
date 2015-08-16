<?php

class User_model extends CI_Model {

    public function login($username, $password) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
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
        $username = $user['name'] ;
        $email = $user['email'] ;
        $sql = "SELECT * FROM users WHERE username ='$username' OR email = '$email'";
        $query = $this->db->query($sql);
        if ($query->num_rows() == 0){
            if ($this->db->insert('users', $user)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else{
            return FALSE;
        }
    }

    public function deleteuser($id){
        $data = array(
               'id' => $id
            );

        if ($this->db->delete('users', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function viewuser($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
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

    public function addcategory($cat) {

        $name = $cat['name'] ;
        $sql = "SELECT * FROM categories WHERE name ='$name'";
        $query = $this->db->query($sql);
        if ($query->num_rows() == 0){
            if ($this->db->insert('categories', $cat)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else{
            return FALSE;
        }
        
    }

    public function deletecategory($id){
        $data = array(
               'id' => $id
            );

        if ($this->db->delete('categories', $data)) {
            return TRUE;
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

    public function addcity($city) {

        $name = $city['name'] ;
        $sql = "SELECT * FROM cities WHERE name ='$name'";
        $query = $this->db->query($sql);
        //Check if Username or Password Exists
        if ($query->num_rows() == 0){
            if ($this->db->insert('cities', $city)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else{
            return FALSE;
        }
        
    }

    public function deletecity($id){
        $data = array(
               'id' => $id
            );

        if ($this->db->delete('cities', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //State Functions
    public function liststates(){
        $this->db->select('*');
        $this->db->from('states');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

     public function addstate($state) {

        $name = $state['name'] ;
        $sql = "SELECT * FROM states WHERE name ='$name'";
        $query = $this->db->query($sql);
        //Check if Username or Password Exists
        if ($query->num_rows() == 0){
            if ($this->db->insert('states', $state)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else{
            return FALSE;
        }
        
    }

    public function deletestate($id){
        $data = array(
               'id' => $id
            );

        if ($this->db->delete('states', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
    