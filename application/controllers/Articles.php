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

        $articlesType = $this->ArticlesTypeModel->get();


        foreach ($list as $l) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $l->title;

            foreach($articlesType as $a){
                if ($l->articles_type_id == $a->id) {
                    $l->articles_type_id = $a->articles_type;
                }
            }

            $row[] = $l->articles_type_id;
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
        $result['articlesType'] = $this->ArticlesTypeModel->get();
        // print_r($articlesType);
        // foreach ($articlesType as $a ) {
        //     echo $a->id . "<br>";
        //     echo $a->articles_type . "<br>";
        // }
        // die();
        $this->load->view('articles/add', $result);
    }

    public function store(){
        $data = array();
        $data['title'] = $this->input->post('title');
        $data['articles_type'] = $this->input->post('articles_type');
        $data['desc'] = $this->input->post('desc');

        $yearFolder = date('Y');
        if(!is_dir('././assets/uploads/articles/' . $yearFolder)) {
            mkdir('././assets/uploads/articles/' . $yearFolder, 0777);
        }
        $monthFolder = date('m');
        if(!is_dir('././assets/uploads/articles/' . $yearFolder . "/" . $monthFolder)) {
            mkdir('assets/uploads/articles/' . $yearFolder . "/" . $monthFolder, 0777);
        }
        $dateFolder = date('d');
        if(!is_dir('././assets/uploads/articles/' . $yearFolder . "/" . $monthFolder . "/" . $dateFolder)) {
            mkdir('assets/uploads/articles/' . $yearFolder . "/" . $monthFolder . "/" . $dateFolder, 0777);
        }
        $folder = $yearFolder . "/" . $monthFolder . "/" . $dateFolder . "/";

        $config['upload_path']          = '././assets/uploads/articles/' . $folder;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10024;
        $config['override']             = true;
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('image'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', 'Failed insert! Because ' . $error['error']);
            redirect(base_url('master-data/articles'));
        }
        else
        {
            $data['image'] = array('upload_data' => $this->upload->data());
            // print_r($data);die();
            $result = $this->ArticlesModel->store($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Success input');
                redirect(base_url('master-data/articles'));
            } else{
                $this->session->set_flashdata('error', 'Failed insert!');
                redirect(base_url('master-data/articles'));
            }
        }
    }

    public function edit($id){
        $result['data'] = $this->ArticlesModel->getById($id);
        $result['articlesType'] = $this->ArticlesTypeModel->get();
        // foreach ($result['articlesType'] as $a ) {
        //      echo $a->id . "<br>" . $a->articles_type . "<br>";
        // }

        // print_r($result);die();
        $this->load->view('articles/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['title'] = $this->input->post('title');
        $data['articles_type'] = $this->input->post('articles_type');
        $data['desc'] = $this->input->post('desc');

        $yearFolder = date('Y');
        if(!is_dir('././assets/uploads/articles/' . $yearFolder)) {
            mkdir('././assets/uploads/articles/' . $yearFolder, 0777);
        }
        $monthFolder = date('m');
        if(!is_dir('././assets/uploads/articles/' . $yearFolder . "/" . $monthFolder)) {
            mkdir('assets/uploads/articles/' . $yearFolder . "/" . $monthFolder, 0777);
        }
        $dateFolder = date('d');
        if(!is_dir('././assets/uploads/articles/' . $yearFolder . "/" . $monthFolder . "/" . $dateFolder)) {
            mkdir('assets/uploads/articles/' . $yearFolder . "/" . $monthFolder . "/" . $dateFolder, 0777);
        }
        $folder = $yearFolder . "/" . $monthFolder . "/" . $dateFolder . "/";

        $config['upload_path']          = '././assets/uploads/articles/' . $folder;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10024;
        $config['override']             = true;
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('image'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', 'Failed update! Because ' . $error['error']);
            redirect(base_url('master-data/articles'));
        }
        else
        {
            $data['image'] = array('upload_data' => $this->upload->data());
            // print_r($data);die();
            $result = $this->ArticlesModel->update($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Success update');
                redirect(base_url('master-data/articles'));
            } else{
                $this->session->set_flashdata('error', 'Failed update!');
                redirect(base_url('master-data/articles'));
            }
        }
    }

    public function destroy(){
        $id = $this->input->post('id');
        try {
            $this->ArticlesModel->destroy($id);
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