<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('menu/menu_model', 'menuModel');
		$this->load->helper('crud_model');
		$this->load->helper('student_model');
	}

	public function index() 
	{	
	}

	public function get_menu()	
    {
		$data = array();
		$this->template->getScript(); 
		$userTypeMenu	=$this->menuModel->getUserTypeMenu('A');
		
	}
        
    public function student_access($session_id , $student_Id)	
    {
		$data = array();
		$this->template->getScript(); 
		$studentMenu	= $this->menuModel->getStudentMenuAccess($student_Id);
		$data['studentMenu'] = $studentMenu ;
		$data['student_Id'] = $student_Id;
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();
		$this->load->view('student_menu/student_menu_access_right', $data);
		$this->template->getFooter();
	}
	
	public function addEdit_student_access()	
	{
		$sub_menu_id = 1;
		$student_Id = 2;
		if($this->input->post('student_Id'))
		{
			$student_Id = $this->input->post('student_Id');
		}
		if($this->input->post('sub_menu_id'))
		{
			$sub_menu_id = $this->input->post('sub_menu_id');
		}
		$data = array('sub_menu_id' => $sub_menu_id,'user_id' => $student_Id);              

		$studentMenu	= $this->menuModel->addEdit_student_assecc($data);
		if($studentMenu)
		{
			echo "success";
		}
		else
		{
			echo "failed";
		}
	}
                
    public function student_list($class_section_id = "" ,$session_id = "") 
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
        $data['session'] = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_session");
        $data['classSecton'] = getClass_section();

        $data['session_id'] = 0;
        $data['class_section_id'] = 0;
        $data['approvemsg'] = "";
        $data['apprrove'] = 0;
        $data['StudentAttendance'] = array();
        $data['studentListForSendSms'] = array();
        if ($this->input->post('session_id') > 0) 
		{
            $session_Id = (int) $this->input->post('session_id');
            $filterColumns['session_id'] = $session_Id;
            $data['session_id'] = $session_Id;
        }
        if ($this->input->post('class_section_id') > 0) 
		{
            $class_section_id = (int) $this->input->post('class_section_id');
            $filterColumns['class_section_id'] = $class_section_id;
            $data['class_section_id'] = $class_section_id;
        }

        if ($session_Id > 0 and $class_section_id > 0) 
        {
            $recordsFound = getStudentBySessionId_ClassSectionId($filterColumns, $offset, $limit, $sort);
            $data['studentListForSendSms'] = $recordsFound;            
        }
		
        $this->load->view('student_menu/student_list', $data);
        $this->template->getFooter();
    }	
}
?>