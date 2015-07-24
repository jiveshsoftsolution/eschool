<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Subject extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('session/session_model', 'sessionModel');
		$this->load->model('class_section/class_section_model','classSection');
		$this->load->helper('crud_model');
	}

	public function index() {
		
	}

	public function add_subject()	{
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['ems_subject'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_subject");
		$this->load->view('subject_add' ,$data);
		$this->template->getFooter(); 
	}
	
	public function add_period() {
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();
		$data['session']  = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");		
		$data['season']  = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_season");	
		$data['ems_period_time'] = $this->sessionModel->getSession_season_period();
		$this->load->view('period_add',$data);
		$this->template->getFooter();
	}

	public function add_notice(){
		$classSectionData = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$classSectionData['class'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_class");
		$classSectionData['class_section'] = $this->classSection->getClass_section();
		$classSectionData['notice'] = $this->sessionModel->getClass_section_class_notice();
		$this->load->view('notice_add',$classSectionData);
		$this->template->getFooter(); 
	}
	
	public function insert_subject(){
	  $data = array();
	  if($this->input->post('subject_name'))
	  $data['subject_name'] = addslashes($this->input->post('subject_name'));
	  if($this->input->post('description'))
	  $data['description'] = addslashes($this->input->post('description'));
	  insert($data , "ems_subject") ;
	  redirect('subject/subject/add_subject');
	}

	public function insert_period(){
	  $data = array();
	  if($this->input->post('period_num'))
	  $data['period_num'] = addslashes($this->input->post('period_num'));
	  if($this->input->post('start_time'))
	  $data['start_time'] = addslashes($this->input->post('start_time'));
	  if($this->input->post('end_time'))
	  $data['end_time'] = addslashes($this->input->post('end_time'));
	  if($this->input->post('session_id'))
	  $data['session_id'] = addslashes($this->input->post('session_id'));
	  if($this->input->post('season_id'))
	  $data['season_id'] = addslashes($this->input->post('season_id'));
	  if($this->input->post('description'))
	  $data['description'] = addslashes($this->input->post('description'));
	  insert($data , "ems_period_time");
	  redirect('subject/subject/add_period');
	  
	}

	public function insert_notice(){
	  $data = array();
	  if($this->input->post('notice'))
	  $data['notice'] = $this->input->post('notice');
	  if($this->input->post('notice_for'))
	  $data['notice_for'] = $this->input->post('notice_for');
	  if($this->input->post('class_section_id'))
	  $data['class_section_id'] = $this->input->post('class_section_id');
	  if($this->input->post('class_id'))
	  $data['class_id'] = $this->input->post('class_id');
	  if($this->input->post('post_to_web'))
	  $data['post_to_web'] = true;
	  insert($data , "ems_notice") ;
	  redirect('subject/subject/add_notice');
	}
	  
}
?>