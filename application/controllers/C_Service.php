<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Service extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_Service','M_Guest','M_Department'));
        $this->load->library('form_validation');
        if (!$this->ion_auth->logged_in()) {
            redirect('Auth', 'refresh');
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'C_Service?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'C_Service?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'C_Service';
            $config['first_url'] = base_url() . 'C_Service';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_Service->total_rows($q);
        $c_service = $this->M_Service->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'c_service_data' => $c_service,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'page'=>'c_service/service_list',
            'start' => $start,
        );
        $this->load->view('Main_V', $data);
    }

    public function read($id) 
    {
        $row = $this->M_Service->get_by_id($id);
        if ($row) {
            $data = array(
		'id_serv' => $row->id_serv,
		'id_dprtm' => $row->id_dprtm,
		'id_role' => $row->id_role,
		'service' => $row->service,
	    );
            $this->load->view('c_service/service_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_service'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('C_Service/create_action'),
	    'id_serv' => set_value('id_serv'),
	    'id_dprtm' => set_value('id_dprtm'),
	    'id_role' => set_value('id_role'),
	    'service' => set_value('service'),
            'page'=>'c_service/service_form',
	);
        $data['departemen'] = $this->M_Department->get_all();
        $data['jenis'] = $this->M_Guest->get_all();
        $this->load->view('Main_V', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_dprtm' => $this->input->post('id_dprtm',TRUE),
		'id_role' => $this->input->post('id_role',TRUE),
		'service' => $this->input->post('service',TRUE),
	    );

            $this->M_Service->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('C_Service'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_Service->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('C_Service/update_action'),
		'id_serv' => set_value('id_serv', $row->id_serv),
		'id_dprtm' => set_value('id_dprtm', $row->id_dprtm),
		'id_role' => set_value('id_role', $row->id_role),
		'service' => set_value('service', $row->service),
                'page'=>'c_service/service_form',
	    );
            $data['departemen'] = $this->M_Department->get_all();
            $data['jenis'] = $this->M_Guest->get_all();
            $this->load->view('Main_V', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_service'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_serv', TRUE));
        } else {
            $data = array(
		'id_dprtm' => $this->input->post('id_dprtm',TRUE),
		'id_role' => $this->input->post('id_role',TRUE),
		'service' => $this->input->post('service',TRUE),
	    );

            $this->M_Service->update($this->input->post('id_serv', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('C_Service'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_Service->get_by_id($id);

        if ($row) {
            $this->M_Service->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('C_Service'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('C_Service'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_dprtm', 'id dprtm', 'trim|required');
	$this->form_validation->set_rules('id_role', 'id role', 'trim|required');
	$this->form_validation->set_rules('service', 'service', 'trim|required');

	$this->form_validation->set_rules('id_serv', 'id_serv', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file C_Service.php */
/* Location: ./application/controllers/C_Service.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-09 09:10:30 */
/* http://harviacode.com */