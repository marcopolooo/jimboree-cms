<?php 

class StudyModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function getStudy(){
        return $this->db->get('tm_subjects')->result();
    }

    public function getStudyById($id){
        return $this->db->where('mid', $id)->get('tm_subjects')->result_array();
    }
}


?>