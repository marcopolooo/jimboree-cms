<?php 

class AboutUsModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        $this->db->order_by('id', 'desc');
        return $this->db->get('tm_about_us')->result();
    }

    public function store($data){
        $this->title = $data['title'];
        $this->title2 = $data['title2'];
        $this->title3 = $data['title3'];
        $this->desc = $data['desc'];
        $this->desc2 = $data['desc2'];
        $this->image = $data['image']['upload-data']['full_path'];
        $this->is_active = $data['is_active'];
        $this->db->insert('tm_about_us', $this);
        if ($data['is_active'] == "ACTIVE") {
            $this->is_active = "INACTIVE";
            $this->db->where('id !=', $this->db->insert_id());
            $this->db->update('tm_about_us', $this);
        }

        return true;
    }

    public function update($data){
        $date = [
            'title' => $data['title'],
            'title2' => $data['title2'],
            'title3' => $data['title3'],
            'desc' => $data['desc'],
            'desc2' => $data['desc2'],
            'is_active' => $data['is_active']
        ];
        
        if(isset($data['image'])){
            $data['image'] = $data['image']['upload-data']['full_path'];
        }

        if ($data['is_active'] == "ACTIVE") {
            $this->is_active = "INACTIVE";
            $this->db->where('id !=', $data['id']);
            $this->db->update('tm_about_us', $this);
        }

        $this->db->where('id', $data['id']);
        return $this->db->update('tm_about_us', $data);
    }

    public function getById($id){
        return $this->db->where('id', $id)->get('tm_about_us')->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_about_us', array('id' => $id));
    }
}


?>