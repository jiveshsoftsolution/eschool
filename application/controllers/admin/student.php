<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Student extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('student/student_model','studentModel');
		$this->load->helper('crud_model');
		$this->load->helper('student_model');
	}

	public function index() {
		
	}

	public function student_registraton()
	{
		$data = array();
		$this->template->getHeader(); 
		$data['session']  = $this->sessionModel->getSession();
		$data['classSecton'] = $this->classSection->getClass_section();
		$this->load->view('student_registration' ,$data);
		$this->template->getFooter(); 
	}

	public function add_student_information()
	{
		$all_data = array();
		$student_data = array();
		$parents_data = array();
		$address_data = array();
		$class_section_data = array();
		$registration_message = array();
		$registration_message['registration_message'] = "";
		
			/*Student Data */
			if($this->input->post('first_name'))
			$student_data['first_name'] = $this->input->post('first_name');
			if($this->input->post('middle_name'))
			$student_data['middle_name'] = $this->input->post('middle_name');
			if($this->input->post('last_name'))
			$student_data['last_name'] = $this->input->post('last_name');
			if($this->input->post('gender'))
			$student_data['gender'] = $this->input->post('gender');
			if($this->input->post('dob'))
			$student_data['dob'] = $this->input->post('dob');
			/* Too Do for genrate loginId and Password */
			$student_data['login_id'] = "testId";
			$student_data['password'] = "123789" ;
			 /* END */		
			$student_data['created_by'] = 11 ;
			$student_data['created_date'] = date('Y-m-d H:i:s') ;
			/* Too Do write a function in helper for image upload */
			if (isset($_FILES['student_photo_url'])) 
			{
				 $temp_gal = $_FILES['student_photo_url']['tmp_name'];
				 foreach ($temp_gal as $k => $img) 
				 {
						$filename = $img;
						$path = base_url().'assets/assets/students_images/' . time() . rand(34, 68768) . '_' . $_FILES['student_photo_url']['name'][$k];
						$destination = getcwd() . '/' . $path;
						move_uploaded_file($filename, $destination);
						$student_data['photo_url'] = $path;
				 }
			}
			 /*End*/
			$all_data['student_record'] = $student_data;
			/* End Student Data */ 
		
			/*Parents Data*/  
			if($this->input->post('father_first_name'))
			$parents_data['father_first_name'] = $this->input->post('father_first_name');
			if($this->input->post('father_middle_name'))
			$parents_data['father_middle_name'] = $this->input->post('father_middle_name');
			if($this->input->post('father_last_name'))
			$parents_data['father_last_name'] = $this->input->post('father_last_name');
			if($this->input->post('mother_first_name'))
			$parents_data['mother_first_name'] = $this->input->post('mother_first_name');
			if($this->input->post('mother_middle_name'))
			$parents_data['mother_middle_name'] = $this->input->post('mother_middle_name');
			if($this->input->post('mother_last_name'))
			$parents_data['mother_last_name'] = $this->input->post('mother_last_name');
			if($this->input->post('parent_mobile'))
			$parents_data['parent_mobile'] = $this->input->post('parent_mobile');
			/* Too Do for genrate loginId and Password */
			$parents_data['login_id'] = "testId";
			$parents_data['password'] = "123789" ;
			 /* END */	
			/* Too Do write a function in helper for image upload */
			if (isset($_FILES['father_photo_url'])) { // Father Photo
						$temp_gal = $_FILES['father_photo_url']['tmp_name'];
						foreach ($temp_gal as $k => $img) {
							$filename = $img;
							$path = base_url().'assets/assets/students_images/' . time() . rand(34, 68768) . '_' . $_FILES['father_photo_url']['name'][$k];
							$destination = getcwd() . '/' . $path;
							move_uploaded_file($filename, $destination);
							$parents_data['father_photo_url'] = $path;
						}
					}
					
				if (isset($_FILES['mother_photo_url'])) { // Mother Photo
						$temp_gal = $_FILES['mother_photo_url']['tmp_name'];
						foreach ($temp_gal as $k => $img) {
							$filename = $img;
							$path = base_url().'assets/assets/students_images/' . time() . rand(34, 68768) . '_' . $_FILES['mother_photo_url']['name'][$k];
							$destination = getcwd() . '/' . $path;
							move_uploaded_file($filename, $destination);
							$parents_data['mother_photo_url'] = $path;
						}
					}	
			  $all_data['parents_record'] = $parents_data;
			/*End*/
			/* End  Parents Record*/                 
			/* Address Data */
			if($this->input->post('address1'))
			$address_data['address1'] = $this->input->post('address1');
			if($this->input->post('address2'))
			$address_data['address2'] = $this->input->post('address2');
			if($this->input->post('address3'))
			$address_data['address3'] = $this->input->post('address3');
			if($this->input->post('country_id'))
			$address_data['country_id'] = $this->input->post('country_id');
			if($this->input->post('state_id'))
			$address_data['state_id'] = $this->input->post('state_id');
			if($this->input->post('city_id'))
			$address_data['city_id'] = $this->input->post('city_id');
			if($this->input->post('pincode'))
			$address_data['pincode'] = $this->input->post('pincode');
			$all_data['address_record'] = $address_data;
			/* End Address Record*/
			
		   /* Class Section Data */
		   if($this->input->post('class_section_id'))
		   $class_section_data['class_section_id'] = $this->input->post('class_section_id');
		   if($this->input->post('session_id'))
		   $class_section_data['session_id'] = $this->input->post('session_id');
		   if($this->input->post('roll_number'))
		   $class_section_data['roll_number'] = 123456;
		   if($this->input->post('house_id'))
		   $class_section_data['house_id'] = 123456;
		   $all_data['student_teacher_class'] = $class_section_data;
		   /* End Class Section Data */
		   
			
		if( $this->studentModel->insert_student($all_data))
		{
			$registration_message['registration_message'] = "Student Registered Successfully!";
			$this->template->getHeader(); 
			$this->load->view('student_registration' ,$registration_message);
			$this->template->getFooter(); 
		}
		else
		{
			$registration_message['registration_message'] = "Student Not Registered , Please Contact To Admin!";
			$this->template->getHeader(); 
			$this->load->view('student_registration' ,$registration_message);
			$this->template->getFooter(); 
		}
		
	}	
		
		/* Get Student List 
		 Auther Alok Dixit
		 Modifide By  Rahul Sharma
		*/
		public function studentlist()
		{
				$data = array();
				$filterColumns = array();
				$offset = NULL;
				$limit = NULL;
				$sort = array();
				$session_Id = NULL;
				$class_section_Id = NULL;
				$this->template->getHeader(); 
				$this->template->getLeftbar(); 
				$data['session']  =   retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");
				$data['classSection'] = getClass_section();
				if($this->input->post('session_id'))
				{
				  $session_Id= (int)$this->input->post('session_id');
				  $filterColumns['session_id'] = $session_Id;
				}
				if($this->input->post('class_section_id'))
				{
				  $class_section_Id= (int)$this->input->post('class_section_id');
				  $filterColumns['class_section_id'] = $class_section_Id;
				}
				if($session_Id==0 && $class_section_Id==0)
				{
					$data['studentlist']= getStudentBySessionId_ClassSectionId($filterColumns, $offset, $limit, $sort);
				}
				else
				{
				  $data['studentlist']= getStudentBySessionId_ClassSectionId($filterColumns, $offset, $limit, $sort);
				}			
				$this->load->view('student/student_listing' ,$data);
				$this->template->getFooter(); 
		}
}
?>