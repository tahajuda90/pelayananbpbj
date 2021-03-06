<?php

class User_model extends CI_Model
{

   public $_table = 'users';
   public $primary_key = 'id';
   public $name = 'username';
   public $email = 'email';
   public $active = 'active';
   
   public $department = 'users_department';


   function __construct()
   {
      parent::__construct();
   }

   // Insert New records
   public function create($insertData)
   {
      $result = $this->db->insert($this->_table, $insertData);

      return $result;
   }

   // get all records
   public function get_all()
   {
      $this->db->select('*')
        ->from($this->_table)
        ->order_by($this->primary_key, 'DESC');
      $query = $this->db->get();
      if ($query->num_rows() != 0) {
         return $query->result();
      } else {
         return false;
      }
   }

   public function get_all_users()
   {
      $this->db->select('u.*,GROUP_CONCAT(g.name) as group_name')
        ->from('users as u')
        ->join('users_groups as ug', 'ug.user_id = u.id', 'left')
        ->join('groups as g', 'g.id = ug.group_id', 'left')
        ->group_by('ug.user_id')
        ->order_by('u.id', 'DESC');
      $query = $this->db->get();
      if ($query->num_rows() != 0) {
         return $query->result();
      } else {
         return false;
      }
   }

   // get a record by id
   public function get_by_id($id)
   {
      $this->db->select('*')
        ->from($this->_table)
        ->where($this->primary_key, $id);
      $query = $this->db->get();
      if ($query->num_rows() != 0) {
         return $query->result_array();
      } else {
         return false;
      }
   }


   // check duplicate entry or already exists
   public function exist($data, $id)
   {
      $query = $this->db->select('*')
        ->from($this->_table)
        ->where($this->name, $data)
        ->where_not_in($this->primary_key, $id)
        ->get();
      $num = $query->num_rows();
      if ($num == 0) {
         return true;
      } else {
         return false;
      }
   }

   // edit a record
   public function edit($updateData, $updateId)
   {
      $result = $this->db->where($this->primary_key, $updateId)->update($this->_table, $updateData);

      return $result;
   }


   // delete a record
   public function delete($id)
   {
      $result = $this->db->delete($this->_table, array($this->primary_key => $id));

      return $result;
   }
   
   public function get_department($id){
       $this->db->select('id_dprtm');
       $arr = $this->db->where(array('id_user'=>$id))->get($this->department)->result_array();
       $coba = array_map(function ($value) {
            return $value['id_dprtm'];
        },$arr);
      return $coba;
   }

   public function create_department($group,$id){
       $simpan = true;
       foreach ($group as $gr){
           $simpan = $simpan && $this->db->insert($this->department,array('id_user'=>$id,'id_dprtm'=>$gr));
       }
       return $simpan;
   }
   
   public function delete_department($id){
       return $this->db->delete($this->department,array('id_user'=>$id));
   }
}