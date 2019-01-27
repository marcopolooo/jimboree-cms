<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Roles extends CI_Controller
{
    function __construct(){
        parent::__construct();
        middleware();
    }

    public function index(){
        $result['data'] = $this->RolesModel->get();
        $this->load->view('roles/index', $result);
    }

    public function add(){
        $result['roles'] = $this->RolesModel->get();
        $this->load->view('roles/add', $result);
    }

    public function store(){
        $data = array();
        $data['name'] = $this->input->post('name');

        $result = $this->RolesModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success input');
            redirect('master-data/roles');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/roles');
        }
    }

    public function edit($id){
        $result['data'] = $this->RolesModel->getById($id);
        // $result['agama'] = $this->AgamaModel->get();
        // header('Content-Type: application/json');
        // echo json_encode( $result);
        // echo $result['data'][0];
        $this->load->view('roles/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['name'] = $this->input->post('name');

        $result = $this->RolesModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success Update!');
            redirect('master-data/roles');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('master-data/roles');
        }
    }

    public function destroy(){
        $id = $this->input->post('id');
        try {
            $this->RolesModel->destroy($id);
            if($this->db->affected_rows()){
                $this->session->set_flashdata('success', 'Success delete!');
            } else {
                $this->session->set_flashdata('error', 'Failed delete!');
            }
        } catch (\Throwable $th) {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>