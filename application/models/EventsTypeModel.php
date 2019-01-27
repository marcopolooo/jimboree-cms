<?php 

class EventsTypeModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        $this->db->order_by('id', 'desc');
        return $this->db->get('tm_events_type')->result();
    }

    public function update($data){
        $this->type = $data['type'];
        $this->db->where('id', $data['id']);

        return $this->db->update('tm_events_type', $this);
    }

    public function store($data){
        $this->type = $data['type'];
        return $this->db->insert('tm_events_type', $this);
    }

    public function getById($id){
        return $this->db->where('id', $id)->get('tm_events_type')->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_events_type', array('id' => $id));
    }
}


?>