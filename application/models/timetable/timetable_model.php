<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timetable_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get_period_time($session_id,$season_id)
	{
		$this->db->where('session_id',$session_id);
		$this->db->where('season_id',$season_id);
		$this->db->select('*');
		$this->db->from('ems_period_time');
		$query = $this->db->get();
		return $query->result();
	}

	public function getClass_section_paper($class_section_id)
	{
		$this->db->select('ems_paper.paper_id,ems_paper.paper_name');
		$this->db->from('ems_paper');
		$this->db->join('ems_paper_details', 'ems_paper_details.paper_id = ems_paper.paper_id');
		$this->db->where('ems_paper_details.class_section_id',$class_section_id);
		$class_section_paper_query = $this->db->get();
		if ($class_section_paper_query->num_rows >= 1)
		{
			return $class_section_paper_query->result();
		}
	}

	public function get_paper_teacher($paper_id,$period_id,$session_id,$season_id,$week_day)
	{
            $teacherArray= array();
		$this->db->select('*');
		$this->db->from('ems_daily_timetable');
		$this->db->where('session_id',$session_id);
		$this->db->where('season_id',$season_id);
		$this->db->where('period_id',$period_id);
		$this->db->where('week_day',$week_day);
		$teacher_query = $this->db->get();
		$teacher_array = array();
		if ($teacher_query->num_rows >= 1) 
		{
			foreach($teacher_query->result() as $rwo)
			{
				$teacher_array[] = $rwo->teacher_id;
			}
		}
               
		$this->db->select('ems_staff.first_name,ems_staff.middle_name,ems_staff.last_name,ems_staff.staff_id');
		$this->db->from('ems_staff');
		$this->db->join('ems_teacher_expertise', 'ems_teacher_expertise.teacher_id = ems_staff.staff_id');
		$this->db->where('ems_teacher_expertise.paper_id',$paper_id);
		if(count($teacher_array)>0)
		{
			$this->db->where_not_in('staff_id',$teacher_array);
		}
		$paper_teacher_query = $this->db->get();
               
		if ($paper_teacher_query->num_rows >= 1) 
		{
			$teacherResult = $paper_teacher_query->result();
                        foreach($teacherResult as $teacher){
                            
                            $teacherName = $teacher->first_name;
                     if($teacher->middle_name){
                       $teacherName = $teacherName." ".$teacher->middle_name;
                   }
                   if($teacher->last_name){
                       $teacherName = $teacherName." ".$teacher->last_name;
                   }
                          
                           
                            $teacherArray[$teacher->staff_id] =  $teacherName;
                        }
                        
		}
                return $teacherArray;
	}

	public function save_daily_timetable($daily_timetable)
	{
		$this->db->insert('ems_daily_timetable', $daily_timetable);
	}

	public function delete_daily_timetable($daily_timetable_id)
	{
		$this->db->delete('ems_daily_timetable', array('daily_timetable_id' => $daily_timetable_id)); 
	}
        
        function get_paper_teacherList($paper_id){
            $this->db->select('ems_staff.first_name,ems_staff.middle_name,ems_staff.last_name,ems_staff.staff_id');
		$this->db->from('ems_staff');
		$this->db->join('ems_teacher_expertise', 'ems_teacher_expertise.teacher_id = ems_staff.staff_id');
		$this->db->where('ems_teacher_expertise.paper_id',$paper_id);
				$paper_teacher_query = $this->db->get();
		if ($paper_teacher_query->num_rows >= 1) 
		{
			return $paper_teacher_query->result();
		}
            
        }
}