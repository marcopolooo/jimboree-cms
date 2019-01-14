<?php 

class ParentsModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        $this->db->order_by('id_parents', 'desc');
        return $this->db->get('tm_parents')->result();
    }

    public function update($data){
        $this->nama = $data['nama'];
        $this->db->where('id_parents', $data['id']);
        return $this->db->update('tm_parents', $this);
    }

    public function store($data){
        $this->nama = $data['nama'];
        return $this->db->insert('tm_parents', $data);
    }

    public function getById($id){
        return $this->db->where('id_parents', $id)->get('tm_parents')->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_parents', array('id_parents' => $id));
    }
}


?>