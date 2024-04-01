<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addcontact extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('phone_model');
	}
    public function index()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->view('addcontact');
    }
    
}