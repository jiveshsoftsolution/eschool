<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fee extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('class_section/class_section_model','classSection');
		$this->load->model('student/student_model','studentModel');
		$this->load->model('fee/fee_model','feeModel');
		$this->load->helper('crud_model');
	}

	public function index() {	}
	
	public function add_fee_type()
	{
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['fee_type'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_fee_type");
		$this->load->view('fee/fee_type_add',$data);
		$this->template->getFooter(); 	
	}
	
	public function insert_fee_type()
	{
		$data = array();
		if($this->input->post('fee_type_name'))
		$data['fee_type_name'] = addslashes($this->input->post('fee_type_name'));
		$this->input->post('refundable') ? $data['refundable'] = true : $data['refundable'] = false;
		$this->input->post('is_active') ? $data['is_active'] = true : $data['is_active'] = false;
		insert($data , "ems_fee_type") ;
		redirect('fee/fee/add_fee_type');
	}
	
	public function add_fee_setting()
	{
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['session'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");
		$data['month'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_month");
		$data['class_section'] = $this->classSection->getClass_section();
		$data['fee_type'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_fee_type");
		$data['fee_setting'] = $this->feeModel->getfee_settings();
		$this->load->view('fee/fee_setting_add',$data);
		$this->template->getFooter(); 	
	}
	
	public function insert_fee_setting()
	{
		$data = array();
		if($this->input->post('session_id'))
		$data['session_id'] = addslashes($this->input->post('session_id'));
		if($this->input->post('fee_type_id'))
		$data['fee_type_id'] = addslashes($this->input->post('fee_type_id'));
		if($this->input->post('amount'))
		$data['amount'] = addslashes($this->input->post('amount'));
		if($this->input->post('class_section'))
		{
			$class_section = implode(',',$this->input->post('class_section'));
			$data['class_section_id'] = $class_section;
		}
		if($this->input->post('month'))
		{
			$month = implode(',',$this->input->post('month'));
			$data['month_id'] = $month;
		}
		insert($data , "ems_fee_amount") ;
		redirect('fee/fee/add_fee_setting');
	}
	
	public function add_fee_submisssion()
	{
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['session'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");
		$data['month'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_month");
		$data['class_section'] = $this->classSection->getClass_section();
		$data['fee_setting'] = $this->feeModel->getfee_settings();
		$this->load->view('fee/fee_submission_add',$data);
		$this->template->getFooter(); 	
	}
	
	public function retrive_student_name($class_section_id)
	{
		$this->studentModel->get_student_name($class_section_id);
	}
}
?>