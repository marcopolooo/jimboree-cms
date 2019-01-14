<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teachers extends CI_Controller
{
    function __construct(){
        parent::__construct();
    }

    public function index(){
        $result['data'] = $this->TeachersModel->get();
        $this->load->view('teachers/index', $result);
    }

    public function add(){
        $result['agama'] = $this->AgamaModel->get();
        $this->load->view('teachers/add', $result);
    }

    public function store(){
        $data = array();
        $data['npwp'] = $this->input->post('npwp');
        $data['nama_panggilan'] = $this->input->post('nama_panggilan');
        $data['nama_depan'] = $this->input->post('nama_depan');
        $data['nama_tengah'] = $this->input->post('nama_tengah');
        $data['nama_belakang'] = $this->input->post('nama_belakang');
        $data['tempat'] = $this->input->post('tempat');
        $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
        $data['id_agama'] = $this->input->post('agama');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['alamat'] = $this->input->post('alamat');
        $data['telephone'] = $this->input->post('telephone');
        $data['email'] = $this->input->post('email');

        $result = $this->TeachersModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success insert!');
            redirect('master-data/teachers');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/teachers');
        }
    }

    public function edit($id){
        $result['data'] = $this->TeachersModel->getById($id);
        $result['agama'] = $this->AgamaModel->get();
        // header('Content-Type: application/json');
        // echo json_encode( $result);
        // echo $result['data'][0];
        $this->load->view('teachers/edit', $result);
    }

    public function update(){
        $data = array();
        $data['peg_id'] = $this->input->post('peg_id');
        $data['npwp'] = $this->input->post('npwp');
        $data['nama_panggilan'] = $this->input->post('nama_panggilan');
        $data['nama_depan'] = $this->input->post('nama_depan');
        $data['nama_tengah'] = $this->input->post('nama_tengah');
        $data['nama_belakang'] = $this->input->post('nama_belakang');
        $data['tempat'] = $this->input->post('tempat');
        $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
        $data['id_agama'] = $this->input->post('agama');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['alamat'] = $this->input->post('alamat');
        $data['telephone'] = $this->input->post('telephone');
        $data['email'] = $this->input->post('email');

        $result = $this->TeachersModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success update!');
            redirect('master-data/teachers');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('master-data/teachers');
        }
    }

    public function destroy(){
        $id = $this->input->post('peg_id');
        $this->TeachersModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>