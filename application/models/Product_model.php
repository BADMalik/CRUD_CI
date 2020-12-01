<?php 
class Product_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        // $this->load->library('upload');
    }
    public function getProducts()
    {
        $query = $this->db->get('products');
        return $query->result();
    }
    public function storePicData($data)
    {
        // $data = array('upload_data' => $this->upload->data());
        $array= array
        (
            'name'=>$data['name'],
            'description'=>$data['description'],
            'price'=>$data['price'],
            'image'=>$data['file']
        );
        $this->db->insert('products',$array);
    }
    public function find($data) 
    {
        $this->db->where('product_id',$data['id']);
        echo $this->db->delete('cart');
        // die();
        // $this->db->select('name');
        $query=$this->db->query("select name from products where id = ".$data['id']."");
        
        $name =$query->result()[0]->name;
        $this->db->set('product_id',$data['id']);
        $this->db->set('price',$data['price']);
        $this->db->set('name',$name);
        $this->db->set('quantity',$data['quantity']);
        $this->db->insert('cart');
        return true;
    }
    public function emptyCart()
    {
        $query=$this->db->empty_table('cart');
        
    }
    public function getCart()
    {
        $query=$this->db->get('cart');
        return $query->result();
    }
    public function loadProduct($data)
    {
        $query=$this->db->get_where('products',array('id'=>$data));
        return $query->result();
        // die(var_dump($query->result()));
    }
}