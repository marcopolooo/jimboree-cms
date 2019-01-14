<?php 

class StudentsModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        $this->db->order_by('nis', 'desc');
        return $this->db->get('tm_students')->result();
    }

    public function update($data){
        $this->nama_panggilan = $data['nama_panggilan'];
        $this->nama_depan = $data['nama_depan'];
        $this->nama_tengah = $data['nama_tengah'];
        $this->nama_belakang = $data['nama_belakang'];
        $this->jenis_kelamin = $data['jenis_kelamin'];
        $this->tempat = $data['tempat'];
        $this->tanggal_lahir = $data['tanggal_lahir'];
        $this->id_agama = $data['id_agama'];
        $this->alamat = $data['alamat'];
        $this->hobi = $data['hobi'];
        $this->db->where('nis', $data['nis']);

        return $this->db->update('tm_students', $this);
    }

    public function store($data){
        $this->nama_panggilan = $data['nama_panggilan'];
        $this->nama_depan = $data['nama_depan'];
        $this->nama_tengah = $data['nama_tengah'];
        $this->nama_belakang = $data['nama_belakang'];
        $this->jenis_kelamin = $data['jenis_kelamin'];
        $this->tempat = $data['tempat'];
        $this->tanggal_lahir = $data['tanggal_lahir'];
        $this->id_agama = $data['id_agama'];
        $this->alamat = $data['alamat'];
        $this->hobi = $data['hobi'];

        return $this->db->insert('tm_students', $this);
    }

    public function getById($id){
        $this->db->select('nis, nama_panggilan, nama_depan, nama_tengah, nama_belakang, jenis_kelamin, tempat, tanggal_lahir, tm_agama.id_agama, nama_agama AS agama, alamat, hobi');
        $this->db->from('tm_students');
        $this->db->join('tm_agama', 'tm_agama.id_agama = tm_students.id_agama');
        $this->db->order_by('nis', 'desc');
        $this->db->where('nis', $id);
        
        return $this->db->get()->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_students', array('nis' => $id));
    }
}


?>