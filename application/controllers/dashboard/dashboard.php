<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('dashboard/dashboard_model','dashboard');
		$this->load->helper('student_model');
		$this->load->helper('crud_model');
		$this->load->model('student/student_model', 'studentModel');
		$this->load->model('menu/menu_model', 'menuModel');
		$this->load->model('class_section/class_section_model','classSection');
		$this->load->model('attendance/attendance_model', 'attendanceModel');
		$this->load->model('session/session_model','sessionModel');
		$this->load->model('season/season_model','seasonModel');
		$this->load->model('timetable/timetable_model','timetableModel');
		$this->load->model('notice/notice_model', 'noticeModel');
	}

	public function index() {}

	public function admin()
	{
		$data= array();
		$data['ems_class'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_class");
		$filterColumns = array('post_to_web'=>1);
		$data['ems_admin_notice'] = $this->noticeModel->getClass_section_class_notice();;
		$data['classSection'] = $this->classSection->getClass_section();
		$classStrength =            $this->getClassStrength();
		$classAttendanceStrength = $this->getTodayAbsentPresentLeaveStrengthOfStudent();
		$data['classCategory']   =   $classStrength['classCategory'] ;
		$data['classData']     =    $classStrength['classData'] ;
		$data['absentStudent'] =   $classAttendanceStrength['absentStudent'];
		$data['presentStudent'] =  $classAttendanceStrength['presentStudent'];
		$data['leaveStudent'] =    $classAttendanceStrength['leaveStudent'];
		$data['className'] =       $classAttendanceStrength['className'];
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();
		$this->load->view('dashboard/admin_dashboard',$data);
		$this->template->getFooter(); 
	}

	public function getClassStrength()
	{
		$classCategory = "";
		$classData = "";
		$count = 0;
		$classStrengthData = array();
		$classStrength = array();
		$classStrengthData['classStrength'] = $this->studentModel->get_class_strength(1);
		// code for Class strength//
		foreach($classStrengthData['classStrength']as $key=>$value)
		{
			if($count == 0)
			{
				$classCategory = $classCategory . "'$key'";
				$classData = $classData . $value;
			}
			else
			{
				$classCategory = $classCategory . ", '$key'";
				$classData = $classData . ",". $value;
			}
			$count = $count + 1;
		}
		//End
		$classStrength['classCategory'] =  $classCategory;
		$classStrength['classData'] =  $classData;
		return $classStrength;
	}
  
	public function getTodayAbsentPresentLeaveStrengthOfStudent()
	{
		$classAttendanceData = array();
		$className = "";
		$absentStudent = "";
		$presentStudent = "";
		$leaveStudent = "";
		$classAttendanceStrength = array();
		$classAttendanceData['classAttendance']  = $this->attendanceModel->get_class_attendance_strength(1);
		// code for today absent, present leave student's
		foreach( $classAttendanceData['classAttendance'] as $key=>$value)
		{
			$className = $key;
			$absentStudent = $value['absentStudent'];
			$presentStudent = $value['presentStudent'];
			$leaveStudent = $value['leaveStudent'];
		}
		// End	
		$classAttendanceStrength['absentStudent'] = $absentStudent;
		$classAttendanceStrength['presentStudent'] = $presentStudent;
		$classAttendanceStrength['leaveStudent'] = $leaveStudent;
		$classAttendanceStrength['className'] = $className;
		return $classAttendanceStrength; 
	}

	public function teacher()
	{
		$data= array();
		$data['classSection'] = getClass_section();
		$data['classStrength'] = $this->studentModel->get_class_strength(1);
		$this->template->getScript(); 
		$this->template->getTeacherHeader(); 
		$this->template->getTeacherLeftBar();
		$teacgerDetail = $this->session->userdata('teacher');
		$data['period'] = $this->teacher_timetable($teacgerDetail['staff_id']);
		$this->load->view('dashboard/teacher_dashboard',$data);
		$this->template->getTeacherFooter(); 
	}
	
	public function coordinator()
	{
		$data= array();
		$data['classSection'] = getClass_section();
		$data['classStrength'] = $this->studentModel->get_class_strength(1);
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();
		$this->load->view('dashboard/coordinator_dashboard',$data);
		$this->template->getFooter(); 
	}
	
	public function student()
	{
		$data= array();
		$data['classSection'] = getClass_section();
		$data['classStrength'] = $this->studentModel->get_class_strength(1);
		$this->template->getScript(); 
		$this->template->getStudentHeader(); 
		$this->template->getStudentLeftBar();
		$studentDetail = $this->session->userdata('student');	 
		$data['period'] = $this->student_timetable($studentDetail['class_section_id']);
		$data['student_notice'] =  $this->noticeModel->get_student_notice($studentDetail['class_section_id']);
		$this->load->view('dashboard/student_dashboard',$data);
		$this->template->getStudentFooter(); 
	}
	
	public function parents()
	{
		$data= array();
		$data['classSection'] = getClass_section();
		$data['classStrength'] = $this->studentModel->get_class_strength(1);
		$this->template->getScript(); 
		$this->template->getParentHeader(); 
		$this->template->getParentLeftBar();
		$this->load->view('dashboard/parent_dashboard',$data);
		$this->template->getStudentFooter(); 
	}
	
	public function principal()
	{
		$data= array();
		$data['classSection'] = getClass_section();
		$data['classStrength'] = $this->studentModel->get_class_strength(1);
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();
		$this->load->view('dashboard/principal_dashboard',$data);
		$this->template->getFooter(); 
	}
	
	public function user_dashboard($class_section_id)
	{
		if($class_section_id=="-1")
			$data['classStrength'] = $this->studentModel->get_class_strength(1);
		else
			$data['classSectionStrength'] = $this->studentModel->get_class_section_strength($class_section_id);;
			$this->load->view('common/ajax/class_section_strength_chart',$data);
	}   

	public function teacher_timetable($teacher_id)
	{
		$data = array();
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
				$filterColumns = array('period_id' =>$period->period_id,'session_id'=>$data['session_id'],'season_id'=>$data['season_id'],'teacher_id'=>$teacher_id);
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
																'class_section_name'=>$ClassSection[0]->class_name.'-'.$ClassSection[0]->section_name,
																'start_time' =>$period->start_time,
																'end_time' =>$period->end_time,
																'teacher_name'=> $teacherName,
																'teacher_id'=> $dailyRow->teacher_id,
																'paper_name'=>$paperName,
																'paper_id'=>$paperData[0]->paper_id,
																'daily_timetable_id'=>$dailyRow->daily_timetable_id
															);
					}
				}
				$periodArray[$period->period_num.'-'.$period->period_id.'-'.$period->start_time.'-'.$period->end_time] = $weekDayArray;
			}
		}
		return  $periodArray;
	}
        
	public function student_timetable($class_section_id)
	{
		$data = array();
		$periodArray = array();
		$currentSession = $this->sessionModel->getCurrent_Session();
		$data['session_id']  = $currentSession[0]->session_id;
		$currentSeason = $this->seasonModel->getCurrent_season($currentSession[0]->session_id);
		if(isset($currentSeason[0]))
		{
			$data['season_id'] = $currentSeason[0]->season_id;
			$data['class_section_id'] = $class_section_id;
			$periodfilterColumns= array('session_id'=>$data['session_id'],'season_id'=>$data['season_id']);
			$period = retrieve_records($periodfilterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_period_time");
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
							$PfilterColumns = array('paper_id'=>$dailyRow->paper_id);
							$paperData = retrieve_records($PfilterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_paper");
							if(isset($teachetData[0]->staff_id ) && isset($paperData[0]->paper_id) )
							{
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
								$paperName = "";
								$paperName = $paperData[0]->paper_name;
								$weekDayArray[$dailyRow->week_day] = array(
																			'start_time' =>$period->start_time,
																			'end_time' =>$period->end_time,
																			'teacher_name'=> $teacherName,
																			'teacher_id'=> $dailyRow->teacher_id,
																			'paper_name'=>$paperName,
																			'paper_id'=>$paperData[0]->paper_id,
																			'daily_timetable_id'=>$dailyRow->daily_timetable_id
																	);
							}
						}
					} 
					$periodArray[$period->period_num.'-'.$period->period_id.'-'.$period->start_time.'-'.$period->end_time] = $weekDayArray;
				}
			}
		}
		return  $periodArray;
	}
	
	public function class_strength($class_id)
	{
		if($class_id=="-1")
			$data['classStrength'] = $this->studentModel->get_class_strength(1);
		else
			$data['classSectionStrength'] = $this->studentModel->get_class_section_strength($class_id);
			$this->load->view('common/ajax/class_section_strength_chart',$data);
	} 
   
	public function today_attendance_class_strength($attendance_class_id)
	{
		$className = "";
		$absentStudent = "";
		$presentStudent = "";
		$leaveStudent = "";
		$classAttendance = array();
			if($attendance_class_id=="-1")
			{
				$classAttendanceStrength = $this->getTodayAbsentPresentLeaveStrengthOfStudent();
				$data['absentStudent'] =   $classAttendanceStrength['absentStudent'];
				$data['presentStudent'] =  $classAttendanceStrength['presentStudent'];
				$data['leaveStudent'] =    $classAttendanceStrength['leaveStudent'];
				$data['className'] =       $classAttendanceStrength['className'];
			}
			else
			{
				$classAttendance['classAttendance']  = $this->attendanceModel->get_classSection_attendance_strength($attendance_class_id,1);
				foreach($classAttendance['classAttendance'] as $key=>$value)
				{
					$className = $key;
					$absentStudent = $value['absentStudent'];
					$presentStudent = $value['presentStudent'];
					$leaveStudent = $value['leaveStudent'];
				}
				$data['absentStudent'] = $absentStudent; 
				$data['presentStudent'] = $presentStudent; 
				$data['leaveStudent'] = $leaveStudent; 
				$data['className'] = $className; 
			}
			$this->load->view('common/ajax/class_attendance_strength_chart',$data);
	} 
        
}
?>