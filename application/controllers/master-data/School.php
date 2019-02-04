<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class School extends CI_Controller
{
    private $table = 'tm_school';
    private $column_order = array(null, 'name_school', 'telephone', 'alamat', 'tanggal_pendirian', 'visi', 'misi', 'status_sekolah', 'akreditasi', 'kepala_sekolah'); //set column field database for datatable orderable
    private $column_search = array('name_school', 'telephone', 'alamat', 'tanggal_pendirian', 'visi', 'misi', 'status_sekolah', 'akreditasi', 'kepala_sekolah'); //set column field database for datatable searchable 
    private $order = array('id_sekolah' => 'asc'); // default order 
    private $data = [];
    private $id = "id_sekolah";

    function __construct(){
        parent::__construct();
        middleware();
    }

    public function index(){
        $this->load->view('school/index');
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
            $row[] = $l->name_school;
            $row[] = $l->telephone;
            $row[] = $l->alamat;
            $row[] = $l->tanggal_pendirian;
            // $row[] = $l->visi;
            // $row[] = $l->misi;
            $row[] = $l->status_sekolah;
            $row[] = $l->akreditasi;
            $row[] = $l->kepala_sekolah;
            
            $row[] =
            '<a class="btn btn-sm btn-primary" href="'. base_url("master-data/school/edit/".$l->id_sekolah) .'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleteItem('."'".$l->id_sekolah."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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
        $result['school'] = $this->SchoolModel->get();
        $this->load->view('school/add', $result);
    }

    public function store(){
        $data = array();
        $data['id_sekolah'] = $this->input->post('id_sekolah');
        $data['name_school'] = $this->input->post('name_school');
        $data['tanggal_pendirian'] = date('Y-m-d', strtotime($this->input->post('tanggal_pendirian')));
        $data['status_sekolah'] = $this->input->post('status_sekolah');
        $data['akreditasi'] = $this->input->post('akreditasi');
        $data['sertifikasi'] = $this->input->post('sertifikasi');
        $data['kepala_sekolah'] = $this->input->post('kepala_sekolah');
        $data['alamat'] = $this->input->post('alamat');
        $data['visi'] = $this->input->post('visi');
        $data['visi_2'] = $this->input->post('visi_2');
        $data['visi_subtitle'] = $this->input->post('visi_subtitle');
        $data['misi'] = $this->input->post('misi');
        $data['misi_2'] = $this->input->post('misi_2');
        $data['misi_subtitle'] = $this->input->post('misi_subtitle');
        $data['motto'] = $this->input->post('motto');
        $data['file_url'] = $this->input->post('file_url');

        $config = getConfigImage("school");
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('visi-image') && ! $this->upload->do_upload('misi-image') )
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', 'Failed insert! Because ' . $error['error']);
            redirect(base_url('master-data/school'));
        }
        else
        {
            $this->upload->do_upload('visi-image');
            $data['visi_image'] = array('upload-data' => $this->upload->data());
            $this->upload->do_upload('misi-image');
            $data['misi_image'] = array('upload-data' => $this->upload->data());

            $result = $this->SchoolModel->store($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Success insert!');
                redirect('master-data/school');
            } else{
                $this->session->set_flashdata('error', 'Failed insert!');
                redirect('master-data/school');
            }
        }
    }

    public function edit($id){
        $result['data'] = $this->SchoolModel->getById($id);
        $result['school'] = $this->SchoolModel->get();

        $this->load->view('school/edit', $result);
    }

    public function update(){
        $data = array();
        $data['id_sekolah'] = $this->input->post('id_sekolah');
        $data['name_school'] = $this->input->post('name_school');
        $data['tanggal_pendirian'] = date('Y-m-d', strtotime($this->input->post('tanggal_pendirian')));
        $data['status_sekolah'] = $this->input->post('status_sekolah');
        $data['akreditasi'] = $this->input->post('akreditasi');
        $data['sertifikasi'] = $this->input->post('sertifikasi');
        $data['kepala_sekolah'] = $this->input->post('kepala_sekolah');
        $data['alamat'] = $this->input->post('alamat');
        $data['visi'] = $this->input->post('visi');
        $data['visi_2'] = $this->input->post('visi_2');
        $data['visi_subtitle'] = $this->input->post('visi_subtitle');
        $data['misi'] = $this->input->post('misi');
        $data['misi_2'] = $this->input->post('misi_2');
        $data['misi_subtitle'] = $this->input->post('misi_subtitle');
        $data['motto'] = $this->input->post('motto');
        $data['file_url'] = $this->input->post('file_url');
        
        $config = getConfigImage("school");
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('visi-image') && ! $this->upload->do_upload('misi-image') )
        {
            // echo "IMAGE TIDAK DIUPLOAD 22NYA";die();
            $result = $this->SchoolModel->update($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Success update!');
                redirect('master-data/school');
            } else{
                $this->session->set_flashdata('error', 'Failed update!');
                redirect('master-data/school');
            }
            // $error = array('error' => $this->upload->display_errors());
            // $this->session->set_flashdata('error', 'Failed insert! Because ' . $error['error']);
            // redirect(base_url('master-data/school'));
        }
        else
        {
            // echo "IMAGE DIUPLOAD 22NYA";die();
            if(! $this->upload->do_upload('visi-image') ){
                $this->upload->do_upload('misi-image');
                $data['misi_image'] = array('upload-data' => $this->upload->data());
            } elseif (! $this->upload->do_upload('misi-image')) {
                $this->upload->do_upload('visi-image');
                $data['visi_image'] = array('upload-data' => $this->upload->data());
            } else {
                $this->upload->do_upload('misi-image');
                $data['misi_image'] = array('upload-data' => $this->upload->data());
                $this->upload->do_upload('visi-image');
                $data['visi_image'] = array('upload-data' => $this->upload->data());
            }

            $result = $this->SchoolModel->update($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Success update!');
                redirect('master-data/school');
            } else{
                $this->session->set_flashdata('error', 'Failed update!');
                redirect('master-data/school');
            }
        }
    }

    public function destroy(){
        $id = $this->input->post('id_sekolah');
        $this->SchoolModel->destroy($id);
        if($this->db->affected_rows()){
            $this->session->set_flashdata('success', 'Success delete!');
        } else {
            $this->session->set_flashdata('error', 'Failed delete!');
        }
    }
}

?>