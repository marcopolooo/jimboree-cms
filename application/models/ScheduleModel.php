<?php 

class ScheduleModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        $this->db->order_by('id', 'desc');
        return $this->db->get('tx_schedule')->result();
    }

    public function store($data){
        $this->id_tahun_ajaran = $data['id_tahun_ajaran'];
        $this->id_class = $data['id_class'];
        $this->peg_id = $data['peg_id'];
        $this->mid = $data['mid'];
        $this->tgl = $data['tgl'];
        $this->jam_mulai = $data['jam_mulai'];
        $this->jam_selesai = $data['jam_selesai'];
        $this->created_at = date('Y-m-d H:i:s');

        return $this->db->insert('tx_schedule', $this);
    }

    public function update($data){
        $this->id_tahun_ajaran = $data['id_tahun_ajaran'];
        $this->id_class = $data['id_class'];
        $this->peg_id = $data['peg_id'];
        $this->mid = $data['mid'];
        $this->tgl = $data['tgl'];
        $this->jam_mulai = $data['jam_mulai'];
        $this->jam_selesai = $data['jam_selesai'];
        $this->created_at = date('Y-m-d H:i:s');

        $this->db->where('sid', $data['sid']);
        return $this->db->update('tx_schedule', $data);
    }

    public function getById($id){
        $this->db->select('tx_schedule.sid, tx_schedule.tgl, tx_schedule.jam_mulai, tx_schedule.jam_selesai, tx_schedule.id_tahun_ajaran, tx_schedule.id_class, tx_schedule.peg_id, tx_schedule.mid, tm_class.nama_ruang_kelas, tp_school_year.id_tahun_ajaran, concat(tp_school_year.from, "/", tp_school_year.to) as schoolyear, tm_subjects.nama_mapel, concat(tm_teachers.nama_depan, " ", tm_teachers.nama_tengah, " ", tm_teachers.nama_belakang) as teacher');
        $this->db->from('tx_schedule');
        $this->db->join('tp_school_year', 'tp_school_year.id_tahun_ajaran = tx_schedule.id_tahun_ajaran');
        $this->db->join('tm_class', 'tm_class.id_class = tx_schedule.id_class');
        $this->db->join('tm_subjects', 'tm_subjects.mid = tx_schedule.mid');
        $this->db->join('tm_teachers', 'tm_teachers.peg_id = tx_schedule.peg_id');
        $this->db->order_by('tx_schedule.tgl', 'desc');
        
        return $this->db->where('sid', $id)->get()->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tx_schedule', array('sid' => $id));
    }
}


?>