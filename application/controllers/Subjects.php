<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subjects extends CI_Controller
{
    function __construct(){
        parent::__construct();
    }

    public function index(){
        $result['data'] = $this->SubjectsModel->getStudy();
        $this->load->view('subjects/index', $result);
    }

    public function add(){
        $this->load->view('subjects/add');    
    }

    public function store(){
        $data['nama_mapel'] = $this->input->post('nama_mapel');
        $result = $this->SubjectsModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success insert!');
            redirect('master-data/subjects');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/subjects');
        }
    }

    public function edit($id){
        $result['data'] = $this->SubjectsModel->getStudyById($id);
        $this->load->view('subjects/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['nama_mapel'] = $this->input->post('nama_mapel');
        $result = $this->SubjectsModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success update!');
            redirect('master-data/subjects');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('master-data/subjects');
        }
    }

    public function destroy(){
        $id = $this->input->post('mid');
        $this->SubjectsModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>