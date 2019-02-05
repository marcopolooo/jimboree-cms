<?php 

class TeachersModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        $this->db->order_by('peg_id', 'desc');
        return $this->db->get('tm_teachers')->result();
    }

    public function update($data){
        if(count($data['image'])>0){
            $this->image = $data['image']['upload-data']['full_path'];
        }
        $this->npwp = $data['npwp'];
        $this->nama_panggilan = $data['nama_panggilan'];
        $this->nama_depan = $data['nama_depan'];
        $this->nama_tengah = $data['nama_tengah'];
        $this->nama_belakang = $data['nama_belakang'];
        $this->tempat = $data['tempat'];
        $this->tanggal_lahir = $data['tanggal_lahir'];
        $this->id_agama = $data['id_agama'];
        $this->jenis_kelamin = $data['jenis_kelamin'];
        $this->alamat = $data['alamat'];
        $this->telephone = $data['telephone'];
        $this->email = $data['email'];
        $this->jabatan = $data['jabatan'];
        $this->facebook = $data['facebook'];
        $this->twitter = $data['twitter'];
        $this->instagram = $data['instagram'];
        $this->is_active = $data['is_active'];
        $this->db->where('peg_id', $data['peg_id']);

        return $this->db->update('tm_teachers', $this);
    }

    public function store($data){
        $this->image = $data['image']['upload_data']['full_path'];
        $this->npwp = $data['npwp'];
        $this->nama_panggilan = $data['nama_panggilan'];
        $this->nama_depan = $data['nama_depan'];
        $this->nama_tengah = $data['nama_tengah'];
        $this->nama_belakang = $data['nama_belakang'];
        $this->tempat = $data['tempat'];
        $this->tanggal_lahir = $data['tanggal_lahir'];
        $this->id_agama = $data['id_agama'];
        $this->jenis_kelamin = $data['jenis_kelamin'];
        $this->alamat = $data['alamat'];
        $this->telephone = $data['telephone'];
        $this->email = $data['email'];
        $this->jabatan = $data['jabatan'];
        $this->facebook = $data['facebook'];
        $this->twitter = $data['twitter'];
        $this->instagram = $data['instagram'];
        $this->is_active = $data['is_active'];
        $this->db->where('peg_id', $data['peg_id']);

        return $this->db->insert('tm_teachers', $this);
    }

    public function getById($id){
        $this->db->select('peg_id, image, npwp, nama_panggilan, nama_depan, nama_tengah, nama_belakang, tempat, tanggal_lahir, tm_teachers.id_agama, jenis_kelamin, jabatan, is_active, facebook, twitter, instagram, nama_agama AS agama, alamat, telephone, email');
        $this->db->from('tm_teachers');
        $this->db->join('tm_agama', 'tm_agama.id_agama = tm_teachers.id_agama');
        $this->db->order_by('peg_id', 'desc');
        $this->db->where('peg_id', $id);
        
        return $this->db->get()->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_teachers', array('peg_id' => $id));
    }

    public function getActivated(){
        $this->db->select('count(*) as active');
        return $this->db->where('is_active', 'ACTIVE')->get('tm_teachers')->result_array();
    }
}


?>