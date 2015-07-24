<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * checks if user is logged in. 
 * if not then displays login page
 */
if (!function_exists('loggedUser')) {
    function loggedUser() {
        $CI =& get_instance();
        $user_type = $CI->session->userdata('user_type');
        $userInfo = array();
        if($user_type == "A"){
            $user = $CI->session->userdata('user');	 
            $userInfo = array(
                'user_id'=> $user['user_id'],
                'user_type' =>  $user_type
            );
            
        }else if($user_type == "C"){
             $user = $CI->session->userdata('user');
              $userInfo = array(
                'user_id'=> $user['user_id'],
                'user_type' =>  $user_type
            );
            
        }else if($user_type == "T"){
              $user = $CI->session->userdata('user');
              $userInfo = array(
                'user_id'=> $user['staff_id'],
                'user_type' =>  $user_type
            );
            
        }else if($user_type == "S"){
                  $user = $CI->session->userdata('student');	
              $userInfo = array(
                'user_id'=> $user['student_id'],
                'user_type' =>  $user_type
            );
            
        }else if($user_type == "P"){
              $user = $CI->session->userdata('user');
              $userInfo = array(
                'user_id'=> $user['user_id'],
                'user_type' =>  $user_type
            );
            
        }else if($user_type == "H"){
            
        }
        
        return $userInfo ;
    }	
}
?>