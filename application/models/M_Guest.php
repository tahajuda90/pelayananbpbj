<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Guest extends CI_Model
{

    public $table = 'guest_type';
    public $id = 'id_role';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select($this->table.'.*,count(service.id_role) as jumlah');
        $this->db->order_by($this->id, $this->order);
        $this->db->join('service','service.id_role = guest_type.id_role','LEFT');
        $this->db->group_by('guest_type.id_role');
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
        $this->db->like('id_role', $q);
	$this->db->or_like('jenis_tamu', $q);
	$this->db->or_like('identitas', $q);
	$this->db->or_like('srt', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->select($this->table.'.*,count(service.id_role) as jumlah');
        $this->db->order_by($this->id, $this->order);
        $this->db->like('guest_type.id_role', $q);
	$this->db->or_like('jenis_tamu', $q);
	$this->db->or_like('identitas', $q);
	$this->db->or_like('srt', $q);
	$this->db->limit($limit, $start);
        $this->db->join('service','service.id_role = guest_type.id_role','LEFT');
        $this->db->group_by('guest_type.id_role');
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
    
    function today_visit(){
        $vis = $this->db->where('date_format(visitor.created_date,"%Y-%m-%d")','CURDATE()',false)->get('visitor')->num_rows();
        if($vis > 0){
            $this->db->select($this->table.'.*,COUNT(visitor.role) as jumlah');
            $this->db->join('visitor','guest_type.id_role = visitor.role AND DATE(visitor.created_date) = CURDATE() ','left');
            $this->db->group_by($this->table.'.id_role');
            return $this->db->get($this->table)->result();
        }else{
            $this->db->select($this->table.'.*,0 as jumlah');
            return $this->db->get($this->table)->result();
        }
    }

}
