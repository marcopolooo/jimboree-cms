<?php 

class ContactsModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        $this->db->order_by('cid', 'desc');
        return $this->db->get('tm_contact')->result();
    }

    public function update($data){
        $this->alamat = $data['alamat'];
        $this->telephone = $data['telephone'];
        $this->no_fax = $data['no_fax'];
        $this->email = $data['email'];
        $this->media_center = $data['media_center'];
        $this->staff_directory = $data['staff_directory'];
        $this->facebook = $data['facebook'];
        $this->db->where('cid', $data['cid']);
        return $this->db->update('tm_contact', $this);
    }

    public function store($data){
        return $this->db->insert('tm_contact', $data);
    }

    public function getById($id){
        return $this->db->where('cid', $id)->get('tm_contact')->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_contact', array('cid' => $id));
    }
}


?>