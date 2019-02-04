<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ExtracuricullarStudent extends CI_Controller
{
    private $table = 'tp_extracuricullar_students';
    private $column_order = array(null, 'nis'); //set column field database for datatable orderable
    private $column_search = array('extra_id'); //set column field database for datatable searchable 
    private $order = array('id' => 'asc'); // default order 
    private $data = [];
    private $id = "id";

    function __construct(){
        parent::__construct();
        middleware();
    }

    public function index(){
        $this->load->view('extracuricullar-student/index');
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
            $row[] = $l->nis;
            $row[] = $l->extra_id;
            $row[] =
            '<a class="btn btn-sm btn-primary" href="'. base_url("extracuricullar-student/edit/".$l->id) .'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
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
        $result['extracuricullar'] = $this->ExtracuricullarModel->get();
        $this->load->view('extracuricullar-student/add', $result);
    }

    public function store(){
        $data = array();
        $data['jenis_extracuricullar'] = $this->input->post('jenis_extracuricullar');

        $result = $this->ExtracuricullarModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success input');
            redirect('extracuricullar');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('extracuricullar');
        }
    }

    public function edit($id){
        $result['data'] = $this->ExtracuricullarModel->getById($id);
        // $result['extracuricullar'] = $this->extracuricullarModel->get();
        // header('Content-Type: application/json');
        // echo json_encode( $result);
        // echo $result['data'][0];
        $this->load->view('extracuricullar-student/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['jenis_extracuricullar'] = $this->input->post('jenis_extracuricullar');

        $result = $this->ExtracuricullarModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success Update!');
            redirect('extracuricullar');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('extracuricullar');
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