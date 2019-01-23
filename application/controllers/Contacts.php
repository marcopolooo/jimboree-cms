<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacts extends CI_Controller
{
    function __construct(){
        parent::__construct();
    }

    public function index(){
        $result['data'] = $this->ContactsModel->get();
        $this->load->view('contacts/index', $result);
    }

    public function add(){
        $result['contacts'] = $this->ContactsModel->get();
        $this->load->view('contacts/add', $result);
    }

    public function store(){
        $data = array();
        $data['cid'] = $this->input->post('cid');
        $data['alamat'] = $this->input->post('alamat');
        $data['telephone'] = $this->input->post('telephone');
        $data['no_fax'] = $this->input->post('no_fax');
        $data['no_email'] = $this->input->post('no_email');
        $data['media_center'] = $this->input->post('media_center');
        $data['staff_direcctory'] = $this->input->post('staff_direcctory');
        $data['facebook'] = $this->input->post('facebook');
        $result = $this->ContactsModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success insert!');
            redirect('master-data/contacts');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/contacts');
        }
    }

    public function edit($id){
        $result['data'] = $this->ContactsModel->getById($id);
        // header('Content-Type: application/json');
        // echo json_encode( $result);
        // echo $result['data'][0];
        $this->load->view('contacts/edit', $result);
    }

    public function update(){
        $data = array();
        $data['cid'] = $this->input->post('cid');
        $data['alamat'] = $this->input->post('alamat');
        $data['telephone'] = $this->input->post('telephone');
        $data['no_fax'] = $this->input->post('no_fax');
        $data['no_email'] = $this->input->post('no_email');
        $data['media_center'] = $this->input->post('media_center');
        $data['staff_direcctory'] = $this->input->post('staff_direcctory');
        $data['facebook'] = $this->input->post('facebook');
        $result = $this->ContactsModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success update!');
            redirect('master-data/contacts');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('master-data/contacts');
        }
    }

    public function destroy(){
        $id = $this->input->post('cid');
        $this->ContactsModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>