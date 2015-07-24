<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fee_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	
	 
	public function getfee_settings()
	{
		$this->db->select('ems_session.session_name,ems_fee_type.fee_type_name,ems_fee_amount.*');
		$this->db->from('ems_fee_amount');
		$this->db->join('ems_class_section', 'ems_class_section.class_section_id = ems_fee_amount.class_section_id');
		$this->db->join('ems_session', 'ems_session.session_id = ems_fee_amount.session_id');
		$this->db->join('ems_fee_type', 'ems_fee_type.fee_type_id = ems_fee_amount.fee_type_id');
		$fee_query = $this->db->get();
		$feedata = array();
		foreach($fee_query->result() as $rowData)
		{
			$data = array();
			$class_section = array();
			$data['class_section_id']	= $rowData->class_section_id;
			$class_section[] 			= $this->get_selected_class_section_name($rowData->class_section_id);
			//echo '<pre>';print_r($class_section); die;
			$data['class_section']		= $class_section;
			$data['session_name']   	= $rowData->session_name;
			$data['fee_type_name'] 		= $rowData->fee_type_name;
			$data['amount_id']   		= $rowData->amount_id;
			$data['session_id'] 		= $rowData->session_id;
			$data['month_id'] 			= $rowData->month_id;
			$data['created_date'] 		= $rowData->created_date;
			$data['amount'] 			= $rowData->amount;
			$data['fee_type_id'] 		= $rowData->fee_type_id;
			$data['month_name']  		= $this->get_selected_monthname($rowData->month_id);
			$feedata[] = $data;
		}

		return $feedata;
    }
	
	public function get_selected_monthname($month_id)
	{
		$this->db->select('month');
		$this->db->from('ems_month');
		$this->db->where('`month_id` in ', ('('.$month_id.')'), false);
		$month_name  =	$this->db->get();		
		$monthData = array();
		foreach($month_name->result() as $month)
		{
			$monthData[] = $month->month;
		}
		return $monthData;
	}
	
	public function get_selected_class_section_name($class_section_id)
	{
		$this->db->select('ems_class.class_name,ems_section.section_name');
		$this->db->from('ems_class_section');
		$this->db->join('ems_class','ems_class.class_id=ems_class_section.class_id');
		$this->db->join('ems_section','ems_section.section_id=ems_class_section.section_id');
		$this->db->where('`class_section_id` in ', ('('.$class_section_id.')'), false);
		$class_section_name  =	$this->db->get();		
		$class_section_Data = array();
		foreach($class_section_name->result() as $class_section)
		{
			$class_section_Data[]['class_section_name'] = $class_section->class_name.' - '.$class_section->section_name;
		}
		return $class_section_Data;
	}
	
}