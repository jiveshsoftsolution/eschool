<?php

class Accessdenied extends CI_Controller {

    public function Accessdenied() {
        parent::__construct();
    }

    function index() {
         $this->session->sess_destroy();
        $hdata['pageTitle'] = 'Access Denied';
       //$this->template->getHeader(); 
		  $this->load->view('accessdeniedpage');
		$this->template->getFooter(); 
    }

}

?>
