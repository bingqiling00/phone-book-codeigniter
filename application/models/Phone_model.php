<?php
	class Phone_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
 
        public function username_check($username){
            $query = $this->db->get_where('users', array('username'=>$username));
            if($query->num_rows() > 0){
                
                return false;

            }
            else{

                return true;

            }
        }

        public function user_register($username,$password,$email){
            if($this->db->insert('users', array('username'=>$username,'password'=>$password,'email'=>$email))){

                return true;

            } else {

                return false;

            }
        }

        public function user_login($username,$password){

            if($query = $this->db->get_where('users', array('username'=>$username,'password'=>$password))){
                if ($query->num_rows() == 1 ) {

                    return $query->row_array();

                } else {

                    return false;
                    
                }
            }
        }

        public function add_new_contact($uid,$name,$number){
            if($this->db->insert('contacts', array('user_id'=>$uid,'contact_name'=>$name,'contact_number'=>$number))){

                return true;

            } else {

                return false;

            }
        }

        public function add_new_contact_with_path($uid,$name,$number,$path){
            if($this->db->insert('contacts', array('user_id'=>$uid,'contact_name'=>$name,'contact_number'=>$number,'image_path'=>$path))){

                return true;

            } else {

                return false;

            }
        }
	}
?>