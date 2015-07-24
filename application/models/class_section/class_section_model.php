<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Class_section_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	
	 
	public function get_EmsClassSection()
	{
		$this->db->select('*');
		$this->db->from('ems_class_section');
		$query = $this->db->get();
		return $query->result();
	}
	 
	public function getClass_section()
	{
		$this->db->select('ems_class.class_name,ems_section.section_name,ems_class_section.*');
		$this->db->from('ems_class_section');
		$this->db->join('ems_class', 'ems_class.class_id = ems_class_section.class_id');
		$this->db->join('ems_section', 'ems_section.section_id = ems_class_section.section_id');
		$this->db->order_by('ems_class_section.class_section_id');
		$classSection_query = $this->db->get();
		return $classSection_query->result();
    }
  //class_section_id
        public function get_student_Class_Section($student_id)
	{
             $classSection = array();
		$this->db->select('ems_class_section.class_section_id');
		$this->db->from('ems_student_teacher_class');
                $this->db->join('ems_class_section', 'ems_student_teacher_class.class_section_id = ems_class_section.class_section_id');
               
		$this->db->where('ems_student_teacher_class.student_id', $student_id);
//		$this->db->where('ems_student_teacher_class.session_id', $session_id);    
		$student_class_section_query = $this->db->get();
		$student_class_section_result = $student_class_section_query->result();
                foreach($student_class_section_result as $row){
                    $this->db->select('ems_class.class_name, ems_section.section_name');
		$this->db->from('ems_class_section');
                $this->db->join('ems_class', 'ems_class.class_id = ems_class_section.class_id');
                $this->db->join('ems_section', 'ems_section.section_id = ems_class_section.section_id');
                $this->db->where('ems_class_section.class_section_id', $row->class_section_id);
                    $class_section_query = $this->db->get();
                    $class_section_result = $class_section_query->result();
                    foreach($class_section_result as $classSectionRow){
                        $classSection = array(
                            'class_name' => $classSectionRow->class_name,
                            'section_name' => $classSectionRow->section_name
                        );
                    }
        }
                return $classSection;
	}
	
}
