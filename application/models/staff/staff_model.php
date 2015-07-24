<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff_model extends CI_Model {
    
    public function __construct()
    {
		parent::__construct();
		$this->load->database();
    }
	
	public function insert_staff($staff_data)
	{
		$staff_id = 0;
		if ($staff_data['staff_record'] != null) 
		{
			$this->db->insert('ems_staff', $staff_data['staff_record']);
			$staff_id = $this->db->insert_id();
            $this->generate_insert_login_id($staff_data['staff_record']['first_name'],3,$staff_id,'T');
		}
		if($staff_id > 0)
		{       
			if ($staff_data['address_record'] != null) 
			{
				$staff_data['address_record']['staff_id'] = $staff_id;
				$this->db->insert('ems_staff_address', $staff_data['address_record']);
			}
			return  TRUE ;
		}
		else
		{
			return FALSE;
		}
	}

	public function update_staff($staff_data)
	{
		if ($staff_data != NULL) 
		{
			if ($staff_data['staff_record'] != null) 
			{
				$this->db->where('staff_id', $staff_data['staff_record']['staff_id']);
				$this->db->update('ems_staff', $staff_data['staff_record']);
			}
			if ($staff_data['address_record'] != null) 
			{
				$this->db->where('staff_id', $staff_data['staff_record']['staff_id']);
				$this->db->update('ems_staff_address', $staff_data['address_record']);
			}
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function generate_insert_login_id($user_name,$length,$user_id,$user_login_type)
	{
		$user_name_subStr = substr($user_name, 0, $length);
		$randomNuber = rand(10, 5000);
		$user_data['login_id'] = $user_login_type.$user_name_subStr.$user_id.$randomNuber;
		$user_data['password'] = $this->generate_password(8) ;
		$user_data['user_id'] = $user_id;
		$user_data['user_login_type'] = $user_login_type;
		$data['user'] = $user_data;
		$this->insert_id_pass($data);
	}	
	function generate_password( $length = 8 )
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$";
		$password = substr(str_shuffle( $chars ), 0, $length );
		return $password;
	}
	
   function insert_id_pass($data = NULL) 
	{
		if ($data['user'] != null ) 
		{
			$this->db->insert('ems_login', $data['user']);
		}		
	}
	
	public function getStaffList($school_user_type_id="")
	{
		$this->db->select("ems_staff.*");
		$this->db->from('ems_staff');
		$this->db->join('ems_staff_address', 'ems_staff_address.staff_id = ems_staff.staff_id');
		$this->db->where('ems_staff.school_user_type_id',$school_user_type_id);
		$this->db->order_by('ems_staff.staff_id');
		$staff_query = $this->db->get();
		return $staff_query->result();
	}
	
	public function fetch_single_satff($staff_id) 
	{
		$this->db->select("ems_staff.*,ems_staff_address.address1,ems_staff_address.address2,ems_staff_address.address3,ems_staff_address.city_id,ems_staff_address.state_id,ems_staff_address.country_id,ems_staff_address.pincode");
		$this->db->from('ems_staff');
		$this->db->join('ems_staff_address', 'ems_staff_address.staff_id = ems_staff.staff_id');
		$this->db->where('ems_staff.staff_id',$staff_id);
		$this->db->order_by('ems_staff.staff_id');
		$staff_query = $this->db->get();
		if ($staff_query->num_rows()) 
		{
			return $staff_query->row();
		}
		return false;
	}
}