<?php

class Login extends CI_Controller
{
	public function index()
	{
		$checkSession = $this->session->has_userdata('token');
		if($checkSession){
			redirect(base_url('dashboard'));
		}
		$this->load->view('user/login');
    }	
}

?>