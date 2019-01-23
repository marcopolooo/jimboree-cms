<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FoodMenu extends CI_Controller
{
    function __construct(){
        parent::__construct();
    }

    public function index(){
        $result['data'] = $this->FoodMenuModel->get();
        $this->load->view('foodmenu/index', $result);
    }

    public function add(){
        $result['foodmenu'] = $this->FoodMenuModel->get();
        $this->load->view('foodmenu/add', $result);
    }

    public function store(){
        $data = array();
        $data['jenis_makanan'] = $this->input->post('jenis_makanan');
        $data['jenis_minuman'] = $this->input->post('jenis_minuman');
        $data['jenis_buah'] = $this->input->post('jenis_buah');
        
        $result = $this->FoodMenuModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success insert!');
            redirect('master-data/foodmenu');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/foodmenu');
        }
    }

    public function edit($id){
        $result['data'] = $this->FoodMenuModel->getById($id);
        $result['foodmenu'] = $this->FoodMenuModel->get();
        // header('Content-Type: application/json');
        // echo json_encode( $result);
        // echo $result['data'][0];
        $this->load->view('foodmenu/edit', $result);
    }

    public function update(){
        $data = array();
        $data['jenis_makanan'] = $this->input->post('jenis_makanan');
        $data['jenis_minuman'] = $this->input->post('jenis_minuman');
        $data['jenis_buah'] = $this->input->post('jenis_buah');
        
        $result = $this->FoodMenuModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success update!');
            redirect('master-data/foodmenu');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('master-data/foodmenu');
        }
    }

    public function destroy(){
        $id = $this->input->post('fid');
        $this->FoodMenuModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>