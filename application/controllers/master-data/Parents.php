<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parents extends CI_Controller
{
    private $table = 'tm_parents';
    private $column_order = array(null, 'nama', 'alamat', 'telephone'); //set column field database for datatable orderable
    private $column_search = array('nama', 'alamat', 'telephone'); //set column field database for datatable searchable 
    private $order = array('id_parents' => 'asc'); // default order 
    private $data = [];
    private $id = "id_parents";

    function __construct(){
        parent::__construct();
        middleware();
    }

    public function index(){
        $result['data'] = $this->ParentsModel->get();
        $this->load->view('parents/index', $result);
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
            $row[] = $l->nama;
            $row[] = $l->alamat;
            $row[] = $l->telephone;
            $row[] =
            '<a class="btn btn-sm btn-primary" href="'. base_url("master-data/parents/edit/".$l->id_parents) .'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleteItem('."'".$l->id_parents."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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
        $this->load->view('parents/add', $result);    
    }

    public function store(){
        $data['nama'] = $this->input->post('nama');
        $data['id_agama'] = $this->input->post('id_agama');
        $data['alamat'] = $this->input->post('alamat');
        $data['telephone'] = $this->input->post('telephone');
        $data['role_parents'] = $this->input->post('role_parents');
        
        $config = getConfigImage("parents");
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('image'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', 'Failed insert! Because ' . $error['error']);
            redirect(base_url('master-data/parents'));
        }
        else
        {
            $data['image'] = array('upload-data' => $this->upload->data());
            $result = $this->ParentsModel->store($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Success insert!');
                redirect('master-data/parents');
            } else{
                $this->session->set_flashdata('error', 'Failed insert!');
                redirect('master-data/parents');
            }
        }
    }

    public function edit($id){
        $result['data'] = $this->ParentsModel->getById($id);
        $result['agama'] = $this->AgamaModel->get();
        $this->load->view('parents/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id'] = $this->input->post('id_parents');
        $data['nama'] = $this->input->post('nama');
        $data['id_agama'] = $this->input->post('id_agama');
        $data['alamat'] = $this->input->post('alamat');
        $data['telephone'] = $this->input->post('telephone');
        $data['role_parents'] = $this->input->post('role_parents');

        $config = getConfigImage("parents");
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('image') )
        {
            $result = $this->ParentsModel->update($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Success update!');
                redirect('master-data/parents');
            } else{
                $this->session->set_flashdata('error', 'Failed update!');
                redirect('master-data/parents');
            }
        }
        else
        {
            $this->upload->do_upload('image');
            $data['image'] = array('upload-data' => $this->upload->data());

            $result = $this->ParentsModel->update($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Success update!');
                redirect('master-data/parents');
            } else{
                $this->session->set_flashdata('error', 'Failed update!');
                redirect('master-data/parents');
            }
        }
    }

    public function destroy(){
        $id = $this->input->post('id_parents');
        $this->ParentsModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>