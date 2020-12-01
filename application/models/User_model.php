<?php 
class User_model extends CI_Model
{
    public function update()
    {
        // echo json_encode($this->input->post());
        $this->db->set('name',$this->input->post('name'));
        $this->db->set('cellno',$this->input->post('cell_no'));
        $this->db->set('username',$this->input->post('username'));
        $this->db->set('country',$this->input->post('country'));
        $this->db->set('city',$this->input->post('city'));
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('user');
        return true;
    }
    public function find($data)
    {
        $query=$this->db->get_where('user',array('id'=>$data));
        return $query->result()[0];
    }
    public function delete($id)
    {
        $query=$this->db->delete('user',array('id'=>$id));
        
        return $id;
    }
    public function create($data)
    {
       
            $array = array
            (
                'name'=>$data['name'],
                'email'=>$data['email'],
                'username'=>$data['username'],
                'cellno'=>$data['cellno'],
                'country'=>$data['country'],
                'city'=>$data['city']
            );
            $this->db->set($array);
            $this->db->insert('user');
            
    }
    public function checkusername($name)
    {

        $query=$this->db->get_where('user',array('username'=>$name));
        if($query->num_rows()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function checkemail($email)
    {

        $query=$this->db->get_where('user',array('email'=>$email));
        if($query->num_rows()>0){
            return true;
        }
        else
        {
            return false;
        }
    }
    function selectImport()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('user');
        return $query;
    }
    function insertImport($data)
    {
        $array = array
        (
            'name'=>$data[0],
            'username'=>$data[4],
            'email'=>$data[2],
            'cellno'=>$data[3],
            'country'=>$data[6],
            'city'=>$data[5]
        );
       $this->db->insert('user', $array);
    }
    public function select_all()
    {
        $query = $this->db->query
        (
            "SELECT user.name,user.id,user.email,
            user.cellno,
            user.username, cities.name city_name , 
            countries.name country_name FROM countries 
            JOIN user ON user.country=countries.id JOIN 
            cities ON cities.id=user.city"
        );
        return $query->result();
    }
}