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
        $this->nama_agama = $data['nama_agama'];
        $this->db->where('id_agama', $data['id_agama']);
        return $this->db->update('tm_agama', $this);
    }

    public function store($data){
        $this->nama_agama = $data['nama_agama'];
        return $this->db->insert('tm_agama', $data);
    }

    public function getById($id){
        return $this->db->where('id_agama', $id)->get('tm_agama')->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_agama', array('id_agama' => $id));
    }
}


?>