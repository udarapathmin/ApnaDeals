<?php

class Category extends CI_Controller {

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

    function ListCategory() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        $data['navbar'] = "category";

        $data['page_title'] = 'List Categories';
        $data['name'] = $this->session->userdata('name');
        //Call the model to get users list
        $data['category'] = $this->User_Model->listcategories();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_main', $data);
        $this->load->view('templates/navbar_sub', $data);
        $this->load->view('category/listcategory');
        $this->load->view('templates/footer');
    }

    function AddCategory() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('category', 'category', "trim|required|xss_clean");
        

        $data['navbar'] = "category";

        $data['page_title'] = 'Add Category';
        $data['name'] = $this->session->userdata('name');
        //Run form validation
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_main', $data);
            $this->load->view('templates/navbar_sub', $data);
            $this->load->view('category/addcategory');
            $this->load->view('templates/footer');
        } else{
            $category_data = array(
                'name' => $this->input->post('category'),
                'updated' => date('Y-m-d h:i:s a', time())
            );

            //calling model
            if($this->User_Model->addcategory($category_data)){
                //Success Message
                $data['succ_message'] = 'Successfully Added New Category';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('category/addcategory');
                $this->load->view('templates/footer');
            } else{
                $data['error_message'] = 'Failed to Add New Category, Category may have already exists';

                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('category/addcategory');
                $this->load->view('templates/footer');                
            }
        }
    }

    function DeleteCategory($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        
        if($this->User_Model->deletecategory($id)){
                redirect('category/listcategory', 'refresh');
        } else{
            redirect('category/listcategory', 'refresh');               
        }
    }

    function EditCategory($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        if (!isset($id)) {
            redirect('dashboard');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('category', 'category', "trim|required|xss_clean");
        

        $data['navbar'] = "category";

        $data['page_title'] = 'Edit Category';
        $data['name'] = $this->session->userdata('name');

        //Send Cuurent Values
        $data['categorydet'] = $this->User_Model->viewcategory($id);
        $data['catid'] = $id;

        //Run form validation
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_main', $data);
            $this->load->view('templates/navbar_sub', $data);
            $this->load->view('category/editcategory');
            $this->load->view('templates/footer');
        } else{
            $category_data = array(
                'name' => $this->input->post('category'),
                'updated' => date('Y-m-d h:i:s a', time())
            );

            //calling model
            if($this->User_Model->updatecategory($category_data, $id)){
                //Success Message
                $data['succ_message'] = 'Successfully Edit Category';
                $data['categorydet'] = $this->User_Model->viewcategory($id);
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('category/editcategory');
                $this->load->view('templates/footer');
            } else{
                $data['error_message'] = 'Failed to Edit Category';
                $data['categorydet'] = $this->User_Model->viewcategory($id);
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('category/editcategory');
                $this->load->view('templates/footer');                
            }
        }
    }

}
