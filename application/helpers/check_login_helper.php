<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * checks if user is logged in. 
 * if not then displays login page
 */
if (!function_exists('isLoggedIn')) {
    function isLoggedIn() {
        $CI =& get_instance();
        $status = $CI->session->userdata('is_logged_in');
        return (isset($status) && ($status));
    }	
}
?>