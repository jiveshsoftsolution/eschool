<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paper_model extends CI_Model 
{
    
    public function __construct()
    {
        parent::__construct();
		$this->load->database();
                $this->load->helper('student_model');
    }
		 
	
   public function get_paper_subject() {

        $this->db->select('ems_paper.paper_name,ems_subject.subject_name,ems_paper.paper_id');
        $this->db->from('ems_paper');
        $this->db->join('ems_subject', 'ems_paper.subject_id = ems_subject.subject_id');

        $paper_data = $this->db->get();
        return $paper_data->result();
    }
        
    public function get_paper_by_classSection_and_session($session_id,$class_section_id)
    {
        
        $this->db->select('ems_paper.paper_name,ems_paper.paper_id');
        $this->db->from('ems_paper');
        $this->db->join('ems_paper_details','ems_paper_details.paper_id=ems_paper.paper_id');
        $this->db->where('ems_paper_details.session_id', $session_id);
        $this->db->where('ems_paper_details.class_section_id', $class_section_id);
    }
      
    
    public function get_student_teacher_class_id($student_id,$session_id,$class_section_id)
	{
		$this->db->select('ems_student_teacher_class.student_teacher_class_id');
		$this->db->from('ems_student_teacher_class');
		$this->db->where('ems_student_teacher_class.student_id', $student_id);
		$this->db->where('ems_student_teacher_class.session_id', $session_id);    
                $this->db->where('ems_student_teacher_class.class_section_id', $class_section_id);    
		$student_teacher_query = $this->db->get();
                return $student_teacher_query->result();
	}
    
        
	public function get_optional_paper_data()
	{
		$this->db->select('ems_class.class_name,ems_section.section_name,ems_paper.paper_name,ems_student_optional_paper.paper_id,ems_class_section.class_section_id');
		$this->db->from('ems_student_optional_paper ');
		$this->db->join('ems_paper','ems_student_optional_paper.paper_id=ems_paper.paper_id');
		$this->db->join('ems_student_teacher_class','ems_student_teacher_class.student_teacher_class_id=ems_student_optional_paper.st_class_id');
		$this->db->join('ems_class_section','ems_student_teacher_class.class_section_id=ems_class_section.class_section_id');
		$this->db->join('ems_class','ems_class.class_id=ems_class_section.class_id');
		$this->db->join('ems_section','ems_section.section_id=ems_class_section.section_id');
				
		$student_teacher_query = $this->db->get();
		return $student_teacher_query->result();
	}
        public function get_teacher_paper_subject($teacher_id) {
$paperDta = array();
        $this->db->select('ems_subject.subject_id,ems_subject.subject_name');
        $this->db->from('ems_paper');
        $this->db->join('ems_subject', 'ems_paper.subject_id = ems_subject.subject_id');
        $this->db->join('ems_teacher_expertise', 'ems_teacher_expertise.paper_id = ems_paper.paper_id');
$this->db->where('ems_teacher_expertise.teacher_id', $teacher_id);
$this->db->group_by('ems_subject.subject_id');
        $subject_data = $this->db->get();
        $subjectResult = $subject_data->result();
        $i = 0;
        foreach($subjectResult as $subjectRow){
            
            $this->db->select('ems_paper.paper_name,ems_paper.paper_id');
        $this->db->from('ems_paper');
        $this->db->join('ems_subject', 'ems_paper.subject_id = ems_subject.subject_id');
        $this->db->join('ems_teacher_expertise', 'ems_teacher_expertise.paper_id = ems_paper.paper_id');
$this->db->where('ems_teacher_expertise.teacher_id', $teacher_id);
$this->db->where('ems_subject.subject_id', $subjectRow->subject_id);
               $paper_data = $this->db->get();
        $paperResult = $paper_data->result();
        $paperarray = array();
            foreach($paperResult as $paperRow){
               $paperarray[$paperRow->paper_id] =  $paperRow->paper_name;
        }
         $paperDta[$subjectRow->subject_name] = $paperarray;
           
        }
        return $paperDta;
      
    }
}