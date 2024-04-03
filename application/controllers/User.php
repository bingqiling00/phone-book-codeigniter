<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('form');
		$this->load->model('phone_model');
        $this->load->library('session');


	}
    public function index()
    {
        if($userdata= $this->session->userdata('user')){
            $recent_contact = $this->phone_model->get_three_contact($userdata['id']);
            $this->load->view('home' , array('userdata'=>$userdata, 'recent_record'=>$recent_contact));
        }
        else{
            redirect('login');
        }
    }

    public function logout(){
        $this->session->unset_userdata('user');
        redirect('/');// back to root( base_url() ) 
    }


}