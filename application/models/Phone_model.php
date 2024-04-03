<?php
	class Phone_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
 
        public function username_check($username){
            $query = $this->db->get_where('users', array('username'=>$username));
            if($query->num_rows() > 0){
                
                return false; // its return availability 

            }
            else{

                return true; // its return availability 

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

        public function add_new_contact($uid,$name,$number,$path){
            if($this->db->insert('contacts', array('user_id'=>$uid,'contact_name'=>$name,'contact_number'=>$number,'image_path'=>$path))){

                return true;

            } else {

                return false;

            }
        }

        public function get_three_contact($uid){
            $this->db->limit(3); 
            $this->db->order_by('date_added', 'DESC');
            $query = $this->db->get_where('contacts', array('user_id'=>$uid ,'deletion_status'=> false ));
            if ($query->num_rows() > 0) {

                return $query->result();

            } else {

                return false;
                
            }
        }


        public function get_contact_count($uid){
            $query = $this->db->get_where('contacts', array('user_id'=>$uid ,'deletion_status'=> false ));
            return $query->num_rows();
        }

        
        public function get_contact_pagination($uid, $limit, $start){

            $this->db->limit($limit, $start);
            $query = $this->db->get_where('contacts', array('user_id'=>$uid ,'deletion_status'=> false ));
            
            if ($query->num_rows() > 0) {

                return $query->result();

            } else {

                return false;
                
            }
        }

        public function get_one_contact($uid,$cid){
            $query = $this->db->get_where('contacts', array('user_id'=>$uid ,'id'=>$cid,'deletion_status'=> false ));
            if ($query->num_rows() > 0) {

                return $query->row_array();

            } else {

                return false;
                
            }
        }

        public function edit_contact_by_id($uid,$cid,$cname,$cnumber,$cimgpath){

            $where_condition = array('user_id' => $uid, 'id' => $cid, 'deletion_status' => false);

            $update_array = array(
                'contact_name' => $cname, 
                'contact_number' => $cnumber, 
                'image_path' => $cimgpath
            );
            
            $this->db->where($where_condition);
            $this->db->update('contacts', $update_array);
            
            if ($this->db->affected_rows() > 0) {

                return true;

            } else{

                return false;
                
            }
        }

        public function delete_contact($uid, $cid){
            $where_condition = array('user_id' => $uid, 'id' => $cid);
            $this->db->where($where_condition);
            $this->db->update('contacts', array('deletion_status' => true));
            if ($this->db->affected_rows() > 0) {

                return true;

            } else{

                return false;
                
            }
        }
	}
?>