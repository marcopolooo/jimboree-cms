<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Type_Nilai extends CI_Controller
{
    function __construct(){
        parent::__construct();
    }

    public function index(){
        $result['data'] = $this->TypeNilaiModel->get();
        $this->load->view('type_nilai/index', $result);
    }

    public function add(){
        $result['type_nilai'] = $this->TypeNilaiModel->get();
        $this->load->view('type_nilai/add', $result);
    }

    public function store(){
        $data = array();
        $data['desc'] = $this->input->post('desc');

        $result = $this->TypeNilaiModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success input');
            redirect('master-data/type_nilai');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/type_nilai');
        }
    }

    public function edit($id){
        $result['data'] = $this->TypeNilaiModel->getById($id);
        // $result['extracuricullar'] = $this->extracuricullarModel->get();
        // header('Content-Type: application/json');
        // echo json_encode( $result);
        // echo $result['data'][0];
        $this->load->view('type_nilai/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['desc'] = $this->input->post('desc');

        $result = $this->TypeNilaiModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success Update!');
            redirect('master-data/type_nilai');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('master-data/type_nilai');
        }
    }

    public function destroy(){
        $id = $this->input->post('id');
        try {
            $this->TypeNilaiModel->destroy($id);
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