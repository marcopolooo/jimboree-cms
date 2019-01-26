<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class School extends CI_Controller
{
    function __construct(){
        parent::__construct();
    }

    public function index(){
        $result['data'] = $this->SchoolModel->get();
        $this->load->view('school/index', $result);
    }

    public function add(){
        $result['school'] = $this->SchoolModel->get();
        $this->load->view('school/add', $result);
    }

    public function store(){
        $data = array();
        $data['id_sekolah'] = $this->input->post('id_sekolah');
        $data['name_school'] = $this->input->post('name_school');
        $data['tanggal_pendirian'] = date('Y/m/d', strtotime($this->input->post('tanggal_pendirian')));
        $data['status_sekolah'] = $this->input->post('status_sekolah');
        $data['akreditasi'] = $this->input->post('akreditasi');
        $data['sertifikasi'] = $this->input->post('sertifikasi');
        $data['kepala_sekolah'] = $this->input->post('kepala_sekolah');
        $data['alamat'] = $this->input->post('alamat');
        $data['visi'] = $this->input->post('visi');
        $data['misi'] = $this->input->post('misi');
        $data['file_url'] = $this->input->post('file_url');
        $result = $this->SchoolModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success insert!');
            redirect('master-data/school');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/school');
        }
    }

    public function edit($id){
        $result['data'] = $this->SchoolModel->getById($id);
        $result['school'] = $this->SchoolModel->get();
        // header('Content-Type: application/json');
        // echo json_encode( $result);
        // echo $result['data'][0];
        $this->load->view('school/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id_sekolah'] = $this->input->post('id_sekolah');
        $data['name_school'] = $this->input->post('name_school');
        $data['tanggal_pendirian'] = date('Y/m/d', strtotime($this->input->post('tanggal_pendirian')));
        $data['status_sekolah'] = $this->input->post('status_sekolah');
        $data['akreditasi'] = $this->input->post('akreditasi');
        $data['sertifikasi'] = $this->input->post('sertifikasi');
        $data['kepala_sekolah'] = $this->input->post('kepala_sekolah');
        $data['alamat'] = $this->input->post('alamat');
        $data['visi'] = $this->input->post('visi');
        $data['misi'] = $this->input->post('misi');
        $data['file_url'] = $this->input->post('file_url');
        
        $result = $this->SchoolModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success update!');
            redirect('master-data/school');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('master-data/school');
        }
    }

    public function destroy(){
        $id = $this->input->post('id_sekolah');
        $this->SchoolModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>