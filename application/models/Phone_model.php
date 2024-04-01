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
	}
?>