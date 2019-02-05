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
        $this->created_at = date('Y-m-d H:i:s');
        if(isset($data['image'])){
            $this->image = $data['image']['upload-data']['full_path'];
        }
        $this->db->where('id', $data['id']);
        return $this->db->update('tm_articles_type', $this);
    }

    public function store($data){
        $this->articles_type = $data['articles_type'];
        $this->desc = $data['desc'];
        $this->image = $data['image']['upload-data']['full_path'];
        $this->created_at = date('Y-m-d H:i:s');
        return $this->db->insert('tm_articles_type', $this);
    }

    public function getById($id){
        return $this->db->where('id', $id)->get('tm_articles_type')->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_articles_type', array('id' => $id));
    }
}


?>