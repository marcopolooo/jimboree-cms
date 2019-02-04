<?php 

class SchoolImprovementModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        $this->db->order_by('id', 'desc');
        return $this->db->get('tm_school_improvement')->result();
    }

    public function store($data){
        $data = array(
            'desc' => $data['desc'],
            'desc2' => $data['desc2'],
            'image' => $data['image']['upload_data']['full_path'],
            'is_active' => $data['is_active'],
            'created_at' => date("Y-m-d H:i:s")
        );

        $this->db->insert('tm_school_improvement', $data);
        if ($data['is_active'] == "ACTIVE") {
            $this->is_active = "INACTIVE";
            $this->db->where('id !=', $this->db->insert_id());
            $this->db->update('tm_school_improvement', $this);
        }

        return true;
    }

    public function update($data){
        $data = array(
            'id' => $data['id'],
            'desc' => $data['desc'],
            'desc2' => $data['desc2'],
            'is_active' => $data['is_active'],
            'created_at' => date("Y-m-d H:i:s")
        );

        if(isset($data['image'])){
            $data['image'] = $data['image']['upload-data']['full_path'];
        }

        if ($data['is_active'] == "ACTIVE") {
            $this->is_active = "INACTIVE";
            $this->db->where('id !=', $data['id']);
            $this->db->update('tm_school_improvement', $this);
        }
        
        $this->db->where('id', $data['id']);
        return $this->db->update('tm_school_improvement', $data);
    }

    public function getById($id){
        return $this->db->where('id', $id)->get('tm_school_improvement')->result_array();
    }

    public function getActivated(){
        $this->db->select('count(*) as active');
        return $this->db->where('is_active', 'ACTIVE')->get('tm_school_improvement')->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_school_improvement', array('id' => $id));
    }
}


?>