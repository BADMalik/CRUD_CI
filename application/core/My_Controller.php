<?php
class My_Controller extends CI_Controller
{
    protected $loggedIn;

    public function __construct()
    {
        
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('form');
        
        // $this->load->library('upload');
        $this->load->helper('url');
       $this->load->model('Product_model');
        $this->load->model('Country_model', '', TRUE);
        $this->load->model('User_model');
        if (isset($_SESSION['loggedIn'])) 
        {
            $loggedIn =true;
        } 
        else 
            {
                $loggedIn=false;
            }
    }
}
