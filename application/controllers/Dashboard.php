<?php 

class Dashboard extends CI_Controller
{
	function __construct(){
		parent::__construct();
		middleware();
	}
    public function index(){
        $this->load->view('dashboard');
    }
}

?>