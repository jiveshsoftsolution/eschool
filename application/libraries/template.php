<?php
class template
{
	public $controll;
	var $adminHeader = array();
	var $studentHeader = array();
	var $coordinatorHeader = array();
	var $teacherHeader = array();
	var $parentHeader = array();
	var $footer = array();
	var $studentFooter = array();
	var $teacherFooter = array();
	var $adminLeftbar = array();
	var $studentLeftbar = array();
	var $teacherLeftbar = array();
	var $coordinatorLeftbar = array();
	var $parentLeftbar = array();
	var $script = array();

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('menu/menu_model', 'menuModel');
		$this->CI->load->model('parent/parent_model', 'parentModel');
		$this->CI->load->model('paper/paper_model', 'paperModel');
		$this->CI->load->model('class_section/class_section_model', 'classSectionModel');
		$this->CI->load->model('session/session_model','sessionModel');
	}

	public function getScript()
	{
		$this->CI->load->view('common/scripts',$this->script);
	}

	//////////////// Header View//////////////
	public function getAdminHeader()
	{
		$profile =  retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_school_profile");
		if(!isset($profile['status']))
		{
			$data['schoolName'] = $profile[0]->school_name;
			$data['schoolLogo'] = $profile[0]->school_logo;
		}
		else
		{
			$data['schoolName'] = "";
			$data['schoolLogo'] = "";
		}
		$user = $this->CI->session->userdata('user');
		$data['userName'] = $user['userName'];
		$data['adminMenu']	= $this->CI->menuModel->getUserTypeMenu('A');
		$this->CI->load->view('admin_include/header',$data);
	}

	public function getStudentHeader()
	{
		$profile =  retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_school_profile");
		if(!isset($profile['status']))
		{
			$data['schoolName'] = $profile[0]->school_name;
			$data['schoolLogo'] = $profile[0]->school_logo;
		}
		else
		{
			$data['schoolName'] = "";
			$data['schoolLogo'] = "";
		}
		//Student Menu Access Right
		$student = $this->CI->session->userdata('student');
		$data['studentMenu'] = $this->CI->menuModel->getStudentMenuAccess($student['student_id']);
		$data['studentName'] = $student['studentName'];
		$this->CI->load->view('student_include/header',$data);
	}

	public function getTeacherHeader()
	{
		$profile =  retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_school_profile");
		if(!isset($profile['status']))
		{
			$data['schoolName'] = $profile[0]->school_name;
			$data['schoolLogo'] = $profile[0]->school_logo;
		}
		else
		{
			$data['schoolName'] = "";
			$data['schoolLogo'] = "";
		}
		$teacher = $this->CI->session->userdata('user');
		$data['userName'] = $teacher['userName'];
		$data['teacherMenu'] = $this->CI->menuModel->getUserTypeMenu('T');
		$this->CI->load->view('teacher_include/header',$data);
	}

	public function getParentHeader()
	{
		$profile =  retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_school_profile");
		if(!isset($profile['status']))
		{
			$data['schoolName'] = $profile[0]->school_name;
			$data['schoolLogo'] = $profile[0]->school_logo;
		}
		else
		{
			$data['schoolName'] = "";
			$data['schoolLogo'] = "";
		}
		$parent = $this->CI->session->userdata('user');
		$data['userName'] = $parent['userName'];
		$data['email'] = $parent['email'];
		$data['parentMenu'] = $this->CI->menuModel->getUserTypeMenu('p');
		$this->CI->load->view('parent_include/header',$data);
	}

	public function getCoordinatorHeader()
	{
		$profile =  retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_school_profile");
		if(!isset($profile['status']))
		{
			$data['schoolName'] = $profile[0]->school_name;
			$data['schoolLogo'] = $profile[0]->school_logo;
		}
		else
		{
			$data['schoolName'] = "";
			$data['schoolLogo'] = "";
		}
		$user = $this->CI->session->userdata('user');
		$data['userName'] = $user['userName'];
		$data['coordinatorMenu'] = $this->CI->menuModel->getUserTypeMenu('C');
		$this->CI->load->view('coordinator_include/header',$data);
	}
	///////////////////// END /////////////////////

	/////////////// Left View////////////////////
	public function getAdminLeftBar()
	{
		$this->CI->load->view('admin_include/left_sidebar', $this->adminLeftbar);
	}

	public function getStudentLeftBar()
	{
		$studentInfo =  $this->CI->session->userdata('student');
		$studentClassSection = $this->CI->classSectionModel->get_student_Class_Section($studentInfo['student_id']);
		$this->studentLeftbar['studentName'] = $studentInfo['studentName'];
		$this->studentLeftbar['email'] = $studentInfo['email'];
		$this->studentLeftbar['fatherName'] = $studentInfo['fatherName'];
		$this->studentLeftbar['classSection'] = $studentClassSection['class_name'] . '-' . $studentClassSection['section_name'];
		$this->CI->load->view('student_include/left_sidebar', $this->studentLeftbar);
	}

	public function getTeacherLeftBar()
	{
		$teacher = $this->CI->session->userdata('user');
		$this->teacherLeftbar['userName'] = $teacher['userName'];
		$this->teacherLeftbar['email'] = $teacher['email'];
		$teacherPaper =  $this->CI->paperModel->get_teacher_paper_subject($teacher['staff_id']);
		$this->teacherLeftbar['teacherPaper'] = $teacherPaper;
		$this->CI->load->view('teacher_include/left_sidebar', $this->teacherLeftbar);
	}

	public function getParentLeftBar()
	{
		$parent = $this->CI->session->userdata('user');
		$this->parentLeftbar['userName'] = $parent['userName'];
		$this->parentLeftbar['email'] = $parent['email'];
		$currentSession =  $this->CI->sessionModel->getCurrent_Session();
		$studentData =  $this->CI->parentModel->getParentWard($parent['user_id'], $currentSession[0]->session_id);
		$this->parentLeftbar['wardData'] = $studentData;
		$this->CI->load->view('parent_include/left_sidebar', $this->parentLeftbar);
	}

	public function getCoordinatorLeftBar()
	{
		$this->CI->load->view('coordinator_include/left_sidebar', $this->coordinatorLeftbar);
	}
	///////////////END//////////////////////////

	////////////////////Footer View/////////////////
	public function getStudentFooter()
	{
		$this->CI->load->view('student_include/footer',$this->studentFooter);
	}

	public function getTeacherFooter()
	{
		$this->CI->load->view('teacher_include/footer',$this->teacherFooter);
	}

	public function getFooter()
	{
		$this->CI->load->view('common/footer',$this->footer);
	}
	
	public function getPopupFooter($footerDat = "")
	{
        $this->CI->load->view('common/popup_footer',$footerDat);
    }
	///////////////////////////END//////////////////////////	
}
?>