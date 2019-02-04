<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schoolyear extends CI_Controller
{
    private $table = 'tp_school_year';
    private $column_order = array(null, 'id_sekolah'); //set column field database for datatable orderable
    private $column_search = array('id_sekolah'); //set column field database for datatable searchable 
    private $order = array('id_tahun_ajaran' => 'asc'); // default order 
    private $data = [];
    private $id = "id_tahun_ajaran";

    function __construct(){
        parent::__construct();
        middleware();
    }

    public function index(){
        $this->load->view('school-year/index');
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
            $school = $this->SchoolModel->get();
            foreach ($school as $s) {
                if($s->id_sekolah == $l->id_sekolah){
                    $l->id_sekolah = $s->name_school;
                }
            }
            $row[] = $l->id_sekolah;
            $row[] = $l->from;
            $row[] = $l->to;
            if($l->is_active == "ACTIVE"){
                $row[] = "<span class='label badge bg-green'>Activated</span>";
            } else {
                $row[] = "<span class='label badge bg-orange'>Deactivated</span>";
            }
            
            $row[] =
            '<a class="btn btn-sm btn-primary" href="'. base_url("schoolyear/edit/".$l->id_tahun_ajaran) .'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleteItem('."'".$l->id_tahun_ajaran."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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
        $result['school'] = $this->SchoolModel->get();
        $this->load->view('school-year/add', $result);
    }

    public function store(){
        $data = array();
        $data['id_sekolah'] = $this->input->post('sekolah');
        $data['desc'] = $this->input->post('desc');
        $data['from'] = $this->input->post('from');
        $data['to'] = $this->input->post('to');
        $data['is_active'] = $this->input->post('is_active');
        if ($data['from'] > $data['to']) {
            $this->session->set_flashdata('error', 'Failed insert! From year must bigger than to year.');
            redirect('schoolyear/add');
        }

        if($this->input->post('is_active') == ""){
            $data['is_active'] = "INACTIVE";
        } else {
            $data['is_active'] = $this->input->post('is_active');
        }
        
        $result = $this->SchoolYearModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success insert!');
            redirect('schoolyear');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('schoolyear');
        }
    }

    public function edit($id){
        $result['data'] = $this->SchoolYearModel->getById($id);
        $result['school'] = $this->SchoolYearModel->get();
        $this->load->view('school-year/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id_tahun_ajaran'] = $this->input->post('id_tahun_ajaran');
        $data['id_sekolah'] = $this->input->post('sekolah');
        $data['desc'] = $this->input->post('desc');
        $data['from'] = $this->input->post('from');
        $data['to'] = $this->input->post('to');
        if($this->input->post('is_active') == ""){
            $data['is_active'] = "INACTIVE";
        } else {
            $data['is_active'] = $this->input->post('is_active');
        }
        
        $result = $this->SchoolYearModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success update!');
            redirect('schoolyear');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('schoolyear');
        }
    }

    public function destroy(){
        $id = $this->input->post('id_tahun_ajaran');
        $this->SchoolYearModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>