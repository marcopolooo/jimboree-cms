<?php 

class SchoolModel extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function get(){
        return $this->db->get('tm_school')->result();
    }

    public function update($data){
        $this->id_sekolah = $data['id_sekolah'];
        $this->name_school = $data['name_school'];
        $this->tanggal_pendirian = $data['tanggal_pendirian'];
        $this->status_sekolah = $data['status_sekolah'];
        $this->akreditasi = $data['akreditasi'];
        $this->sertifikasi = $data['sertifikasi'];
        $this->kepala_sekolah = $data['kepala_sekolah'];
        $this->alamat = $data['alamat'];
        $this->visi = $data['visi'];
        $this->visi_2 = $data['visi_2'];
        $this->visi_subtitle = $data['visi_subtitle'];
        if(count($data['visi_image'])>0){
            $this->visi_image = $data['visi_image']['upload-data']['full_path'];
        }
        $this->misi = $data['misi'];
        $this->misi_2 = $data['misi_2'];
        $this->misi_subtitle = $data['misi_subtitle'];
        if(count($data['misi_image'])>0){
            $this->misi_image = $data['misi_image']['upload-data']['full_path'];
        }
        $this->motto = $data['motto'];
        $this->file_url = $data['file_url'];
        $this->db->where('id_sekolah', $data['id_sekolah']);

        return $this->db->update('tm_school', $this);
    }

    public function store($data){
        $this->id_sekolah = $data['id_sekolah'];
        $this->name_school = $data['name_school'];
        $this->tanggal_pendirian = $data['tanggal_pendirian'];
        $this->status_sekolah = $data['status_sekolah'];
        $this->akreditasi = $data['akreditasi'];
        $this->sertifikasi = $data['sertifikasi'];
        $this->kepala_sekolah = $data['kepala_sekolah'];
        $this->alamat = $data['alamat'];
        $this->visi = $data['visi'];
        $this->visi_2 = $data['visi_2'];
        $this->visi_subtitle = $data['visi_subtitle'];
        $this->visi_image = $data['visi_image']['upload-data']['full_path'];
        $this->misi = $data['misi'];
        $this->misi_2 = $data['misi_2'];
        $this->misi_subtitle = $data['misi_subtitle'];
        $this->misi_image = $data['misi_image']['upload-data']['full_path'];
        $this->motto = $data['motto'];
        $this->file_url = $data['file_url'];
        $this->db->where('id_sekolah', $data['id_sekolah']);

        return $this->db->insert('tm_school', $this);
    }

    public function getById($id){
        return $this->db->where('id_sekolah', $id)->get('tm_school')->result_array();
    }

    public function destroy($id){
        return $this->db->delete('tm_school', array('id_sekolah' => $id));
    }
}


?>