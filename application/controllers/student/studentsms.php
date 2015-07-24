<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Studentsms extends CI_Controller {



public function __construct() {

parent::__construct();
$this->load->model('sms/sms_model','smsModel'); 
$this->load->model('class_section/class_section_model','classSection');
$this->load->helper('crud_model');
$this->load->helper('student_model');
}

public function index() {
	
}

public function send__sms_student()
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
	$data['session']  = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");
    $data['classSecton'] = getClass_section();
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
		$data['studentListForSendSms']= getStudentBySessionId_ClassSectionId($filterColumns, $offset, $limit, $sort);
	}
	else
	{
	  $data['studentListForSendSms']= getStudentBySessionId_ClassSectionId($filterColumns, $offset, $limit, $sort);
	
	}
    $this->load->view('student/sms/studentlist_for_sms' ,$data);
	$this->template->getFooter(); 
}


	
	




}
?>