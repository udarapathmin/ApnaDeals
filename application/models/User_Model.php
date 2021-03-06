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

    function viewuserarray($id){
        try{
            $query = $this->db->query("SELECT * FROM users WHERE id='$id' LIMIT 1");
            if ($query->num_rows() > 0)
            {
                $ret_array = array();
               foreach ($query->result() as $row)
               {
                  $ret_array['username'] = $row->username; 
                  $ret_array['password'] = $row->password; 
                  $ret_array['email'] = $row->email; 
                  $ret_array['name'] = $row->name; 
                  $ret_array['last_name'] = $row->last_name; 
               }

               return $ret_array;
            } else{
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    function updateuser($data,$id){
        $this->db->where('id', $id);
        if ($this->db->update('users', $data)) {
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

    function viewcategory($id){
        try{
            $query = $this->db->query("SELECT name FROM categories WHERE id='$id' LIMIT 1");
            $row = $query->row();
            return $row->name;
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    function updatecategory($data,$id){
        $this->db->where('id', $id);
        if ($this->db->update('categories', $data)) {
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

    function viewcity($id){
        try{
            $query = $this->db->query("SELECT * FROM cities WHERE id='$id' LIMIT 1");
            if ($query->num_rows() > 0)
            {
                $ret_array = array();
               foreach ($query->result() as $row)
               {
                  $ret_array['name'] = $row->name; 
                  $ret_array['pin'] = $row->pin; 
                  $ret_array['region'] = $row->region; 
               }

               return $ret_array;
            } else{
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    function updatecity($data,$id){
        $this->db->where('id', $id);
        if ($this->db->update('cities', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getcitybyid($id){
        try{
            $query = $this->db->query("SELECT name FROM cities WHERE id='$id' LIMIT 1");
            $row = $query->row();
            return $row->name;
        } catch (Exception $ex) {
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

    function viewstate($id){
        try{
            $query = $this->db->query("SELECT name FROM states WHERE id='$id' LIMIT 1");
            $row = $query->row();
            return $row->name;
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    function updatestate($data,$id){
        $this->db->where('id', $id);
        if ($this->db->update('states', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //Deal Functions
    public function listdeals(){
        $this->db->select('*');
        $this->db->from('deals');
        $this->db->order_by("updated", "desc"); 
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    //Page Functions
    function viwpage($id){
        try{
            $query = $this->db->query("SELECT * FROM static_pages WHERE id='$id' LIMIT 1");
            if ($query->num_rows() > 0)
            {
                $ret_array = array();
               foreach ($query->result() as $row)
               {
                  $ret_array['name'] = $row->name; 
                  $ret_array['content'] = $row->content; 
                  $ret_array['html_title'] = $row->html_title; 
               }

               return $ret_array;
            } else{
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    function updatepage($data,$id){
        $this->db->where('id', $id);
        if ($this->db->update('static_pages', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //Flyers
    public function addflyers($flyers) {

        $title = $flyers['title'] ;
        $sql = "SELECT * FROM flyers WHERE title ='$title'";
        $query = $this->db->query($sql);
        //Check if Username or Password Exists
        if ($query->num_rows() == 0){
            if ($this->db->insert('flyers', $flyers)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else{
            return FALSE;
        }
        
    }

    public function listflyers(){
       $query = $this->db->query("SELECT f.id,f.title,f.description,c.name,f.updated,f.image FROM flyers f, categories c WHERE c.id = f.category ORDER BY f.updated desc");

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    function viewflyer($id){
        try{
            $query = $this->db->query("SELECT f.id,f.title,f.description,c.name,f.updated,f.image,f.website,f.display,f.city FROM flyers f, categories c WHERE c.id = f.category AND f.id='$id' LIMIT 1");
            if ($query->num_rows() > 0)
            {
                $ret_array = array();
               foreach ($query->result() as $row)
               {
                  $ret_array['id'] = $row->id; 
                  $ret_array['title'] = $row->title; 
                  $ret_array['description'] = $row->description; 
                  $ret_array['name'] = $row->name; 
                  $ret_array['image'] = $row->image;
                  $ret_array['city'] = $row->city; 
                  $ret_array['updated'] = $row->updated; 
                  $ret_array['website'] = $row->website; 
                  $ret_array['display'] = $row->display;
               }

               return $ret_array;
            } else{
                return FALSE;
            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }
}
    