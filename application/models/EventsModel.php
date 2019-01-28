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
        $this->nama = $data['nama'];
        $this->desc = $data['desc'];
        $this->events_type_id = $data['events_type_id'];
        $this->schedule = $data['schedule'];
        $this->db->where('id_events', $data['id_events']);

        return $this->db->update('tm_events', $this);
    }

    public function store($data){
        $this->nama = $data['nama'];
        $this->desc = $data['desc'];
        $this->events_type_id = $data['events_type_id'];
        $this->schedule = $data['schedule'];

        return $this->db->insert('tm_events', $this);
    }

    public function getById($id){
        $this->db->select('tm_events.id_events, tm_events.nama, tm_events.desc, tm_events.schedule, tm_events.events_type_id, tm_events_type.type');
        $this->db->from('tm_events');
        $this->db->join('tm_events_type', 'tm_events_type.id = tm_events.events_type_id');
        // $this->db->order_by('id', 'desc');

        return $this->db->where('id_events', $id)->get()->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_events', array('id_events' => $id));
    }
}


?>