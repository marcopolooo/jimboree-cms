<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller
{
    private $table = 'tm_events';
    private $column_order = array(null, 'nama, desc, events_type_id'); //set column field database for datatable orderable
    private $column_search = array('nama, desc, events_type_id'); //set column field database for datatable searchable 
    private $order = array('id_events' => 'asc'); // default order 
    private $data = [];
    private $id = "id_events";

    function __construct(){
        parent::__construct();
        middleware();
    }

    public function index(){
        $result['data'] = $this->EventsModel->get();
        $this->load->view('events/index', $result);
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
        $eventsType = $this->EventsTypeModel->get();
        foreach ($list as $l) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $l->nama;
            foreach ($eventsType as $et) {
                if($l->events_type_id = $et->id){
                    $l->events_type_id = $et->type;
                }
            }
            $row[] = $l->desc;
            $row[] = $l->events_type_id;
            $row[] =
            '<a class="btn btn-sm btn-primary" href="'. base_url("master-data/events/edit/".$l->id_events) .'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleteItem('."'".$l->id_events."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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
        $result['eventsType'] = $this->EventsTypeModel->get();
        $this->load->view('events/add', $result);
    }

    public function store(){
        $data = array();
        $data['nama'] = $this->input->post('event');
        $data['desc'] = $this->input->post('desc');
        $data['events_type_id'] = $this->input->post('event-type');
        $data['schedule'] = $this->input->post('schedule');
        // print_r($data);die();
        // $data['meeting'] = date('Y/m/d', strtotime($this->input->post('meeting')));
        $result = $this->EventsModel->store($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success insert!');
            redirect('master-data/events');
        } else{
            $this->session->set_flashdata('error', 'Failed insert!');
            redirect('master-data/events');
        }
    }

    public function edit($id){
        $result['data'] = $this->EventsModel->getById($id);
        $result['eventsType'] = $this->EventsTypeModel->get();
        $this->load->view('events/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id_events'] = $this->input->post('id');
        $data['nama'] = $this->input->post('event');
        $data['desc'] = $this->input->post('desc');
        $data['events_type_id'] = $this->input->post('event-type');
        $data['schedule'] = $this->input->post('schedule');
        
        $result = $this->EventsModel->update($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Success update!');
            redirect('master-data/events');
        } else{
            $this->session->set_flashdata('error', 'Failed update!');
            redirect('master-data/events');
        }
    }

    public function destroy(){
        $id = $this->input->post('id_events');
        $this->EventsModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>