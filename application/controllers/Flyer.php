<?php

class Flyer extends CI_Controller {

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

    function ListFlyers() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        $data['navbar'] = "flyers";

        $data['page_title'] = 'List Flyers';
        $data['name'] = $this->session->userdata('name');
        //Call the model to get users list
        $data['flyerlist'] = $this->User_Model->listflyers();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_main', $data);
        $this->load->view('templates/navbar_sub', $data);
        $this->load->view('flyer/listflyer');
        $this->load->view('templates/footer');
    }

    function ViewFlyer($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        if (!isset($id)) {
            redirect('dashboard');
        }

        $data['navbar'] = "flyers";

        $data['page_title'] = 'View Flyers';
        $data['name'] = $this->session->userdata('name');
        //Call the model to get users list
        $data['flyerdet'] = $this->User_Model->viewflyer($id);

        //City names
        $cities = $this->User_Model->viewflyer($id);
        $cityarr = substr($cities['city'], 0, -1);
        $cityarr = explode(",", $cityarr);
        $citystring = "";
        foreach ($cityarr as $cityid) {
            $citystring .= $this->User_Model->getcitybyid($cityid) . ", ";
        }

        $data['citystring'] = $citystring;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_main', $data);
        $this->load->view('templates/navbar_sub', $data);
        $this->load->view('flyer/viewflyer');
        $this->load->view('templates/footer');
    }

    function AddFlyer() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }

        $this->load->library('form_validation');

        //uploading image
        $file_data;
        $config['upload_path'] = "./uploads/images/flyers";
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);

        $this->form_validation->set_rules('title', 'title', "trim|required");
        $this->form_validation->set_rules('description', 'description', "trim|required");

        $data['navbar'] = "flyers";

        $data['page_title'] = 'Add Flyer';
        $data['name'] = $this->session->userdata('name');

        //option box data
        $data['categorylist'] =$this->User_Model->listcategories();
        $data['citylist'] =$this->User_Model->listcities();

        //Run form validation
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_main', $data);
            $this->load->view('templates/navbar_sub', $data);
            $this->load->view('flyer/addflyer');
            $this->load->view('templates/footer');
        } else{

            if($this->input->post('userfile') != NULL){
                if($this->upload->do_upload()) {
                    $file_data = $this->upload->data();

                    //City Array
                    $citydb = "";
                    $cityarr = $this->input->post('city');
                    foreach ($cityarr as $fc){
                        $citydb =  $citydb . $fc . ",";
                    }

                    $flyer_data = array(
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description'),
                        'category' => $this->input->post('category'),
                        'city' => $citydb,
                        'display' => $this->input->post('display'),
                        'website' => $this->input->post('link'),
                        'image' => $file_data["file_name"]
                    );

                    //calling model
                    if($this->User_Model->addflyers($flyer_data)){
                        //Success Message
                        $data['succ_message'] = 'Successfully Added Flyer';
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/navbar_main', $data);
                        $this->load->view('templates/navbar_sub', $data);
                        $this->load->view('flyer/addflyer');
                        $this->load->view('templates/footer');
                    } else{
                        $data['error_message'] = 'Failed to Add Flyer';
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/navbar_main', $data);
                        $this->load->view('templates/navbar_sub', $data);
                        $this->load->view('flyer/addflyer');
                        $this->load->view('templates/footer');                
                    }
                } else{

                    $data['error_message'] = $this->upload->display_errors();
                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/navbar_main', $data);
                    $this->load->view('templates/navbar_sub', $data);
                    $this->load->view('flyer/addflyer');
                    $this->load->view('templates/footer'); 
                }
            } else{
                //City Array
                    $citydb = "";
                    $cityarr = $this->input->post('city');
                    foreach ($cityarr as $fc){
                        $citydb =  $citydb . $fc . ",";
                    }

                    $flyer_data = array(
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description'),
                        'category' => $this->input->post('category'),
                        'city' => $citydb,
                        'display' => $this->input->post('display'),
                        'website' => $this->input->post('link')
                    );

                    //calling model
                    if($this->User_Model->addflyers($flyer_data)){
                        //Success Message
                        $data['succ_message'] = 'Successfully Added Flyer';
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/navbar_main', $data);
                        $this->load->view('templates/navbar_sub', $data);
                        $this->load->view('flyer/addflyer');
                        $this->load->view('templates/footer');
                    } else{
                        $data['error_message'] = 'Failed to Add Flyer';
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/navbar_main', $data);
                        $this->load->view('templates/navbar_sub', $data);
                        $this->load->view('flyer/addflyer');
                        $this->load->view('templates/footer');                
                    }
            }
        }
    }
}
