<?php 

class ParentsModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        $this->db->order_by('id', 'desc');
        return $this->db->get('tm_about_us')->result();
    }

    public function update($data){
        $this->title = $data['title'];
        $this->desc = $data['desc'];
        $this->desc2 = $data['desc2'];
        $this->db->where('id', $data['id']);
        return $this->db->update('tm_about_us', $this);
    }

    public function store($data){
        $this->title = $data['title'];
        $this->desc = $data['desc'];
        $this->desc2 = $data['desc2'];
        return $this->db->insert('tm_about_us', $this);
    }

    public function getById($id){
        return $this->db->where('id', $id)->get()->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_about_us', array('id' => $id));
    }
}


?>