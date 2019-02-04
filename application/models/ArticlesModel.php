<?php 

class ArticlesModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        $this->db->select('tm_articles.id, tm_articles.title, tm_articles_type.articles_type, tm_articles.desc, tm_articles.image');
        $this->db->from('tm_articles');
        $this->db->join('tm_articles_type', 'tm_articles_type.id = tm_articles.articles_type_id');
        $this->db->order_by('tm_articles.id', 'desc');
        $this->db->where('tm_articles.id', $id);
        return $this->db->get('tm_articles')->result();
    }

    public function update($data){
        $this->title = $data['title'];
        $this->articles_type_id = $data['articles_type'];
        $this->desc = $data['desc'];
        $this->image = $data['image']['upload_data']['full_path'];
        $this->db->where('id', $data['id']);
        return $this->db->update('tm_articles', $this);
    }

    public function store($data){
        $this->title = $data['title'];
        $this->articles_type_id = $data['articles_type'];
        $this->desc = $data['desc'];
        $this->image = $data['image']['upload_data']['full_path'];
        $this->created_at = date('Y-m-d H:i:s');
        return $this->db->insert('tm_articles', $this);
    }

    public function getById($id){
        $this->db->select('tm_articles.id, tm_articles.title, tm_articles.articles_type_id, tm_articles_type.articles_type, tm_articles.desc, tm_articles.image');
        $this->db->from('tm_articles');
        $this->db->join('tm_articles_type', 'tm_articles_type.id = tm_articles.articles_type_id');
        $this->db->order_by('tm_articles.id', 'desc');
        $result = $this->db->where('tm_articles.id', $id)->get()->result_array();

        return $result;
    }

    public function destroy($id){
        return $this->db->delete('tm_articles', array('id' => $id));
    }
}


?>