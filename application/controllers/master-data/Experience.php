<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Experience extends CI_Controller
{
    private $table = 'tm_experience';
    private $column_order = array(null, 'passing_universities', 'people_working', 'student_enrolled', 'happy_smiles'); //set column field database for datatable orderable
    private $column_search = array('passing_universities', 'people_working', 'student_enrolled', 'happy_smiles'); //set column field database for datatable searchable 
    private $order = array('id' => 'asc'); // default order 
    private $data = [];
    private $id = "id";

    function __construct(){
        parent::__construct();
        middleware();
    }

    public function index(){
        $result['data'] = $this->ExperienceModel->get();
        $this->load->view('experience/index', $result);
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
            $row[] = $l->passing_universities;
            $row[] = $l->people_working;
            $row[] = $l->student_enrolled;
            $row[] = $l->happy_smiles;
            $row[] =
            '<a class="btn btn-sm btn-primary" href="'. base_url("master-data/experience/edit/".$l->id) .'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
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
        $result['agama']=$this->AgamaModel->get();
        $this->load->view('experience/add', $result);    
    }

    public function store(){
        $data['passing_universities'] = $this->input->post('passing_universities');
        $data['people_working'] = $this->input->post('people_working');
        $data['student_enrolled'] = $this->input->post('student_enrolled');
        $data['happy_smiles'] = $this->input->post('happy_smiles');
        $result = $this->ExperienceModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success insert!');
            redirect('master-data/experience');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/experience');
        }
    }

    public function edit($id){
        $result['data'] = $this->ExperienceModel->getById($id);
        $result['agama'] = $this->AgamaModel->get();
        $this->load->view('experience/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['passing_universities'] = $this->input->post('passing_universities');
        $data['people_working'] = $this->input->post('people_working');
        $data['student_enrolled'] = $this->input->post('student_enrolled');
        $data['happy_smiles'] = $this->input->post('happy_smiles');
        $result = $this->ExperienceModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success update!');
            redirect('master-data/experience');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('master-data/experience');
        }
    }

    public function destroy(){
        $id = $this->input->post('id');
        $this->ExperienceModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>