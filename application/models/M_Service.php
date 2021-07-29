<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Service extends CI_Model
{

    public $table = 'service';
    public $id = 'id_serv';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('service.*,department.nama_dprt,guest_type.jenis_tamu,count(visitor.keperluan) as jumlah');
        $this->db->join('department','service.id_dprtm=department.id_dprtm');
        $this->db->join('guest_type','service.id_role=guest_type.id_role');
        $this->db->join('visitor','service.id_serv=visitor.keperluan','left');
        $this->db->group_by('service.id_serv');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->join('department','service.id_dprtm=department.id_dprtm');
        $this->db->join('guest_type','service.id_role=guest_type.id_role');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_serv', $q);
	$this->db->or_like('id_dprtm', $q);
	$this->db->or_like('id_role', $q);
	$this->db->or_like('service', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->select('service.*,department.nama_dprt,guest_type.jenis_tamu,count(visitor.keperluan) as jumlah'); 
        $this->db->join('department','service.id_dprtm=department.id_dprtm');
        $this->db->join('guest_type','service.id_role=guest_type.id_role');
        $this->db->join('visitor','service.id_serv=visitor.keperluan','left');
        $this->db->group_by('service.id_serv');
        $this->db->order_by($this->id, $this->order);
        $this->db->like('service.id_serv', $q);
	$this->db->or_like('service.id_dprtm', $q);
	$this->db->or_like('service.id_role', $q);
	$this->db->or_like('service', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    
    function get_by_role($id){
        $this->db->where('id_role', $id);
        return $this->db->get($this->table)->result();
    }
}
