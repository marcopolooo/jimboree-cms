<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller
{
    function __construct(){
        parent::__construct();
        middleware();
    }

    private $table = 'tm_news';
    private $column_order = array(null, 'title', 'desc', 'created_at'); //set column field database for datatable orderable
    private $column_search = array('title', 'desc', 'created_at'); //set column field database for datatable searchable 
    private $order = array('id' => 'asc'); // default order 
    private $data = [];
    private $id = "id";

    public function index(){
        $this->load->view('news/index');
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
            $row[] = $l->title;
            $row[] = $l->desc;
            $row[] = date("Y-m-d", strtotime($l->created_at));
            if($l->is_active == "ACTIVE"){
                $row[] = "<span class='label badge bg-green'>Activated</span>";
            } else {
                $row[] = "<span class='label badge bg-orange'>Deactivated</span>";
            }
            $row[] =
            '<a class="btn btn-sm btn-primary" href="'. base_url("master-data/news/edit/".$l->id) .'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
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
        $this->load->view('news/add');
    }

    public function store(){
        $data = array();
        $data['title'] = $this->input->post('title');
        $data['desc'] = $this->input->post('desc');
        if($this->input->post('is_active') == ""){
            $data['is_active'] = "INACTIVE";
        } else {
            $countActivated = $this->NewsModel->getActivated();
            if($countActivated[0]['active'] >= 3){
                $this->session->set_flashdata('error', 'Failed insert! Active article is limit of 3');
                redirect(base_url('master-data/news/add'));
            }
            $data['is_active'] = $this->input->post('is_active');
        }
        
        $config = getConfigImage("news");
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('image'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', 'Failed insert! Because ' . $error['error']);
            redirect(base_url('master-data/news'));
        }
        else
        {
            $data['image'] = array('upload_data' => $this->upload->data());
            $result = $this->NewsModel->store($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Success input');
                redirect(base_url('master-data/news'));
            } else{
                $this->session->set_flashdata('error', 'Failed insert!');
                redirect(base_url('master-data/news'));
            }
        }
    }

    public function edit($id){
        $result['data'] = $this->NewsModel->getById($id);
        $this->load->view('news/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['title'] = $this->input->post('title');
        $data['desc'] = $this->input->post('desc');
        if($this->input->post('is_active') == ""){
            $data['is_active'] = "INACTIVE";
        } else {
            $data['is_active'] = $this->input->post('is_active');
        }

        $config = getConfigImage("news");
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('image') )
        {
            $result = $this->NewsModel->update($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Success update!');
                redirect('master-data/news');
            } else{
                $this->session->set_flashdata('error', 'Failed update!');
                redirect('master-data/news');
            }
        }
        else
        {
            $this->upload->do_upload('image');
            $data['image'] = array('upload-data' => $this->upload->data());

            $result = $this->NewsModel->update($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Success update!');
                redirect('master-data/news');
            } else{
                $this->session->set_flashdata('error', 'Failed update!');
                redirect('master-data/news');
            }
        }
    }

    public function destroy(){
        $id = $this->input->post('id');
        try {
            $this->NewsModel->destroy($id);
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