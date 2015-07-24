<?php
class Admin_template{
  public $controll;
   /* var $header = array(
                        'title' => '',
                        'meta_title' => '',
                        'meta_desc' => '',
                        'meta_keyword' => '',
                        'username'=>'',
                        'is_user'=>0,
                        'states' => array(),
                        'purpose' => array(),
                        'range' => array(),
                        'pcategory' => array()
                        ); */
						
	 
        
    var $header = array();
	var  $middle = array();
	var $footer = array();
    var $leftbar = array();
    var $rightbar = array();
	var $homecenter = array();
	var $homeright = array();
    var $foot = array();
    var $head = array();
    
    public function __construct(){
       
       $this->CI =& get_instance();
	   $this->CI->load->helper('crud_model');
       //$this->CI->load->library('auth');
  }
    
    //////////////// Header View//////////////
	public function getHeader(){
     
      $this->CI->load->view('admin_include/header',$this->header);
    }
   ///////////////////// END /////////////////////
   
   /////////////// Left View////////////////////
   public function getLeftbar(){
     $filterColumns = array();
	 $filterColumns['login_id'] = "A_admin";
	 $filterColumns['password'] = "123789";
	 
     $profile['profile_data'] =  retrieve_records($filterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_user");
	 $this->CI->load->view('admin_include/left_sidebar', $profile);
    }
   ///////////////END//////////////////////////
   
    ///////////////////// Center View /////////////////  
	 public function middle(){
      
      $this->CI->load->view('admin_include/middle',$this->middle);
    }
	///////////////////// END/////////////////////////
	
	////////////////////Footer View/////////////////
  
    public function getFooter(){
       
	    $this->CI->load->view('admin_include/footer',$this->footer);
    }
	
///////////////////////////END//////////////////////////	
   
}
?>