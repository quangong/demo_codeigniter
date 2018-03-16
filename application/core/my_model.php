<?php
class My_model extends CI_Model {
    
    protected $table = '';
    
    protected $key = 'id';
    
    function create($data = array())
    {
        if($this->db->insert($this->table, $data))
        {
           return TRUE;
        }else{
            return FALSE;
        }
    }
    
    function update($id, $data)
    {
        if (!$id)
        {
            return FALSE;
        }
        
        $where = array();
        $where[$this->key] = $id;
        $this->update_rule($where, $data);
        
        return TRUE;
    }
   
    function delete($id)
    {
        if (!$id)
        {
            return FALSE;
        }
        if(is_numeric($id))
        {
            $where = array($this->key => $id);
        }else
        {
            $where = $this->key . " IN (".$id.") ";
        }
        $this->del_rule($where);
        
        return TRUE;
    }
    
    function get_info($id, $field = '')
    {
        if (!$id)
        {
            return FALSE;
        }
        
        $where = array();
        $where[$this->key] = $id;
        
        return $this->get_info_rule($where, $field);
    }
}