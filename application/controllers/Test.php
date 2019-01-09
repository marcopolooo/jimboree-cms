<?php 

class Test extends CI_Controller
{
    public function index(){
        $this->load->model('TestModel');
        $result = $this->TestModel->getMapel();
        print_r($result->result_array());
    }
}

?>