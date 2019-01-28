<?php 

class ArticlesTypeModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        return $this->db->get('tm_articles_type')->result();
    }

    public function update($data){
        $this->articles_type = $data['articles_type'];
        $this->desc = $data['desc'];
        $this->db->where('id', $data['id']);
        return $this->db->update('tm_articles_type', $this);
    }

    public function store($data){
        $this->articles_type = $data['articles_type'];
        $this->desc = $data['desc'];
        return $this->db->insert('tm_articles_type', $data);
    }

    public function getById($id){
        return $this->db->where('id', $id)->get('tm_articles_type')->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_articles_type', array('id' => $id));
    }
}


?>