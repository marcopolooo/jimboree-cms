<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aboutus extends CI_Controller
{
    function __construct(){
        parent::__construct();
        middleware();
    }

    private $table = 'tm_about_us';
    private $column_order = array(null, 'title'); //set column field database for datatable orderable
    private $column_search = array('title'); //set column field database for datatable searchable 
    private $order = array('id' => 'asc'); // default order 
    private $data = [];
    private $id = "id";

    public function index(){
        $this->load->view('aboutus/index');
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
            $l->title = $l->title . " " . $l->title2 . " " . $l->title3;
            $row[] = $l->title;
            $row[] = substr($l->desc, 0, 50) . ". . .";
            if($l->is_active == "ACTIVE"){
                $row[] = "<span class='label badge bg-green'>Activated</span>";
            } else {
                $row[] = "<span class='label badge bg-orange'>Deactivated</span>";
            }
            $row[] =
            '<a class="btn btn-sm btn-primary" href="'. base_url("master-data/aboutus/edit/".$l->id) .'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
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
        $this->load->view('aboutus/add');
    }

    public function store(){
        $data = array();
        $data['title'] = $this->input->post('title');
        $data['title2'] = $this->input->post('title2');
        $data['title3'] = $this->input->post('title3');
        $data['desc'] = $this->input->post('desc');
        $data['desc2'] = $this->input->post('desc2');
        if($this->input->post('is_active') == ""){
            $data['is_active'] = "INACTIVE";
        } else {
            $data['is_active'] = $this->input->post('is_active');
        }

        $config = getConfigImage("aboutus");
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('images'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', 'Failed insert! Because ' . $error['error']);
            redirect(base_url('master-data/aboutus'));
        }
        else
        {
            $data['image'] = array('upload-data' => $this->upload->data());
            $result = $this->AboutUsModel->store($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Success input');
                redirect(base_url('master-data/aboutus'));
            } else{
                $this->session->set_flashdata('error', 'Failed insert!');
                redirect(base_url('master-data/aboutus'));
            }
        }
    }

    public function edit($id){
        $result['data'] = $this->AboutUsModel->getById($id);
        $this->load->view('aboutus/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['title'] = $this->input->post('title');
        $data['title2'] = $this->input->post('title2');
        $data['title3'] = $this->input->post('title3');
        $data['desc'] = $this->input->post('desc');
        $data['desc2'] = $this->input->post('desc2');
        if($this->input->post('is_active') == ""){
            $data['is_active'] = "INACTIVE";
        } else {
            $data['is_active'] = $this->input->post('is_active');
        }

        $config = getConfigImage("aboutus");
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('images') )
        {
            $result = $this->AboutUsModel->update($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Success Update!');
                redirect(base_url('master-data/aboutus'));
            } else{
                $this->session->set_flashdata('error', 'Failed update!');
                redirect(base_url('master-data/aboutus'));
            }
        }
        else
        {
            $this->upload->do_upload('images');
            $data['image'] = array('upload-data' => $this->upload->data());

            $result = $this->AboutUsModel->update($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Success Update!');
                redirect(base_url('master-data/aboutus'));
            } else{
                $this->session->set_flashdata('error', 'Failed update!');
                redirect(base_url('master-data/aboutus'));
            }
        }
    }

    public function destroy(){
        $id = $this->input->post('id');
        try {
            $this->AboutUsModel->destroy($id);
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