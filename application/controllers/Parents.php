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
        $result['agama']=$this->AgamaModel->get();
        $this->load->view('parents/add', $result);    
    }

    public function store(){
        $data['nama'] = $this->input->post('nama');
        $data['id_agama'] = $this->input->post('id_agama');
        $data['alamat'] = $this->input->post('alamat');
        $data['role_parents'] = $this->input->post('role_parents');
        $result = $this->ParentsModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success insert!');
            redirect('master-data/parents');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/parents');
        }
    }

    public function edit($id){
        $result['data'] = $this->ParentsModel->getById($id);
        $result['agama'] = $this->AgamaModel->get();
        $this->load->view('parents/edit', $result);
    }

    public function update(){
        $data = array();
        $data['nama'] = $this->input->post('nama');
        $data['id_agama'] = $this->input->post('id_agama');
        $data['alamat'] = $this->input->post('alamat');
        $data['role_parents'] = $this->input->post('role_parents');
        $result = $this->ParentsModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success update!');
            redirect('master-data/parents');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('master-data/parents');
        }
    }

    public function destroy(){
        $id = $this->input->post('id_parents');
        $this->ParentsModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>