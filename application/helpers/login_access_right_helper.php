<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * checks if user is logged in. 
 * if not then displays login page
 */
if (!function_exists('isLoggedIn')) {

    function isLoggedIn($controller_function = "") {
        
//** ControllerName_functionName**//
         $CI = & get_instance();
           $CI->load->model('menu/menu_model', 'menuModel');
           
        $coordinatorAccess = array(
            'student_add_student_information' => true,
            'student_studentlist' => true,
            'student_student_registraton'=>true
        );
       $adminMenu = $CI->menuModel->getUserTypeMenu('A');
        $teacherMenu = $CI->menuModel->getUserTypeMenu('T');
         $coordinatorMenu = $CI->menuModel->getUserTypeMenu('C');
          $parentMenu = $CI->menuModel->getUserTypeMenu('P');
           $studentMenu = $CI->menuModel->getUserTypeMenu('S');
      
        $AAccess = array();
         $TAccess = array();
          $SAccess = array();
           $PAccess = array();
            $CAccess = array();
           
        foreach ($adminMenu as $menu => $subMenu) {
            foreach ($subMenu as $subMenuAttribute) {
              $AAccess[$subMenuAttribute['sub_menu_url']] = true;
            }
        }
         foreach ($teacherMenu as $menu => $subMenu) {
            foreach ($subMenu as $subMenuAttribute) {
              $TAccess[$subMenuAttribute['sub_menu_url']] = true;
            }
        }
         foreach ($studentMenu as $menu => $subMenu) {
            foreach ($subMenu as $subMenuAttribute) {
              $SAccess[$subMenuAttribute['sub_menu_url']] = true;
            }
        }
         foreach ($parentMenu as $menu => $subMenu) {
            foreach ($subMenu as $subMenuAttribute) {
              $PAccess[$subMenuAttribute['sub_menu_url']] = true;
            }
        }
         foreach ($coordinatorMenu as $menu => $subMenu) {
            foreach ($subMenu as $subMenuAttribute) {
              $CAccess[$subMenuAttribute['sub_menu_url']] = true;
            }
        }
         
     //  print_r($AAccess);
       
              
        $status = $CI->session->userdata('is_logged_in');
        if (isset($status) && ($status)) {
      	  //echo '<pre>'; print_r($AAccess); die;  

            if ($CI->session->userdata('user_type') == 'A') {
                if (isset($AAccess[$controller_function])) {
                   return true;
                  
                } else {
                   
                   return false;
                }
                die;
            } else if ($CI->session->userdata('user_type') == 'C') {
                if (isset($CAccess[$controller_function])) {
                    return true;
                } else {
                    return false;
                }
            } else if ($CI->session->userdata('user_type') == 'T') {
                  if (isset($TAccess[$controller_function])) {
                    return true;
                } else {
                    return false;
                }
                
            } else if ($CI->session->userdata('user_type') == 'S') {
                  if (isset($SAccess[$controller_function])) {
                    return true;
                } else {
                    return false;
                }
                
            } else if ($CI->session->userdata('user_type') == 'P') {
                  if (isset($PAccess[$controller_function])) {
                    return true;
                } else {
                    return false;
                }
                
            }
        }else{
            return false;
        }
    }

}
?>