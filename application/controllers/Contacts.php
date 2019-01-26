<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacts extends CI_Controller
{
    private $table = 'tm_contact';
    private $column_order = array(null, 'alamat', 'telephone', 'email', 'media_center', 'staff_directory'); //set column field database for datatable orderable
    private $column_search = array('alamat', 'telephone', 'email', 'media_center', 'staff_directory'); //set column field database for datatable searchable 
    private $order = array('cid' => 'asc'); // default order 
    private $data = [];
    private $id = "cid";

    function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view('contacts/index');
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
            $row[] = $l->alamat;
            $row[] = $l->telephone;
            $row[] = $l->email;
            $row[] = $l->media_center;
            $row[] = $l->staff_directory;
            $row[] =
            '<a class="btn btn-sm btn-primary" href="'. base_url("master-data/contacts/edit/".$l->cid) .'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleteItem('."'".$l->cid."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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
        $result['contacts'] = $this->ContactsModel->get();
        $this->load->view('contacts/add', $result);
    }

    public function store(){
        $data = array();
        $data['cid'] = $this->input->post('cid');
        $data['alamat'] = $this->input->post('alamat');
        $data['telephone'] = $this->input->post('telephone');
        $data['no_fax'] = $this->input->post('no_fax');
        $data['email'] = $this->input->post('email');
        $data['media_center'] = $this->input->post('media_center');
        $data['staff_directory'] = $this->input->post('staff_directory');
        $data['facebook'] = $this->input->post('facebook');
        $result = $this->ContactsModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success insert!');
            redirect('master-data/contacts');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/contacts');
        }
    }

    public function edit($id){
        $result['data'] = $this->ContactsModel->getById($id);
        // header('Content-Type: application/json');
        // echo json_encode( $result);
        // echo $result['data'][0];
        $this->load->view('contacts/edit', $result);
    }

    public function update(){
        $data = array();
        $data['cid'] = $this->input->post('cid');
        $data['alamat'] = $this->input->post('alamat');
        $data['telephone'] = $this->input->post('telephone');
        $data['no_fax'] = $this->input->post('no_fax');
        $data['email'] = $this->input->post('email');
        $data['media_center'] = $this->input->post('media_center');
        $data['staff_directory'] = $this->input->post('staff_directory');
        $data['facebook'] = $this->input->post('facebook');
        $result = $this->ContactsModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success update!');
            redirect('master-data/contacts');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('master-data/contacts');
        }
    }

    public function destroy(){
        $id = $this->input->post('cid');
        $this->ContactsModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>