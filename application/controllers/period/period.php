<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Period extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('session/session_model', 'sessionModel');
                $this->load->model('period/period_model', 'periodModel');
		$this->load->model('class_section/class_section_model','classSection');
		$this->load->helper('crud_model');
	}

	public function index() {
		
	}

	public function add_period()	{
            
            $session_id= 0;
            $season_id =0;
            
		$data = array();
                $postData = array();
                
                if($this->input->post())
		{
                       if($this->input->post('period_num'))
	  $postData['period_num'] = addslashes($this->input->post('period_num'));
                       
                    if($this->input->post('description'))
	  $postData['description'] = addslashes($this->input->post('description'));
	  if($this->input->post('start_time'))
	  $postData['start_time'] = addslashes($this->input->post('start_time')); 
	  if($this->input->post('end_time'))
	  $postData['end_time'] = addslashes($this->input->post('end_time'));
            if($this->input->post('session_id')){
	  $postData['session_id'] = addslashes($this->input->post('session_id'));
          $session_id =  $postData['session_id'];
            }
            
            if($this->input->post('season_id')){
	  $postData['season_id'] = addslashes($this->input->post('season_id'));
          $season_id =   $postData['season_id'];
            }
          
          
	  insert($postData , "ems_period_time") ;
	     redirect('period/period/list_period');
//          $data['season_id'] = $season_id;
//            $data['session_id'] = $session_id;
//          $this->template->getScript(); 
//		$this->template->getAdminHeader(); 
//		$this->template->getAdminLeftBar();	
//               $data['period'] = $this->periodModel->getPeriod($session_id,$season_id);
//		$data['session'] = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_session");
//		$this->load->view('period/period_add' ,$data);
//		$this->template->getFooter();   
                }else
                {
                    $data['season_id'] = $season_id;
            $data['session_id'] = $session_id;
                $this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
               $data['period'] = $this->periodModel->getPeriod($session_id,$season_id);
		$data['session'] = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_session");
		$this->load->view('period/period_add' ,$data);
		$this->template->getFooter(); 
                    
                }
		
	}
        
        public function edit_period($period_id)	{
            
            $session_id= 0;
            $season_id =0;
		$data = array();
                $postData = array();
                
                if($this->input->post())
		{
                       if($this->input->post('period_num'))
	  $postData['period_num'] = addslashes($this->input->post('period_num'));
                       
                    if($this->input->post('description'))
	  $postData['description'] = addslashes($this->input->post('description'));
	  if($this->input->post('start_time'))
	  $postData['start_time'] = addslashes($this->input->post('start_time')); 
	  if($this->input->post('end_time'))
	  $postData['end_time'] = addslashes($this->input->post('end_time'));
            if($this->input->post('session_id')){
	  $postData['session_id'] = addslashes($this->input->post('session_id'));
        
            }
            
            if($this->input->post('season_id')){
	  $postData['season_id'] = addslashes($this->input->post('season_id'));
        
            }
            
            if($this->input->post('period_id')){
	 $period_id = $this->input->post('period_id');
         
            }
            
          
          $conditions = array('period_id'=>$period_id);
	  update($postData,$conditions,"ems_period_time");
	      redirect('period/period/list_period');
         
                }else
                {
                    $filterColumns = array('period_id'=>$period_id);
                   $data['periodTime'] = retrieve_records($filterColumns , $offset = NULL, $limit = NULL, $sort = NULL, "ems_period_time");
                  
                    $data['season_id'] = $season_id;
            $data['session_id'] = $session_id;
                $this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
               $data['period'] = $this->periodModel->getPeriod($session_id,$season_id);
		$data['session'] = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_session");
               
                $data['season'] =$this->sessionModel->getSession_season($data['periodTime'][0]->session_id);
              
		$this->load->view('period/period_edit' ,$data);
		$this->template->getFooter(); 
                    
                }
		
	}
        
        public function list_period()
        {
               
            $session_id= -1;
            $season_id =-1;
             if($this->input->post('session_id')){

          $session_id =  addslashes($this->input->post('session_id'));
            }
            
            if($this->input->post('season_id')){
	
          $season_id =   addslashes($this->input->post('season_id'));
            }
          
          
	
	  //redirect('period/period/add_period');
          $data['season_id'] = $season_id;
            $data['session_id'] = $session_id;
          $this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
               $data['period'] = $this->periodModel->getPeriod($session_id,$season_id);
		$data['session'] = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_session");
		$this->load->view('period/period_list' ,$data);
		$this->template->getFooter();   
        }
        
        public function deleteperiod($period_id){
             $conditions = array('period_id'=>$period_id);
	
             delete($conditions,"ems_period_time");
             redirect('period/period/list_period');

        }




        public function retrive_session_seasion( $session_id)
	{	
             //if(!isset($dailtTimeTable['status']))
		$season = array();            
               
		$season['season'] = $this->sessionModel->getSession_season($session_id);
             
                $this->load->view('common/ajax/session_season',$season);

	}
	
	

}
?>