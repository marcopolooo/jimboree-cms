<?php 

class ExtracuricullarModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        return $this->db->get('tm_extracuricullar')->result();
    }

    public function update($data){
        $this->jenis_extracuricullar = $data['jenis_extracuricullar'];
        if(count($data['image'])>0){
            $this->icon = $data['image']['upload-data']['full_path'];
        }
        $this->db->where('id', $data['id']);
        return $this->db->update('tm_extracuricullar', $this);
    }

    public function store($data){
        $this->jenis_extracuricullar = $data['jenis_extracuricullar'];
        $this->icon = $data['image']['upload-data']['full_path'];
        return $this->db->insert('tm_extracuricullar', $this);
    }

    public function getById($id){
        return $this->db->where('id', $id)->get('tm_extracuricullar')->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_extracuricullar', array('id' => $id));
    }
}


?>