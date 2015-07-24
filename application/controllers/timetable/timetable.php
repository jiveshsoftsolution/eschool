<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Timetable extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('session/session_model','sessionModel');
		$this->load->model('season/season_model','seasonModel');
		$this->load->model('class_section/class_section_model','classSection');
		$this->load->helper('crud_model');
		$this->load->helper('student_model');
		$this->load->model('timetable/timetable_model','timetableModel');
	}

	public function index(){}

	public function createdailytimetable($session_id="",$season_id = "",$class_section_id="")
	{
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();
		$data['classSecton'] = getClass_section();
                if($session_id !="" && $season_id != "" && $class_section_id != ""){
                    $data['session_id'] = $session_id;
                    $data['season_id'] = $season_id;
                    $data['class_section_id'] = $class_section_id;
                }
                else{
                    
		if($this->input->post('session_id'))
		{
			$data['session_id'] =$this->input->post('session_id');
		}
		else
		{
			$currentSession = $this->sessionModel->getCurrent_Session();
			$data['session_id']  = $currentSession[0]->session_id;
		}
		$data['season_id'] = $this->input->post('season_id');
		$data['class_section_id'] =$this->input->post('class_section_id');
                
                }
		$data['session'] = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_session");
		$data['ems_class'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_class");
		$seasonfilterColumns = array('season_id'=>$data['season_id']);
		$data['season'] = retrieve_records($seasonfilterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_season");
		$periodfilterColumns= array('session_id'=>$data['session_id'],'season_id'=>$data['season_id']);
                $sortPeriod = array('column'=>'period_num',  'order'=>'asc');
                $period = retrieve_records($periodfilterColumns, $offset=NULL, $limit=NULL, $sortPeriod, "ems_period_time");
		$periodArray = array();
		if(!isset($period['status']))
		{
//                    echo '<pre>';
//                    print_r($period);
			foreach($period as $period)
			{
				$filterColumns = array('period_id' =>$period->period_id,'session_id'=>$data['session_id'],'season_id'=>$data['season_id'],'class_section_id'=>$data['class_section_id']	);
				$dailtTimeTable = retrieve_records($filterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_daily_timetable");
				$weekDayArray = array();
				if(!isset($dailtTimeTable['status']))
				{
					$weekDayArray = array();
					foreach($dailtTimeTable as $dailyRow)
					{
                                           
						$TfilterColumns = array('school_user_type_id'=>1,'staff_id'=>$dailyRow->teacher_id);
                                               
						$teachetData = retrieve_records($TfilterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_staff");
                                                
						$teacherName = "";
						$teacherName = $teachetData[0]->first_name;
						if($teachetData[0]->middle_name)
						{
							$teacherName = $teacherName." ".$teachetData[0]->middle_name;
						}
						if($teachetData[0]->last_name)
						{
							$teacherName = $teacherName." ".$teachetData[0]->last_name;
						}
						$PfilterColumns = array('paper_id'=>$dailyRow->paper_id);
						$paperData = retrieve_records($PfilterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_paper");
						$paperName = "";
						$paperName = $paperData[0]->paper_name;
						$weekDayArray[$dailyRow->week_day] = array(
																	'teacherName'=> $teacherName,
																	'teacher_id'=> $dailyRow->teacher_id,
																	'paperName'=>$paperName,
																	'paper_id'=>$paperData[0]->paper_id,
																	'daily_timetable_id'=>$dailyRow->daily_timetable_id
																	);
					}
				}
                                //.'-'.$period->start_time.'-'.$period->end_time
				$periodArray[$period->period_num.'-'.$period->period_id.'-'.$period->start_time.'-'.$period->end_time] = $weekDayArray;
				}
		}
               
		$data['period'] = $periodArray;
//                 echo '<pre>';
//                print_r($data);
//                die;
		$this->load->view('timetable/create_daily_timetable' ,$data);
		$this->template->getFooter(); 
	}
	
	public function allotteacherpaper($period_id,$week_day,$class_section_id,$session_id,$season_id,$teacher_id="",$paper_id="")
	{
		$paperData = array();
		$paperTeacher = array();
		$pagedata['period_id']=$period_id;
		$pagedata['week_day']=$week_day;
		$pagedata['class_section_id']=$class_section_id;
		$pagedata['teacher_id']= $teacher_id;
		$pagedata['paper_id'] = $paper_id;
		if($this->input->post())
		{   
			$session = $this->sessionModel->getCurrent_Session();
			$data['period_id']=$period_id;
			$data['week_day']=$week_day;
			$data['class_section_id']=$class_section_id;
			$data['session_id'] = $session_id;
			$data['season_id'] = $season_id;
			$data['teacher_id']= $this->input->post('teacher_id');
			$data['paper_id'] = $this->input->post('paper_id');
			$data['created_by'] = 11;
			$data['created_date'] = date('Y-m-d H:i:s') ;;
                        if($data['teacher_id'] > 0 && $data['paper_id'] > 0){
                            $this->timetableModel->save_daily_timetable($data);
                        }
			
            //echo "<script type='text/javascript'>parent.$.fancybox.close();</script>";
		
		redirect(base_url().'index.php/timetable/timetable/createdailytimetable/'.$session_id.'/'.$season_id.'/'.$class_section_id);
                
		}
		$pagedata['session_id'] = $session_id;
		$pagedata['season_id'] = $season_id;
		$pagedata['paper'] =  $this->timetableModel->getClass_section_paper($class_section_id);
                                      // $paper_id,$period_id,$session_id,$season_id,$week_day
		$pagedata['teacher'] =  $this->timetableModel->get_paper_teacher(1,1,$session_id,$season_id,'mon');
		$this->load->view('timetable/allot_teacher_paper' ,$pagedata);
                $this->template->getPopupFooter(); 
	}

	
	function deleteDailytimetable($daily_timetable_id,$season_id="",$session_id="",$class_section_id="")
	{
		$this->timetableModel->delete_daily_timetable($daily_timetable_id);
		if($session_id=="" && $class_section_id=="" && $class_section_id==""){
			redirect(base_url().'index.php/timetable/timetable/createdailytimetable/0/0/0');
		}else{
			redirect(base_url().'index.php/timetable/timetable/createdailytimetable/'.$session_id.'/'.$season_id.'/'.$class_section_id);
			
		}
		
		
	}

	public function mytimetable()
	{
		$data = array();
		$this->template->getHeader(); 
		$this->template->getLeftbar(); 
		$data['classSecton'] = getClass_section();
		$currentSession = $this->sessionModel->getCurrent_Session();
		$data['session_id']  = $currentSession[0]->session_id;
		$currentSeason = $this->seasonModel->getCurrent_season($currentSession[0]->session_id);
		$data['season_id'] = $currentSeason[0]->season_id;
		$studentDetail = $this->session->userdata('student');
		$data['class_section_id'] = $studentDetail[0]->class_section_id;
		$seasonfilterColumns = array('season_id'=>$data['season_id']);
		retrieve_records($seasonfilterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_season");
		$periodfilterColumns= array('session_id'=>$data['session_id'],'season_id'=>$data['season_id']);

		$period = retrieve_records($periodfilterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_period_time");
		$periodArray = array();
		if(!isset($period['status']))
		{
			foreach($period as $period)
			{
				$filterColumns = array('period_id' =>$period->period_id,'session_id'=>$data['session_id'],'season_id'=>$data['season_id'],'class_section_id'=>$data['class_section_id']);
				$dailtTimeTable = retrieve_records($filterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_daily_timetable");
				$weekDayArray = array();
				if(!isset($dailtTimeTable['status']))
				{
					$weekDayArray = array();
					foreach($dailtTimeTable as $dailyRow)
					{
						$TfilterColumns = array('school_user_type_id'=>1,'staff_id'=>$dailyRow->teacher_id);
						$teachetData = retrieve_records($TfilterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_staff");
						$teacherName = "";
						$teacherName = $teachetData[0]->first_name;
						if($teachetData[0]->first_name)
						{
							$teacherName = $teacherName." ".$teachetData[0]->middle_name;
						}
						if($teachetData[0]->first_name)
						{
							$teacherName = $teacherName." ".$teachetData[0]->last_name;
						}
						$PfilterColumns = array('paper_id'=>$dailyRow->paper_id);
						$paperData = retrieve_records($PfilterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_paper");
						$paperName = "";
						$paperName = $paperData[0]->paper_name;
						$weekDayArray[$dailyRow->week_day] = array(
																	'start_time' =>$period->start_time,
																	'end_time' =>$period->end_time,
																	'teacherName'=> $teacherName,
																	'teacher_id'=> $dailyRow->teacher_id,
																	'paperName'=>$paperName,
																	'paper_id'=>$paperData[0]->paper_id,
																	'daily_timetable_id'=>$dailyRow->daily_timetable_id
																	);
					}
				}
				$periodArray[$period->period_id] = $weekDayArray;
			}
		}
		$data['period'] = $periodArray;
		$this->load->view('timetable/student_daily_timetable' ,$data);
		$this->template->getFooter(); 
	}

	public function mytodaytimetable()
	{
		$data = array();
		$this->template->getHeader(); 
		$this->template->getLeftbar(); 
		$data['classSecton'] = getClass_section();
		$currentSession = $this->sessionModel->getCurrent_Session();
		$data['session_id']  = $currentSession[0]->session_id;
		$currentSeason = $this->seasonModel->getCurrent_season($currentSession[0]->session_id);
		$data['season_id'] = $currentSeason[0]->season_id;
		$studentDetail = $this->session->userdata('student');
		$data['class_section_id'] = $studentDetail[0]->class_section_id;
		$seasonfilterColumns = array('season_id'=>$data['season_id']);
		retrieve_records($seasonfilterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_season");
		$periodfilterColumns= array('session_id'=>$data['session_id'],'season_id'=>$data['season_id']);

		$period = retrieve_records($periodfilterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_period_time");
		$periodArray = array();
		if(!isset($period['status']))
		{
			foreach($period as $period)
			{
				$filterColumns = array('period_id' =>$period->period_id,'week_day'=>'tuesday','session_id'=>$data['session_id'],'season_id'=>$data['season_id'],'class_section_id'=>$data['class_section_id']);
				$dailtTimeTable = retrieve_records($filterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_daily_timetable");
				$weekDayArray = array();
				if(!isset($dailtTimeTable['status']))
				{
					$weekDayArray = array();
					foreach($dailtTimeTable as $dailyRow)
					{
						$TfilterColumns = array('school_user_type_id'=>1,'staff_id'=>$dailyRow->teacher_id);
						$teachetData = retrieve_records($TfilterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_staff");
						$teacherName = "";
						$teacherName = $teachetData[0]->first_name;
						if($teachetData[0]->first_name) 
						{
							$teacherName = $teacherName." ".$teachetData[0]->middle_name;
						}
						if($teachetData[0]->first_name)
						{
							$teacherName = $teacherName." ".$teachetData[0]->last_name;
						}
						$PfilterColumns = array('paper_id'=>$dailyRow->paper_id);
						$paperData = retrieve_records($PfilterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_paper");
						$paperName = "";
						$paperName = $paperData[0]->paper_name;
						$weekDayArray[] = array(
												'start_time' =>$period->start_time,
												'end_time' =>$period->end_time,
												'teacherName'=> $teacherName,
												'teacher_id'=> $dailyRow->teacher_id,
												'paperName'=>$paperName,
												'paper_id'=>$paperData[0]->paper_id,
												'daily_timetable_id'=>$dailyRow->daily_timetable_id
												);

					}
				}
				$periodArray[$period->period_id] = $weekDayArray;
			}
		}
		$data['period'] = $periodArray;
		$this->load->view('timetable/student_today_timetable' ,$data);
		$this->template->getFooter(); 
	}

	public function teachertimetable()
	{
		$teacgerDetail = $this->session->userdata('teacher');
		$data = array();
		$this->template->getScript(); 
		$this->template->getTeacherHeader(); 
		$this->template->getTeacherLeftBar();
		$currentSession = $this->sessionModel->getCurrent_Session();
		$data['session_id']  = $currentSession[0]->session_id;
		$currentSeason = $this->seasonModel->getCurrent_season($currentSession[0]->session_id);
		$data['season_id'] = $currentSeason[0]->season_id;
			
		$periodfilterColumns= array('session_id'=>$data['session_id'],'season_id'=>$data['season_id']);
		$period = retrieve_records($periodfilterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_period_time");

		$periodArray = array();
			if(!isset($period['status']))
			{
				foreach($period as $period)
				{
					$filterColumns = array('period_id' =>$period->period_id,'session_id'=>$data['session_id'],'season_id'=>$data['season_id'],'teacher_id'=>$teacgerDetail['staff_id']);
					$dailtTimeTable = retrieve_records($filterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_daily_timetable");
					$weekDayArray = array();
					if(!isset($dailtTimeTable['status']))
					{
						$weekDayArray = array();
						foreach($dailtTimeTable as $dailyRow)
						{
							$TfilterColumns = array('school_user_type_id'=>1,'staff_id'=>$dailyRow->teacher_id);
							$teachetData = retrieve_records($TfilterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_staff");
							$teacherName = "";
							$teacherName = $teachetData[0]->first_name;
							if($teachetData[0]->first_name)
							{
								$teacherName = $teacherName." ".$teachetData[0]->middle_name;
							}
							if($teachetData[0]->first_name)
							{
								$teacherName = $teacherName." ".$teachetData[0]->last_name;
							}
							$PfilterColumns = array('paper_id'=>$dailyRow->paper_id);
							$paperData = retrieve_records($PfilterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_paper");
							$paperName = "";
							$paperName = $paperData[0]->paper_name;
                                                        $ClassSection = getClass_section($dailyRow->class_section_id);
                                                       
							$weekDayArray[$dailyRow->week_day] = array(
                                                            'class_section'=>$ClassSection[0]->class_name.'-'.$ClassSection[0]->section_name,
                                                                                                'start_time' =>$period->start_time,
                                                                                                'end_time' =>$period->end_time,
                                                                                                'teacherName'=> $teacherName,
                                                                                                'teacher_id'=> $dailyRow->teacher_id,
                                                                                                'paperName'=>$paperName,
                                                                                                'paper_id'=>$paperData[0]->paper_id,
                                                                                                'daily_timetable_id'=>$dailyRow->daily_timetable_id
                                                                                                );

						}
					}
                                        
					$periodArray[$period->period_num.'-'.$period->period_id.'-'.$period->start_time.'-'.$period->end_time] = $weekDayArray;
					}
			}
		$data['period'] = $periodArray;
              
		$this->load->view('timetable/student_daily_timetable' ,$data);
		$this->template->getFooter(); 
	}
      
    public function retrive_paper_teacher_list($season_id , $session_id , $paper_id , $period_id ,$week_day ,$class_section_id)
	{	
             
		$teacher = array();             
		$teacher['teacher'] = $this->timetableModel->get_paper_teacher($paper_id,$period_id,$session_id,$season_id,$week_day); //get_paper_teacherList($paper_id);
                $this->load->view('common/ajax/paper_teacher_dropdown',$teacher);

	}

}
