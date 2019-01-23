<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agama extends CI_Controller
{
    function __construct(){
        parent::__construct();
    }

    public function index(){
        $result['data'] = $this->AgamaModel->get();
        $this->load->view('agama/index', $result);
    }

    public function add(){
        $result['agama'] = $this->AgamaModel->get();
        $this->load->view('agama/add', $result);
    }

    public function store(){
        $data = array();
        $data['nama_agama'] = $this->input->post('nama_agama');

        $result = $this->AgamaModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success input');
            redirect('master-data/agama');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/agama');
        }
    }

    public function edit($id){
        $result['data'] = $this->AgamaModel->getById($id);
        // $result['agama'] = $this->AgamaModel->get();
        // header('Content-Type: application/json');
        // echo json_encode( $result);
        // echo $result['data'][0];
        $this->load->view('agama/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id_agama'] = $this->input->post('id_agama');
        $data['nama_agama'] = $this->input->post('nama_agama');

        $result = $this->AgamaModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success Update!');
            redirect('master-data/agama');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('master-data/agama');
        }
    }

    public function destroy(){
        $id = $this->input->post('id_agama');
        try {
            $this->AgamaModel->destroy($id);
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