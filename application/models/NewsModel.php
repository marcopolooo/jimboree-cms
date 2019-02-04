<?php 

class NewsModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        $this->db->order_by('id', 'desc');
        return $this->db->get('tm_news')->result();
    }

    public function store($data){
        $this->title = $data['title'];
        $this->desc = $data['desc'];
        $this->image = $data['image']['upload_data']['full_path'];
        $this->created_by = $this->session->userdata('id');
        $this->is_active = $data['is_active'];
        $this->created_at = date("Y-m-d H:i:s");
        return $this->db->insert('tm_news', $this);
    }

    public function update($data){
        $this->title = $data['title'];
        $this->desc = $data['desc'];
        $this->is_active = $data['is_active'];
        if(count($data['image'])>0){
            $this->image = $data['image']['upload-data']['full_path'];
        }
        $this->db->where('id', $data['id']);
        return $this->db->update('tm_news', $this);
    }

    public function getById($id){
        return $this->db->where('id', $id)->get('tm_news')->result_array();
    }

    public function getActivated(){
        $this->db->select('count(*) as active');
        return $this->db->where('is_active', 'ACTIVE')->get('tm_news')->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_news', array('id' => $id));
    }
}


?>