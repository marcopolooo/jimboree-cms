<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students extends CI_Controller
{
    function __construct(){
        parent::__construct();
    }

    public function index(){
        $result['data'] = $this->StudentsModel->get();
        $this->load->view('students/index', $result);
    }

    public function add(){
        $result['agama'] = $this->AgamaModel->get();
        $this->load->view('students/add', $result);
    }

    public function store(){
        $data = array();
        $data['nis'] = $this->input->post('nis');
        $data['nama_panggilan'] = $this->input->post('nama_panggilan');
        $data['nama_depan'] = $this->input->post('nama_depan');
        $data['nama_tengah'] = $this->input->post('nama_tengah');
        $data['nama_belakang'] = $this->input->post('nama_belakang');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['tempat'] = $this->input->post('tempat');
        $data['tanggal_lahir'] = date('Y/m/d', strtotime($this->input->post('tanggal_lahir')));
        $data['id_agama'] = $this->input->post('agama');
        $data['alamat'] = $this->input->post('alamat');
        $data['hobi'] = $this->input->post('hobi');
        $result = $this->StudentsModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success insert!');
            redirect('master-data/students');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/students');
        }
    }

    public function edit($id){
        $result['data'] = $this->StudentsModel->getById($id);
        $result['agama'] = $this->AgamaModel->get();
        // header('Content-Type: application/json');
        // echo json_encode( $result);
        // echo $result['data'][0];
        $this->load->view('students/edit', $result);
    }

    public function update(){
        $data = array();
        $data['nis'] = $this->input->post('nis');
        $data['nama_panggilan'] = $this->input->post('nama_panggilan');
        $data['nama_depan'] = $this->input->post('nama_depan');
        $data['nama_tengah'] = $this->input->post('nama_tengah');
        $data['nama_belakang'] = $this->input->post('nama_belakang');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['tempat'] = $this->input->post('tempat');
        $data['tanggal_lahir'] = date('Y/m/d', strtotime($this->input->post('tanggal_lahir')));
        $data['id_agama'] = $this->input->post('agama');
        $data['alamat'] = $this->input->post('alamat');
        $data['hobi'] = $this->input->post('hobi');

        $result = $this->StudentsModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success update!');
            redirect('master-data/students');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('master-data/students');
        }
    }

    public function destroy(){
        $id = $this->input->post('nis');
        $this->StudentsModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>