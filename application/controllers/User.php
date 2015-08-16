<?php

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('User_Model', '', TRUE);
    }

    function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        $data['navbar'] = "dashboard";

        $data['page_title'] = 'Dashboard';
        $data['name'] = $this->session->userdata('name');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_main', $data);
        $this->load->view('templates/navbar_sub', $data);
        $this->load->view('dashboard');
        $this->load->view('templates/footer');
    }

    function ListUsers() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        $data['navbar'] = "user";

        $data['page_title'] = 'List Users';
        $data['name'] = $this->session->userdata('name');
        //Call the model to get users list
        $data['userslist'] = $this->User_Model->listusers();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_main', $data);
        $this->load->view('templates/navbar_sub', $data);
        $this->load->view('user/listusers');
        $this->load->view('templates/footer');
    }

    function AddUser() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', "trim|required|xss_clean|min_length[5]|alpha_dash");
        $this->form_validation->set_rules('email', 'email', "trim|required|xss_clean|valid_email");
        $this->form_validation->set_rules('firstname', 'first name', "trim|required|xss_clean|alpha");
        $this->form_validation->set_rules('lastname', 'last name', "trim|required|xss_clean|alpha");
        $this->form_validation->set_rules('password', 'password', "trim|required|xss_clean");
        $this->form_validation->set_rules('cpassword', 'confirm password', "required|xss_clean|matches[password]");

        $data['navbar'] = "user";

        $data['page_title'] = 'Add User';
        $data['name'] = $this->session->userdata('name');
        //Run form validation
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_main', $data);
            $this->load->view('templates/navbar_sub', $data);
            $this->load->view('user/adduser');
            $this->load->view('templates/footer');
        } else{
            $user_data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'name' => $this->input->post('firstname'),
                'last_name' => $this->input->post('lastname'),
                'password' => md5($this->input->post('password')),
                'updated' => date('Y-m-d h:i:s a', time())
            );

            //calling model
            if($this->User_Model->adduser($user_data)){
                //Success Message
                $data['succ_message'] = 'Successfully Added New User';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('user/adduser');
                $this->load->view('templates/footer');
            } else{
                $data['error_message'] = 'Failed to Add New User, Username or Email already exists';

                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('user/adduser');
                $this->load->view('templates/footer');                
            }
        }
    }

    function ViewUser($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        $data['navbar'] = "user";

        $data['page_title'] = 'View User';
        $data['name'] = $this->session->userdata('name');
        
        if($this->User_Model->viewuser($id)){
                //Call the model to get users list
                $data['user'] = $this->User_Model->viewuser($id);

                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('user/viewuser');
                $this->load->view('templates/footer');
            } else{
                $data['error_message'] = 'No user found';

                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('user/viewuser');
                $this->load->view('templates/footer');                
            }
    }

    function DeleteUser($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        $data['navbar'] = "user";

        $data['page_title'] = 'Delete User';
        $data['name'] = $this->session->userdata('name');
        
        if($this->User_Model->deleteuser($id)){
                redirect('user/ListUsers', 'refresh');
            } else{
                redirect('user/ListUsers', 'refresh');               
            }
    }

    function EditUser($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        if (!isset($id)) {
            redirect('dashboard');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', "trim|required|xss_clean|min_length[5]|alpha_dash");
        $this->form_validation->set_rules('email', 'email', "trim|required|xss_clean|valid_email");
        $this->form_validation->set_rules('firstname', 'first name', "trim|required|xss_clean|alpha");
        $this->form_validation->set_rules('lastname', 'last name', "trim|required|xss_clean|alpha");
        $this->form_validation->set_rules('password', 'password', "trim|required|xss_clean");
        $this->form_validation->set_rules('cpassword', 'confirm password', "required|xss_clean|matches[password]");

        $data['navbar'] = "user";

        $data['page_title'] = 'Edit User';
        $data['name'] = $this->session->userdata('name');

        //Send Cuurent Values
        $data['userdet'] = $this->User_Model->viewuserarray($id);
        $data['uid'] = $id;

        //Run form validation
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_main', $data);
            $this->load->view('templates/navbar_sub', $data);
            $this->load->view('user/edituser');
            $this->load->view('templates/footer');
        } else{
            $user_data = array(
                'email' => $this->input->post('email'),
                'name' => $this->input->post('firstname'),
                'last_name' => $this->input->post('lastname'),
                'password' => md5($this->input->post('password')),
                'updated' => date('Y-m-d h:i:s a', time())
            );

            //calling model
            if($this->User_Model->updateuser($user_data,$id)){
                //Success Message
                $data['succ_message'] = 'Successfully Edit User';
                $data['userdet'] = $this->User_Model->viewuserarray($id);
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('user/edituser');
                $this->load->view('templates/footer');
            } else{
                $data['error_message'] = 'Failed to Edit User';
                $data['userdet'] = $this->User_Model->viewuserarray($id);
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('user/edituser');
                $this->load->view('templates/footer');                
            }
        }
    }

}
