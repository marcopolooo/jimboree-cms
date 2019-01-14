<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parents extends CI_Controller
{
    function __construct(){
        parent::__construct();
    }

    public function index(){
        $result['data'] = $this->ParentsModel->get();
        $this->load->view('parents/index', $result);
    }

    public function add(){
        $this->load->view('parents/add');    
    }

    public function store(){
        $data['nama_ruang_kelas'] = $this->input->post('nama_ruang_kelas');
        $result = $this->ParentsModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success insert!');
            redirect('master-data/class');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/class');
        }
    }

    public function edit($id){
        $result['data'] = $this->ParentsModel->getById($id);
        $this->load->view('parents/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['nama_ruang_kelas'] = $this->input->post('nama_ruang_kelas');
        $result = $this->ParentsModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success update!');
            redirect('master-data/class');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('master-data/class');
        }
    }

    public function destroy(){
        $id = $this->input->post('id_class');
        $this->ParentsModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>