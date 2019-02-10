<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classesprogram extends CI_Controller
{
    private $table = 'tm_classes_program';
    private $column_order = array(null, 'program', 'desc'); //set column field database for datatable orderable
    private $column_search = array('program', 'desc'); //set column field database for datatable searchable 
    private $order = array('id' => 'asc'); // default order 
    private $data = [];
    private $id = "id";

    function __construct(){
        parent::__construct();
        middleware();
    }

    public function index(){
        $this->load->view('classesprogram/index');
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
            $row[] = $l->program;
            $row[] = $l->desc;
            $row[] =
            '<a class="btn btn-sm btn-primary" href="'. base_url("master-data/classesprogram/edit/".$l->id) .'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
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
        $this->load->view('classesprogram/add');    
    }

    public function store(){
        $data['program'] = $this->input->post('program');
        $data['desc'] = $this->input->post('desc');

        $config = getConfigImage("classes-program");
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('image'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', 'Failed insert! Because ' . $error['error']);
            redirect(base_url('master-data/classesprogram'));
        }
        else
        {
            $data['image'] = array('upload-data' => $this->upload->data());
            $result = $this->ClassesProgramModel->store($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Success insert!');
                redirect('master-data/classesprogram');
            } else{
                $this->session->set_flashdata('error', 'Failed insert!');
                redirect('master-data/classesprogram');
            }
        }
    }

    public function edit($id){
        $result['data'] = $this->ClassesProgramModel->getById($id);
        $this->load->view('classesprogram/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['program'] = $this->input->post('program');
        $data['desc'] = $this->input->post('desc');

        $config = getConfigImage("classes-program");
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('image'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', 'Failed insert! Because ' . $error['error']);
            redirect(base_url('master-data/classesprogram'));
        }
        else
        {
            $data['image'] = array('upload-data' => $this->upload->data());
            $result = $this->ClassesProgramModel->update($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Success update!');
                redirect('master-data/classesprogram');
            } else{
                $this->session->set_flashdata('error', 'Failed update!');
                redirect('master-data/classesprogram');
            }
        }
    }

    public function destroy(){
        $id = $this->input->post('id');
        $this->ClassesProgramModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>