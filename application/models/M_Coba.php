<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Coba extends MY_Model{
    public function __construct() {
        parent::__construct();
    }
    var $table = 'department';
    var $primary = 'id_dprtm';
    
    public function relasi(){
        $this->db->join('service','department.id_dprtm = service.id_dprtm','left');
        return $this->get_all();
    }
}

