<?php 

class ArticlesModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        return $this->db->get('tm_articles')->result();
    }

    public function update($data){
        $this->articles_type = $data['articles_type'];
        $this->db->where('id', $data['id']);
        return $this->db->update('tm_articles', $this);
    }

    public function store($data){
        $this->articles_type = $data['articles_type'];
        return $this->db->insert('tm_articles', $data);
    }

    public function getById($id){
        return $this->db->where('id', $id)->get('tm_articles')->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_articles', array('id' => $id));
    }
}


?>