<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Study extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('StudyModel');
    }

    public function index(){
        $result['data'] = $this->StudyModel->getStudy();
        $this->load->view('study/index', $result);
    }

    public function edit($id){
        $result['data'] = $this->StudyModel->getStudyById($id);
        $this->load->view('study/edit', $result);
    }
}

?>