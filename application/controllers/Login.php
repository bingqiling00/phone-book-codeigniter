<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function index()
    {
            $this->load->helper(array('form', 'url'));
            $this->load->model('phone_model');
            $this->load->library('form_validation');
            $this->load->library('session');

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE)
            {
                    $this->load->view('login');
            }
            else
            {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                if($data = $this->phone_model->user_login($username,$password)){
                        $this->session->set_userdata('user', $data);
                        //print_r($this->session->userdata('user'));
                        redirect('user');
                }
                else{
                        $this->session->set_flashdata('login_failed',TRUE);
                        $this->load->view('login');
                }
            }
    }
}