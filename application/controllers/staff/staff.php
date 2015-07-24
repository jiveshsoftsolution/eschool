<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Staff extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('staff/staff_model', 'staffModel');
		$this->load->helper('crud_model');
		$this->load->library('image_lib');
	}

	public function index() {
		
	}

	public function staff_registration()
	{
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['salutation'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_salutation");
		$data['country'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_country");
		$data['user_type'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_school_user_type");
		$this->load->view('staff/staff_registration' ,$data);
		$this->template->getFooter(); 		
	}

	public function add_staff_information()
	{
		$all_data = array();
        $login_student_data = array();
		$staff_data = array();
		$address_data = array();
		$registration_message = array();
		$registration_message['registration_message'] = "";
		
			/*Teacher Data */
			if($this->input->post('salutation_id'))
			$staff_data['salutation_id'] = addslashes($this->input->post('salutation_id'));
			if($this->input->post('first_name'))
			$staff_data['first_name'] = addslashes($this->input->post('first_name'));
			if($this->input->post('middle_name'))
			$staff_data['middle_name'] = addslashes($this->input->post('middle_name'));
			if($this->input->post('last_name'))
			$staff_data['last_name'] = addslashes($this->input->post('last_name'));
			if($this->input->post('gender'))
			$staff_data['gender'] = addslashes($this->input->post('gender'));
			if($this->input->post('dob'))
			$staff_data['dob'] = addslashes($this->input->post('dob'));
			if($this->input->post('school_user_type_id'))
			$staff_data['school_user_type_id'] = addslashes($this->input->post('school_user_type_id'));
			if($this->input->post('phone'))
			$staff_data['phone'] = addslashes($this->input->post('phone'));
			if($this->input->post('mobile'))
			$staff_data['mobile'] = addslashes($this->input->post('mobile'));
			if($this->input->post('email'))
			$staff_data['email'] = addslashes($this->input->post('email'));

			 /* END */		
			$staff_data['created_by'] = 11 ;
			$staff_data['created_date'] = date('Y-m-s H:i:s') ;
			/* Too Do write a function in helper for image upload */
			if (isset($_FILES['photo_url'])) 
			{					
				$allowedExts = array("gif", "jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["photo_url"]["name"]);
				$extension = end($temp);
				if (($_FILES["photo_url"]["size"] < 400000)&& in_array($extension, $allowedExts))
				{	
					$pic_name = time() . rand(34, 68768) . '_' . $_FILES['photo_url']['name'];
					$temp_gal = $_FILES['photo_url']['tmp_name'];
					$path = './assets/teachers_images/' . $pic_name;
					$destination = getcwd() . '/' . $path;
					move_uploaded_file($temp_gal, $destination);
					$staff_data['photo_url'] = $pic_name;				
				}
				else
				{
					$upload_error = "Invalid File.";
				}
			}			
			 /*End*/
                        
			/*Login of student Data*/
			/* Too Do for genrate loginId and Password */
			$login_staff_data['login_id'] = "T_".addslashes($this->input->post('first_name'));
			$login_staff_data['password'] = "123789" ;
            $login_staff_data['user_login_type'] = "T" ;
			 /* END */		
                        /*END*/
			$all_data['staff_record'] = $staff_data;
			$all_data['staff_login_record'] = $login_staff_data;
             /* End Student Data */    
             
			
            /* Address Data */
			if($this->input->post('address1'))
			$address_data['address1'] = addslashes($this->input->post('address1'));
			if($this->input->post('address2'))
			$address_data['address2'] = addslashes($this->input->post('address2'));
			if($this->input->post('address3'))
			$address_data['address3'] = addslashes($this->input->post('address3'));
			if($this->input->post('country_id'))
			$address_data['country_id'] = addslashes($this->input->post('country_id'));
			if($this->input->post('state_id'))
			$address_data['state_id'] = addslashes($this->input->post('state_id'));
			if($this->input->post('city_id'))
			$address_data['city_id'] = addslashes($this->input->post('city_id'));
			if($this->input->post('pincode'))
			$address_data['pincode'] = addslashes($this->input->post('pincode'));
			$all_data['address_record'] = $address_data;
			/* End Address Record*/
			//echo '<pre>'; print_r($all_data); die; exit;
			if( $this->staffModel->insert_staff($all_data))
			{				
				redirect(base_url().'index.php/staff/staff/staff_list/'.$staff_data['school_user_type_id']);
			}
			else
			{
				$data = array();
				$this->template->getScript(); 
				$this->template->getAdminHeader(); 
				$this->template->getAdminLeftBar();	
				$data['registration_message'] = "Staff Not Registered , Please Contact To Admin!";
				$this->load->view('staff/staff_registration' ,$data);
				$this->template->getFooter(); 
			}
	}	
	
	public function staff_list($school_user_type_id="")
	{
		$data = array();
		$filterColumns = array();
		$offset = NULL;
		$limit = NULL;
		$sort = array();
		$session_Id = NULL;
		$class_section_Id = NULL;
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['school_user_type_id'] = $school_user_type_id;
		if($this->input->post('school_user_type_id'))
		{
		  $school_user_type_id= addslashes((int)$this->input->post('school_user_type_id'));
		  $data['school_user_type_id'] = $school_user_type_id;
		}
		$data['stafflist']= $this->staffModel->getStaffList($school_user_type_id);
		$data['user_type']= retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_school_user_type");
		$this->load->view('staff/staff_list' ,$data);
		$this->template->getFooter(); 
	}
	
	public function staff_edit($staff_id = null) 
	{
		$all_data = array();
        $login_student_data = array();
		$staff_data = array();
		$address_data = array();
		$registration_message = array();
		$registration_message['registration_message'] = "";

		if ($this->input->post()) 
		{
			/*Teacher Data */
			if($this->input->post('salutation_id'))
			$staff_data['salutation_id'] = addslashes($this->input->post('salutation_id'));
			if($this->input->post('hd_staff_id'))
			$staff_data['staff_id'] = addslashes($this->input->post('hd_staff_id'));
			if($this->input->post('first_name'))
			$staff_data['first_name'] = addslashes($this->input->post('first_name'));
			if($this->input->post('middle_name'))
			$staff_data['middle_name'] = addslashes($this->input->post('middle_name'));
			if($this->input->post('last_name'))
			$staff_data['last_name'] = addslashes($this->input->post('last_name'));
			if($this->input->post('gender'))
			$staff_data['gender'] = addslashes($this->input->post('gender'));
			if($this->input->post('dob'))
			$staff_data['dob'] = addslashes($this->input->post('dob'));
			if($this->input->post('school_user_type_id'))
			$staff_data['school_user_type_id'] = addslashes($this->input->post('school_user_type_id'));
			if($this->input->post('phone'))
			$staff_data['phone'] = addslashes($this->input->post('phone'));
			if($this->input->post('mobile'))
			$staff_data['mobile'] = addslashes($this->input->post('mobile'));
			if($this->input->post('email'))
			$staff_data['email'] = addslashes($this->input->post('email'));

			 /* END */		
			$staff_data['created_by'] = 11 ;
			$staff_data['created_date'] = date('Y-m-s H:i:s') ;
			/* Too Do write a function in helper for image upload */

			if($_FILES['photo_url']['error'])
			{
				$staff_data['photo_url'] = addslashes($this->input->post('hd_photo_url'));
			}
			else
			{
				if (isset($_FILES['photo_url'])) 
				{					
					$allowedExts = array("gif", "jpeg", "jpg", "png");
					$temp = explode(".", $_FILES["photo_url"]["name"]);
					$extension = end($temp);
					if (($_FILES["photo_url"]["size"] < 40000000)&& in_array($extension, $allowedExts))
					{	
						$pic_name = time() . rand(34, 68768) . '_' . $_FILES['photo_url']['name'];
						$temp_gal = $_FILES['photo_url']['tmp_name'];
						$path = './assets/teachers_images/' . $pic_name;
						$destination = getcwd() . '/' . $path;
						move_uploaded_file($temp_gal, $destination);
						$staff_data['photo_url'] = $pic_name;				
					}
					else
					{
						$upload_error = "Invalid File.";
					}
				}
			}
			 /*End*/
                        
			/*Login of student Data*/
			/* Too Do for genrate loginId and Password */
			$login_staff_data['login_id'] = "T_".addslashes($this->input->post('first_name'));
			$login_staff_data['password'] = "123789" ;
            $login_staff_data['user_login_type'] = "T" ;
			 /* END */		
                        /*END*/
			$all_data['staff_record'] = $staff_data;
			$all_data['staff_login_record'] = $login_staff_data;
             /* End Student Data */    
             
			
            /* Address Data */
			if($this->input->post('address1'))
			$address_data['address1'] = addslashes($this->input->post('address1'));
			if($this->input->post('address2'))
			$address_data['address2'] = addslashes($this->input->post('address2'));
			if($this->input->post('address3'))
			$address_data['address3'] = addslashes($this->input->post('address3'));
			if($this->input->post('country_id'))
			$address_data['country_id'] = addslashes($this->input->post('country_id'));
			if($this->input->post('state_id'))
			$address_data['state_id'] = addslashes($this->input->post('state_id'));
			if($this->input->post('city_id'))
			$address_data['city_id'] = addslashes($this->input->post('city_id'));
			if($this->input->post('pincode'))
			$address_data['pincode'] = addslashes($this->input->post('pincode'));
			$all_data['address_record'] = $address_data;
			///* End Address Record*/
			//echo '<pre>'; print_r($all_data); die; exit;
			if($this->staffModel->update_staff($all_data))
			{				
				redirect(base_url().'index.php/staff/staff/staff_list/'.$staff_data['school_user_type_id']);
			}
		}
		else
		{
			$data =  array();
			$satffRecord = $this->staffModel->fetch_single_satff($staff_id);
			$data['staffRecord'] = $satffRecord;
			$data['country'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_country");
			$data['user_type'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_school_user_type");
			$data['salutation'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_salutation");
			$this->template->getScript(); 
			$this->template->getAdminHeader(); 
			$this->template->getAdminLeftBar();	
			$this->load->view('staff/staff_registration_edit',$data);
			$this->template->getFooter(); 
		}

	}
}
?>