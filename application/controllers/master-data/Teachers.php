<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teachers extends CI_Controller
{
    var $table = 'tm_teachers';
    var $column_order = array(null, 'nama_depan', 'alamat', 'telephone'); //set column field database for datatable orderable
    var $column_search = array('nama_depan', 'alamat', 'telephone'); //set column field database for datatable searchable 
    var $order = array('peg_id' => 'asc'); // default order 
    var $data = [];
    var $id = "peg_id";

    function __construct(){
        parent::__construct();
        middleware();
    }

    public function index(){
        $this->load->view('teachers/index');
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
            $row[] = $l->alamat;
            $row[] = $l->telephone;
            if($l->is_active == "ACTIVE"){
                $row[] = "<span class='label badge bg-green'>Activated</span>";
            } else {
                $row[] = "<span class='label badge bg-orange'>Deactivated</span>";
            }
            $row[] =
            '<a class="btn btn-sm btn-primary" href="'. base_url("master-data/teachers/edit/".$l->peg_id) .'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleteItem('."'".$l->peg_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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
        $this->load->view('teachers/add', $result);
    }

    public function store(){
        $data = array();
        $data['npwp'] = $this->input->post('npwp');
        $data['nama_panggilan'] = $this->input->post('nama_panggilan');
        $data['nama_depan'] = $this->input->post('nama_depan');
        $data['nama_tengah'] = $this->input->post('nama_tengah');
        $data['nama_belakang'] = $this->input->post('nama_belakang');
        $data['tempat'] = $this->input->post('tempat');
        $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
        $data['id_agama'] = $this->input->post('agama');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['alamat'] = $this->input->post('alamat');
        $data['telephone'] = $this->input->post('telephone');
        $data['email'] = $this->input->post('email');
        $data['jabatan'] = $this->input->post('jabatan');

        if($this->input->post('is_active') == ""){
            $data['is_active'] = "INACTIVE";
        } else {
            $countActivated = $this->TeachersModel->getActivated();
            if($countActivated[0]['active'] >= 3){
                $this->session->set_flashdata('error', 'Failed insert! Active article is limit of 3');
                redirect(base_url('master-data/teachers/add'));
            }
            $data['is_active'] = $this->input->post('is_active');
        }
        
        $config = getConfigImage("teachers");
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('image'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', 'Failed insert! Because ' . $error['error']);
            redirect(base_url('master-data/teachers'));
        }
        else
        {
            $data['image'] = array('upload_data' => $this->upload->data());
            $result = $this->TeachersModel->store($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Success insert!');
                redirect('master-data/teachers');
            } else{
                $this->session->set_flashdata('error', 'Failed insert!');
                redirect('master-data/teachers');
            }
        }
    }

    public function edit($id){
        $result['data'] = $this->TeachersModel->getById($id);
        $result['agama'] = $this->AgamaModel->get();
        // header('Content-Type: application/json');
        // echo json_encode( $result);
        // echo $result['data'][0];
        // print_r($result['data']);die();
        $this->load->view('teachers/edit', $result);
    }

    public function update(){
        $data = array();
        $data['peg_id'] = $this->input->post('peg_id');
        $data['npwp'] = $this->input->post('npwp');
        $data['nama_panggilan'] = $this->input->post('nama_panggilan');
        $data['nama_depan'] = $this->input->post('nama_depan');
        $data['nama_tengah'] = $this->input->post('nama_tengah');
        $data['nama_belakang'] = $this->input->post('nama_belakang');
        $data['tempat'] = $this->input->post('tempat');
        $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
        $data['id_agama'] = $this->input->post('agama');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['alamat'] = $this->input->post('alamat');
        $data['telephone'] = $this->input->post('telephone');
        $data['email'] = $this->input->post('email');
        $data['jabatan'] = $this->input->post('jabatan');
        if($this->input->post('is_active') == ""){
            $data['is_active'] = "INACTIVE";
        } else {
            $data['is_active'] = $this->input->post('is_active');
        }

        $config = getConfigImage("teachers");
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('image') )
        {
            $result = $this->TeachersModel->update($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Success update!');
                redirect('master-data/teachers');
            } else{
                $this->session->set_flashdata('error', 'Failed update!');
                redirect('master-data/teachers');
            }
        }
        else
        {
            $this->upload->do_upload('image');
            $data['image'] = array('upload-data' => $this->upload->data());

            $result = $this->TeachersModel->update($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Success update!');
                redirect('master-data/teachers');
            } else{
                $this->session->set_flashdata('error', 'Failed update!');
                redirect('master-data/teachers');
            }
        }
    }

    public function destroy(){
        $id = $this->input->post('peg_id');
        $this->TeachersModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>