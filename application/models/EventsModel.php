<?php 

class EventsModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        $this->db->order_by('id_events', 'desc');
        return $this->db->get('tm_events')->result();
    }

    public function update($data){
        $this->holiday = $data['holiday'];
        $this->testing = $data['testing'];
        $this->fieldtrip = $data['fieldtrip'];
        $this->meeting = $data['meeting'];
        $this->db->where('id_events', $data['id_events']);

        return $this->db->update('tm_events', $this);
    }

    public function store($data){
        $this->holiday = $data['holiday'];
        $this->testing = $data['testing'];
        $this->fieldtrip = $data['fieldtrip'];
        $this->meeting = $data['meeting'];

        return $this->db->insert('tm_events', $this);
    }

    public function getById($id){
        return $this->db->where('id_events', $id)->get('tm_events')->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_events', array('id_events' => $id));
    }
}


?>