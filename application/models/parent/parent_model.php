<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parent_model extends CI_Model 
{
public function __construct()
    {
		parent::__construct();
		$this->load->database();
                  $this->load->model('class_section/class_section_model', 'classSection');
    }
    
    public function getParentWard($parent_id,$session_id){
        
        $classSection = array();
        $studentData = array();
                                $this->db->select('emsstudent.first_name,emsstudent.middle_name,emsstudent.last_name,emsstudent.student_Id,emsstudent.email,ems_student_teacher_class.class_section_id,ems_student_teacher_class.student_teacher_class_id');
				$this->db->from('ems_student_teacher_class');
				$this->db->join('emsstudent', 'emsstudent.student_Id = ems_student_teacher_class.student_Id');
                                $this->db->join('emsparent', 'emsparent.student_Id = ems_student_teacher_class.student_Id');
//                                $this->db->join('emsparent', 'emsstudent.student_Id = emsparent.student_Id');
				$this->db->where('ems_student_teacher_class.session_id', $session_id);                    
				$this->db->where('emsparent.parent_id', $parent_id);
				//$this->db->where('emsstudent.password', $luser['password']);
				$query = $this->db->get();
		  
            if ($query->num_rows >= 1) 
			{   
               $studentResult = $query->result();
			   foreach($studentResult as $studentRow){
                                                                            
                                                 $studentName = "";
						$studentName = $studentRow->first_name;
						if($studentRow->middle_name)
						{
							$studentName = $studentName." ".$studentRow->middle_name;
						}
						if($studentRow->last_name)
						{
							$studentName = $studentName." ".$studentRow->last_name;
						}
                               $classSection = $this->classSection->get_student_Class_Section($studentRow->student_Id);
                                 $studentData[$studentRow->student_Id] = array(
			   'studentName'=> $studentName,
			       
			   'classSection'=>$classSection['class_name'] . '-'. $classSection['section_name']
			  );
                        }
			   }
        
        
                       return $studentData;
                        
    }
    

}

/* End of file dashboard.php */
