<?php
 class File extends My_Controller
 {
     function __construct()
     {
         parent::__construct();
     }
     public function insertProduct()
     {
         $this->load->view('Country/insertProduct');
     }
     public function allProducts()
     {
        $query['products'] = $this->Product_model->getProducts();
        // die(var_dump($query['products']));
        $this->load->view('Country/allProducts',$query);
     }
     public function insertInDB()
     {
        $config['upload_path'] = './assets/uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '2048000'; // max size in KB
        $config['max_width'] = '20000'; //max resolution width
        $config['max_height'] = '20000';  //max resolution height
        $this->load->library('upload', $config);
        $this->upload->do_upload('file');
        $image = $this->upload->data();           
         $data['name']  =$this->input->post('name');
         $data['price'] =$this->input->post('price');
         $data['description']=$this->input->post('description');
         $data['file']=base_url().'assets/uploads/'.$image['file_name'];
         $this->Product_model->storePicData($data);
         redirect('File/allproducts');
    }
    public function updateCart()
    {

        // die(var_dump($this->input->post('id')));
        $query=$this->Product_model->find($this->input->post());
        
    }
    public function checkout()
    {
        // echo "Check";
        $data['items']=$this->Product_model->getCart();
        $this->Product_model->emptyCart();
        // die(var_dump($data['items']));
        $this->load->view('country/checkoutpage',$data);
        // die(var_dump($data));
    }
    public function viewProduct($id)
    {
        // 
        $product['props'] = $this->Product_model->loadProduct($id);
        // die(var_dump($product));
        $this->load->view('Country/viewproduct',$product);

    }
    public function stripePost()
    {
        // die(var_dump($this->input->post()));
        require_once('application/libraries/stripe-php/init.php');
        
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
     
        \Stripe\Charge::create ([
                "amount" => $this->input->post('total')/100,
                "currency" => "usd",
                "source" => $this->input->post('stripeToken'),
                "description" => "Test Attempt" 
        ]);
            
        $this->session->set_flashdata('success', 'Payment made successfully.');
             
        redirect('/allproducts', 'refresh');
        // echo 'hello';
    }
 } 