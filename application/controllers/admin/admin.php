<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('crud_model');
		$this->load->helper('student_model');
	}

	public function index() 
	{
		$this->dashboard();
	}

	public function dashboard()
	{
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();
	    $this->load->view('admin/dashboard');
		$this->template->getFooter(); 
	}

	public function student_registration()
	{
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();
	    $this->load->view('admin/student/student_registration');
		$this->template->getFooter();
	}
}

/* End of file dashboard.php */
