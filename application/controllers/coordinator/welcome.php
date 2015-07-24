<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$this->load->view('common/header');
		$this->load->view('dashboard');
		$this->load->view('common/footer');
	}
	
	public function form()
	{
		$this->load->view('common/header');
		$this->load->view('form');
		$this->load->view('common/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */