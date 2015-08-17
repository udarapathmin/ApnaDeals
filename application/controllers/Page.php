<?php

class Page extends CI_Controller {

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

    function ListPage() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        $data['navbar'] = "pages";

        $data['page_title'] = 'List Pages';
        $data['name'] = $this->session->userdata('name');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_main', $data);
        $this->load->view('templates/navbar_sub', $data);
        $this->load->view('page/listpages');
        $this->load->view('templates/footer');
    }

    function EditPage($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        if (!isset($id)) {
            redirect('dashboard');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('content', 'content', "trim|required");

        $data['navbar'] = "pages";

        $data['page_title'] = 'Edit Page';
        $data['name'] = $this->session->userdata('name');

        //Send Cuurent Values
        $data['pageinfo'] = $this->User_Model->viwpage($id);
        $data['pid'] = $id;

        //Run form validation
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_main', $data);
            $this->load->view('templates/navbar_sub', $data);
            $this->load->view('page/editpage');
            $this->load->view('templates/footer');
        } else{
            $page_data = array(
                'content' => $this->input->post('content'),
                'updated' => date('Y-m-d h:i:s a', time())
            );

            //calling model
            if($this->User_Model->updatepage($page_data, $id)){
                //Success Message
                $data['succ_message'] = 'Successfully Edited Page';
                $data['pageinfo'] = $this->User_Model->viwpage($id);
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('page/editpage');
                $this->load->view('templates/footer');
            } else{
                $data['error_message'] = 'Failed to Edit Page';
                $data['pageinfo'] = $this->User_Model->viwpage($id);
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_main', $data);
                $this->load->view('templates/navbar_sub', $data);
                $this->load->view('page/editpage');
                $this->load->view('templates/footer');                
            }
        }
    }
}
