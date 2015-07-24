<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Exam extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('session/session_model', 'sessionModel');
		$this->load->model('exam/exam_model', 'examModel');
		$this->load->model('class_section/class_section_model','classSection');
		$this->load->helper('crud_model');
		$this->load->helper('student_model');
	}

	public function index() {
		
	}

	public function add_exam()
	{
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['all_exam'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_exam");
		$this->load->view('exam_add',$data);
		$this->template->getFooter(); 
	}

	public function insert_exam()
	{
		$data = array();
		if($this->input->post('exam_name'))
		$data['exam_name'] = addslashes($this->input->post('exam_name'));
		insert($data , "ems_exam") ;
		redirect('exam/exam/add_exam');
	}
	
	public function add_exam_period()
	{
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['exam'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_exam");
		$data['session'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");
		$data['all_exam_period'] = $this->examModel->get_exam_period_session_exam_type();
		$this->load->view('exam_period_add',$data);
		$this->template->getFooter(); 

	}

	public function insert_exam_period()
	{
		$data = array();
		if($this->input->post('exam_id'))
		$data['exam_id'] = addslashes($this->input->post('exam_id'));
		if($this->input->post('session_id'))
		$data['session_id'] = addslashes($this->input->post('session_id'));
		if($this->input->post('start_date'))
		$data['start_date'] = addslashes($this->input->post('start_date'));
		if($this->input->post('end_date'))
		$data['end_date'] = addslashes($this->input->post('end_date'));
		insert($data , "ems_exam_period") ;
		redirect('exam/exam/add_exam_period');
	}
	
	public function add_insert_marks()
	{
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['exam'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_exam");
		$data['session'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");
		$data['class_section'] = $this->classSection->getClass_section();
		$this->load->view('insert_marks_add',$data);
		$this->template->getFooter(); 

	}

	public function add_student_marks($session_id="",$class_section_id="",$exam_period_id="",$student_id="")
	{
		$data = array();
		$data['paper_data'] = $this->examModel->getpaper_by_class_section($class_section_id,$session_id);
		$data['session_id'] = $session_id;
		$data['student_id'] = $student_id;
		$data['exam_period_id'] = $exam_period_id;
		$this->load->view('add_student_marks',$data);
	}

	public function insert_exam_marks()
	{
		$data = array();
		if($this->input->post('exam_id'))
		$data['exam_id'] = addslashes($this->input->post('exam_id'));
		if($this->input->post('session_id'))
		$data['session_id'] = addslashes($this->input->post('session_id'));
		if($this->input->post('class_section_id'))
		$data['class_section_id'] = addslashes($this->input->post('class_section_id'));
		if($data['class_section_id']!=-1 && $data['session_id']!=-1)
		{
			$data['studentlist']= getStudentBySessionId_ClassSectionId($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL);
		}
		
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['exam'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_exam");
		$data['session'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");
		$data['class_section'] = $this->classSection->getClass_section();
		$data['exam_id'] 			= $data['exam_id'];
		$data['session_id'] 		= $data['session_id'];
		$data['class_section_id'] 	= $data['class_section_id'];
		$this->load->view('insert_marks_add',$data);
		$this->template->getFooter(); 
	}
	
	public function submit_student_marks()
	{
		$data = array();
        if ($this->input->post('hd_exam_period_id'))
        $data['exam_period_id'] = $this->input->post('hd_exam_period_id');

        if ($this->input->post('hd_student_id') & ($this->input->post('hd_session_id'))) {
			$st_class_id = $this->examModel->get_student_teacher_class_id($this->input->post('hd_student_id'), $this->input->post('hd_session_id'));
			$data['st_class_id'] = $st_class_id[0]->student_teacher_class_id;
		}

		$marks = array();
		$i = 0;
		foreach($this->input->post() as $key=>$value)
		{
			$marks[] = str_split($key,4);
			if($marks[$i][0]=="txt_")
			{
				$data['paper_id']  =	$marks[$i][1];
				$data['obtained_marks']  =	$value;			
				// print_r($marks[0][1]);
				insert($data, "ems_marks");
			}
			$i++;
		}
	}
}
?>