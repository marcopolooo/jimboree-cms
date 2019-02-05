<?php 

class TestimoniModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        $this->db->order_by('id', 'desc');
        return $this->db->get('tp_testimoni_parents')->result();
    }

    public function store($data){
        return $this->db->insert('tp_testimoni_parents', $data);
    }

    public function update($data){
        $this->testimoni = $data['testimoni'];
        $this->parents_id = $data['parents_id'];
        $this->db->where('id', $data['id']);
        return $this->db->update('tp_testimoni_parents', $this);
    }

    public function getById($id){
        $this->db->select('id, nama, alamat, telephone, role_parents, tm_agama.id_agama, nama_agama AS agama');
        $this->db->from('tp_testimoni_parents');
        $this->db->join('tm_agama', 'tm_agama.id_agama = tp_testimoni_parents.id_agama');
        $this->db->order_by('id', 'desc');
        return $this->db->where('id', $id)->get()->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tp_testimoni_parents', array('id' => $id));
    }
}

?>