<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Model
{protected $key='id';
	function __construct() {
        parent::__construct();
    }

    public function list()
    {
        $this->db->select('*');
        $this->db->order_by('id', 'asc');
        return $this->db->get('users')->result_array();
    }

    public function create($data){
        if(!$this->checkUserExist($data['username']))
            return false;
    	return $this->db->insert('users', $data);
    }

    public function delete($id){
    	$this->db->where('id',$id);
    	return $this->db->delete('users');
    }

    function update($id, $data)
    {
        $this->db->where('username', $data['username']);
        $this->db->where('id !=', $id);
        $count = $this->db->get('users')->num_rows();
        if($count > 0)
            return false;
        $this->db->where('id',$id);
        return $this->db->update('users',$data);
    }

    function checkLogin($data){
        $this->db->where('username', $data['username']);
        $this->db->where('password', $data['password']);
        $count = $this->db->get('users')->num_rows();
        if($count > 0)
            return true;
        return false;
    }

    function getUser($id){
        $this->db->where('id',$id);
        return $this->db->get('users')->row_array();
    }

    public function checkUserExist($username){
        $this->db->where('username',$username);
        $count = $this->db->get('users')->num_rows();
        if($count > 0)
            return false;
        return true;
    }
}