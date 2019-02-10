<?php 

class SubjectsModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        $this->db->order_by('nama_mapel', 'asc');
        return $this->db->get('tm_subjects')->result();
    }

    public function update($data){
        $this->nama_mapel = $data['nama_mapel'];
        $this->db->where('mid', $data['id']);
        return $this->db->update('tm_subjects', $this);
    }

    public function store($data){
        $this->nama_mapel = $data['nama_mapel'];
        return $this->db->insert('tm_subjects', $data);
    }

    public function getById($id){
        return $this->db->where('mid', $id)->get('tm_subjects')->result_array();
    }

    public function destroy($id){
        // $this->db->where('mid', $id);
        return $this->db->delete('tm_subjects', array('mid' => $id));
    }
}


?>