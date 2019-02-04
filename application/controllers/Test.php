<?php 

class Test extends CI_Controller
{
    public function index(){
        $string = "D:/xampp/htdocs/jimboree-cms/assets/uploads/school/2019/02/02/5.jpg";
        $str[] = explode("jimboree-cms/", $string);
        print_r($str);
        // $this->load->model('TestModel');
        // $result = $this->TestModel->getMapel();
        // print_r($result->result_array());
    }
}

?>