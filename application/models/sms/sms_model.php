<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sms_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
 
	public function getAllStudentForSendSms($session_Id, $class_section_Id)
	{
		$errordata = array();
		$this->db->select('emsstudent.first_name ,emsstudent.middle_name ,emsstudent.last_name,emsparent.parent_mobile,ems_student_teacher_class.session_id,ems_student_teacher_class.class_section_id');
		$this->db->from('emsstudent');
		$this->db->join('emsparent', 'emsstudent.student_id = emsparent.student_id');
	    $this->db->join('ems_student_teacher_class', 'emsstudent.student_id = ems_student_teacher_class.student_id');
		$this->db->where('ems_student_teacher_class.session_id', $session_Id);
        $this->db->where('ems_student_teacher_class.class_section_id', $class_section_Id);
		$query =  $this->db->get();
		if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else
		{
			$errordata = array('status' => 'No record found', 'result' => $query->num_rows());
		}
		$query->free_result();
		return $errordata ;
   }
   
   public function getSmsTemplate()
   {
        $errordata = array();
        $this->db->select('ems_sms_template.template_content,ems_sms_api.api_url');
        $this->db->from('ems_sms_template');
        $this->db->join('ems_sms_api','ems_sms_api.api_id = ems_sms_template.api_id');
        $templteQuery =  $this->db->get();
		if ($templteQuery->num_rows() > 0) 
		{
			return $templteQuery->result();
		}
		else
		{
			$errordata = array('status' => 'No record found', 'result' => $templteQuery->num_rows());
		}
		$templteQuery->free_result();
		return $errordata ;
       
   }
}