<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Student extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('student/student_model', 'studentModel');
		$this->load->model('session/session_model', 'sessionModel');
		$this->load->model('class_section/class_section_model','classSection');
		$this->load->helper('crud_model');
		$this->load->helper('student_model');
		$this->load->library('image_lib');
	}

	public function index() {
		
	}

	public function student_registraton()
	{
		if (!isLoggedIn('student/student/student_registraton')) {
            redirect(site_url('accessdenied'), 'refresh');
        }
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['salutation'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_salutation");
		$data['country'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_country");
		$data['session']  = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");
		$data['classSecton'] = $this->classSection->getClass_section();
		$this->load->view('student/student_registration' ,$data);
		$this->template->getFooter(); 
		
	}

	public function retrive_state_list()
	{	
		if($_POST)
		{
			$country_id = addslashes($this->input->post('country_id'));
		}
		$state = array();
		$filterColumns['country_id'] = $country_id;
		$state = retrieve_records($filterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_state");
		echo  json_encode($state);
	}

	public function retrive_city_list()
	{	
		if($_POST)
		{
			$state_id = addslashes($this->input->post('state_id'));
		}
		$city = array();
		$filterColumns["state_id"]  = $state_id;
		$city = retrieve_records($filterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_city");
		echo  json_encode($city);
	}

	public function add_student_information()
	{
		$logInUser = loggedUser();
		$all_data = array();
        $login_student_data = array();
        $login_parent_data = array();
		$student_data = array();
		$parents_data = array();
		$address_data = array();
		$class_section_data = array();
		$registration_message = array();
		$registration_message['registration_message'] = "";
		
			/*Student Data */
			if($this->input->post('salutation_id'))
			$student_data['salutation_id'] = addslashes($this->input->post('salutation_id'));
			if($this->input->post('first_name'))
			$student_data['first_name'] = addslashes($this->input->post('first_name'));
			if($this->input->post('middle_name'))
			$student_data['middle_name'] = addslashes($this->input->post('middle_name'));
			if($this->input->post('last_name'))
			$student_data['last_name'] = addslashes($this->input->post('last_name'));
			if($this->input->post('gender'))
			$student_data['gender'] = addslashes($this->input->post('gender'));
			if($this->input->post('dob'))
			$student_data['dob'] = addslashes($this->input->post('dob'));

			/* Too Do for genrate loginId and Password */
			$student_data['login_id'] = "S_".addslashes($this->input->post('first_name'));
			$student_data['password'] = "123789" ;
			 /* END */		
                          
            $student_data['created_by'] = $logInUser['user_id'];
            $student_data['created_date'] = date('Y-m-d H:i:s');
            $student_data['created_by_type'] = $logInUser['user_type'];              
						
			/* Too Do write a function in helper for image upload */
			if (isset($_FILES['student_photo_url'])) 
			{					
				$allowedExts = array("gif", "jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["student_photo_url"]["name"]);
				$extension = end($temp);
				if (($_FILES["student_photo_url"]["size"] < 20000)&& in_array($extension, $allowedExts))
				{	
					$pic_name = time() . rand(34, 68768) . '_' . $_FILES['student_photo_url']['name'];
					$temp_gal = $_FILES['student_photo_url']['tmp_name'];
					$path = './assets/students_images/' . $pic_name;
					$destination = getcwd() . '/' . $path;
					move_uploaded_file($temp_gal, $destination);
					$student_data['photo_url'] = $pic_name;				
				}
				else
				{
					$upload_error = "Invalid File.";
				}
			}
			
			 /*End*/
                        
                        /*Login of student Data*/
                        /* Too Do for genrate loginId and Password */
			$login_student_data['login_id'] = "S_".addslashes($this->input->post('first_name'));
			$login_student_data['password'] = "123789" ;
                        $login_student_data['user_login_type'] = "S" ;
			 /* END */		
                        /*END*/
			$all_data['student_record'] = $student_data;
			$all_data['student_login_record'] = $login_student_data;
                        /* End Student Data */ 
		     
			/*Parents Data*/  
			if($this->input->post('father_salutation_id'))
			$parents_data['father_salutation_id'] = addslashes($this->input->post('father_salutation_id'));
			if($this->input->post('father_first_name'))
			$parents_data['father_first_name'] = addslashes($this->input->post('father_first_name'));
			if($this->input->post('father_middle_name'))
			$parents_data['father_middle_name'] = addslashes($this->input->post('father_middle_name'));
			if($this->input->post('father_last_name'))
			$parents_data['father_last_name'] = addslashes($this->input->post('father_last_name'));
			
			if($this->input->post('mother_salutation_id'))
			$parents_data['mother_salutation_id'] = addslashes($this->input->post('mother_salutation_id'));
			if($this->input->post('mother_first_name'))
			$parents_data['mother_first_name'] = addslashes($this->input->post('mother_first_name'));
			if($this->input->post('mother_middle_name'))
			$parents_data['mother_middle_name'] = addslashes($this->input->post('mother_middle_name'));
			if($this->input->post('mother_last_name'))
			$parents_data['mother_last_name'] = addslashes($this->input->post('mother_last_name'));
			
			if($this->input->post('parent_mobile'))
			$parents_data['parent_mobile'] = addslashes($this->input->post('parent_mobile'));
			if($this->input->post('mail_to'))
			$parents_data['mail_to'] = addslashes($this->input->post('mail_to'));
			/* Too Do for genrate loginId and Password */
			$parents_data['login_id'] = "testId";
			$parents_data['password'] = "123789" ;
			 /* END */	
			/* Too Do write a function in helper for image upload */
			if (isset($_FILES['father_photo_url'])) 
			{ 	
				// Father Photo			
				$allowedExts = array("gif", "jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["father_photo_url"]["name"]);
				$extension = end($temp);
				if (($_FILES["father_photo_url"]["size"] < 20000)&& in_array($extension, $allowedExts))
				{
					$pic_name =  time() . rand(34, 68768) . '_' . $_FILES['father_photo_url']['name'];
					$temp_gal = $_FILES['father_photo_url']['tmp_name'];
					$path = './assets/parents_images/' .$pic_name;
					$destination = getcwd() . '/' . $path;
					move_uploaded_file($temp_gal, $destination);
					$parents_data['father_photo_url'] = $pic_name;				
				}
				else
				{
					$upload_error = "Invalid File.";
				}
			}
					
			if (isset($_FILES['mother_photo_url'])) 
			{ 
				// Mother Photo			
				$allowedExts = array("gif", "jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["mother_photo_url"]["name"]);
				$extension = end($temp);
				if (($_FILES["mother_photo_url"]["size"] < 20000)&& in_array($extension, $allowedExts))
				{
					$pic_name =  time() . rand(34, 68768) . '_' . $_FILES['mother_photo_url']['name'];
					$temp_gal = $_FILES['mother_photo_url']['tmp_name'];
					$path = './assets/parents_images/' . $pic_name;
					$destination = getcwd() . '/' . $path;
					move_uploaded_file($temp_gal, $destination);
					$parents_data['mother_photo_url'] = $pic_name;				
				}
				else
				{
					$upload_error = "Invalid File.";
				}
						
			}	
                        
            /*Login of Parent Data*/
            /* Too Do for genrate loginId and Password */
			$login_parent_data['login_id'] = "P_".addslashes($this->input->post('father_first_name'));
			$login_parent_data['password'] = "123789" ;
            $login_parent_data['user_login_type'] = "P" ;
			 /* END */
			$all_data['parents_record'] = $parents_data;
            $all_data['parents_login_record'] = $login_parent_data;
			 /*End*/
			/* End  Parents Record*/                 
			
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
			
		   /* Class Section Data */
		   if($this->input->post('class_section_id'))
		   $class_section_data['class_section_id'] = addslashes($this->input->post('class_section_id'));
		   if($this->input->post('session_id'))
		   $class_section_data['session_id'] = addslashes($this->input->post('session_id'));
		   if($this->input->post('roll_number'))
		   $class_section_data['roll_number'] = 123456;
		   if($this->input->post('house_id'))
		   $class_section_data['house_id'] = 123456;
		   $all_data['student_teacher_class'] = $class_section_data;
                   
               
		   /* End Class Section Data */
		
		// if(empty($upload_error))
		// {
		 
			if( $this->studentModel->insert_student($all_data))
			{
				redirect(base_url().'index.php/student/student/student_list/'.$class_section_data['class_section_id'].'/'.$class_section_data['session_id']);
			}
			else
			{
				$data = array();
				$this->template->getScript(); 
				$this->template->getAdminHeader(); 
				$this->template->getAdminLeftBar();	
				$data['country'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_country");
				$data['session']  = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");
				$data['classSecton'] = $this->classSection->getClass_section();
				$data['registration_message'] = "Student Not Registered , Please Contact To Admin!";
				$this->load->view('student/student_registration' ,$data);
				$this->template->getFooter(); 
			}
		// }
		// else
		// {	
			// $data = array();
			// $this->template->getScript(); 
			// $this->template->getAdminHeader(); 
			// $this->template->getAdminLeftBar();	
			// $data['country'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_country");
			// $data['session']  = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");
			// $data['classSecton'] = $this->classSection->getClass_section();
			// $data['upload_error'] = $upload_error;
			// $this->load->view('student/student_registration' ,$data);
			// $this->template->getFooter(); 
		// }
	}	
	
	public function student_list($class_section_Id="",$session_Id="")
	{
		$data = array();
		$filterColumns = array();
		$offset = NULL;
		$limit = NULL;
		$sort = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['session']  = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");
		$data['classSecton'] = $this->classSection->getClass_section();
		$data['selected_session'] = $session_Id;
		$data['selected_classsecton'] = $class_section_Id;
		$filterColumns['session_id'] = $session_Id;
		$filterColumns['class_section_id'] = $class_section_Id;
		if($this->input->post('session_id'))
		{
		  $session_Id= addslashes((int)$this->input->post('session_id'));
		  $filterColumns['session_id'] = $session_Id;
		  $data['selected_session'] = $session_Id;
		}
		if($this->input->post('class_section_id'))
		{
		  $class_section_Id= addslashes((int)$this->input->post('class_section_id'));
		  $filterColumns['class_section_id'] = $class_section_Id;
		  $data['selected_classsecton'] = $class_section_Id;
		}

		$data['studentlist']= getStudentBySessionId_ClassSectionId($filterColumns, $offset, $limit, $sort);
		$this->load->view('student/student_list' ,$data);
		$this->template->getFooter(); 
	}

	public function student_edit($student_id = null) 
	{
             $logInUser = loggedUser();
		$studentRecord = array();
		$sdata = array();
		$pdata = array();
		$data = array();
		$adata = array();
		$csdata = array();
		$registerdata = array();
		$registerdata['registerInfo'] = "";

		if ($this->input->post()) 
		{
			$sdata['salutation_id'] = $this->input->post('salutation_id');
			$sdata['first_name'] = $this->input->post('first_name');
			$sdata['middle_name'] = $this->input->post('middle_name');
			$sdata['last_name'] = $this->input->post('last_name');
			$sdata['gender'] = $this->input->post('gender');
			$sdata['dob'] = $this->input->post('dob');  
                        
                        $sdata['updated_by_type'] = $logInUser['user_type'];
			$sdata['updated_by'] = $logInUser['user_id'];
			$sdata['updated_date'] = date('Y-m-d H:i:s') ;
			$sdata['student_id']  = $this->input->post('student_id');   
			
			/* Too Do write a function in helper for image upload */
            //if($_FILES['hd_student_photo_url']['error'])
			//{
				//$sdata['photo_url'] = addslashes($this->input->post('hd_student_photo_url'));
			//}
		//	else
			//{          
				if (isset($_FILES['student_photo_url'])) 
				{	
					$allowedExts = array("gif", "jpeg", "jpg", "png");
					$temp = explode(".", $_FILES["student_photo_url"]["name"]);
					$extension = end($temp);
					if ( in_array($extension, $allowedExts))
					{	
						$pic_name = time() . rand(34, 68768) . '_' . $_FILES['student_photo_url']['name'];
						$temp_gal = $_FILES['student_photo_url']['tmp_name'];
						$path = './assets/students_images/' . $pic_name;
						$destination = getcwd() . '/' . $path;
						move_uploaded_file($temp_gal, $destination);
						$sdata['photo_url'] = $pic_name;                                        
					}
					else
					{
						$upload_error = "Invalid File.";
					}
				}
			//}
			
			 /*End*/
			$data['student'] = $sdata;

			$pdata['father_salutation_id'] = $this->input->post('father_salutation_id');
			$pdata['father_first_name'] = $this->input->post('father_first_name');
			$pdata['father_middle_name'] = $this->input->post('father_middle_name');
			$pdata['father_last_name'] = $this->input->post('father_last_name');
			
			/*if($_FILES['hd_father_photo_url']['error'])
			{
				$pdata['father_photo_url'] = addslashes($this->input->post('hd_father_photo_url'));
			}
			else
			{*/
				if (isset($_FILES['father_photo_url'])) 
				{ 	
					$allowedExts = array("gif", "jpeg", "jpg", "png");
					$temp = explode(".", $_FILES["father_photo_url"]["name"]);
					$extension = end($temp);
					if (in_array($extension, $allowedExts))
					{				   	
						$pic_name =  time() . rand(34, 68768) . '_' . $_FILES['father_photo_url']['name'];
						$temp_gal = $_FILES['father_photo_url']['tmp_name'];
						$path = './assets/parents_images/' .$pic_name;
						$destination = getcwd() . '/' . $path;
						move_uploaded_file($temp_gal, $destination);
						$pdata['father_photo_url'] = $pic_name;				
					}
					else
					{
						$upload_error = "Invalid File.";
					}
				}
			//}		
			$pdata['mother_salutation_id'] = $this->input->post('mother_salutation_id');
			$pdata['mother_first_name'] = $this->input->post('mother_first_name');
			$pdata['mother_middle_name'] = $this->input->post('mother_middle_name');
			$pdata['mother_last_name'] = $this->input->post('mother_last_name');
			$pdata['mail_to'] = $this->input->post('mail_to');    
			$pdata['parent_mobile'] = $this->input->post('parent_mobile');
			
			/*if($_FILES['hd_mother_photo_url']['error'])
			{
				$pdata['mother_photo_url'] = addslashes($this->input->post('hd_mother_photo_url'));
			}
			else
			{*/
				if (isset($_FILES['mother_photo_url'])) 
				{ 
					// Mother Photo			
					$allowedExts = array("gif", "jpeg", "jpg", "png");
					$temp = explode(".", $_FILES["mother_photo_url"]["name"]);
					$extension = end($temp);
					if ( in_array($extension, $allowedExts))
					{
						$pic_name =  time() . rand(34, 68768) . '_' . $_FILES['mother_photo_url']['name'];
						$temp_gal = $_FILES['mother_photo_url']['tmp_name'];
						$path = './assets/parents_images/' . $pic_name;
						$destination = getcwd() . '/' . $path;
						move_uploaded_file($temp_gal, $destination);
						$pdata['mother_photo_url'] = $pic_name;				
					}
					else
					{
						$upload_error = "Invalid File.";
					}
							
				}
			//}
			$data['parent'] = $pdata;

			$adata['address1'] = $this->input->post('address1');
			$adata['address2'] = $this->input->post('address2');
			$adata['address3'] = $this->input->post('address3');
			$adata['country_id'] = $this->input->post('country_id');
			$adata['state_id'] = $this->input->post('state_id');
			$adata['city_id'] = $this->input->post('city_id');
			$adata['pincode'] = $this->input->post('pincode');
			$data['address'] = $adata;
			
			$csdata['class_section_id'] = $this->input->post('class_section_id');
			$csdata['session_id'] = $this->input->post('session_id');
			$csdata['roll_number'] = 3323;
			$csdata['house_id'] = 3232;
			$data['student_teacher_class'] = $csdata;
			$this->studentModel->updat_emsstudent($data);

			$registerdata['registerInfo'] = "Student Updated Successfully!";
			redirect(base_url() . "index.php/student/student/student_list/".$csdata['class_section_id'].'/'.$csdata['session_id']);

		}
		else
		{
			$data =  array();
			$studentRecord = $this->studentModel->fetch_single_student($student_id);
			$data['studentRecord'] = $studentRecord;
			$data['country'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_country");
			$data['session']  = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");
			$data['classSecton'] = $this->classSection->getClass_section();
			$data['salutation'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_salutation");
			$this->template->getScript(); 
			$this->template->getAdminHeader(); 
			$this->template->getAdminLeftBar();	
			$this->load->view('student/student_registration_edit',$data);
			$this->template->getFooter(); 
		}

	}	       
        
}
?>