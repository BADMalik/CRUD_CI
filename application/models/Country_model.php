<?php
class Country_model extends CI_Model
{
    //does class has access to db?
    public $name;
    // public 
    public function insert_entry($name)
    {
        $this->name =  $name;
        $this->db->set($name);
        $this->db->insert('user');

    }
    public function select_all()
    {
        // $this->name =  "BIlal Malik";
        $query=$this->db->get('countries');
        return $query->result();
        // die(var_dump( $query));
        
    }
    public function getCity($country_id)
    {
        $query = $this->db->get_where('cities',array('country_id'=>$country_id));
        return $query->result();
    
    }


}