<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_model extends CI_Model 
{
 
    public function __construct()
    {
		parent::__construct();
		$this->load->database();
    }
	

}

/* End of file teacher_model.php */
