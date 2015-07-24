<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Session extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('session/session_model', 'sessionModel');
		$this->load->model('class_section/class_section_model','classSection');
		$this->load->helper('crud_model');
	}

	public function index() {
		
	}

	public function add_session()	{
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['session'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");
		$this->load->view('session_add' ,$data);
		$this->template->getFooter(); 
	}
	
	public function add_season() {
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['season']  = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_season");	
		$this->load->view('season_add',$data);
		$this->template->getFooter();
	}

	public function insert_session(){
	  $data = array();
	  if($this->input->post('session_name'))
	  $data['session_name'] = addslashes($this->input->post('session_name'));
	  if($this->input->post('start_date'))
	  $data['start_date'] = addslashes($this->input->post('start_date')); 
	  if($this->input->post('end_date'))
	  $data['end_date'] = addslashes($this->input->post('end_date'));
	  insert($data , "ems_session") ;
	  redirect('session/session/add_session');
	}

	public function insert_season(){
	   $data = array();
	  if($this->input->post('season_name'))
	  $data['season_name'] = addslashes($this->input->post('season_name'));
	  if($this->input->post('start_date'))
	  $data['start_date'] = addslashes($this->input->post('start_date')); 
	  if($this->input->post('end_date'))
	  $data['end_date'] = addslashes($this->input->post('end_date'));
	  insert($data , "ems_season") ;
	  redirect('session/session/add_season');	  
	} 
}
?>