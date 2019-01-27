<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subjects extends CI_Controller
{
    var $table = 'tm_subjects';
    var $column_order = array(null, 'nama_mapel'); //set column field database for datatable orderable
    var $column_search = array('nama_mapel'); //set column field database for datatable searchable 
    var $order = array('mid' => 'asc'); // default order 
    var $data = [];
    var $id = "mid";

    function __construct(){
        parent::__construct();
        middleware();
    }

    public function index(){
        $this->load->view('subjects/index');
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
            $row[] = $l->nama_mapel;
            $row[] =
            '<a class="btn btn-sm btn-primary" href="'. base_url("master-data/subjects/edit/".$l->mid) .'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleteItem('."'".$l->mid."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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
        $this->load->view('subjects/add');    
    }

    public function store(){
        $data['nama_mapel'] = $this->input->post('nama_mapel');
        $result = $this->SubjectsModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success insert!');
            redirect('master-data/subjects');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/subjects');
        }
    }

    public function edit($id){
        $result['data'] = $this->SubjectsModel->getStudyById($id);
        $this->load->view('subjects/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['nama_mapel'] = $this->input->post('nama_mapel');
        $result = $this->SubjectsModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success update!');
            redirect('master-data/subjects');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('master-data/subjects');
        }
    }

    public function destroy(){
        $id = $this->input->post('mid');
        $this->SubjectsModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>