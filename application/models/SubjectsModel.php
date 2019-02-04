<?php 

class SubjectsModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function getStudy(){
        $this->db->order_by('mid', 'desc');
        return $this->db->get('tm_subjects')->result();
    }

    public function update($data){
        $this->nama_mapel = $data['nama_mapel'];
        $this->class_id = $data['class'];
        $this->teacher_id = $data['teacher'];
        $this->db->where('mid', $data['id']);
        return $this->db->update('tm_subjects', $this);
    }

    public function store($data){
        $this->nama_mapel = $data['nama_mapel'];
        $this->class_id = $data['class'];
        $this->teacher_id = $data['teacher'];
        return $this->db->insert('tm_subjects', $data);
    }

    public function getStudyById($id){
        return $this->db->where('mid', $id)->get('tm_subjects')->result_array();
    }

    public function destroy($id){
        // $this->db->where('mid', $id);
        return $this->db->delete('tm_subjects', array('mid' => $id));
    }
}


?>