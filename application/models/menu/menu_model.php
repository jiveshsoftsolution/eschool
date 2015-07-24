<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model
{  
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	
	public function getUserTypeMenu($user_type) 
	{
		$studentMenu = array();
		$this->db->select('ems_menu.*');
		$this->db->from('ems_sub_menu');
		$this->db->where("ems_sub_menu.user_type",$user_type);
		$this->db->join('ems_menu', 'ems_menu.menu_id = ems_sub_menu.menu_id');
		$this->db->order_by("ems_sub_menu.menu_id", "ASC");
		$query = $this->db->get();
		
		if ($query->num_rows > 0) 
		{
			$menuResult = $query->result();
			foreach ($menuResult as $menu) 
			{
				$studentSubmenyMenu = array();
				$this->db->select('ems_sub_menu.*');
				$this->db->from('ems_sub_menu');
				$this->db->where("ems_sub_menu.user_type",$user_type);
				$this->db->where("ems_sub_menu.menu_id", $menu->menu_id);
				$submenuquery = $this->db->get();
				if ($submenuquery->num_rows > 0) 
				{
					$submenuresult = $submenuquery->result();
					foreach ($submenuresult as $submenu)
					{
						$studentSubmenyMenu[] = array(
														'sub_menu_id' => $submenu->sub_menu_id,
														'sub_menu_name' => $submenu->sub_menu_name,
														'sub_menu_url' => $submenu->sub_menu_url,
														'user_type' => $submenu->user_type,
														'menu_id' => $submenu->menu_id
														);
					}
					$studentMenu[$menu->menu_name] = $studentSubmenyMenu;
				}
			}
		}
		return $studentMenu;
	}

	public function getStudentMenuAccess($user_id) 
	{
		$studentMenu = array();
		$this->db->select('ems_menu.*');
		$this->db->from('ems_sub_menu');
		$this->db->where("ems_sub_menu.user_type", "S");
		$this->db->join('ems_menu', 'ems_menu.menu_id = ems_sub_menu.menu_id');
		$this->db->group_by("ems_sub_menu.menu_id", "desc");
		$query = $this->db->get();
		if ($query->num_rows > 0) 
		{
			$menuResult = $query->result();
			foreach ($menuResult as $menu) 
			{
				$studentSubmenyMenu = array();
				$this->db->select('ems_sub_menu.*');
				$this->db->from('ems_sub_menu');
				$this->db->where("ems_sub_menu.user_type", "S");
				$this->db->where("ems_sub_menu.menu_id", $menu->menu_id);
				$submenuquery = $this->db->get();
				if ($submenuquery->num_rows > 0) 
				{
					$submenuresult = $submenuquery->result();
					foreach ($submenuresult as $submenu) 
					{
						$userAccess = 'no';
						$this->db->select('ems_user_menu_access.*');
						$this->db->from('ems_user_menu_access');
						$this->db->join('ems_sub_menu', 'ems_user_menu_access.sub_menu_id = ems_sub_menu.sub_menu_id');
						$this->db->where("ems_sub_menu.user_type", "S");
						$this->db->where("ems_user_menu_access.sub_menu_id", $submenu->sub_menu_id);
						$this->db->where("ems_user_menu_access.user_id", $user_id);
						$submenuAccessquery = $this->db->get();
						if ($submenuAccessquery->num_rows == 1) 
						{
							$userAccess = 'yes';
						}
						$studentSubmenyMenu[] = array(
														'sub_menu_id' => $submenu->sub_menu_id,
														'sub_menu_name' => $submenu->sub_menu_name,
														'sub_menu_url' => $submenu->sub_menu_url,
														'user_type' => $submenu->user_type,
														'menu_id' => $submenu->menu_id,
														'userAccess' => $userAccess
														);
					}
					$studentMenu[$menu->menu_name] = $studentSubmenyMenu;
				}
			}
		}
		return $studentMenu;
	}

	public function addEdit_student_assecc($accessData)
	{
		if($accessData != Null)
		{
			$this->db->select('ems_user_menu_access.*');
			$this->db->where($accessData); 
			$this->db->from('ems_user_menu_access');
			$submenuAccessquery = $this->db->get();
			if ($submenuAccessquery->num_rows >= 1) 
			{
				$this->db->delete('ems_user_menu_access', $accessData); 
			}
			else
			{
				$this->db->insert('ems_user_menu_access', $accessData);
			}
			return true;
		}
		else
		{
			return false;
		}
	}
}