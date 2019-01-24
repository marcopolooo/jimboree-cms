<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('middleware')){
	function middleware(){
		$CI =& get_instance();
		  
		$checkSession = $CI->session->has_userdata('token');
		if(!$checkSession){
			$CI->session->set_flashdata('error', 'You have to login !');
			redirect(base_url());
		}
	}
}

?>