<?php

class Deal extends CI_Controller {

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

    function ListDeal() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        $data['navbar'] = "deals";

        $data['page_title'] = 'List Deals';
        $data['name'] = $this->session->userdata('name');
        //Call the model to get users list
        $data['dealslist'] = $this->User_Model->listdeals();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_main', $data);
        $this->load->view('templates/navbar_sub', $data);
        $this->load->view('deal/listdeals');
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

    function EditState($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('state', 'state', "trim|required|xss_clean");

        $data['navbar'] = "states";

        $data['page_title'] = 'Edit State';
        $data['name'] = $this->session->userdata('name');

        //Send Cuurent Values
        $data['statedet'] = $this->User_Model->viewstate($id);
        $data['sid'] = $id;

        //Run form validation
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_main', $data);
            $this->load->view('templates/navbar_sub', $data);
            $this->load->view('state/editstate');
            $this->load->view('templates/footer');
        } else{
            $state_data = array(
                'name' => $this->input->post('state')
            );

            //calling model
            if($this->User_Model->updatestate($state_data,$id)){
                //Success Message
                $data['succ_message'] = 'Successfully Edited State';
                $data['statedet'] = $this->User_Model->viewstate($id);
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('state/editstate');
                $this->load->view('templates/footer');
            } else{
                $data['error_message'] = 'Failed to Edit State';
                $data['statedet'] = $this->User_Model->viewstate($id);
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('state/editstate');
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
