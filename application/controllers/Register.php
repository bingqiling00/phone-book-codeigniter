<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    function __construct(){
		parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->model('phone_model');
        $this->load->library('form_validation');
	}
    public function index()
    {

            $this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');// use model callback_ function retrieve boolean username availability
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('register');
            }
            else
            {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $email = $this->input->post('email');
                
                if($this->phone_model->user_register($username,$password,$email)){
                    $this->session->set_flashdata('register_success',true);
                    redirect('register');
                }
                else{
                    $this->session->set_flashdata('register_failed',true);
                    redirect('register');
                } 
            }
    }

    public function username_check($str)
    {
        $this->load->model('phone_model');
        $available = $this->phone_model->username_check($str);
        if($available){
            return TRUE;
        }else{
            $this->form_validation->set_message('username_check', 'The {field} is already taken');
            return FALSE;
        }
    }

}