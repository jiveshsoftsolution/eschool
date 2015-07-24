<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function index()
	{
		$this->load->view('login');
	}

	public function validatelogin()	
	{
		redirect(base_url().'index.php/admin/admin');	
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/login.php */