<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Typenilai extends CI_Controller
{
    private $table = 'tm_type_nilai';
    private $column_order = array(null, 'desc'); //set column field database for datatable orderable
    private $column_search = array('desc'); //set column field database for datatable searchable 
    private $order = array('id' => 'asc'); // default order 
    private $data = [];
    private $id = "id";

    function __construct(){
        parent::__construct();
        middleware();
    }

    public function index(){
        $result['data'] = $this->TypeNilaiModel->get();
        $this->load->view('type_nilai/index', $result);
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
            $row[] = $l->desc;
            $row[] =
            '<a class="btn btn-sm btn-primary" href="'. base_url("master-data/typenilai/edit/".$l->id) .'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleteItem('."'".$l->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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
        $result['type_nilai'] = $this->TypeNilaiModel->get();
        $this->load->view('type_nilai/add', $result);
    }

    public function store(){
        $data = array();
        $data['desc'] = $this->input->post('desc');

        $result = $this->TypeNilaiModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success input');
            redirect('master-data/typenilai');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/typenilai');
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
            redirect('master-data/typenilai');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('master-data/typenilai');
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