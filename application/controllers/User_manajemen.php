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
        $this->load->model(array('user_model','M_Department'));
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');

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
        //var_dump(explode(',',$data['user'][2]->group_name));
    }
    
    public function departemen($id){
         $this->form_validation->set_rules('department[]', 'Departemen', 'required');
        if ($this->form_validation->run() == FALSE) {
            $user = $this->ion_auth->user($id)->row();
            $data['departemen'] = $this->M_Department->get_all();
            $data['page'] = 'user/department';
            $data['user'] = $user;
            $data['currgr'] = $this->user_model->get_department($user->id);
            $data['action'] = base_url('user_manajemen/departemen/').$user->id;
            $this->load->view('Main_V', $data);              
        } else {
            $group = $this->input->post('department');
            $userid = $this->input->post('userid');
            
            $this->user_model->delete_department($userid);
            
            if($this->user_model->create_department($group,$userid)){
                redirect('user_manajemen');
            }else{
                var_dump($group);
            }            
        }      
    }
    
    public function create_user() {
        $groups = $this->ion_auth->groups()->result_array();
        $this->data['groups'] = $groups;
        $this->data['title'] = $this->lang->line('create_user_heading');
        $this->data['page'] = 'user/page_form_user';
        

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }

        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        $this->data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
        if ($identity_column !== 'email') {
            $this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
        } else {
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
        }
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
        $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() === TRUE) {
            $email = strtolower($this->input->post('email'));
            $identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');

            $additional_data = [
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
            ];
            $groupData = $this->input->post('groups');
        }
        if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data,$groupData)) {
            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("/user_manajemen", 'refresh');
        } else {
            // display the create user form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['first_name'] = [
                'class' => 'form-control',
                'name' => 'first_name',
                'id' => 'first_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            ];
            $this->data['last_name'] = [
                'class' => 'form-control',
                'name' => 'last_name',
                'id' => 'last_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('last_name'),
            ];
            $this->data['identity'] = [
                'class' => 'form-control',
                'name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
            ];
            $this->data['email'] = [
                'class' => 'form-control',
                'name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'value' => $this->form_validation->set_value('email'),
            ];
            $this->data['company'] = [
                'class' => 'form-control',
                'name' => 'company',
                'id' => 'company',
                'type' => 'text',
                'value' => $this->form_validation->set_value('company'),
            ];
            $this->data['phone'] = [
                'class' => 'form-control',
                'name' => 'phone',
                'id' => 'phone',
                'type' => 'text',
                'value' => $this->form_validation->set_value('phone'),
            ];
            $this->data['password'] = [
                'class' => 'form-control',
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password'),
            ];
            $this->data['password_confirm'] = [
                'class' => 'form-control',
                'name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            ];

            $this->load->view('Main_V', $this->data);
        }
    }

    public function coba(){
        var_dump(empty($this->user_model->get_department(2)));
    }
    

    
}
