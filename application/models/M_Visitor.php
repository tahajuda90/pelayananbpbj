<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Visitor extends CI_Model
{

    public $table = 'visitor';
    public $id = 'id_visit';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select("id_visit,email,unik,guest_type.jenis_tamu,no_identitas,nama,kelamin,instansi,telepon,service.service,keterangan,surat_tugas,wajah,created_date,updated_date");
        $this->datatables->from('visitor');
        //add this line for join
        //$this->datatables->join('table2', 'visitor.field = table2.field');
        $this->datatables->join('guest_type','visitor.role = guest_type.id_role');
        $this->datatables->join('service','visitor.keperluan = service.id_serv');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_visit', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('unik', $q);
	$this->db->or_like('role', $q);
	$this->db->or_like('no_identitas', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('kelamin', $q);
	$this->db->or_like('instansi', $q);
	$this->db->or_like('telepon', $q);
	$this->db->or_like('keperluan', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('surat_tugas', $q);
	$this->db->or_like('wajah', $q);
	$this->db->or_like('created_date', $q);
	$this->db->or_like('updated_date', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_visit', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('unik', $q);
	$this->db->or_like('role', $q);
	$this->db->or_like('no_identitas', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('kelamin', $q);
	$this->db->or_like('instansi', $q);
	$this->db->or_like('telepon', $q);
	$this->db->or_like('keperluan', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('surat_tugas', $q);
	$this->db->or_like('wajah', $q);
	$this->db->or_like('created_date', $q);
	$this->db->or_like('updated_date', $q);
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

}
