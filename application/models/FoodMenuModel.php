<?php 

class FoodMenuModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        return $this->db->get('tm_food_menu')->result();
    }

    public function update($data){
        $this->jenis_makanan = $data['jenis_makanan'];
        $this->jenis_minuman = $data['jenis_minuman'];
        $this->jenis_buah = $data['jenis_buah'];
        $this->db->where('fid', $data['fid']);
        return $this->db->update('tm_food_menu', $this);
    }

    public function store($data){
        $this->jenis_makanan = $data['jenis_makanan'];
        $this->jenis_minuman = $data['jenis_minuman'];
        $this->jenis_buah = $data['jenis_buah'];
        return $this->db->insert('tm_food_menu', $data);
    }

    public function getById($id){
        return $this->db->where('fid', $id)->get('tm_food_menu')->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_food_menu', array('fid' => $id));
    }
}


?>