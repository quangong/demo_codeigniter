<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Model
{protected $key='id';
	function __construct() {
        parent::__construct();
    }

    public function list()
    {
       	$sql = "select * from users";
        return $this->db->query($sql)->result();
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
        if(!$this->checkUserExist($data['username']))
            return false;
        $this->db->where('id',$id);
        return $this->db->update('users',$data);
    }

    function checkLogin($data){
        $sql = "select * from users where username='".$data['username']."' and password='".$data['password']."'";
        return $this->db->query($sql)->result();
    }

    function getUser($id){
        $sql = "select * from users where id=" . $id;
        return $this->db->query($sql)->result();
    }

    public function checkUserExist($username){
        $sql = "select count(id) from users where username='".$username ."'";
        $count = $this->db->query($sql)->result();
        if($count[0]->count>0)
            return false;
        return true;
    }
}