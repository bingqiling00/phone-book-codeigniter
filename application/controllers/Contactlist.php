<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactlist extends CI_Controller {

    function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('phone_model');
        $this->load->library('session');
        $this->load->library("pagination");
	}
    public function index()
    {
        if($userdata= $this->session->userdata('user')){

            if($counts = $this->phone_model->get_contact_count($userdata['id'])){
                
                $config = array();
                $config["base_url"] = base_url() . "contactlist";
                $config["total_rows"] = $counts;
                $config["per_page"] = 3;
                $config["uri_segment"] = 2;
    
                $this->pagination->initialize($config);
    
                //if set -> take set value
                //else -> 0
                $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                                
                $data["links"] = $this->pagination->create_links();
                $data['contacts'] = $this->phone_model->get_contact_pagination($userdata['id'],$config["per_page"], $page);
    
                $this->load->view('contactlist', $data);
            }

        }
        else{
            redirect('login');
        }
    }
    
}