<?php 

class AgamaModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        return $this->db->get('tm_agama')->result();
    }

    public function update($data){
        $this->nama_ruang_kelas = $data['nama_ruang_kelas'];
        $this->db->where('id_class', $data['id']);
        return $this->db->update('tm_class', $this);
    }

    public function store($data){
        $this->nama_ruang_kelas = $data['nama_ruang_kelas'];
        return $this->db->insert('tm_class', $data);
    }

    public function getById($id){
        return $this->db->where('id_class', $id)->get('tm_class')->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_class', array('id_class' => $id));
    }
}


?>