<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	
	
	
	function user_login($admin_id = NULL) {
            
            $userData = array();
            
              if ($admin_id != NULL) {

            $this->db->where('user_id', $admin_id);
           // $this->db->where('password', $luser['password']);
            $query = $this->db->get('ems_user');
	    if ($query->num_rows >= 1) {
              
                 foreach($query->result() as $user){
                      $userName = $user->first_name;
                     if($user->middle_name){
                       $userName = $userName." ".$user->middle_name;
                   }
                   if($user->last_name){
                       $userName = $userName." ".$user->last_name;
                   }
                      $userData = array('user_id' => $user->user_id,
                             'userName' => $userName
                                                        
                );
                    
              
               break;
                 }
                  return $userData;
             }else{
                 return 0;
             }
         }
	}
        function teacher_login($teacher_id = NULL) {
            $teacherData = array();
              if ($luser != NULL) {

            $this->db->where('staff_id', $teacher_id);
          //  $this->db->where('password', $luser['password']);
            $query = $this->db->get('ems_staff');
		
            if ($query->num_rows >= 1) {
                foreach($query->result() as $teacher){
                    $teacherName = $teacher->first_name;
                     if($teacher->middle_name){
                       $teacherName = $teacherName." ".$teacher->middle_name;
                   }
                   if($teacher->last_name){
                       $teacherName = $teacherName." ".$teacher->last_name;
                   }
                      $teacherData = array('staff_id' => $teacher->staff_id,
                             'teacherName' => $teacherName
                                                        
                );
                    
              
                return $teacherData;
                }
             }else{
                 return 0;
             }
         }
	}
        function student_login($student_id = NULL,$session_id) 
		{
				$studentData = array();
              if ($student_id != NULL) 
			  {
				$this->db->select('emsstudent.first_name,emsstudent.middle_name,emsstudent.last_name,emsstudent.student_Id,ems_student_teacher_class.class_section_id,ems_student_teacher_class.student_teacher_class_id');
				$this->db->from('ems_student_teacher_class');
				$this->db->join('emsstudent', 'emsstudent.student_Id = ems_student_teacher_class.student_Id');
				$this->db->where('ems_student_teacher_class.session_id', $session_id);                    
				$this->db->where('emsstudent.student_id', $student_id);
				//$this->db->where('emsstudent.password', $luser['password']);
				$query = $this->db->get();
		
            if ($query->num_rows >= 1) 
			{   
               $studentResult = $query->result();
			   foreach($studentResult as $studentRow){
			   $studentData = array(
			   'first_name'=> $studentRow->first_name,
			   'middle_name'=> $studentRow->middle_name,
			   'last_name'=> $studentRow->last_name,
			   'student_id'=> $studentRow->student_Id,
			   'class_section_id'=> $studentRow->class_section_id,
			   'student_teacher_class_id'=>$studentRow->student_teacher_class_id
			  );
				
			   }
			  return $studentData;
            }
			else
			{
                return 0;
            }
         }
	}
        
    function parent_login($parent_id = NULL) 
	{
        $parentData = array();
        if ($parent_id != NULL) 
		{
            
            $this->db->where('parent_id',$parent_id);
            $query = $this->db->get('emsparent');
		
            if ($query->num_rows >= 1) 
			{                 
                
                 foreach($query->result() as $user){
                      $userName = $user->father_first_name;
                     if($user->father_middle_name){
                       $userName = $userName." ".$user->father_middle_name;
                   }
                   if($user->father_last_name){
                       $userName = $userName." ".$user->father_last_name;
                   }
                      $parentData = array('user_id' => $user->user_id,
                             'userName' => $userName
                                                        
                );
                    
              
               break;
                 }
                  return $parentData;
                
            }
			else
			{
                return 0;
            }
        }
	}
        
         // To check login details for ems_login table.
          function main_login($login_user = NULL) {
            $userData = array();
            $user_login_data = array();
              if ($login_user != NULL) {

            $this->db->where('login_id', $login_user['login_id']);
            $this->db->where('password', $login_user['password']);
            $query = $this->db->get('ems_login');
		
            if ($query->num_rows >= 1) {
                 foreach($query->result() as $user_login){
                   $user_login_data = array('login_type' => $user_login->user_login_type, 'user_id' => $user_login->user_id);
                   return  $user_login_data;
                   }
               }
               else{
                  $user_login_data = array('login_type' => 0);
                  return $user_login_data;
             }
         }
	}
        
        
        
        
        
        
        
        
        
        
        
        
}