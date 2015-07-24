<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Class_section extends CI_Controller {

	public function __construct() {
	parent::__construct();
	$this->load->model('class_section/class_section_model','classSection');
	$this->load->helper('crud_model');
	}

	public function index() {
		
	}

	public function add_class()	{
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['ems_class'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_class");
		$this->load->view('class-section/class_add' ,$data);
		$this->template->getFooter(); 
	}
	
	public function add_section() {
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['ems_section'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_section");
		$this->load->view('class-section/section_add',$data);
		$this->template->getFooter();
	}

	public function add_class_section(){
		$classSectionData = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$classSectionData['ems_class'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_class");
		$classSectionData['ems_section'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_section");
		$classSectionData['ems_class_section'] = $this->classSection->getClass_section();
		$this->load->view('class-section/class_section_add',$classSectionData);
		$this->template->getFooter(); 
	}
		
	public function insert_class(){
	  $data = array();
	  if($this->input->post('class_name'))
	  $data['class_name'] = addslashes($this->input->post('class_name'));
	  insert($data , "ems_class") ;
	  redirect('class-section/class_section/add_class');
	}

	public function insert_section(){
	  $data = array();
	  if($this->input->post('section_name'))
	  $data['section_name'] = addslashes($this->input->post('section_name'));
	  insert($data , "ems_section");
	  redirect('class-section/class_section/add_section');
	  
	}

	public function insert_class_section(){
	  $data = array();
	  if($this->input->post('class_id'))
	  $data['class_id'] = addslashes($this->input->post('class_id'));
	  if($this->input->post('section_id'))
	  $data['section_id'] = addslashes($this->input->post('section_id'));
	  if($this->input->post('sequence'))
	  $data['sequence'] = addslashes($this->input->post('sequence'));
	  insert($data , "ems_class_section") ;
	  redirect('class-section/class_section/add_class_section');
	}
	  
}
?>