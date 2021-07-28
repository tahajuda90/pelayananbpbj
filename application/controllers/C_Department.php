<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Department extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Department');
        $this->load->library('form_validation');
        $this->load->library('Datatables');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'C_Department?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'C_Department?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'C_Department';
            $config['first_url'] = base_url() . 'C_Department';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_Department->total_rows($q);
        $c_department = $this->M_Department->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'c_department_data' => $c_department,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'page'=>'c_department/department_list'
        );
        $this->load->view('Main_V', $data);
    }
    
    public function coba(){
        print_r($this->M_Department->json());
    }

    public function read($id) 
    {
        $row = $this->M_Department->get_by_id($id);
        if ($row) {
            $data = array(
		'id_dprtm' => $row->id_dprtm,
		'nama_dprt' => $row->nama_dprt,
	    );
            $this->load->view('c_department/department_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_department'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('C_Department/create_action'),
	    'id_dprtm' => set_value('id_dprtm'),
	    'nama_dprt' => set_value('nama_dprt'),
            'link' => set_value('link'),
            'page'=>'c_department/department_form'
	);
        $this->load->view('Main_V', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_dprt' => $this->input->post('nama_dprt',TRUE),
                'link' => $this->input->post('link',TRUE)
	    );

            $this->M_Department->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('C_Department'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_Department->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('c_department/update_action'),
		'id_dprtm' => set_value('id_dprtm', $row->id_dprtm),
		'nama_dprt' => set_value('nama_dprt', $row->nama_dprt),
                'link' => set_value('link', $row->link),
	    'page'=>'c_department/department_form'
	);
        $this->load->view('Main_V', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('C_Department'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_dprtm', TRUE));
        } else {
            $data = array(
		'nama_dprt' => $this->input->post('nama_dprt',TRUE),
                'link' => $this->input->post('link',TRUE)
	    );

            $this->M_Department->update($this->input->post('id_dprtm', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('c_department'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_Department->get_by_id($id);

        if ($row) {
            $this->M_Department->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('c_department'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_department'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_dprt', 'nama dprt', 'trim|required');

	$this->form_validation->set_rules('id_dprtm', 'id_dprtm', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
