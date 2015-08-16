<?php

class City extends CI_Controller {

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

    function ListCity() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        $data['navbar'] = "city";

        $data['page_title'] = 'List Cities';
        $data['name'] = $this->session->userdata('name');
        //Call the model to get users list
        $data['cities'] = $this->User_Model->listcities();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_main', $data);
        $this->load->view('templates/navbar_sub', $data);
        $this->load->view('city/listcities');
        $this->load->view('templates/footer');
    }

    function AddCity() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', "trim|required|xss_clean");
        $this->form_validation->set_rules('pin', 'pin', "trim|required|xss_clean");
        $this->form_validation->set_rules('region', 'region', "trim|required|xss_clean");

        $data['navbar'] = "city";

        $data['page_title'] = 'Add City';
        $data['name'] = $this->session->userdata('name');
        //Run form validation
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_main', $data);
            $this->load->view('templates/navbar_sub', $data);
            $this->load->view('city/addcity');
            $this->load->view('templates/footer');
        } else{
            $city_data = array(
                'name' => $this->input->post('name'),
                'pin' => $this->input->post('pin'),
                'region' => $this->input->post('region')
            );

            //calling model
            if($this->User_Model->addcity($city_data)){
                //Success Message
                $data['succ_message'] = 'Successfully Added New City';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('city/addcity');
                $this->load->view('templates/footer');
            } else{
                $data['error_message'] = 'Failed to Add New City, City may have already exists';

                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('city/addcity');
                $this->load->view('templates/footer');                
            }
        }
    }

    function DeleteCity($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        $data['navbar'] = "category";

        $data['page_title'] = 'Delete Category';
        $data['name'] = $this->session->userdata('name');
        
        if($this->User_Model->deletecity($id)){
                redirect('city/ListCity', 'refresh');
        } else{
            redirect('city/ListCity', 'refresh');               
        }
    }

    function EditCity($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        if (!isset($id)) {
            redirect('dashboard');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', "trim|required|xss_clean");
        $this->form_validation->set_rules('pin', 'pin', "trim|required|xss_clean");
        $this->form_validation->set_rules('region', 'region', "trim|required|xss_clean");

        $data['navbar'] = "city";

        $data['page_title'] = 'Edit City';
        $data['name'] = $this->session->userdata('name');

        //Send Cuurent Values
        $data['citydet'] = $this->User_Model->viewcity($id);
        $data['cityid'] = $id;

        //Run form validation
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_main', $data);
            $this->load->view('templates/navbar_sub', $data);
            $this->load->view('city/editcity');
            $this->load->view('templates/footer');
        } else{
            $city_data = array(
                'name' => $this->input->post('name'),
                'pin' => $this->input->post('pin'),
                'region' => $this->input->post('region')
            );

            //calling model
            if($this->User_Model->updatecity($city_data, $id)){
                //Success Message
                $data['succ_message'] = 'Successfully Edited City';
                $data['citydet'] = $this->User_Model->viewcity($id);
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('city/editcity');
                $this->load->view('templates/footer');
            } else{
                $data['error_message'] = 'Failed to Edit City, City may have already exists';
                $data['citydet'] = $this->User_Model->viewcity($id);
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('city/editcity');
                $this->load->view('templates/footer');                
            }
        }
    }

}
