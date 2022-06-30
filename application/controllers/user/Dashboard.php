<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        auth_check();
       
	  }

      
    public function index()
    {
      lv('user/dashboard/index');
    }

public function settinglogo()
{
print_r($_FILES);

foreach($_FILES as $key=>$val)
{
  print_r($val);
  echo 'dfsdf';
$filename=NULL;
if(!empty($_FILES[$val]['name'])) 
{
$file=$this->fileadd($val);
if($file['status']==true)
{
  $filename=$file['filename'];
}
else
{
  
  // $message=$file['error'];
  // setalert($message,'error');
  // redirect('setting');
}

// $this->db->where('name',$key);
// $this->db->update('setting',array('value'=>$filename));

}
} 

}
      
private function fileadd($name)
{

$config['upload_path']          = './uploads/';
$config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
$new_name = 'setting'.time();
$config['file_name'] = $new_name;
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload($name))
                                {
                                         $r = array('status'=>false,'error' => $this->upload->display_errors());
                                }
                else
                {
                  $r=array('status'=>true,'filename'=>$this->upload->data()['file_name']);
                }
                echo '<pre>'; print_r($r); die();

return $r;
              }
    public function setting()
    {
      if($this->session->userdata('role')==1)
      {

    if($_POST)
    {

 $type=$_POST['type']; //die();

$data=$_POST;
unset($data['type']);
foreach($_POST as $key=>$val)
{
  if($type=='text')
  {
    $this->db->where('name',$key);
    $this->db->update('setting',array('value'=>$val));
  }


}
redirect('setting');
    }
else
{

      lv('user/setting');
}
    }
      else
      {
        redirect('');
      }
     }




    


    /************************************ */


    public function expences_category()
    {
        $data['expences_category']=$this->db->get_where('expences_category')->result_array();
        lv('user/expences_category/list',$data);
    }

    public function expences_category_edit()
    {
      $id=$this->input->post('id');
      $name=$this->input->post('name');
      $status=$this->input->post('status');
      $this->db->where('id',$id);
      $this->db->update('expences_category',array('name'=>$name,'status'=>$status));
     
     $this->db->where('cat',$id);
     $this->db->delete('cat_user');   
     
      $type=$this->input->post('type');
      foreach($type as $t)
{
$in=array('user'=>$t,'cat'=>$id);
$this->db->insert('cat_user',$in);
}

      
      $message='Sucessfully Updated';
      setalert($message);
      redirect('expences-category');
    }
   
    public function expences_category_add()
    {
      $name=$this->input->post('name');
      $status=$this->input->post('status');
      $type=$this->input->post('type');
      $this->db->insert('expences_category',array('name'=>$name,'status'=>$status));
 $cat_id=$this->db->insert_id();
foreach($type as $t)
{
$in=array('user'=>$t,'cat'=>$cat_id);
$this->db->insert('cat_user',$in);
}

      $message='Sucessfully Added';
      setalert($message);
      redirect('expences-category');
    }




    public function role()
    {
        $data['usertype']=$this->db->get_where('usertype')->result_array();
        lv('user/usertype/list',$data);
    }

   

 

    public function delemp($id)
    {
     $id=de($id);
     $status=0;
     $this->db->where('id',$id);
     $this->db->update('users',array('status'=>0,'is_deleted'=>1));
     $message='Deleted  Sucessfully';
     setalert($message);
     redirect('manage-emp');
    }
 

    public function statusemp($id)
    {
     $id=de($id); 
     $status=$this->db->get_where('users',array('id'=>$id))->row()->status;
     if($status==1)
     {
      $d=0;
     }
     if($status==0)
     {
      $d=1;
     }
     $this->db->where('id',$id);
     $this->db->update('users',array('status'=>$d));
     $message='Status Sucessfully Updated';
     setalert($message);
     redirect('manage-emp');
    }
    
    public function role_edit()
    {
      $id=$this->input->post('id');
      $name=$this->input->post('name');
      
      $status=$this->input->post('status');
      $this->db->where('id',$id);
      $this->db->update('usertype',array('name'=>$name,'status'=>$status));
      $message='Sucessfully Updated';
      setalert($message);
      redirect('manage-role');
    }
   
    public function role_add()
    {
      $name=$this->input->post('name');
      $status=$this->input->post('status');
      $this->db->insert('usertype',array('name'=>$name,'status'=>$status));
      $message='Sucessfully Added';
      setalert($message);
      redirect('manage-role');
    }






    public function expences_type()
    {
        $data['expences_type']=$this->db->get_where('expences_type')->result_array();
        lv('user/expences_type/list',$data);
    }

    

    public function expences_type_edit()
    {
      $id=$this->input->post('id');
      $name=$this->input->post('name');
      $cat=$this->input->post('cat');
      $status=$this->input->post('status');
      $this->db->where('id',$id);
      $this->db->update('expences_type',array('cat'=>$cat,'name'=>$name,'status'=>$status));
      $message='Sucessfully Updated';
      setalert($message);
      redirect('expences-type');
    }
   
    public function expences_type_add()
    {
      $name=$this->input->post('name');
      $status=$this->input->post('status');
      $cat=$this->input->post('cat');
      $this->db->insert('expences_type',array('cat'=>$cat,'name'=>$name,'status'=>$status));

      $message='Sucessfully Added';
      setalert($message);
      redirect('expences-type');
    }








    public function listemp()
    {
        $data['n_zones']=array();
        lv('user/emp/list',$data);
    }
    
    public function addemp()
    {
        $data['n_zones']=array();
        lv('user/emp/add',$data);
    }

    
    public function editemp($id)
    {
      $id=de($id);
      $data['id']=$id;
        $data['n_zones']=array();
        lv('user/emp/edit',$data);
    }

  public function updateemp()
  {

    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('fname', 'First Name', 'required');
    $this->form_validation->set_rules('lname', 'Last Name', 'required');
    $this->form_validation->set_rules('sex', 'Sex', 'required');
    $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
    $this->form_validation->set_rules('doj', 'Date of Joinning', 'required');
    $this->form_validation->set_rules('role', 'Role', 'required');
    $this->form_validation->set_rules('salary', 'Salary', 'required|numeric');
    $this->form_validation->set_rules('qulification', 'Qulification', 'required');
    $this->form_validation->set_rules('address', 'Address', 'required');
    $this->form_validation->set_rules('phone', 'Phone Number','required|numeric');
    $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|numeric');
    $this->form_validation->set_rules('city', 'City', 'required');
    $this->form_validation->set_rules('zipcode', 'Zipcode', 'required|numeric');
    $this->form_validation->set_rules('state', 'state', 'required');
    $this->form_validation->set_rules('county', 'county', 'required');
    $this->form_validation->set_rules('accno', 'Account Number', 'required');
    $this->form_validation->set_rules('bankname', 'Bank name', 'required');
    $this->form_validation->set_rules('acctype', 'Account Type', 'required');
    $this->form_validation->set_rules('ifsc', 'ifsc Code', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
    
    $data=$this->input->post();  
    $pass=$this->input->post('password');
    
    $cpass=$this->input->post('cpassword');
    $id=$this->input->post('id');
    unset($data['id']);
    if($this->input->post('password')!='')
    {
      
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required'); 
    $data['password']=password_hash($this->input->post('password'), PASSWORD_BCRYPT);
    }
    else
    {
      unset($data['password']);
      
    }
    unset($data['cpassword']);
    unset($data['username']);
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    if ($this->form_validation->run() == FALSE)
    {
            $this->editemp(en($id));
    }
    else
    {
    
      $this->db->where('id',$id);
      $this->db->update('users',$data);
      $message='Sucessfully Updated';
      setalert($message);
      redirect('edit-emp/'.en($id));


    }




  }


    public function saveemp()
    {

      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');

      $this->form_validation->set_rules('fname', 'First Name', 'required');
      $this->form_validation->set_rules('lname', 'Last Name', 'required');
      $this->form_validation->set_rules('sex', 'Sex', 'required');
      $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
      $this->form_validation->set_rules('doj', 'Date of Joinning', 'required');
      $this->form_validation->set_rules('role', 'Role', 'required');
      $this->form_validation->set_rules('salary', 'Salary', 'required|numeric');
      $this->form_validation->set_rules('qulification', 'Qulification', 'required');
      $this->form_validation->set_rules('address', 'Address', 'required');
      $this->form_validation->set_rules('phone', 'Phone Number','required|numeric|is_unique[users.phone]');
      $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|numeric|is_unique[users.mobile]');
      $this->form_validation->set_rules('city', 'City', 'required');
      $this->form_validation->set_rules('zipcode', 'Zipcode', 'required|numeric');
      $this->form_validation->set_rules('state', 'state', 'required');
      $this->form_validation->set_rules('county', 'county', 'required');
      $this->form_validation->set_rules('accno', 'Account Number', 'required|is_unique[users.accno]');
      $this->form_validation->set_rules('bankname', 'Bank name', 'required');
      $this->form_validation->set_rules('acctype', 'Account Type', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
      $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric|is_unique[users.username]');
    $this->form_validation->set_rules('ifsc', 'IFSC Code', 'required');
    $this->form_validation->set_rules('empcode', 'Employee code', 'required|is_unique[users.empcode]');

      $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
      if ($this->form_validation->run() == FALSE)
      {
              $this->addemp();
      }
      else
      {
        $data=$this->input->post();
        unset($data['cpassword']);
        unset($data['password']);
        $data['password']=password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        $this->db->insert('users',$data);
       
      $message='Sucessfully Added';
      setalert($message);
      redirect('manage-emp');
      }

    }




    public function usersjson()
    {  //die();
        $id=$this->session->userdata('address_id');
        // POST data
        $postData=$serchq='';
        if($_POST)
        {
            $postData = $this->input->post();
        
            $serchq='';
        }
        $data = $this->DatatableModel->getuserjson('users',$serchq,$postData,$id);
   
        echo json_encode($data);
    }
    
    public function citizenedit($id)
    {
        $id=de($id);
        $data['users']=@$this->db->get_where('n_citizen',array('id'=>$id))->result_array()[0];
        lv('user/dashboard/citizenedit',$data);
    }


    public function citizendelete($id)
    {
        $id=de($id);
        $this->db->where('id',$id);
      $this->db->update('n_citizen',array('isdeleted'=>1));
      $message='Record Sucessfully Deleted ';
      setalert($message);
      redirect('citizen');
    }

    public function citizenupdate()
    {
      $id=$this->input->post('id');
      $input=$_POST;
      unset($input['id']);
    
      $this->db->where('id',$id);
      $this->db->update('n_citizen',$input);
      $message='Sucessfully Updated';
      setalert($message);
      redirect('citizen');
    }



    public function citizenadd()
    {
      $this->db->insert('n_citizen',$_POST);
      $user_id=$this->db->insert_id();
      $this->db->order_by('priority','DESC');
     
      $this->db->order_by('priority','DESC');
      $sle=$this->db->get_where('n_taxes',array('status'=>1,'isdeleted'=>0))->result_array();
      $c=0;

      $year=$this->db->get_where('n_setting',array('name'=>'year'))->row()->value;

      foreach($sle as $s)
      {
      $c=$this->db->get_where('n_tax_invoice',array('tax_id'=>$s['id'],'year'=>$year,'user_id'=>$user_id))->num_rows();
      if($c==0)
      {
          $ins=array('user_id'=>$user_id,'tax_id'=>$s['id'],'pending'=>'0','new'=>'0','total'=>'0','year'=>$year);
          $this->db->insert('n_tax_invoice',$ins);
      }
      } 
      $message='Sucessfully Added';
      setalert($message);
      redirect('citizen');
    }
    





















    
    public function officers()
    {
        $data['n_zones']=$this->db->get_where('users',array('is_deleted'=>0))->result_array();
        lv('user/dashboard/officers',$data);
    }

    public function officersupdate()
    {
      $id=$this->input->post('id');
      $name=$this->input->post('name');
      $email=$this->input->post('email');
      $is_admin=$this->input->post('is_admin');
      $zone=implode(',',$this->input->post('zone'));

  if($_POST['password']!='')
  {    
  $password=password_hash($this->input->post('password'), PASSWORD_BCRYPT);
  $this->db->where('id',$id);
  $this->db->update('users',array('password'=>$password,'firstname'=>$name,'is_admin'=>$is_admin,'email'=>$email,'zone'=>$zone));
  }
  else
  {
  $this->db->where('id',$id);
  $this->db->update('users',array('firstname'=>$name,'is_admin'=>$is_admin,'email'=>$email,'zone'=>$zone));
  }

    $message='Sucessfully Updated';
    setalert($message);
    redirect('officers');
    }
     
    public function officersadd()
    {
        $name=$this->input->post('name');
        $email=$this->input->post('email');
        $is_admin=$this->input->post('is_admin');
        $password=password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        $zone=implode(',',$this->input->post('zone'));
        $this->db->insert('users',array('password'=>$password,'firstname'=>$name,'is_admin'=>$is_admin,'email'=>$email,'zone'=>$zone));
        $message='Sucessfully Added';
        setalert($message);
        redirect('officers');
    }
    










}