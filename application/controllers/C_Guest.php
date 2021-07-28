<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Guest extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Guest');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'c_guest' . urlencode($q);
            $config['first_url'] = base_url() . 'c_guest' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'c_guest';
            $config['first_url'] = base_url() . 'c_guest';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_Guest->total_rows($q);
        $c_guest = $this->M_Guest->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'c_guest_data' => $c_guest,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'page'=>'c_guest/guest_type_list'
        );
        $this->load->view('Main_V', $data);
    }

    public function read($id) 
    {
        $row = $this->M_Guest->get_by_id($id);
        if ($row) {
            $data = array(
		'id_role' => $row->id_role,
		'jenis_tamu' => $row->jenis_tamu,
		'identitas' => $row->identitas,
		'srt' => $row->srt,
	    );
            $this->load->view('c_guest/guest_type_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('C_Guest'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('C_Guest/create_action'),
	    'id_role' => set_value('id_role'),
	    'jenis_tamu' => set_value('jenis_tamu'),
	    'identitas' => set_value('identitas'),
	    'srt' => set_value('srt'),
            'page'=>'c_guest/guest_type_form'
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
		'jenis_tamu' => $this->input->post('jenis_tamu',TRUE),
		'identitas' => $this->input->post('identitas',TRUE),
		'srt' => ($this->input->post('srt',TRUE)!==null?$this->input->post('srt',TRUE):0),
	    );

            $this->M_Guest->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('C_Guest'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_Guest->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('C_Guest/update_action'),
		'id_role' => set_value('id_role', $row->id_role),
		'jenis_tamu' => set_value('jenis_tamu', $row->jenis_tamu),
		'identitas' => set_value('identitas', $row->identitas),
		'srt' => set_value('srt', $row->srt),
                'page'=>'c_guest/guest_type_form'
	);
        $this->load->view('Main_V', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('C_Guest'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_role', TRUE));
        } else {
            $data = array(
		'jenis_tamu' => $this->input->post('jenis_tamu',TRUE),
		'identitas' => $this->input->post('identitas',TRUE),
		'srt' => $this->input->post('srt',TRUE),
	    );

            $this->M_Guest->update($this->input->post('id_role', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('C_Guest'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_Guest->get_by_id($id);

        if ($row) {
            $this->M_Guest->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('C_Guest'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('C_Guest'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis_tamu', 'jenis tamu', 'trim|required');
	$this->form_validation->set_rules('identitas', 'identitas', 'trim|required');
	//$this->form_validation->set_rules('srt', 'srt', 'trim|required');

	$this->form_validation->set_rules('id_role', 'id_role', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file C_Guest.php */
/* Location: ./application/controllers/C_Guest.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-06-09 13:08:35 */
/* http://harviacode.com */