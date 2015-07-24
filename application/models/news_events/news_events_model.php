<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_events_model extends CI_Model
{  
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	
	public function getClass_section_class_notice()
	{		
		$this->db->select('ems_class.class_name, ems_section.section_name,ems_notice.*');
		$this->db->from('ems_notice');
		$this->db->join('ems_class_section', 'ems_class_section.class_section_id = ems_notice.class_section_id', 'left');
		$this->db->join('ems_class', 'ems_class.class_id = ems_class_section.class_id', 'left');
		$this->db->join('ems_section', 'ems_section.section_id = ems_class_section.section_id', 'left');
		$this->db->order_by("ems_notice.post_to_web", "ASC");
		$this->db->order_by("ems_notice.updated_date", "DESC");
		$classSection_query = $this->db->get();
		return $classSection_query->result();
	}
	
	
	public function get_student_notice($class_section_id = NULL)
	{ 
	    $notice_for_student =2;
		$notice_for_all = 1;
		$class_section_all = -1;
		$this->db->select('ems_notice.notice_subject , ems_notice.notice');
		$this->db->from('ems_notice');
		$this->db->where('ems_notice.class_section_id', $class_section_id);
		$this->db->or_where('ems_notice.class_section_id', $class_section_all);
		$this->db->or_where('ems_notice.notice_for', $notice_for_student);
		$this->db->or_where('ems_notice.notice_for', $notice_for_all); 
		$this->db->where('ems_notice.post_to_web', 1);
		$this->db->order_by("ems_notice.created_date", "desc");
		$student_notice_query = $this->db->get();
		
		$tdata = array();
        if ($student_notice_query->num_rows() > 0) {
		    return $student_notice_query->result();
            $student_notice_query->free_result();
        }
        else {
            $tdata = array('status' => 'No result found', 'result' => $student_notice_query->num_rows());
        }
        return $tdata;
   }

    
}