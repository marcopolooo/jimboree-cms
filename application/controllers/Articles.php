<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends CI_Controller
{
    function __construct(){
        parent::__construct();
        middleware();
    }

    private $table = 'tm_articles';
    private $column_order = array(null, 'title', 'articles_type'); //set column field database for datatable orderable
    private $column_search = array('title', 'articles_type'); //set column field database for datatable searchable 
    private $order = array('id' => 'asc'); // default order 
    private $data = [];
    private $id = "id";

    public function index(){
        $this->load->view('articles/index');
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
            $row[] = $l->articles_type;
            $row[] =
            '<a class="btn btn-sm btn-primary" href="'. base_url("master-data/articles/edit/".$l->id) .'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
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
        $articlesType = $this->ArticlesTypeModel->get();
        $this->load->view('articles/add', $articlesType);
    }

    public function store(){
        $data = array();
        $data['articles_type'] = $this->input->post('articles_type');

        $result = $this->ArticlesTypeModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success input');
            redirect(base_url('master-data/articles'));
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect(base_url('master-data/articles'));
        }
    }

    public function edit($id){
        $result['data'] = $this->ArticlesTypeModel->getById($id);
        $this->load->view('articles/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['articles_type'] = $this->input->post('articles_type');

        $result = $this->ArticlesTypeModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success Update!');
            redirect(base_url('master-data/articles'));
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect(base_url('master-data/articles'));
        }
    }

    public function destroy(){
        $id = $this->input->post('id');
        try {
            $this->ArticlesTypeModel->destroy($id);
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