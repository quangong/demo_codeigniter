<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }

    public function list()
    {
        return $this->db->select('*')
            ->where('role',2)
            ->order_by('id')
            ->get('users')
            ->result_array();
    }

    public function create($data)
    {
        if(!$this->checkUserExist($data['username']))
            return false;
    	return $this->db->insert('users', $data);
    }

    public function delete($id)
    {
    	return $this->db->where('id',$id)->delete('users');
    }

    function update($id, $data)
    {
        $count = $this->db->where('username', $data['username'])
            ->where('id !=', $id)
            ->get('users')
            ->num_rows();
        if($count > 0)
            return false;
        return $this->db->where('id', $id)
            ->update('users', $data);
    }

    function checkLogin($data)
    {
        return $this->db->where('username', $data['username'])
            ->where('password', $data['password'])
            ->get('users')
            ->row_array();
    }

    function getUser($id)
    {
        return $this->db->where('id', $id)->get('users')->row_array();
    }

    public function checkUserExist($username)
    {
        $count = $this->db->where('username', $username)
            ->get('users')
            ->num_rows();
        if($count > 0)
            return false;
        return true;
    }

    public function findOrFail($id){
        $count = $this->db->where('id', $id)
            ->get('users')
            ->num_rows();
        if($count == 0)
            return false;
        return true;
    }
}