<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Period_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	

	public function getPeriod($session_id,$season_id)
	{
            $periodData = array();
		$this->db->select('period_id,period_num,ems_period_time.description,start_time,end_time,ems_session.session_name,ems_season.season_name');
		$this->db->from('ems_period_time');
		$this->db->join('ems_session', 'ems_session.session_id = ems_period_time.session_id');
                $this->db->join('ems_season', 'ems_season.season_id = ems_period_time.season_id');
		$this->db->where('ems_period_time.session_id',$session_id);
                $this->db->where('ems_period_time.season_id',$season_id);
		$session_seasion_query = $this->db->get();
		if ($session_seasion_query->num_rows >= 1)
		{
		$session_seasion_result = $session_seasion_query->result();
                foreach($session_seasion_result as $row){
                   
                    $periodData[$row->period_id] = array(
                       'period_id'=>$row->period_id,
                          'period_num'=>$row->period_num,
                        'description'=>$row->description,
                        'start_time'=>$row->start_time,
                        'end_time'=>$row->end_time,
                        'session_name'=>$row->session_name,
                        'season_name'=>$row->season_name
                    );
                    
                }
		}else{
                    $periodData = array('status' => 'No result found', 'result' => $session_seasion_query->num_rows());
                }
                return $periodData;
	}

	
}