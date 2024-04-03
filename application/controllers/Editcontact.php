<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editcontact extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('phone_model');
        $this->load->library('session');
        $this->load->library('form_validation');

	}
    
    public function index($contact_id)
    {
        if($userdata= $this->session->userdata('user')){
            
            if($contact = $this->phone_model->get_one_contact($userdata['id'],$contact_id)){
                $this->load->view('editcontact', array('contact' => $contact ,'userdata'=>$userdata));
            }
            else{
                //$this->load->view('editcontact'); // display error 404
            }
        }
        else{
            redirect('login');
        }
    }

    public function save_changes($contact_id){

        if ($this->input->post()) { // change in login also
            
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('number', 'Number', 'required');

            $this->form_validation->set_rules('no_changes', 'No changes', 'callback_check_no_changes');

            
            if ($this->form_validation->run() == FALSE) {

                $this->index($contact_id);

            } 
            else {
                
                $user_id = $this->input->post('uid');
                
                $contact_name = $this->input->post('name');
                $contact_number = $this->input->post('number');
                $image_path = $this->input->post('original_img_path'); // Take original as default

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
                        redirect('editcontact/'.$contact_id);
                    }
                }

                if($this->phone_model->edit_contact_by_id($user_id, $contact_id, $contact_name, $contact_number, $image_path)){
                    $this->session->set_flashdata('display_success', true);
                    redirect('editcontact/'.$contact_id);
                }
                else{
                    //problem occured during updates from model
                    $this->session->set_flashdata('database_model_failure', true);
                    redirect('editcontact/'.$contact_id);
                } 

            }
        } else {
            // If the form is not submitted, redirect the user to the homepage or any other relevant page
            redirect('user');
        }
    }

    public function check_no_changes(){
        // Check if the record has no changes (before update query)
        
        $user_id = $this->input->post('uid');
        $contact_id = $this->input->post('cid');
        $contact_name = $this->input->post('name');
        $contact_number = $this->input->post('number');
        $image_path = $this->input->post('original_img_path');

        
        if($contact = $this->phone_model->get_one_contact($user_id, $contact_id)){
            if(($contact['contact_name'] == $contact_name) && 
            ($contact['contact_number'] == $contact_number) && 
            (empty($_FILES['image']['name']))){
                // NO CHANGES FOUND
                $this->form_validation->set_message('check_no_changes', 'No changes were made.');
                return false;
            }
        }
        return true;
    }
}