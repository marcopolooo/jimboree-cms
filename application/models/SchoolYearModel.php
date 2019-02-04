<?php 

class SchoolYearModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        return $this->db->get('tp_school_year')->result();
    }

    public function update($data){
        if ($data['is_active'] == "ACTIVE") {
            $this->is_active = "INACTIVE";
            $this->db->where('id_tahun_ajaran !=', $data['id_tahun_ajaran']);
            $this->db->update('tp_school_year', $this);
        }

        $this->db->where('id_tahun_ajaran', $data['id_tahun_ajaran']);
        return $this->db->update('tp_school_year', $data);
    }

    public function store($data){
        $data = array(
            'id_sekolah' => $data['id_sekolah'],
            'desc' => $data['desc'],
            'from' => $data['from'],
            'to' => $data['to'],
            'is_active' => $data['is_active']
        );
        // print_r($data);die();

        $this->db->insert('tp_school_year', $data);
        if ($data['is_active'] == "ACTIVE") {
            $this->is_active = "INACTIVE";
            $this->db->where('id_tahun_ajaran !=', $this->db->insert_id());
            $this->db->update('tp_school_year', $this);
        }

        return true;
    }

    public function getById($id){
        $this->db->select('tm_school.id_sekolah, tp_school_year.id_sekolah as idSekolah, tm_school.name_school, tp_school_year.desc, tp_school_year.from, tp_school_year.to, tp_school_year.is_active, tp_school_year.id_tahun_ajaran');
        $this->db->from('tp_school_year');
        $this->db->join('tm_school', 'tm_school.id_sekolah=tp_school_year.id_sekolah');
        return $this->db->where('id_tahun_ajaran', $id)->get()->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tp_school_year', array('id_tahun_ajaran' => $id));
    }

    // public function updateIsActive($){

    // }
}


?>