<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Extracuricullar extends CI_Controller
{
    function __construct(){
        parent::__construct();
    }

    public function index(){
        $result['data'] = $this->ExtracuricullarModel->get();
        $this->load->view('extracuricullar/index', $result);
    }

    public function add(){
        $result['extracuricullar'] = $this->ExtracuricullarModel->get();
        $this->load->view('extracuricullar/add', $result);
    }

    public function store(){
        $data = array();
        $data['jenis_extracuricullar'] = $this->input->post('jenis_extracuricullar');

        $result = $this->ExtracuricullarModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success input');
            redirect('master-data/extracuricullar');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/extracuricullar');
        }
    }

    public function edit($id){
        $result['data'] = $this->ExtracuricullarModel->getById($id);
        // $result['extracuricullar'] = $this->extracuricullarModel->get();
        // header('Content-Type: application/json');
        // echo json_encode( $result);
        // echo $result['data'][0];
        $this->load->view('extracuricullar/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['jenis_extracuricullar'] = $this->input->post('jenis_extracuricullar');

        $result = $this->ExtracuricullarModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success Update!');
            redirect('master-data/extracuricullar');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('master-data/extracuricullar');
        }
    }

    public function destroy(){
        $id = $this->input->post('id');
        try {
            $this->ExtracuricullarModel->destroy($id);
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