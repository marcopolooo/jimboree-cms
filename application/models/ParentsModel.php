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
        $this->telephone = $data['telephone'];
        $this->role_parents = $data['role_parents'];
        $this->id_agama = $data['id_agama'];
        $this->created_at = date('Y-m-d H:i:s');
        if(isset($data['image'])){
            $this->image = $data['image']['upload-data']['full_path'];
        }
        $this->db->where('id_parents', $data['id']);
        return $this->db->update('tm_parents', $this);
    }

    public function store($data){
        // $this->nama = $data['nama'];
        $data['image'] = $data['image']['upload-data']['full_path'];
        $data['created_at'] = date('Y-m-d H:i:s');
        return $this->db->insert('tm_parents', $data);
    }

    public function getById($id){
        $this->db->select('id_parents, nama, alamat, image, telephone, role_parents, tm_agama.id_agama, nama_agama AS agama');
        $this->db->from('tm_parents');
        $this->db->join('tm_agama', 'tm_agama.id_agama = tm_parents.id_agama');
        $this->db->order_by('id_parents', 'desc');
        return $this->db->where('id_parents', $id)->get()->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_parents', array('id_parents' => $id));
    }
}


?>