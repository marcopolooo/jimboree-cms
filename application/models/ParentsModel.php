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
        $this->alamat = $data['alamat'];
        $this->id_agama = $data['id_agama'];
        $this->db->where('id_parents', $data['id_parents']);
        return $this->db->update('tm_parents', $this);
    }

    public function store($data){
        $this->nama = $data['nama'];
        $this->alamat = $data['alamat'];
        $this->id_agama = $data['id_agama'];
        return $this->db->insert('tm_parents', $data);
    }

    public function getById($id){
        $this->db->select('id_parents, nama, alamat, tm_parents.id_agama, tm_agama.nama_agama as agama');
        $this->db->from('tm_parents');
        $this->db->join('tm_agama', 'tm_agama.id_agama = tm_parents.id_agama');
        $this->db->order_by('nama', 'asc');
        $this->db->where('id_parents', $id);
        
        return $this->db->get()->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_parents', array('id_parents' => $id));
    }
}


?>