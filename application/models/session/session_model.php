<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session_model extends CI_Model
{  
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getSession_season_period()
	{
		$this->db->select('ems_session.session_name,ems_season.season_name,ems_period_time.*');
		$this->db->from('ems_period_time');
		$this->db->join('ems_session', 'ems_session.session_id = ems_period_time.session_id');
		$this->db->join('ems_season', 'ems_season.season_id = ems_period_time.season_id');
		$classSection_query = $this->db->get();
		return $classSection_query->result();
    }
	
	public function getClass_section_class_notice()
	{
		$this->db->select('ems_class.class_name, ems_section.section_name,ems_notice.*');
		$this->db->from('ems_notice');
		$this->db->join('ems_class_section', 'ems_class_section.class_section_id = ems_notice.class_section_id');
		$this->db->join('ems_class', 'ems_class.class_id = ems_class_section.class_id');
		$this->db->join('ems_section', 'ems_section.section_id = ems_class_section.section_id');
		$this->db->order_by("ems_notice.notice_id", "desc");
		$classSection_query = $this->db->get();
		
		return $classSection_query->result();
    }
    
	public function getCurrent_Session()
	{
		$this->db->select('*');
		$this->db->where('start_date <=',date('Y-m-d')."00:00:00");
		$this->db->from('ems_session');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getSession()
	{
		$this->db->select('*');
		$this->db->from('ems_session');
		$query = $this->db->get();
		return $query->result();
	}
        
        public function getSession_season($session_id)
	{
            $seasion = array();
		$this->db->select('ems_season.season_id,ems_season.season_name');
		$this->db->from('ems_season');
		$this->db->join('ems_session_season ', 'ems_session_season .season_id = ems_season.season_id');
		 $this->db->where('ems_session_season.session_id',$session_id);
		$seasion_query = $this->db->get();
		
                if ($seasion_query->num_rows >= 1)
		{
		$seasion_result = $seasion_query->result();
                foreach($seasion_result as $row){
                    $seasion[$row->season_id] = $row->season_name;
                }
                }else{
                    $seasion = array('status' => 'No result found', 'result' => $seasion_query->num_rows());
                }
                return $seasion;
    }
}