<?php 

class TestModel extends CI_Model
{
   public function __construct()
    {
            $this->load->database();
    }

   public function getMapel(){
    $query = $this->db->get('tm_subjects');
    return $query;
   }
}


?>