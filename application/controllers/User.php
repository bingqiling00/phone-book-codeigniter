<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('phone_model');
	}
    public function index(){
        $this->load->library('session');

        if($userdata= $this->session->userdata('user')){
            $this->load->view('home' , array('userdata'=>$userdata));
        }
        else{
            redirect('login');
        }
    }
    public function logout(){
        $this->load->library('session');
        $this->session->unset_userdata('user');
        redirect('/');// back to root( base_url() ) 
    }
}