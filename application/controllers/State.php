<?php

class State extends CI_Controller {

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

    function ListState() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        $data['navbar'] = "states";

        $data['page_title'] = 'List States';
        $data['name'] = $this->session->userdata('name');
        //Call the model to get users list
        $data['states'] = $this->User_Model->liststates();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_main', $data);
        $this->load->view('templates/navbar_sub', $data);
        $this->load->view('state/liststates');
        $this->load->view('templates/footer');
    }

    function AddState() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('state', 'state', "trim|required|xss_clean");

        $data['navbar'] = "states";

        $data['page_title'] = 'Add State';
        $data['name'] = $this->session->userdata('name');
        //Run form validation
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_main', $data);
            $this->load->view('templates/navbar_sub', $data);
            $this->load->view('state/addstate');
            $this->load->view('templates/footer');
        } else{
            $state_data = array(
                'name' => $this->input->post('state')
            );

            //calling model
            if($this->User_Model->addstate($state_data)){
                //Success Message
                $data['succ_message'] = 'Successfully Added New State';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('state/addstate');
                $this->load->view('templates/footer');
            } else{
                $data['error_message'] = 'Failed to Add New State, State may have already exists';

                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('state/addstate');
                $this->load->view('templates/footer');                
            }
        }
    }

    function DeleteState($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        
        if($this->User_Model->deletestate($id)){
                redirect('state/ListState', 'refresh');
        } else{
            redirect('state/ListState', 'refresh');               
        }
    }

}
