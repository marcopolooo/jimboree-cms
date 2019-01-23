<?php 

class TypeNilaiModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        return $this->db->get('tm_type_nilai')->result();
    }

    public function update($data){
        $this->desc = $data['desc'];
        $this->db->where('id', $data['id']);
        return $this->db->update('tm_type_nilai', $this);
    }

    public function store($data){
        $this->desc = $data['desc'];
        return $this->db->insert('tm_type_nilai', $data);
    }

    public function getById($id){
        return $this->db->where('id', $id)->get('tm_type_nilai')->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_type_nilai', array('id' => $id));
    }
}


?>