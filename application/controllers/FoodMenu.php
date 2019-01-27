<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Foodmenu extends CI_Controller
{
    private $table = 'tm_food_menu';
    private $column_order = array(null, 'jenis_makanan', 'jenis_minuman', 'jenis_buah'); //set column field database for datatable orderable
    private $column_search = array('jenis_makanan', 'jenis_minuman', 'jenis_buah'); //set column field database for datatable searchable 
    private $order = array('fid' => 'asc'); // default order 
    private $data = [];
    private $id = "fid";

    function __construct(){
        parent::__construct();
        middleware();
    }

    public function index(){
        $result['data'] = $this->FoodMenuModel->get();
        $this->load->view('foodmenu/index', $result);
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
            $row[] = $l->jenis_makanan;
            $row[] = $l->jenis_minuman;
            $row[] = $l->jenis_buah;
            $row[] =
            '<a class="btn btn-sm btn-primary" href="'. base_url("master-data/foodmenu/edit/".$l->fid) .'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleteItem('."'".$l->fid."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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
        $result['foodmenu'] = $this->FoodMenuModel->get();
        $this->load->view('foodmenu/add', $result);
    }

    public function store(){
        $data = array();
        $data['jenis_makanan'] = $this->input->post('jenis_makanan');
        $data['jenis_minuman'] = $this->input->post('jenis_minuman');
        $data['jenis_buah'] = $this->input->post('jenis_buah');
        
        $result = $this->FoodMenuModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success insert!');
            redirect('master-data/foodmenu');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/foodmenu');
        }
    }

    public function edit($id){
        $result['data'] = $this->FoodMenuModel->getById($id);
        $result['foodmenu'] = $this->FoodMenuModel->get();
        // header('Content-Type: application/json');
        // echo json_encode( $result);
        // echo $result['data'][0];
        $this->load->view('foodmenu/edit', $result);
    }

    public function update(){
        $data = array();
        $data['fid'] = $this->input->post('fid');
        $data['jenis_makanan'] = $this->input->post('jenis_makanan');
        $data['jenis_minuman'] = $this->input->post('jenis_minuman');
        $data['jenis_buah'] = $this->input->post('jenis_buah');
        
        $result = $this->FoodMenuModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success update!');
            redirect('master-data/foodmenu');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('master-data/foodmenu');
        }
    }

    public function destroy(){
        $id = $this->input->post('fid');
        $this->FoodMenuModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>