<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Season_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	
	 public function getSeason($session_id){
	  
		 $this->db->select('ems_season.*');
                 
                  //ems_session_season
         $this->db->from('ems_season');
         
        $this->db->join('ems_session_season', 'ems_session_season.season_id = ems_season.season_id');
         $this->db->where('ems_session_season.session_id',$session_id);
		 $query = $this->db->get();
        return $query->result();
	  }
          
           public function getCurrent_season($season_id){
	  
		 $this->db->select('*');                
                   $this->db->join('ems_session_season', 'ems_session_season.season_id = ems_season.season_id');
                   $this->db->where('ems_season.start_date <=',date('Y-m-d')."00:00:00");
                    $this->db->where('ems_season.end_date >=',date('Y-m-d')."00:00:00");
                   $this->db->where('ems_session_season.season_id',$season_id);
         $this->db->from('ems_season');
		 $query = $this->db->get();
        return $query->result();
	  }	
}
