<?php
class Country extends My_Controller
{
        public function insert()
        {
            $this->Country_model->insert_entry();
        }
        public function all_users()
        {  
                $data['users']=$this->User_model->select_all();
                $this->load->view('country/index.php',$data);
        }
        public function get_cities($id)
        {
            // print_r($id);
            // die(var_dump('getcitues'));
           $cities= $this->Country_model->getCity($id);
            echo json_encode($cities);
        }
        public function index()
        {
            if($this->loggedIn)
            {
                $this->load->view('country/index.php');
            }
            else
            {
                $data['countries']=$this->Country_model->select_all();
                $this->load->view('country/login.php',$data);
            }
        }
        public function store()
        {
            $country = new Country_model;
            $data['name'] = $this->input->post('country');
            $country->insert_entry($data);
            redirect ('/country');
            
        }
        public function comments($a,$b)
        {
            echo 'This is a : '.$a;
            echo 'This is b : '.$b;
        }
}   