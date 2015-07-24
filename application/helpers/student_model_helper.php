<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Get All Students on the basis of session_id and class_section_id */
	 function getStudentBySessionId_ClassSectionId($cond = NULL, $offset = 0, $limit = NULL, $sort = NULL){
                    $CI = & get_instance();
                    if ($cond != NULL) 
					{
                      foreach ($cond as $param => $item)
                      $CI->db->where($param, $item);
                   }
                   if ($sort != NULL) 
				   {
                     for ($i = 0; $i < count($sort); $i++)
                     $CI->db->order_by($sort['column'], $sort['order']);
                   }
                   if ($limit != NULL)
                    $CI->db->limit($limit, $offset);
                    $CI->db->select('emsstudent.*,emsparent.*,ems_student_address.*,ems_student_teacher_class.*');
                    $CI->db->from('emsstudent');
					$CI->db->join('emsparent', 'emsparent.student_Id = emsstudent.student_Id');
                    $CI->db->join('ems_student_teacher_class', 'ems_student_teacher_class.student_Id = emsstudent.student_Id');
                    $CI->db->join('ems_student_address', 'ems_student_address.student_Id = emsstudent.student_Id');
                    $query = $CI->db->get();
		           if ($query->num_rows() > 0) 
		           {
			          return $query->result();
		           }
		              else
		           {
			           $errordata = array('status' => 'No record found', 'result' => $query->num_rows());
		           }
		            $query->free_result();
		            return $errordata ;

           }
/* End */

    function getClass_section()
	{
		$CI = & get_instance();
		$CI->db->select('ems_class.class_name,ems_section.section_name,ems_class_section.*');
		$CI->db->from('ems_class_section');
		$CI->db->join('ems_class', 'ems_class.class_id = ems_class_section.class_id');
		$CI->db->join('ems_section', 'ems_section.section_id = ems_class_section.section_id');
		$classSection_query = $CI->db->get();
		return $classSection_query->result();
   }
   
   function get_profile()
   {
   
   }

?>
