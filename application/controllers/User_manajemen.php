<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of User_manajemen
 *
 * @author Tahajuda
 */

class User_manajemen extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        
        if (!$this->ion_auth->logged_in()) {
            redirect('Auth', 'refresh');
        }else if(!$this->ion_auth->is_admin()){
            redirect('C_Visitor'); 
        }
        
    }
    
    public function index()
    {
        $data = array(
            'user'=>$this->user_model->get_all_users(),
            'page'=>'user/page_usermanajemen'
        );
        $this->load->view('Main_V', $data);      
    }
    
    public function coba(){
        var_dump($this->ion_auth->is_admin());
    }
    

    
}
