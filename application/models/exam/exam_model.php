<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exam_model extends CI_Model 
{
    
    public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
		 
	public function get_exam_period_session_exam_type()
	{
		$this->db->select('ems_session.session_name,ems_exam.exam_name,ems_exam_period.*');
		$this->db->from('ems_exam_period');
		$this->db->join('ems_exam', 'ems_exam.exam_id = ems_exam_period.exam_id');
		$this->db->join('ems_session', 'ems_session.session_id = ems_exam_period.session_id');
		$exam_query = $this->db->get();		
		return $exam_query->result();
    }
	
	public function getpaper_by_class_section($class_section_id,$session_id)
    {       
            $this->db->select('ems_paper.paper_name,ems_paper.paper_id');
            $this->db->from('ems_paper');
            $this->db->join('ems_paper_details', 'ems_paper_details.paper_id = ems_paper.paper_id');
            $this->db->where('ems_paper_details.session_id', $session_id);
            $this->db->where('ems_paper_details.class_section_id', $class_section_id);

            $paper_query = $this->db->get();
            return $paper_query->result();    
        
    }

	public function get_student_teacher_class_id($student_id,$session_id)
	{
		$this->db->select('ems_student_teacher_class.student_teacher_class_id');
		$this->db->from('ems_student_teacher_class');
		$this->db->where('ems_student_teacher_class.student_id', $student_id);
		$this->db->where('ems_student_teacher_class.session_id', $session_id);    
		$student_teacher_query = $this->db->get();
		return $student_teacher_query->result();
	}
}