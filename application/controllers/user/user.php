<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('student/student_model', 'studentModel');
		$this->load->model('user/user_model','userModel');
		$this->load->model('login/login_model','loginModel');
		$this->load->helper('crud_model');
		$this->load->model('session/session_model','sessionModel');
		$this->load->helper('student_model');
	}
	
	public function index() 
	{	$data['errorInfo'] = "";
		$logindata = array();
		$loginTypeChar = "";
		if($this->input->post())
		{
                        
			if ($this->input->post('login_id'))
				$logindata['login_id'] = $this->input->post('login_id');

			if ($this->input->post('password'))
				$logindata['password'] = $this->input->post('password');
		  
			if (isset($logindata['login_id']))
			{
//				$loginType =  explode("_",$logindata['login_id']);
//				$loginTypeChar = $loginType[0];
                $user_type  =   $this->loginModel->main_login($logindata);  
			}
			$currentSession = $this->sessionModel->getCurrent_Session();
                        if(isset($user_type['user_id']))
                        {
			switch ($user_type['login_type'])
			{
				case 'A':
                   $admin_id = $user_type['user_id'];
										
					$query =  $this->loginModel->user_login($admin_id);
				
					if($query == 0)
					{
						$this->loadLogin();
					}
					else
					{
                                            
					$userdata = array('is_logged_in' => true,'user_type' => 'A','user'=>$query);
					$this->session->set_userdata($userdata);
					redirect('dashboard/dashboard/admin', 'refresh');
					}
				break;
				case 'C':
					$query =  $this->loginModel->user_login($user_type['user_id']);
					if($query == 0)
					{
						$this->loadLogin();
					}
					else
					{
						$userdata = array('is_logged_in' => true,'user_type' => 'C','user'=>$query);
						$this->session->set_userdata($userdata);
						redirect('dashboard/dashboard/coordinator', 'refresh');
					}
				break;
				case 'T':
					 $teacher_id = $user_type['user_id']; 
                                       $query =  $this->loginModel->teacher_login($teacher_id);
					if($query == 0)
					{
					$this->loadLogin();
					}
					else
					{
					$userdata = array('is_logged_in' => true,'user_type' => 'T','user'=>$query);
					$this->session->set_userdata($userdata);
					redirect('dashboard/dashboard/teacher', 'refresh');
					}
				break;
				case 'P':
			             $parent_id =  $user_type['user_id'];
                                     $query =  $this->loginModel->parent_login($parent_id);
                                        
					if($query == 0)
					{
						$this->loadLogin();
					}
					else
					{
						
                                            $userdata = array('is_logged_in' => true,'user_type' => 'P','user'=>$query);
                                           
						$this->session->set_userdata($userdata);
						redirect('dashboard/dashboard/parents', 'refresh');
					}
				break;
				case 'S':
					
                                        $student_id = $user_type['user_id'];
                                        $query =  $this->loginModel->student_login($student_id,$currentSession[0]->session_id);
					if($query == 0)
					{
						$this->loadLogin();
					}
					else
					{
					//                       $student = $this->studentModel->getSingleStudent($currentSession[0]->session_id,$query[0]->student_Id);
					if (isset($recordsFound['result']))
					{

					}
					else
					{
					}
						$userdata = array('is_logged_in' => true,'user_type' => 'S','student'=>$query);
						$this->session->set_userdata($userdata);
						redirect('dashboard/dashboard/student', 'refresh');
					}
				break;
				case 'H':
					$query =  $this->loginModel->teacher_login($user_type['user_id']);
					if($query == 0)
					{
						$this->loadLogin();
					}
					else
					{
						$userdata = array('is_logged_in' => true,'user_type' => 'H');
						$this->session->set_userdata($userdata);
						redirect('dashboard/dashboard/principal', 'refresh');
					}
				break;
				default:
				//Your account has been made,
				//please verify it by clicking the activation link that has been send to your email.
				$this->loadLogin();
				break;
			}
                }
                $data['errorInfo'] = "Invalid Login Id Or Password";
                $this->load->view('login',$data);
		}
		else
		{
			$this->load->view('login',$data);
		}
	}
	
	public function loadLogin($message="")
	{
		$pagedata['notice'] = $message;
		$this->load->view('login',$pagedata);
	}

	public function user_registration()
	{
		$data = array();
		$this->template->getHeader(); 
		$data['salutation'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_salutation");;
		$data['userType'] 	= retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_user_type");;
		$this->load->view('user/user_registration' ,$data);
		$this->template->getFooter(); 
	}
	
	public function add_user_information()
	{
		$all_data = array();
		$user_data = array();
		$address_data = array();
		$registration_message = array();
		$registration_message['registration_message'] = "";		
		/*user Data */
		if($this->input->post('user_type_id'))
		$user_data['user_type_id'] = $this->input->post('user_type_id');
		if($this->input->post('salutation_id'))
		$user_data['salutation_id'] = $this->input->post('salutation_id');
		if($this->input->post('first_name'))
		$user_data['first_name'] = $this->input->post('first_name');
		if($this->input->post('middle_name'))
		$user_data['middle_name'] = $this->input->post('middle_name');
		if($this->input->post('last_name'))
		$user_data['last_name'] = $this->input->post('last_name');
		if($this->input->post('gender'))
		$user_data['gender'] = $this->input->post('gender');
		if($this->input->post('dob'))
		$user_data['dob'] = $this->input->post('dob');
		if($this->input->post('user_mobile'))
		$user_data['mobile'] = $this->input->post('user_mobile');
		if($this->input->post('email'))
		$user_data['email'] = $this->input->post('email');
		/* Too Do for genrate loginId and Password */
		$user_data['login_id'] = "testId";
		$user_data['password'] = "123789" ;
		$user_data['created_by'] = 11 ;
		$user_data['created_date'] = date('Y-m-d H:i:s') ;
		/* END */	
		/* Too Do write a function in helper for image upload */
		if (isset($_FILES['photo_url'])) 
		{
			$temp_gal = $_FILES['photo_url']['tmp_name'];
			foreach ($temp_gal as $k => $img) 
			{
				$filename = $img;
				$path = 'user_image/' . time() . rand(34, 68768) . '_' . $_FILES['photo_url']['name'][$k];
				$destination = getcwd() . '/' . $path;
				move_uploaded_file($filename, $destination);
				$user_data['photo_url'] = $path;
			}
		}
		/*End*/
		$all_data['user_record'] = $user_data;
		/* End Staff Data */ 

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
		if($this->input->post('pincode'))
		$address_data['pincode'] = $this->input->post('pincode');
		if($this->input->post('pincode'))
		$address_data['pincode'] = $this->input->post('pincode');
		$all_data['address_record'] = $address_data;
		/* End Address Record*/
		if( $this->userModel->insert_user($all_data))
		{
			$registration_message['registration_message'] = "User Registered Successfully!";
			$this->template->getHeader(); 
			$this->load->view('user/user_registration' ,$registration_message);
			$this->template->getFooter(); 
		}
		else
		{
			$registration_message['registration_message'] = "User Not Registered , Please Contact To Admin!";
			$this->template->getHeader(); 
			$this->load->view('user/user_registration' ,$registration_message);
			$this->template->getFooter(); 
		}
	}
}
?>