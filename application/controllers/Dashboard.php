<?php 

class Dashboard extends CI_Controller
{
    public function index(){
        $checkSession = $this->session->has_userdata('token');
		if(!$checkSession){
			$this->session->set_flashdata('error', 'You have to login !');
			redirect(base_url());
		}
        $this->load->view('dashboard');
    }
}

?>