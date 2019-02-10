<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller
{
    function __construct(){
        parent::__construct();
        middleware();
    }

    private $table = 'tx_schedule';
    private $column_order = array(null, 'mid', 'peg_id', 'id_class', 'jam_mulai', 'jam_selesai'); //set column field database for datatable orderable
    private $column_search = array('mid', 'peg_id', 'id_class', 'jam_mulai', 'jam_selesai'); //set column field database for datatable searchable 
    private $order = array('sid' => 'asc'); // default order 
    private $data = [];
    private $id = "sid";

    public function index(){
        $this->load->view('schedule/index');
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
            $mid = $this->SubjectsModel->getById($l->mid);
            $l->mid = $mid[0]['nama_mapel'];
            $row[] = $l->mid;
            $peg_id = $this->TeachersModel->getById($l->peg_id);
            $l->peg_id = $peg_id[0]['nama_depan'] . " " . $peg_id[0]['nama_tengah'] . " " . $peg_id[0]['nama_belakang'];
            $row[] = $l->peg_id;
            $id_class = $this->ClassModel->getById($l->id_class);
            $l->id_class = $id_class[0]['nama_ruang_kelas'];
            $row[] = $l->id_class;
            $row[] = date('l, d-m-Y', strtotime($l->tgl));
            $row[] = date('H:i A', strtotime($l->jam_mulai)) . " - " . date('H:i A', strtotime($l->jam_selesai));
            $row[] =
            '<a class="btn btn-sm btn-primary" href="'. base_url("transaction/schedule/edit/".$l->sid) .'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleteItem('."'".$l->sid."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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
        $data['schoolyear'] = $this->SchoolYearModel->get();
        $data['subjects'] = $this->SubjectsModel->get(array('sortBy' => 'nama_mapel', 'sortDir' => 'asc'));
        $data['teachers'] = $this->TeachersModel->get();
        $data['class'] = $this->ClassModel->get();
        $this->load->view('schedule/add', $data);
    }

    public function store(){
        $data = array();
        $data['id_tahun_ajaran'] = $this->input->post('id_tahun_ajaran');
        $data['id_class'] = $this->input->post('id_class');
        $data['peg_id'] = $this->input->post('peg_id');
        $data['mid'] = $this->input->post('mid');
        $data['tgl'] = date('Y-m-d', strtotime($this->input->post('tgl')));
        $data['jam_mulai'] = $this->input->post('jam_mulai');
        $data['jam_selesai'] = $this->input->post('jam_selesai');
        $data['created_at'] = date('Y-m-d H:i:s');
        if($this->input->post('is_active') == ""){
            $data['is_active'] = "INACTIVE";
        } else {
            $data['is_active'] = $this->input->post('is_active');
        }

        $result = $this->ScheduleModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success input');
            redirect(base_url('transaction/schedule'));
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect(base_url('transaction/schedule'));
        }
    }

    public function edit($id){
        $result['schoolyear'] = $this->SchoolYearModel->get();
        $result['subjects'] = $this->SubjectsModel->get(array('sortBy' => 'nama_mapel', 'sortDir' => 'asc'));
        $result['teachers'] = $this->TeachersModel->get();
        $result['class'] = $this->ClassModel->get();
        $result['data'] = $this->ScheduleModel->getById($id);
        $this->load->view('schedule/edit', $result);
    }

    public function update(){
        $data = array();
        $data['sid'] = $this->input->post('sid');
        $data['id_tahun_ajaran'] = $this->input->post('id_tahun_ajaran');
        $data['id_class'] = $this->input->post('id_class');
        $data['peg_id'] = $this->input->post('peg_id');
        $data['mid'] = $this->input->post('mid');
        $data['tgl'] = date('Y-m-d', strtotime($this->input->post('tgl')));
        $data['jam_mulai'] = $this->input->post('jam_mulai');
        $data['jam_selesai'] = $this->input->post('jam_selesai');
        $data['created_at'] = date('Y-m-d H:i:s');

        $result = $this->ScheduleModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success input');
            redirect(base_url('transaction/schedule'));
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect(base_url('transaction/schedule'));
        }
    }

    public function destroy(){
        $id = $this->input->post('sid');
        try {
            $this->ScheduleModel->destroy($id);
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