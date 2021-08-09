<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['M_Guest', 'M_Service', 'M_Visitor']);
        $this->load->library('recaptcha');
    }

    public function masuk() {
//            $arr = array_map(function ($value) {
//            return $value['id_role'];
//            }, $array1);
//            print_r($arr);
        $data['guest'] = $this->M_Guest->today_visit();
        //$this->session->set_userdata('guest', '3');
        $data['page'] = 'halaman_guest';
        $this->load->view('Main_Guest', $data);
    }

    public function catat($role) {
        $guest = $this->M_Guest->get_by_id($role);
        $data = array(
            'button' => 'Create',
            'action' => site_url('welcome/create_action'),
            'id_visit' => set_value('id_visit'),
            'email' => set_value('email'),
            'unik' => $guest->identitas,
            'role' => $guest->id_role,
            'no_identitas' => set_value('no_identitas'),
            'nama' => set_value('nama'),
            'kelamin' => set_value('kelamin'),
            'instansi' => set_value('instansi'),
            'telepon' => set_value('telepon'),
            'keperluan' => set_value('keperluan'),
            'keterangan' => set_value('keterangan')
        );
        $data['recapca'] = $this->recaptcha->create_box();
        $data['srv'] = $this->M_Service->get_by_role($guest->id_role);
        $data['page'] = 'buku_Tamu';
        $this->load->view('Main_Guest', $data);
    }

        public function create_action() 
    {
        $this->_rules();
        
        if ($this->form_validation->run() == FALSE) {
            $this->catat($this->input->post('role',TRUE));
        } else {
            $kep =json_decode($this->input->post('keperluan',TRUE));
            $data = array(
		'email' => $this->input->post('email',TRUE),
		'unik' => $this->input->post('unik',TRUE),
		'role' => $this->input->post('role',TRUE),
		'no_identitas' => $this->input->post('no_identitas',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'kelamin' => $this->input->post('kelamin',TRUE),
		'instansi' => $this->input->post('instansi',TRUE),
		'telepon' => $this->input->post('telepon',TRUE),
		'keperluan' => $kep->id_serv,
                'id_dprtm' => $kep->id_dprtm,
		'keterangan' => $this->input->post('keterangan',TRUE)
	    );
            //print_r($data);
            if($this->recaptcha->is_valid()){
                $this->M_Visitor->insert($data);
                redirect(site_url('welcome/masuk'));
            }else{
                $this->session->set_flashdata('message', 'Captcha yang anda masukan salah');
                $this->catat($this->input->post('role',TRUE));
            }
            //$this->M_Visitor->insert($data);
            //$this->session->set_flashdata('message', 'Create Record Success');
            
        }
    }
    
    public function _rules() {
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        //$this->form_validation->set_rules('unik', 'unik', 'trim|required');
        //$this->form_validation->set_rules('role', 'role', 'trim|required');
        $this->form_validation->set_rules('no_identitas', 'No Identitas', 'trim');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('kelamin', 'Jenis Kelamin', 'trim');
        $this->form_validation->set_rules('instansi', 'Nama Instansi', 'trim|required');
        $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'trim|required');
        $this->form_validation->set_rules('keperluan', 'Nama Keperluan', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        //$this->form_validation->set_rules('surat_tugas', 'surat tugas', 'trim|required');
        //$this->form_validation->set_rules('wajah', 'wajah', 'trim|required');
        //$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
        //$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');

        $this->form_validation->set_rules('id_visit', 'id_visit', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
