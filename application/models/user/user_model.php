<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	
	public function insert_user($user_data)
    {
        $user_id = 0;
        if ($user_data['user_record'] != null) {
            $this->db->insert('ems_user', $user_data['user_record']); 
              $user_id = $this->db->insert_id();
        }
		if($user_id > 0)
		{
			
			 if ($user_data['address_record'] != null) 
			 {
				 $user_data['address_record']['user_id'] = $user_id;
				 $this->db->insert('ems_user_address', $user_data['address_record']); 
				 return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
			 }
		}
		else
		{
		  return FALSE;
		}
    }
	
	function user_login($luser = NULL) {
      

        if ($luser != NULL) {

            $this->db->where('login_id', $luser['login_id']);
            $this->db->where('password', md5($luser['password']));
			$this->db->where('user_type', 1);
            $query = $this->db->get('ems_user');
		
            if ($query->num_rows == 1) {
                return true;
             }
         }
	}	
}