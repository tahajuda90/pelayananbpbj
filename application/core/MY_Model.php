<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class MY_Model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    protected $table = null;
    protected $primary = null;
    protected $order = 'ASC';
    
    function get_all()
    {
        return $this->db->get($this->table)->result();
    }
    
    
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
    
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
    
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}