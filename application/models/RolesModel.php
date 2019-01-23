<?php 

class RolesModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        return $this->db->get('tm_roles')->result();
    }

    public function update($data){
        $this->name = $data['name'];
        $this->db->where('id', $data['id']);
        return $this->db->update('tm_roles', $this);
    }

    public function store($data){
        $this->name = $data['name'];
        return $this->db->insert('tm_roles', $data);
    }

    public function getById($id){
        return $this->db->where('id', $id)->get('tm_roles')->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_roles', array('id' => $id));
    }
}


?>