<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Online_exam extends CI_Controller 
{
    public function __construct() 
	{
        parent::__construct();
        $this->load->model('class_section/class_section_model', 'classSection');
        $this->load->helper('crud_model');
        $this->load->model('exam/exam_model', 'examModel');
		$this->load->model('menu/menu_model', 'menuModel');
        $this->load->model('onlineexam/onlineexam_model', 'onlineexamModel');
    }

    public function index() 
	{        
    }

    public function add_online_exam() 
	{
        $data = array();
        $this->template->getScript();
        $this->template->getAdminHeader();
        $this->template->getAdminLeftBar();
        $data['classSection'] = $this->classSection->getClass_section();
        $data['subject'] = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_subject");
        $data['paper'] = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_paper");
        $data['examperiod'] = $this->examModel->get_exam_period_session_exam_type();
        $data['online_exam_paper']   = $this->onlineexamModel->get_online_exam_information();
        $this->load->view('onlineexam/online_exam', $data);
        $this->template->getFooter();
    } 
    
    public function add_online_question($online_exam_id=null)
	{
		$data = array();
		$this->template->getScript();
		$this->template->getAdminHeader();
		$this->template->getAdminLeftBar();
		if($online_exam_id!=null)
			$data['online_exam_id'] = $online_exam_id;
		else
			$data['online_exam_id'] = 0;   
		$this->load->view('onlineexam/add_online_question', $data);
		$this->template->getFooter();  
    }  

    public function add_online_exam_for_paper() 
	{
		$data = array();
		if ($this->input->post('class_section_id'))
		$data['class_section_id'] = addslashes($this->input->post('class_section_id'));
		if ($this->input->post('paper_id'))
		$data['paper_id'] = addslashes($this->input->post('paper_id'));
		if ($this->input->post('exam_period_id'))
		$data['exam_period_id'] = addslashes($this->input->post('exam_period_id'));
		if ($this->input->post('no_of_question'))
		$data['no_of_question'] = addslashes($this->input->post('no_of_question'));
		if ($this->input->post('exam_date'))
		$data['exam_date'] = addslashes($this->input->post('exam_date'));
		if ($this->input->post('exam_duration'))
		$data['exam_duration'] = addslashes($this->input->post('exam_duration'));
		insert($data, "ems_online_exam");
		redirect('onlineexam/online_exam/add_online_exam');
    }
    
    public function add_online_exam_question_ans() 
	{
		$data_question_no = array();
		$data_question_ans = array();
		if($this->input->post('online_exam_id'))
		$data_question_no['online_exam_id'] = addslashes($this->input->post('online_exam_id'));
		if ($this->input->post('question'))
		$data_question_no['question'] = addslashes($this->input->post('question'));
		$question_no = $this->onlineexamModel->get_no_of_question_by_onlineexam_id($data_question_no['online_exam_id']);
		$data_question_no['que_no'] = $question_no  +1;
		if ($this->input->post('que_marks'))
		$data_question_no['que_marks'] = addslashes($this->input->post('que_marks'));
		$data_question_ans['que_marks_id']=  $this->onlineexamModel->get_online_exam_question($data_question_no);

		if($data_question_ans['que_marks_id'] > 0)
		{
			if ($this->input->post('answer_a'))
			$data_question_ans['answer_a'] = addslashes($this->input->post('answer_a'));
			if ($this->input->post('answer_b'))
			$data_question_ans['answer_b'] = addslashes($this->input->post('answer_b'));
			if ($this->input->post('answer_c'))
			$data_question_ans['answer_c'] = addslashes($this->input->post('answer_c'));
			if ($this->input->post('answer_d'))
			$data_question_ans['answer_d'] = addslashes($this->input->post('answer_d'));
			if ($this->input->post('correct_ans'))
			$data_question_ans['correct_ans'] = addslashes($this->input->post('correct_ans'));
			insert($data_question_ans, "ems_online_question_ans");
        }          
        //redirect('onlineexam/online_exam/add_online_question/'.$data_question_no['online_exam_id']);		
		redirect(base_url().'index.php/onlineexam/online_exam/get_question_answer_list/'.$data_question_no['online_exam_id']);		
    }
	
	public function get_question_answer_list($online_exam_id="")
	{
		if($this->input->post())
		{
			$data = array();
			$this->template->getScript();
			$this->template->getAdminHeader();
			$this->template->getAdminLeftBar();			
			$online_examData 		  = $this->onlineexamModel->get_online_exam_id($this->input->post('class_section_id'),$this->input->post('paper_id'),$this->input->post('exam_period_id'));	
			if(count($online_examData)>0)
			{
				$data['class_section_id'] = $this->input->post('class_section_id');
				$data['paper_id']		  = $this->input->post('paper_id');		
				$data['subject_id']		  = $this->input->post('subject_id');
				$data['exam_period_id']   = $this->input->post('exam_period_id');				
				$data['classSection'] 	  = $this->classSection->getClass_section();
				$data['subject'] 		  = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_subject");
				$data['paper'] 			  = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_paper");
				$data['examperiod'] 	  = $this->examModel->get_exam_period_session_exam_type();				
				$data['question_answer_list']   = $this->onlineexamModel->getQuestion_answers($online_examData[0]->online_exam_id);		
			}
			else
			{
				$data['classSection'] 	  = $this->classSection->getClass_section();
				$data['subject'] 		  = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_subject");
				$data['paper'] 			  = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_paper");
				$data['examperiod'] 	  = $this->examModel->get_exam_period_session_exam_type();
				
				$data['question_answer_list']   = $this->onlineexamModel->getQuestion_answers(0);
			}
			$this->load->view('onlineexam/question_answer_list', $data);
			$this->template->getFooter();
		}
		else
		{
			$data = array();
			$this->template->getScript();
			$this->template->getAdminHeader();
			$this->template->getAdminLeftBar();
			$filterColumns['online_exam_id'] = $online_exam_id;
			if($online_exam_id=="")
			{
				$data['classSection'] 	  = $this->classSection->getClass_section();
				$data['subject'] 		  = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_subject");
				$data['paper'] 			  = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_paper");
				$data['examperiod'] 	  = $this->examModel->get_exam_period_session_exam_type();
				$data['question_answer_list']   = $this->onlineexamModel->getQuestion_answers($online_exam_id);		
				$this->load->view('onlineexam/question_answer_list', $data);
				$this->template->getFooter();
			}
			else
			{
				$online_examData 		  = retrieve_records($filterColumns, $offset = NULL, $limit = NULL, $sort = NULL, "ems_online_exam");
				$data['class_section_id'] = $online_examData[0]->class_section_id;
				$data['paper_id']		  = $online_examData[0]->paper_id;		
				$subject_id				  = $this->onlineexamModel->get_subject_id_of_paper($data['paper_id']);
				$data['subject_id']		  = $subject_id[0]->subject_id;
				$data['exam_period_id']   = $online_examData[0]->exam_period_id;
				$data['classSection'] 	  = $this->classSection->getClass_section();
				$data['subject'] 		  = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_subject");
				$data['paper'] 			  = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_paper");
				$data['examperiod'] 	  = $this->examModel->get_exam_period_session_exam_type();
				$data['question_answer_list']   = $this->onlineexamModel->getQuestion_answers($online_exam_id);		
				$this->load->view('onlineexam/question_answer_list', $data);
				$this->template->getFooter();
			}
		}
	}

    public function onlineexam_student_home()
    {
        $online_exam_data = array();
        $this->template->getScript();
		$studnet_info = array();
		$studnet_info = $this->session->userdata('student');
		$current_date = date('Y-m-d');
		$online_exam_data['exam_data'] = $this->onlineexamModel->get_online_exam_details($studnet_info['class_section_id'],$current_date);
	
		//Student Menu Access Right
		$student = $this->session->userdata('student');
		$studentMenu	= $this->menuModel->getStudentMenuAccess($student['student_id']);
		$data['studentMenu'] = $studentMenu ;
		$this->template->getStudentHeader($data); 
		//End Of Student Menu
        
		$this->template->getStudentLeftBar();
        $this->load->view('onlineexam/onlineexam_student_home', $online_exam_data);
        $this->template->getStudentFooter();
    }

	public function attempt_question($next="")
    {
		$studentInfo = $this->session->userdata('student');
        $data_question = array();
        $data_answer = array();
		
		$allQuestionWithStatus = array();
		//$this->onlineexamModel->get_all_question_status_by_class_section_paper($studentInfo['class_section_id'],$studentInfo['student_teacher_class_id']);
		
		//$totalQues$this->onlineexamModel->get_student_attempt_online_exam($studentInfo['student_teacher_class_id'],date('Y-m-d'));
        if($this->input->post())
		{ 		
			if($this->input->post('que_no'))
            $question_no = $this->input->post('que_no');
			if($this->input->post('que_marks_id'))
            $data_answer['que_marks_id']= $this->input->post('que_marks_id'); 
			$student_teacher_class_id = $this->examModel->get_student_teacher_class_id($studentInfo['student_id'],1) ;
			$data_answer['student_teacher_class_id'] = $student_teacher_class_id[0]->student_teacher_class_id;
			$data_question['online_question'] =  $this->onlineexamModel->get_online_question_by_class_section($studentInfo['class_section_id'],$question_no);
			$existing_answer = "";
			$existing_answer = $this->onlineexamModel->get_selected_answer($data_answer['que_marks_id'],$studentInfo['student_teacher_class_id']);
		    if($existing_answer == "")
            {
				$updatedata['ans_status'] = addslashes($this->input->post('ans_status'));
					
				$updatedata['student_ans'] = addslashes($this->input->post('answer'));
										
				$conditions['student_teacher_class_id'] = $data_answer['student_teacher_class_id'];
				$conditions['que_marks_id'] = $data_answer['que_marks_id'];	

				update($updatedata,$conditions,"ems_online_exam_student_ans");
            }
            else
			{		
				//if($this->input->post('answer'))
				//{
					
					$updatedata['student_ans'] = addslashes($this->input->post('answer'));
					$updatedata['ans_status'] = addslashes($this->input->post('ans_status'));						
					$conditions['student_teacher_class_id'] = $data_answer['student_teacher_class_id'];
					$conditions['que_marks_id'] = $data_answer['que_marks_id'];		
			
					update($updatedata,$conditions,"ems_online_exam_student_ans");
				//}
			}
			if(isset($data_question['online_question'][0]->que_marks_id))
			$data_question['existing_answer'] =  $this->onlineexamModel->get_selected_answer($data_question['online_question'][0]->que_marks_id,$studentInfo['student_teacher_class_id'] ) ;
			
			else
			$data_question['existing_answer'] =  $this->onlineexamModel->get_selected_answer(0,$studentInfo['student_teacher_class_id']) ;			
			
			if($data_question['online_question']!=0)
			{
				$this->load->view('common/ajax/online_question_answer_paper',$data_question);
			}
			else
			{
			   $data_question['online_question'] =  $this->onlineexamModel->get_online_question_by_class_section(2,1);
			   $data_question['existing_answer'] =  $this->onlineexamModel->get_selected_answer($data_question['online_question'][0]->que_marks_id ,$studentInfo['student_teacher_class_id']) ;
			   $this->load->view('common/ajax/online_question_answer_paper',$data_question);
			}
        } 
		else
		{		
			if($next=="")
			{
				$next = 1;
				$question_no = $next ; 
				$data_question['next'] =  $next;
				$filterColumns['class_section_id'] = $studentInfo['class_section_id'];
				$filterColumns['paper_id'] = 1;
				$filterColumns['exam_period_id'] = 1;
				$time = array();
				$data_time  = array();
				$time = retrieve_records($filterColumns, $offset = NULL, $limit = NULL, $sort = NULL, "ems_online_exam");
                                
                               // print_r($time);
				$data_time['time'] = $time[0]->exam_duration;
				$session_time =  $data_time['time'];
				$data_question['online_question']=  $this->onlineexamModel->get_online_question_by_class_section($studentInfo['class_section_id'],$question_no);
				$data_question['existing_answer']=  $this->onlineexamModel->get_selected_answer($data_question['online_question'][0]->que_marks_id,$studentInfo['student_teacher_class_id']);
		
				$attempt_data = $this->onlineexamModel->get_student_attempt_online_exam($studentInfo['student_teacher_class_id'],date('Y-m-d'));
				$ClassSectionExanQuestion = $this->onlineexamModel->get_all_question_by_class_section_paper($studentInfo['class_section_id']); 
				if($attempt_data == 0)
				{
                                    $question_count = 0;
                                    
					foreach($ClassSectionExanQuestion as $que_marks_id)
					{
                                            if($question_count == 0)
                                            $ans_status = "NA";
                                            else
                                                $ans_status = "NV";
						$online_exam_student_ans = array(
															'student_teacher_class_id'=>$studentInfo['student_teacher_class_id'],
															'que_marks_id'=> $que_marks_id->que_marks_id,
															'ans_status'=>$ans_status,
                                                    'ans_date'=>date('Y-m-d H:i:s')
														);
						$this->onlineexamModel->save_online_exam_student_ans($online_exam_student_ans);
						$this->session->set_userdata('online_exam_start_time',$session_time);
                                                
                                                $question_count = $question_count +1;
					}
				}
				$allQuestionWithStatus = $this->onlineexamModel->get_all_question_status_by_class_section_paper($studentInfo['class_section_id'],$studentInfo['student_teacher_class_id']);
				$this->template->getScript();
				$this->load->view('onlineexam/header');				
				$this->load->view('onlineexam/onlineexam_attempt_question', $data_question);				
				
				$data_time['allQuestionWithStatus'] =  $allQuestionWithStatus;
				$this->load->view('onlineexam/left_sidebar',$data_time);
				$this->template->getFooter();
			}
			else
			{
				$data_question['online_question']=  $this->onlineexamModel->get_online_question_by_class_section($studentInfo['class_section_id'],$next);
				
				$existing_answer = $this->onlineexamModel->get_selected_answer($data_answer['que_marks_id'],$studentInfo['student_teacher_class_id']);
				if($existing_answer!= "F")
				{
					$updatedata['ans_status'] = addslashes($this->input->post('ans_status'));						
					$conditions['student_teacher_class_id'] = $data_answer['student_teacher_class_id'];
					$conditions['que_marks_id'] = $data_answer['que_marks_id'];			
					update($updatedata,$conditions,"ems_online_exam_student_ans");
				}
				else
				{
					$student_teacher_class_id = $this->examModel->get_student_teacher_class_id($studentInfo['student_id'],1) ;
					$data_answer['que_marks_id'] = $data_question['online_question'][0]->que_marks_id;
					$data_answer['student_teacher_class_id'] = $student_teacher_class_id[0]->student_teacher_class_id;
					$data_answer['ans_status'] = 'NA';
					insert($data_answer, "ems_online_exam_student_ans");
				}
				
				if($data_question['online_question']!=0)
				{
					$data_question['existing_answer']=  $this->onlineexamModel->get_selected_answer($data_question['online_question'][0]->que_marks_id,$studentInfo['student_teacher_class_id']);
					if($data_question['existing_answer']=="")
					$data_question['existing_answer']="";
				}
				else
				{
				  $data_question['online_question']=  $this->onlineexamModel->get_online_question_by_class_section($studentInfo['class_section_id'],1);
				  $data_question['existing_answer']=  $this->onlineexamModel->get_selected_answer($data_question['online_question'][0]->que_marks_id,$studentInfo['student_teacher_class_id']);
				  if($data_question['existing_answer']=="")
				  $data_question['existing_answer']="";
				}				
				$this->load->view('common/ajax/online_question_answer_paper',$data_question);
			}			
		}  
		//NV for Not Visited -> GRAY
		//NA for Not answered  ->RED
		//A for answered -> Green
		//MAR for Mark as Review -> Blue
		//NAMAR for Not Answered Mark as Review -> Light Blue		
    }  
	    
   /* public function attempt_question($prev="",$next="")
    {
        $data_question = array();
        $data_answer = array();
        if($this->input->post())
		{
			if($this->input->post('que_no'))
            $question_no = $this->input->post('que_no');
			
			if($this->input->post('que_marks_id'))
            $data_answer['que_marks_id']= $this->input->post('que_marks_id'); 
			$student_teacher_class_id = $this->examModel->get_student_teacher_class_id(58,7) ;
			$data_answer['student_teacher_class_id'] = $student_teacher_class_id[0]->student_teacher_class_id;
			
			$existing_answer = "";
			$existing_answer = $this->onlineexamModel->get_selected_answer($data_answer['que_marks_id']);
		    if($existing_answer)
            {
				$updatedata['student_ans'] = addslashes($this->input->post('answer'));				
				$conditions['student_teacher_class_id'] = $data_answer['student_teacher_class_id'];
				$conditions['que_marks_id'] = $data_answer['que_marks_id'];			
				
		 		update($updatedata,$conditions,"ems_online_exam_student_ans");
            }
            else
			{
				if($this->input->post('answer')!="false")
				{
					$data_answer['student_ans'] = addslashes($this->input->post('answer'));
					insert($data_answer, "ems_online_exam_student_ans");
				}
		    }
			//if($question_no == $this->onlineexamModel->get_no_of_question_of_onlineexam())
			//{
			//	$data['success'] = 'success' ; echo json_encode($data);exit;
				//redirect(base_url().'index.php/onlineexam/online_exam/attempt_question/');
			//}
			$existing_answer = $this->onlineexamModel->get_selected_answer($data_answer['que_marks_id']+1);
			$online_question = array();
			$online_question =  $this->onlineexamModel->get_online_question_by_class_section(2,$question_no + 1);
			$question_no = $next;
				
			$data_question['question'] = $question_no." . ".$online_question[0]->question;
			$body = "";
			$body = "<ul style='margin-left:25px'>";
			foreach($online_question as $online_questionData)
			{	
				if($existing_answer === "A")
				{
					$body .= "<li>A . <input type='radio' name='answer' value='A' checked='true' />".trim($online_questionData->answer_a)."</li>";
				}
				else
				{
					$body .= "<li>A . <input type='radio' name='answer' value='A'/>".trim($online_questionData->answer_a)."</li>";
				}
				if($existing_answer === "B")
				{
					$body .= "<li>B . <input type='radio' name='answer' value='B' checked='true'  />".trim($online_questionData->answer_b)."</li>";
				}
				else
				{
					$body .= "<li>B . <input type='radio' name='answer' value='B' />".trim($online_questionData->answer_b)."</li>";
				}	
				if($existing_answer === "C")
				{
					$body .= "<li>C . <input type='radio' name='answer' value='C' checked='true' />".trim($online_questionData->answer_c)."</li>";
				}
				else
				{
					$body .= "<li>C . <input type='radio' name='answer' value='C' />".trim($online_questionData->answer_c)."</li>";
				}
				if($existing_answer === "D")
				{
					$body .= "<li>D . <input type='radio' name='answer' value='D' checked='true'  />".trim($online_questionData->answer_d)."</li>";
				}
				else
				{
					$body .= "<li>D . <input type='radio' name='answer' value='D' />".trim($online_questionData->answer_d)."</li>";
				}
			}
			$body .= "</ul>";
			$body .= "<input type='hidden' id='que_no' name='que_no' value='".$online_question[0]->que_no."'/>";
			$body .= "<input type='hidden' id='que_marks_id' name='que_marks_id' value='".$online_question[0]->que_marks_id."'/>";
			$data_question['option'] = $body;
			
			$prev_next = ($prev + 1).",".($next + 1);
			
			$data_question['prev'] = '<a href="#" onclick="return prev('.$prev_next.');">Previous</a>';
			$data_question['next'] = '<a href="#" onclick="return save_and_next('.$prev_next.');">Next</a>';
			echo json_encode($data_question);
        } 
		else
		{
			if($prev == "" & $next=="")
			{
				$prev = 0;
				$next = 2;
				$question_no = $prev + 1; 
				$data_question['prev'] =  $prev;
				$data_question['next'] =  $next;
				$filterColumns['class_section_id'] = 2;
				$filterColumns['paper_id'] = 1;
				$filterColumns['exam_period_id'] = 3;
				$time = array();
				$data_time  = array();
				$time = retrieve_records($filterColumns, $offset = NULL, $limit = NULL, $sort = NULL, "ems_online_exam");
				$data_time['time'] = $time[0]->exam_duration;
				$data_question['online_question']=  $this->onlineexamModel->get_online_question_by_class_section(2,$question_no);
				$data_question['existing_answer']=  $this->onlineexamModel->get_selected_answer(0);
				if($data_question['existing_answer']=="")
				$data_question['existing_answer']="";
				$this->template->getScript();
				$this->load->view('onlineexam/header');
				$this->load->view('onlineexam/left_sidebar',$data_time);
				$this->load->view('onlineexam/onlineexam_attempt_question', $data_question);
				$this->template->getFooter();
			}
			else
			{
				$question_no = $next -2;
				$online_question = array();
				$online_question =  $this->onlineexamModel->get_online_question_by_class_section(2,$question_no);
				$existing_answer = $this->onlineexamModel->get_selected_answer($online_question[0]->que_marks_id);
				$body = "";
				$body = "<ul style='margin-left:25px'>";
				foreach($online_question as $online_questionData)
				{
					if($existing_answer === "A")
					{
						$body .= "<li>A . <input type='radio' name='answer' value='A' checked='true'/>".trim($online_questionData->answer_a)."</li>";
					}
					else
					{
						$body .= "<li>A . <input type='radio' name='answer' value='A'/>".trim($online_questionData->answer_a)."</li>";
					}
					if($existing_answer === "B")
					{
						$body .= "<li>B . <input type='radio' name='answer' value='B' checked='true' />".trim($online_questionData->answer_b)."</li>";
					}
					else
					{
						$body .= "<li>B . <input type='radio' name='answer' value='B' />".trim($online_questionData->answer_b)."</li>";
					}	
					if($existing_answer === "C")
					{
						$body .= "<li>C . <input type='radio' name='answer' value='C' checked='true'/>".trim($online_questionData->answer_c)."</li>";
					}
					else
					{
						$body .= "<li>C . <input type='radio' name='answer' value='C' />".trim($online_questionData->answer_c)."</li>";
					}
					if($existing_answer === "D")
					{
						$body .= "<li>D . <input type='radio' name='answer' value='D' checked='true' />".trim($online_questionData->answer_d)."</li>";
					}
					else
					{
						$body .= "<li>D . <input type='radio' name='answer' value='D' />".trim($online_questionData->answer_d)."</li>";
					}
				}
				$body .= "</ul>";
				$body .= "<input type='hidden' id='que_no' name='que_no' value='".$online_question[0]->que_no."'/>";
				$body .= "<input type='hidden' id='que_marks_id' name='que_marks_id' value='".$online_question[0]->que_marks_id."'/>";
				$data_question['option'] = $body;
				

				$data_question['question'] = $question_no." . ".$online_question[0]->question;

				$prev_next = ($prev - 1).",".($next - 1);
				
				if($prev==1)
				{
				}
				else
				{
					$data_question['prev'] = '<a href="#" onclick="return prev('.$prev_next.');">Previous</a>';
				}
				$data_question['next'] = '<a href="#" onclick="return save_and_next('.$prev_next.');">Next</a>';
				echo json_encode($data_question);
				}
		}               
    }  */
    
    public function logout_onlineexam()
    {
		$studentInfo = $this->session->userdata('student');
		$return_time = $this->onlineexamModel->logout_onlineexam($studentInfo['class_section_id'],$studentInfo['student_teacher_class_id']);
		$return_time ='00:30:00';
		//if($return_time==$this->session->userdata('online_exam_start_time'))
		if($return_time==$this->session->userdata('online_exam_start_time'))
		{
			//$this->template->getScript();
			//$this->template->getStudentHeader();
			//$this->template->getStudentLeftBar();
			$this->load->view('onlineexam/onlineexam_finish_question');
			//$this->template->getStudentFooter();
		}
    }
	
	
	public function online_exam_result() 
	{
        $data = array();
        $this->template->getScript();
        $this->template->getAdminHeader();
        $this->template->getAdminLeftBar();
        $data['classSection'] = $this->classSection->getClass_section();
        $data['subject'] = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_subject");
        $data['paper'] = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_paper");
        $data['examperiod'] = $this->examModel->get_exam_period_session_exam_type();
        $data['online_exam_paper']   = $this->onlineexamModel->get_online_exam_information();
        $this->load->view('onlineexam/online_exam_result', $data);
        $this->template->getFooter();
    }
	
	public function student_online_exam_details() 
	{
        $data = array();
        $this->load->view('onlineexam/student_exam_details');
    }
	
	public function onlineexam_result_graph()
	{
	    $data = array();
        $this->template->getScript();
        //Student Menu Access Right
		$student = $this->session->userdata('student');
		//echo '<pre>';
		//print_r($student); die;
		$studentMenu	= $this->menuModel->getStudentMenuAccess($student['student_id']);
		$data['studentMenu'] = $studentMenu ;
		$this->template->getStudentHeader($data); 
		//End Of Student Menu
        $data['paper'] = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_paper");
		$this->template->getStudentLeftBar();
		$this->load->view('onlineexam/online_result_graph',$data);
        $this->template->getFooter();
		
	}
}

//Online exam question Stateus
//NV for Not visited
//NA for Not Answered
//A for Answered
//MR for Have answered but marks as review
//NMR for Not have answered  but marks as review

?>