<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Visitor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Visitor');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
        if (!$this->ion_auth->logged_in()) {
            redirect('Auth', 'refresh');
        }
    }

    public function index()
    {
        $data['page']='c_visitor/visitor_list';
        $this->load->view('Main_V',$data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->M_Visitor->json();
    }

    public function read($id) 
    {
        $row = $this->M_Visitor->get_by_id($id);
        if ($row) {
            $data = array(
		'id_visit' => $row->id_visit,
		'email' => $row->email,
		'unik' => $row->unik,
		'role' => $row->role,
		'no_identitas' => $row->no_identitas,
		'nama' => $row->nama,
		'kelamin' => $row->kelamin,
		'instansi' => $row->instansi,
		'telepon' => $row->telepon,
		'keperluan' => $row->keperluan,
		'keterangan' => $row->keterangan,
		'surat_tugas' => $row->surat_tugas,
		'wajah' => $row->wajah,
		'created_date' => $row->created_date,
		'updated_date' => $row->updated_date,
	    );
            $this->load->view('c_visitor/visitor_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_visitor'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('c_visitor/create_action'),
	    'id_visit' => set_value('id_visit'),
	    'email' => set_value('email'),
	    'unik' => set_value('unik'),
	    'role' => set_value('role'),
	    'no_identitas' => set_value('no_identitas'),
	    'nama' => set_value('nama'),
	    'kelamin' => set_value('kelamin'),
	    'instansi' => set_value('instansi'),
	    'telepon' => set_value('telepon'),
	    'keperluan' => set_value('keperluan'),
	    'keterangan' => set_value('keterangan'),
	    'surat_tugas' => set_value('surat_tugas'),
	    'wajah' => set_value('wajah'),
	    'created_date' => set_value('created_date'),
	    'updated_date' => set_value('updated_date'),
	);
        $this->load->view('c_visitor/visitor_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'email' => $this->input->post('email',TRUE),
		'unik' => $this->input->post('unik',TRUE),
		'role' => $this->input->post('role',TRUE),
		'no_identitas' => $this->input->post('no_identitas',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'kelamin' => $this->input->post('kelamin',TRUE),
		'instansi' => $this->input->post('instansi',TRUE),
		'telepon' => $this->input->post('telepon',TRUE),
		'keperluan' => $this->input->post('keperluan',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'surat_tugas' => $this->input->post('surat_tugas',TRUE),
		'wajah' => $this->input->post('wajah',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
	    );

            $this->M_Visitor->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('c_visitor'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_Visitor->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('c_visitor/update_action'),
		'id_visit' => set_value('id_visit', $row->id_visit),
		'email' => set_value('email', $row->email),
		'unik' => set_value('unik', $row->unik),
		'role' => set_value('role', $row->role),
		'no_identitas' => set_value('no_identitas', $row->no_identitas),
		'nama' => set_value('nama', $row->nama),
		'kelamin' => set_value('kelamin', $row->kelamin),
		'instansi' => set_value('instansi', $row->instansi),
		'telepon' => set_value('telepon', $row->telepon),
		'keperluan' => set_value('keperluan', $row->keperluan),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'surat_tugas' => set_value('surat_tugas', $row->surat_tugas),
		'wajah' => set_value('wajah', $row->wajah),
		'created_date' => set_value('created_date', $row->created_date),
		'updated_date' => set_value('updated_date', $row->updated_date),
	    );
            $this->load->view('c_visitor/visitor_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_visitor'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_visit', TRUE));
        } else {
            $data = array(
		'email' => $this->input->post('email',TRUE),
		'unik' => $this->input->post('unik',TRUE),
		'role' => $this->input->post('role',TRUE),
		'no_identitas' => $this->input->post('no_identitas',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'kelamin' => $this->input->post('kelamin',TRUE),
		'instansi' => $this->input->post('instansi',TRUE),
		'telepon' => $this->input->post('telepon',TRUE),
		'keperluan' => $this->input->post('keperluan',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'surat_tugas' => $this->input->post('surat_tugas',TRUE),
		'wajah' => $this->input->post('wajah',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
	    );

            $this->M_Visitor->update($this->input->post('id_visit', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('c_visitor'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_Visitor->get_by_id($id);

        if ($row) {
            $this->M_Visitor->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('c_visitor'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_visitor'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('unik', 'unik', 'trim|required');
	$this->form_validation->set_rules('role', 'role', 'trim|required');
	$this->form_validation->set_rules('no_identitas', 'no identitas', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('kelamin', 'kelamin', 'trim|required');
	$this->form_validation->set_rules('instansi', 'instansi', 'trim|required');
	$this->form_validation->set_rules('telepon', 'telepon', 'trim|required');
	$this->form_validation->set_rules('keperluan', 'keperluan', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('surat_tugas', 'surat tugas', 'trim|required');
	$this->form_validation->set_rules('wajah', 'wajah', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');

	$this->form_validation->set_rules('id_visit', 'id_visit', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file C_Visitor.php */
/* Location: ./application/controllers/C_Visitor.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-09 13:31:54 */
/* http://harviacode.com */