<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classes extends CI_Controller
{
    function __construct(){
        parent::__construct();
        middleware();
    }

    public function index(){
        $result['data'] = $this->ClassModel->get();
        $this->load->view('class/index', $result);
    }

    public function add(){
        $this->load->view('class/add');    
    }

    public function store(){
        $data['nama_ruang_kelas'] = $this->input->post('nama_ruang_kelas');
        $result = $this->ClassModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success insert!');
            redirect('master-data/class');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/class');
        }
    }

    public function edit($id){
        $result['data'] = $this->ClassModel->getById($id);
        $this->load->view('class/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['nama_ruang_kelas'] = $this->input->post('nama_ruang_kelas');
        $result = $this->ClassModel->update($data);
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
        $this->ClassModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>