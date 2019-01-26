<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students extends CI_Controller
{
    var $table = 'tm_students';
    var $column_order = array(null, 'nama_depan', 'tanggal_lahir', 'alamat', 'hobi'); //set column field database for datatable orderable
    var $column_search = array('nama_depan', 'tanggal_lahir', 'alamat', 'hobi'); //set column field database for datatable searchable 
    var $order = array('nis' => 'asc'); // default order 
    var $data = [];
    var $id = "nis";

    function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view('students/index');
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
            $row[] = $l->nama_depan . " " . $l->nama_belakang;
            $row[] = date('Y') - substr($l->tanggal_lahir, 0,4);
            $row[] = $l->alamat;
            $row[] = $l->hobi;
            $row[] =
            '<a class="btn btn-sm btn-primary" href="'. base_url("master-data/students/edit/".$l->nis) .'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleteItem('."'".$l->nis."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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
        $this->load->view('students/add', $result);
    }

    public function store(){
        $data = array();
        $data['nis'] = $this->input->post('nis');
        $data['nama_panggilan'] = $this->input->post('nama_panggilan');
        $data['nama_depan'] = $this->input->post('nama_depan');
        $data['nama_tengah'] = $this->input->post('nama_tengah');
        $data['nama_belakang'] = $this->input->post('nama_belakang');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['tempat'] = $this->input->post('tempat');
        $data['tanggal_lahir'] = date('Y/m/d', strtotime($this->input->post('tanggal_lahir')));
        $data['id_agama'] = $this->input->post('agama');
        $data['alamat'] = $this->input->post('alamat');
        $data['hobi'] = $this->input->post('hobi');
        $result = $this->StudentsModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success insert!');
            redirect('master-data/students');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/students');
        }
    }

    public function edit($id){
        $result['data'] = $this->StudentsModel->getById($id);
        $result['agama'] = $this->AgamaModel->get();
        // header('Content-Type: application/json');
        // echo json_encode( $result);
        // echo $result['data'][0];
        $this->load->view('students/edit', $result);
    }

    public function update(){
        $data = array();
        $data['nis'] = $this->input->post('nis');
        $data['nama_panggilan'] = $this->input->post('nama_panggilan');
        $data['nama_depan'] = $this->input->post('nama_depan');
        $data['nama_tengah'] = $this->input->post('nama_tengah');
        $data['nama_belakang'] = $this->input->post('nama_belakang');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['tempat'] = $this->input->post('tempat');
        $data['tanggal_lahir'] = date('Y/m/d', strtotime($this->input->post('tanggal_lahir')));
        $data['id_agama'] = $this->input->post('agama');
        $data['alamat'] = $this->input->post('alamat');
        $data['hobi'] = $this->input->post('hobi');

        $result = $this->StudentsModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success update!');
            redirect('master-data/students');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('master-data/students');
        }
    }

    public function destroy(){
        $id = $this->input->post('nis');
        $this->StudentsModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>