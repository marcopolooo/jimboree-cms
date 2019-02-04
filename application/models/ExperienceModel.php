<?php 

class ExperienceModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        $this->db->order_by('id', 'desc');
        return $this->db->get('tm_experience')->result();
    }

    public function update($data){
        $this->passing_universities = $data['passing_universities'];
        $this->people_working = $data['people_working'];
        $this->student_enrolled = $data['student_enrolled'];
        $this->happy_smiles = $data['happy_smiles'];
        $this->created_at = date("Y-m-d H:i:s");
        $this->db->where('id', $data['id']);

        return $this->db->update('tm_experience', $this);
    }

    public function store($data){
        $this->passing_universities = $data['passing_universities'];
        $this->people_working = $data['people_working'];
        $this->student_enrolled = $data['student_enrolled'];
        $this->happy_smiles = $data['happy_smiles'];
        $this->created_at = date("Y-m-d H:i:s");

        return $this->db->insert('tm_experience', $this);
    }

    public function getById($id){
        return $this->db->where('id', $id)->get('tm_experience')->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_experience', array('id' => $id));
    }
}


?>