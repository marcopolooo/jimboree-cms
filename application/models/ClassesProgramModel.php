<?php 

class ClassesProgramModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        $this->db->order_by('id', 'desc');
        return $this->db->get('tm_classes_program')->result();
    }

    public function update($data){
        $this->program = $data['program'];
        $this->desc = $data['desc'];
        if(isset($data['image'])){
            $this->image = $data['image']['upload-data']['full_path'];
        }
        $this->db->where('id', $data['id']);
        return $this->db->update('tm_classes_program', $this);
    }

    public function store($data){
        $this->program = $data['program'];
        $this->desc = $data['desc'];
        $this->image = $data['image']['upload-data']['full_path'];
        $this->created_at = date('Y-m-d H:i:s');
        return $this->db->insert('tm_classes_program', $this);
    }

    public function getById($id){
        return $this->db->where('id', $id)->get('tm_classes_program')->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_classes_program', array('id' => $id));
    }
}


?>