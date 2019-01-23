<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller
{
    function __construct(){
        parent::__construct();
    }

    public function index(){
        $result['data'] = $this->EventsModel->get();
        $this->load->view('events/index', $result);
    }

    public function add(){
        $result['events'] = $this->EventsModel->get();
        $this->load->view('events/add', $result);
    }

    public function store(){
        $data = array();
        $data['id_events'] = $this->input->post('id_events');
        $data['holiday'] = date('Y/m/d', strtotime($this->input->post('holiday')));
        $data['testing'] = date('Y/m/d', strtotime($this->input->post('testing')));
        $data['fieldtrip'] = date('Y/m/d', strtotime($this->input->post('fieldtrip')));        
        $data['meeting'] = date('Y/m/d', strtotime($this->input->post('meeting')));        
        $result = $this->EventsModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success insert!');
            redirect('master-data/events');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/events');
        }
    }

    public function edit($id){
        $result['data'] = $this->EventsModel->getById($id);
        // header('Content-Type: application/json');
        // echo json_encode( $result);
        // echo $result['data'][0];
        $this->load->view('events/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id_events'] = $this->input->post('id_events');
        $data['holiday'] = date('Y/m/d', strtotime($this->input->post('holiday')));
        $data['testing'] = date('Y/m/d', strtotime($this->input->post('testing')));
        $data['fieldtrip'] = date('Y/m/d', strtotime($this->input->post('fieldtrip')));        
        $data['meeting'] = date('Y/m/d', strtotime($this->input->post('meeting')));        
        
        $result = $this->EventsModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success update!');
            redirect('master-data/events');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('master-data/events');
        }
    }

    public function destroy(){
        $id = $this->input->post('id_events');
        $this->EventsModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>