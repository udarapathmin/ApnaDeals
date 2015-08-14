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
                $data['arr'] = $user_data;
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('user/adduser');
                $this->load->view('templates/footer');
            } else{
                $data['error_message'] = 'Failed to Add New User';

                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('user/adduser');
                $this->load->view('templates/footer');                
            }
        }
    }

}
