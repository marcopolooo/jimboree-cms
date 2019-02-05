<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimoni extends CI_Controller
{
    private $table = 'tp_testimoni_parents';
    private $column_order = array(null, 'testimoni', 'parents_id'); //set column field database for datatable orderable
    private $column_search = array('testimoni', 'parents_id'); //set column field database for datatable searchable 
    private $order = array('id' => 'asc'); // default order 
    private $data = [];
    private $id = "id";

    function __construct(){
        parent::__construct();
        middleware();
    }

    public function index(){
        $result['data'] = $this->TestimoniModel->get();
        $this->load->view('testimoni/index', $result);
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
            $row[] = $l->testimoni;
            $parents = $this->ParentsModel->get();
            foreach ($parents as $p) {
                if($p->id_parents == $l->parents_id){
                    $l->parents_id = $p->nama;
                }
            }
            $row[] = $l->parents_id;
            $row[] =
            '<a class="btn btn-sm btn-primary" href="'. base_url("transaction/testimoni/edit/".$l->id) .'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
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
        $result['parents'] = $this->ParentsModel->get();
        $this->load->view('testimoni/add', $result);    
    }

    public function store(){
        $data['testimoni'] = $this->input->post('testimoni');
        $data['parents_id'] = $this->input->post('parents_id');
        $result = $this->TestimoniModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success insert!');
            redirect('transaction/testimoni');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('transaction/testimoni');
        }
    }

    public function edit($id){
        $result['parents'] = $this->TestimoniModel->get();
        $result['data'] = $this->TestimoniModel->getById($id);
        $this->load->view('testimoni/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['testimoni'] = $this->input->post('testimoni');
        $data['parents_id'] = $this->input->post('parents_id');
        $result = $this->TestimoniModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success update!');
            redirect('transaction/testimoni');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('transaction/testimoni');
        }
    }

    public function destroy(){
        $id = $this->input->post('id');
        $this->TestimoniModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>