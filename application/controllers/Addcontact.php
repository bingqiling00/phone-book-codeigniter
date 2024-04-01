<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addcontact extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('phone_model');
        $this->load->library('session');
	}
    
    public function index()
    {
        $this->load->library('session');

        if($userdata= $this->session->userdata('user')){
            $this->load->helper(array('form', 'url'));
            $this->load->model('phone_model');
            $this->load->library('form_validation');
    
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('number', 'Number', 'required');
            
            if ($this->form_validation->run() == FALSE )
            {
                $this->load->view('addcontact', array('userdata'=>$userdata));
            }
            else
            {
                $name = $this->input->post('name');
                $number = $this->input->post('number');
                $uid = $this->input->post('uid');
                $image_path = 'uploads/success_icon.png'; // Default empty image path
    

                if(!empty($_FILES['image']['name'])){
                    $config['upload_path']          = './uploads/';
                    $config['allowed_types']        = 'jpeg|jpg|png';
                    $config['max_size']             = 4096;
                    $config['encrypt_name']         = TRUE;

                    $this->load->library('upload', $config);
                    
                    if ($this->upload->do_upload('image')) {
                        $upload_data = $this->upload->data();
                        $image_path = 'uploads/' . $upload_data['file_name'];
                    } 
                    else {
                        // Handle file upload error
                        $error = $this->upload->display_errors();                        
                        $this->session->set_flashdata('image_file_error',$error);
                        redirect('addcontact');
                        return; // Exit the function early
                    }
                }

                
                if($this->phone_model->add_new_contact($uid,$name,$number)){
                    $this->session->set_flashdata('display_success', true);
                    redirect('addcontact');
                }
                else{
                    $this->session->set_flashdata('database_model_failure', true);
                    redirect('addcontact');
                } 
            }        
        }
        else{
            redirect('login');
        }

    }
    
}