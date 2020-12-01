<?php 
class User extends My_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    public function edit($id)
    {
        $data['user']=$this->User_model->find($id);
        $data['countries']=$this->Country_model->select_all();
        $this->load->view('country/edit',$data);
    }
    public function update()
    {
        $username = $this->input->post('username');        
        $check = $this->User_model->checkusername($username);
        if($check==true)
        {
            echo json_encode(array
            (
                'username'=>$check, 
                'redirect'=>false
            ));
            exit();
        }
        else
        {
            $this->User_model->update($this->input->post('id'));
            echo json_encode(array('redirect'=>true));
        }
    }
    public function delete()
    {
        $deleteid=$this->input->post('id');
        $result=$this->User_model->delete($deleteid);
        echo $result;
    }
    public function loadImportPage()
    {
        $this->load->view('country/importPage');
    }
    public function loadData()
    {
        $result = $this->User_model->selectImport();
        $output = '
        <h3 style="text-align:center;">Imported User Details from CSV File</h3>
             <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Sr. No</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Cell No</th>
                        <th>Email Address</th>
                        <th>Country</th>
                        <th>City</th>
                    </tr>';
       $count=0;
       if($result->num_rows() > 0)
       {
            foreach($result->result() as $row)
            {
                    $count = $count + 1;
                    $output .= '
                        <tr>
                        <td>'.$count.'</td>
                        <td>'.$row->name.'</td>
                        <td>'.$row->username.'</td>
                        <td>'.$row->cellno.'</td>
                        <td>'.$row->email.'</td>
                        <td>'.$row->country.'</td>
                        <td>'.$row->city.'</td>
                        </tr>';
            }
       }
       else
       {
            $output .= '
                <tr>
                    <td colspan="5" style="text-align:center;">Data not Available</td>
                </tr>';
       }
            $output .= '</table></div>';
            echo $output;
      }
      function importData()
      {
        $csv = $_FILES['csv_file']['tmp_name'];
        $handle = fopen($csv,"r");
        while (($row = fgetcsv($handle,",")) != FALSE) //get row vales
        {
            if($row[0]!=NULL)
            {
                 $this->User_model->insertImport($row);
            }
        }         
      }
    public function print()
    {
        $file_name = 'student_details_on_'.date('Ymd').'.csv'; 
        header("Content-Description: File Transfer"); 
        header("Content-Disposition: attachment; filename=$file_name"); 
        header("Content-Type: application/csv;");
        $user_data=$this->User_model->select_all();
        $file = fopen('php://output', 'w');
        $header = array("Name","id","Email","CellNo","Username","City","Country");
        fputcsv($file,$header);
        foreach($user_data as $key => $value)
        {
            fputcsv($file,(array)$value);
        }
        fclose($file);
        exit();     
    }
    public function store()
    {
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $check = $this->User_model->checkusername($username);
        $check_email = $this->User_model->checkemail($email);
        if( $check_email==true || $check==true)
        {
            echo json_encode(array
            (
                'username'=>$check, 
                'email'=>$check_email,
                'redirect'=>false
            ));
            exit();
        }
        else
        {
                $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('name', 'Must enter a name ', 'required');
                $this->form_validation->set_rules('cell_no', 'Cell No', 'required');
                $this->form_validation->set_rules('country', 'Country', 'required');
                $this->form_validation->set_rules('city', 'City', 'required');
                if ($this->form_validation->run() == FALSE)
                {
                    echo json_encode
                    (
                        array
                        (
                            'errors'=>validation_errors(),
                            'username'=>$check, 
                            'email'=>$check_email,
                            'redirect'=>false
                        )
                    );
                    exit;
                }
                else
                {
                        $data['name']=$this->input->post('name');
                        $data['email']=$this->input->post('email');
                        $data['cellno']=$this->input->post('cell_no');
                        $data['username']=$this->input->post('username');
                        $data['country']=$this->input->post('country');
                        $data['city']=$this->input->post('city');
                        $this->User_model->create($data);
                        echo json_encode(array('redirect'=>true));
                } 
        }
       
    }

}