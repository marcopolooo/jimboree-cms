<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agama extends CI_Controller
{
    function __construct(){
        parent::__construct();
    }

    var $table = 'tm_agama';
    var $column_order = array(null, 'nama_agama'); //set column field database for datatable orderable
    var $column_search = array('nama_agama'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order 
    var $data = [];
    var $id = "id_agama";

    public function index(){
        $this->load->view('agama/index');
    }

    public function indexData(){
        $data['id'] = $this->id;
        if(isset($_POST['search']['value'])){
            $data['search'] = array(
                'value' => $_POST['search']['value']
            );
        }

        if(isset($_POST['search']['value'])){
            $data['search'] = array(
                'value' => $_POST['search']['value']
            );
        }

        if(isset($_POST['order'])){
            $data['order'] = array(
                'column' => $_POST['order'][0]['column'],
                'dir' => $_POST['order'][0]['dir']
            );
        } else{
            $data['order'] = $this->order;
        }

        if($_POST['length'] != -1){
            $data['length'] = $_POST['length'];
            $data['start'] = $_POST['start'];
        }
        $data['column_search'] = $this->column_search;

        $datatable = new Datatables($this->table, $data, $this->column_order, $this->order);
        $list = $datatable->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $l) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $l->nama_agama;
            $row[] =
            '<a class="btn btn-sm btn-primary" href="'. base_url("master-data/agama/edit/".$l->id_agama) .'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleteItem('."'".$l->id_agama."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $datatable->count_all(),
            "recordsFiltered" => $datatable->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
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