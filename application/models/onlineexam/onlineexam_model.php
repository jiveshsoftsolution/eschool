<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Onlineexam_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_online_exam_information()
	{
		$this->db->select('ems_online_exam.online_exam_id,ems_exam.exam_name,ems_online_exam.exam_duration,ems_online_exam.no_of_question,ems_online_exam.exam_date,ems_paper.paper_name,ems_subject.subject_name,ems_online_exam.class_section_id,ems_class.class_name,ems_section.section_name');
		$this->db->from('ems_online_exam');
		$this->db->join('ems_exam_period', 'ems_online_exam.exam_period_id = ems_exam_period.exam_period_id');
		$this->db->join('ems_exam', 'ems_exam.exam_id = ems_exam_period.exam_id');
		$this->db->join('ems_class_section', 'ems_online_exam.class_section_id = ems_class_section.class_section_id');
		$this->db->join('ems_class', 'ems_class.class_id = ems_class_section.class_id');
		$this->db->join('ems_section', 'ems_section.section_id = ems_class_section.section_id');
		$this->db->join('ems_paper', 'ems_paper.paper_id = ems_online_exam.paper_id');
		$this->db->join('ems_subject', 'ems_paper.subject_id = ems_subject.subject_id');
		$exam_query = $this->db->get();		
		return $exam_query->result();
	}

	public function get_online_exam_question($data)
	{
		insert($data, "ems_online_exam_que_marks");
		return $this->db->insert_id();
	}
	
	public function get_all_question_by_class_section_paper($class_section_id)
	{
		$exam_date_start = date('Y-m-d').' 00:00:00';
		$exam_date_end = date('Y-m-d').' 23:59:59';
		$this->db->select('ems_online_exam_que_marks.que_marks_id');
		$this->db->from('ems_online_exam');
		$this->db->join('ems_online_exam_que_marks', 'ems_online_exam.online_exam_id = ems_online_exam_que_marks.online_exam_id');
		//$this->db->join('ems_online_question_ans', 'ems_online_question_ans.que_marks_id = ems_online_exam_que_marks.que_marks_id');
		$this->db->where('ems_online_exam.class_section_id',$class_section_id ); 
		$this->db->where('ems_online_exam.exam_date >= ',$exam_date_start);
		$this->db->where('ems_online_exam.exam_date <= ',$exam_date_end);
		$exam_query = $this->db->get();
		if($exam_query->num_rows() > 0)
		{
			return $exam_query->result();
		}
		else
		{
			return 0;
		}
	
	}
	

	public function get_online_question_by_class_section($class_section_id,$que_no)
	{
		$this->db->select('ems_online_exam.online_exam_id,ems_online_exam_que_marks.que_no,ems_online_exam_que_marks.question,ems_online_question_ans.answer_a,ems_online_question_ans.answer_b,ems_online_question_ans.answer_c,ems_online_question_ans.answer_d,ems_online_question_ans.correct_ans,ems_online_exam_que_marks.que_marks_id');
		$this->db->from('ems_online_exam');
		$this->db->join('ems_online_exam_que_marks', 'ems_online_exam.online_exam_id = ems_online_exam_que_marks.online_exam_id');
		$this->db->join('ems_online_question_ans', 'ems_online_question_ans.que_marks_id = ems_online_exam_que_marks.que_marks_id');
		$this->db->where('ems_online_exam.class_section_id',$class_section_id ); 
		$this->db->where('ems_online_exam_que_marks.que_no',$que_no );
		$exam_query = $this->db->get();
		if($exam_query->num_rows() > 0)
		{
			return $exam_query->result();
		}
		else
		{
			return 0;
		}
	
	}

	public function get_class_section_by_student($student_id,$session_id)
	{
		$this->db->select('ems_class.class_name,ems_section.section_name');
		$this->db->from('ems_student_teacher_class');
		$this->db->join('ems_class_section', 'ems_class_section.class_section_id = ems_student_teacher_class.class_section_id');
		$this->db->join('ems_class', 'ems_class.class_id = ems_class_section.class_id');
		$this->db->join('ems_section', 'ems_section.section_id = ms_class_section.section_id');
		$this->db->where('ems_student_teacher_class.student_id',$student_id );
		$this->db->where('ems_student_teacher_class.session_id',$session_id );
		$class_section = $this->db->get();
		return $class_section->result();
	}

	public function get_paper_name_by_online_exam()
	{
		$this->db->select('ems_paper.paper_name');
		$this->db->from('ems_online_exam');
		$this->db->join('ems_paper', 'ems_paper.paper_id = ems_online_exam.paper_id');
		$this->db->where('ems_online_exam.class_section_id',$class_section_id ); 
		$this->db->where('ems_online_exam.exam_date',  '2014-04-12 00:00:00' );
		return  $this->db->get();
	}

    public function get_no_of_question_by_onlineexam_id($onlineexam_id)
	{
	   $this->db->select('count(ems_online_exam_que_marks.que_marks_id ) as no_of_question');
	   $this->db->from('ems_online_exam_que_marks');
	   $this->db->where('ems_online_exam_que_marks.online_exam_id ', $onlineexam_id);
	    $no_of_question = $this->db->get();  
		if($no_of_question->num_rows() > 0)
		{
		$result = $no_of_question->result();
		return  $result[0]->no_of_question;
		}
		else
		{
		 return $no_of_question->num_rows();
		}
	}


	public function get_no_of_question_of_onlineexam()
	{
		// $class_section_id
		$this->db->select('count(ems_online_exam_que_marks.que_marks_id ) as no_of_question');
		$this->db->from('ems_online_exam');
		$this->db->join('ems_online_exam_que_marks', 'ems_online_exam_que_marks.online_exam_id = ems_online_exam.online_exam_id');
		$this->db->where('ems_online_exam.class_section_id', 2);
		// $this->db->where('ems_online_exam.exam_date','2014-04-12 00:00:00');
		$no_of_question = $this->db->get();  
		$result = $no_of_question->result();
		return  $result[0]->no_of_question;
	}

	public function get_selected_answer($que_marks_id,$student_teacher_class_id)
	{
		$this->db->select('ems_online_exam_student_ans.student_ans,ems_online_exam_student_ans.ans_status');
		$this->db->from('ems_online_exam_student_ans');
		$this->db->join('ems_online_exam_que_marks', 'ems_online_exam_que_marks.que_marks_id = ems_online_exam_student_ans.que_marks_id');
		$this->db->where('ems_online_exam_student_ans.que_marks_id', $que_marks_id);
		$this->db->where('ems_online_exam_student_ans.student_teacher_class_id', $student_teacher_class_id);
		$answer = $this->db->get();
		if($answer->num_rows() > 0)
		{
                    $result = $answer->result();
                    $student_ansData = array(
                            'ans_status'=>$result[0]->ans_status, 
                            'student_ans'=>$result[0]->student_ans
                            );
			
			return $student_ansData;
		}
		else
		{
			return "F";
		}
	}

	public function getQuestion_answers($online_exam_id="")
	{
		$this->db->select('ems_online_exam_que_marks.que_no,ems_online_exam_que_marks.question,ems_online_exam_que_marks.que_marks,ems_online_question_ans.answer_a,ems_online_question_ans.answer_b,ems_online_question_ans.answer_c,ems_online_question_ans.answer_d,`ems_online_question_ans`.correct_ans,ems_paper.paper_id');
		$this->db->from('ems_online_question_ans');
		$this->db->join('ems_online_exam_que_marks', 'ems_online_exam_que_marks.que_marks_id = ems_online_question_ans.que_marks_id');
		$this->db->join('ems_online_exam', 'ems_online_exam.online_exam_id = ems_online_exam_que_marks.online_exam_id');
		$this->db->join('ems_paper', 'ems_online_exam.paper_id = ems_paper.paper_id');
		$this->db->join('ems_exam_period', 'ems_online_exam.exam_period_id = ems_exam_period.exam_period_id');
		$this->db->join('ems_class_section', 'ems_online_exam.class_section_id = ems_class_section.class_section_id');        
		$this->db->where('ems_online_exam_que_marks.online_exam_id',$online_exam_id );
		$question_answer = $this->db->get();
		return $question_answer->result();
	}
	
	public function get_subject_id_of_paper($paper_id="")
	{
		$this->db->select('ems_paper.subject_id');
		$this->db->from('ems_paper');
		$this->db->join('ems_subject', 'ems_paper.subject_id = ems_subject.subject_id');   
		$this->db->where('ems_paper.paper_id',$paper_id ); 		
		$question_answer = $this->db->get();
		return $question_answer->result();
	}
	
	public function get_online_exam_id($class_section_id="",$paper_id="",$exam_period_id="")
	{
		$this->db->select('ems_online_exam.*');
		$this->db->from('ems_online_exam');  
		$this->db->join('ems_class_section', 'ems_class_section.class_section_id = ems_online_exam.class_Section_id'); 
		$this->db->join('ems_paper', 'ems_paper.paper_id = ems_online_exam.paper_id'); 
		$this->db->join('ems_exam_period', 'ems_exam_period.exam_period_id = ems_online_exam.exam_period_id'); 
		$this->db->where('ems_online_exam.class_section_id',$class_section_id); 		
		$this->db->where('ems_online_exam.paper_id',$paper_id); 		
		$this->db->where('ems_online_exam.exam_period_id',$exam_period_id); 		
		$question_answer = $this->db->get();
		return $question_answer->result();
	}			
	
	public function save_online_exam_student_ans($online_exam_student_ans)
	{
		if($online_exam_student_ans != null)
		{
			$this->db->insert('ems_online_exam_student_ans', $online_exam_student_ans);
			return  TRUE ;
		}
		return  false ;
	}
	
	public function get_online_exam_details($class_section_id,$current_date)
	{
		$this->db->select('ems_online_exam.*,ems_paper.paper_name');
		$this->db->from('ems_online_exam');  
		$this->db->join('ems_paper', 'ems_paper.paper_id = ems_online_exam.paper_id'); 
		$this->db->where('ems_online_exam.class_section_id',$class_section_id); 		
		$this->db->where('DATE(ems_online_exam.exam_date)',$current_date); 				
		$this->db->limit(1); 	
		$exam_details = $this->db->get();		
		if($exam_details->num_rows()>0)
		{
			$exam_data_Array = array();
			foreach($exam_details->result() as $exam_data)
			{
				$exam_data_Array['online_exam_id'] 	= $exam_data->online_exam_id;
				$exam_data_Array['class_section_id']= $exam_data->class_section_id;
				$exam_data_Array['paper_id'] 		= $exam_data->paper_id;
				$exam_data_Array['exam_period_id'] 	= $exam_data->exam_period_id;
				$exam_data_Array['no_of_question'] 	= $exam_data->no_of_question;
				$exam_data_Array['exam_duration'] 	= $exam_data->exam_duration;
				$exam_data_Array['exam_date'] 		= $exam_data->exam_date;
				$exam_data_Array['paper_name'] 		= $exam_data->paper_name;				
				$this->db->select('COUNT(ems_online_exam_que_marks.que_marks_id)  as total_ques');
				$this->db->from('ems_online_exam_que_marks');  
				$this->db->join('ems_online_exam', 'ems_online_exam.online_exam_id = ems_online_exam_que_marks.online_exam_id'); 
				$this->db->where('ems_online_exam.online_exam_id',$exam_data->online_exam_id); 
				$total_ques = $this->db->get();	
				$total_ques_data = $total_ques->result();
				$exam_data_Array['total_ques'] 		= $total_ques_data[0]->total_ques;
			}
			return $exam_data_Array;
		}
		else
		{
			return 0;
		}
	}
	
	public function get_student_attempt_online_exam($student_teacher_class_id,$current_date)
	{
		$this->db->select('COUNT(ems_online_exam_student_ans.que_marks_id)  as attempt_ques');
		$this->db->from('ems_online_exam_que_marks');  
		$this->db->join('ems_online_exam_student_ans', 'ems_online_exam_student_ans.que_marks_id = ems_online_exam_que_marks.que_marks_id'); 
		$this->db->where('ems_online_exam_student_ans.student_teacher_class_id',$student_teacher_class_id); 		
		$this->db->where('DATE(ems_online_exam_student_ans.ans_date)',$current_date); 
		$exam_details = $this->db->get();
                
               $attempt_ques_result = $exam_details->result();
		//return $exam_details->result[0]->attempt_ques;
               return $attempt_ques_result[0]->attempt_ques;
                
               // die;
	}
	public function get_all_question_status_by_class_section_paper($class_section_id,$student_teacher_class_id)
	{
		$exam_date_start = date('Y-m-d').' 00:00:00';
		$exam_date_end = date('Y-m-d').' 23:59:59';
		$this->db->select('ems_online_exam_que_marks.que_no,ems_online_exam_que_marks.que_marks_id,ems_online_exam_student_ans.ans_status,ems_online_exam_student_ans.student_teacher_class_id');
		$this->db->from('ems_online_exam');
		$this->db->join('ems_online_exam_que_marks', 'ems_online_exam.online_exam_id = ems_online_exam_que_marks.online_exam_id');
		$this->db->join('ems_online_exam_student_ans', 'ems_online_exam_student_ans.que_marks_id = ems_online_exam_que_marks.que_marks_id');
		$this->db->where('ems_online_exam.class_section_id',$class_section_id ); 
		$this->db->where('ems_online_exam_student_ans.student_teacher_class_id',$student_teacher_class_id ); 
		$this->db->where('ems_online_exam.exam_date >= ',$exam_date_start);
		$this->db->where('ems_online_exam.exam_date <= ',$exam_date_end);
		$exam_query = $this->db->get();
		
		$allQuestionWithStatus = array();
		if($exam_query->num_rows() > 0)
		{
			
			$questionResult = $exam_query->result();
			foreach($questionResult as $questionRow){
			$allQuestionWithStatus[] = array(
			'student_teacher_class_id'=> $questionRow->student_teacher_class_id,
			'que_marks_id'=> $questionRow->que_marks_id,
			'ans_status'=> $questionRow->ans_status,
			'que_no'=> $questionRow->que_no			
			);
			}
			return $allQuestionWithStatus;
		}
		else
		{
			return 0;
		}
	
	}
	public function logout_onlineexam($class_section_id,$student_teacher_class_id)
	{
		$date_time	= date('Y-m-d h:m:s');
		$this->db->select("ems_online_exam_student_ans.ans_date");
		$this->db->from("ems_online_exam_student_ans");
		$this->db->join('ems_online_exam_que_marks','ems_online_exam_que_marks.que_marks_id','ems_online_exam_student_ans.que_marks_id'); 
		$this->db->join('ems_online_exam','ems_online_exam.online_exam_id','ems_online_exam.online_exam_id'); 
		$this->db->where('ems_online_exam.class_section_id',$class_section_id );
		$this->db->where('ems_online_exam_student_ans.student_teacher_class_id',$student_teacher_class_id );
		$this->db->limit(1);
		$start_time = $this->db->get();
		$start_time_data  = $start_time->result[0]->ans_date;
		$remain_time = (strtotime($date_time) - strtotime($start_time_data));
		return $remain_time;
	}
}