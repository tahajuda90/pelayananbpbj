<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class belajar extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Visitor','M_Coba'));
    }
    
        
    public function coba(){
        $this->load->library('email');
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'tahajuda2@gmail.com',
            'smtp_pass' => '21juni1994',
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        //Email content
        $htmlContent = '<h1>Sending email via SMTP server</h1>';
        $htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';

        $this->email->to('tahajudamandariansah@gmail.com');
        $this->email->from('tahajuda2@gmail.com', 'MyWebsite');
        $this->email->subject('How to send email via SMTP server in CodeIgniter');
        $this->email->message($htmlContent);

//Send email
        if(!$this->email->send()){
            echo $this->email->print_debugger();
        }else{
            echo 'Berhasil';
        }
        
        
    }
    
    public function belajar(){
        print_r($this->M_Coba->relasi());
        //$this->load->view('CobaUpload', array('error' => ' ' ));
    }
    
    public function aksi(){
                $uplpath = './gambar/'.date('m');
                if(!is_dir($uplpath)){
                    mkdir($uplpath,0755,TRUE);
                }
                $config['upload_path']          = $uplpath;
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 10000;
                $config['encrypt_name']         = TRUE;
//                $config['file_name']            = 'custom';
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('CobaUpload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			var_dump($data);
		}
    }
    
    public function perhari(){
        print_r($this->M_Visitor->coba());
    }
}