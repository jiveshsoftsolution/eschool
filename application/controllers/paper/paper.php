<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paper extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('class_section/class_section_model', 'classSection');
        $this->load->helper('crud_model');
        $this->load->model('paper/paper_model', 'paperModel');
        $this->load->model('onlineexam/onlineexam_model', 'onlineexamModel');
    }

    public function index() {
        
    }

   
    public function insert_paper()
    {
        $add_paper=array();
         if($this->input->post('paper_name'))
             $add_paper['paper_name']=$this->input->post('paper_name');
         if($this->input->post('subject_id'))
             $add_paper['subject_id']=$this->input->post('subject_id');
         
        insert($add_paper,"ems_paper");
        redirect('paper/paper/add_paper');
        
    }

    
    public function add_paper()	{
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
                $data['paper'] = $this->paperModel->get_paper_subject() ;
                $this->load->view('paper/add_paper' ,$data);
		$this->template->getFooter(); 
                
	}
    
    
        public function add_paper_details()
        {
                      
                $data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['session'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");
		$data['paper'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_paper");
		$data['class_section'] = $this->classSection->getClass_section();
		$this->load->view('paper/add_paper_details' ,$data);
		$this->template->getFooter(); 	
        }
        
        
        public function insert_paper_details() {

        $paper_details = array();
        if ($this->input->post('class_section_id'))
            $paper_details['class_section_id'] = $this->input->post('class_section_id');

        $this->input->post('is_optional') ? $paper_details['is_optional'] = true : $paper_details['is_optional'] = false;
        if ($this->input->post('session_id'))
            $paper_details['session_id'] = $this->input->post('session_id');
        
        if ($this->input->post('paper')) {

            $paper_id_list = implode(',', $this->input->post('paper'));
            $paper_id_array = explode(",", $paper_id_list);
            foreach ($paper_id_array as $paper_id) {
                $paper_details['paper_id'] = $paper_id;
                insert($paper_details, "ems_paper_details");
            }
            
     }
        redirect('paper/paper/add_paper_details');
  }
        
        
        
        
        public function add_optional_paper()
	{
		$data = array();
                $optional_paper=array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['session'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");
		$data['paper'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_paper");
		$data['class_section'] = $this->classSection->getClass_section();
                $data['student'] = getStudentBySessionId_ClassSectionId($filterColumns, $offset=NULL, $limit=NULL, $sort=NULL);
              
              
              
		//$data['fee_setting'] = $this->feeModel->getfee_settings();
		//$this->retrive_student_name(19);
		$this->load->view('paper/add_optional_paper',$data);
		$this->template->getFooter(); 	
	}
        
        
        
        public function insert_optional_paper() {
        $data = array();
        if ($this->input->post('session_id')) {
            $data['session_id'] = addslashes($this->input->post('session_id'));
        }
        if ($this->input->post('class_section_id')) {
           $data['class_section_id'] = addslashes($this->input->post('class_section_id'));
        }
        if ($this->input->post('student_id')) {
            $data['student_id'] = addslashes($this->input->post('student_id'));
        }
        $st_class_id = array();
        $st_class_id = $this->paperModel->get_student_teacher_class_id($data['student_id'], $data['session_id'], $data['class_section_id']);
        $optional_paper['st_class_id'] = $st_class_id[0]->student_teacher_class_id;

        if ($this->input->post('paper')) {
            $paper = implode(',', $this->input->post('paper'));
            $paper_id_list = implode(',', $this->input->post('paper'));
            $paper_id_array = explode(",", $paper_id_list);
            foreach ($paper_id_array as $paper_id) {
                $optional_paper['paper_id'] = $paper_id;
                insert($optional_paper, "ems_student_optional_paper");
            }
        }
       redirect('paper/paper/add_optional_paper');
    }

}

?>