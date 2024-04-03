<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deletecontact extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('form');
		$this->load->model('phone_model');
        $this->load->library('session');
	}

    public function index($contact_id){
        
        if($userdata= $this->session->userdata('user')){
            
            if($contact = $this->phone_model->get_one_contact($userdata['id'],$contact_id)){
                $this->load->view('deletecontact', array('contact' => $contact ,'userdata'=>$userdata));
            }
            else{
               show_404();
            }
        }
        else{
            redirect('login');
        }
    }

    public function do_delete($contact_id){
        if($this->input->post()) {
            $user_id = $this->input->post('uid');
            $contact_id = $this->input->post('cid');

            if($this->phone_model->delete_contact($user_id,$contact_id)){
                redirect('/');// back to root( base_url() ) 
            }
            else{
                redirect('deletecontact'.$contact_id);
            }
        }
    }
}