<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        auth_check();
       
	  }


    public function getwalletlogjson()
    {
      $postData=$serchq='';
      if($_POST)
      {
          $postData = $this->input->post();
      
          $serchq='';
      }
      $user_id='';
      if($this->session->userdata('role')==4)
      {
      $user_id=$this->session->userdata('userid');
      }
      
      $data = $this->DatatableModel->getwalletlogjson('wallet_log',$serchq,$postData,$user_id);
      echo json_encode($data);
    }

    public function addprepaid()
    {

      if($_POST)
      {
        $userid=$this->input->post('userid');
        $amount=$this->input->post('amount');
        $note=$this->input->post('note');
        $edate=$this->input->post('edate');
        $action='add';
        $user=getuser($userid);
        $old=$user['wallet'];
        if($action=='add')
        {
          $new=$old+$amount;
        }
        if($action=='sub')
        {
          $new=$old-$amount;
        }
       $this->db->insert('wallet_log',array('added_by'=>$this->session->userdata('id'),'user_id'=>$userid,'note'=>$note,'before_amount'=>$old,'amount'=>$amount,'new_amount'=>$new,'action'=>$action,'date'=>$edate));
       $id=$this->db->insert_id();
       if($id)
       {
        $this->db->where('id',$userid);
        $this->db->update('users',array('wallet'=>$new));
       }


       $message='Wallet updated Sucessfully';
       setalert($message);
       redirect('addprepaid');
         


      }
      else
      {
      $data['users']=$this->db->get_where('users',array('role!='=>1,'status'=>1,'is_deleted'=>0))->result_array();
      lv('user/user/addprepaid',$data);
      }
    }

public function report()
{

  $this->session->set_userdata('search_year','');
  $this->session->set_userdata('search_type','');
  $this->session->set_userdata('search_status','');
  $this->session->set_userdata('search_username','');
  $this->session->set_userdata('search_month','');
  $this->session->set_userdata('search_from','');
  $this->session->set_userdata('search_to','');
 if($_POST)
  {
   
    $this->session->set_userdata('search_year',$_POST['year']);
    $this->session->set_userdata('search_type',$_POST['type']);
    $this->session->set_userdata('search_status',$_POST['status']);
    $this->session->set_userdata('search_username',$_POST['username']);
    $this->session->set_userdata('search_month',$_POST['month']);
    $this->session->set_userdata('search_from',$_POST['from']);
    $this->session->set_userdata('search_to',$_POST['to']);
  }

 if($this->session->userdata('search_year')!=''){ $this->db->where('added_year',$this->session->userdata('search_year'));}
 if($this->session->userdata('search_type')!=''){ $this->db->where('type',$this->session->userdata('search_type'));}
 if($this->session->userdata('search_status')!=''){ $this->db->where('staus',$this->session->userdata('search_status'));}
 if($this->session->userdata('search_username')!=''){ $this->db->where('user_id',$this->session->userdata('search_username'));}
 if($this->session->userdata('search_month')!=''){ $this->db->where('added_month',$this->session->userdata('search_month'));}
 if($this->session->userdata('search_from')!='') {$this->db->where('edate >=', $this->session->userdata('search_from'));}
 if($this->session->userdata('search_to')!=''){$this->db->where('edate <=', $this->session->userdata('search_to'));}
  $rec=$this->db->get('expences')->result_array();
//  echo $this->db->last_query();
  $data['rec']=$rec;
  lv('user/report/report',$data);
}

      public function index()
      {
          echo 'load user dashboard';
      }
   

 public function actinonex()
 {
  $data=array();
  lv('user/user/actinonex',$data);
 }

 public function requestreject($id,$action)
 {

   $id=de($id);
   $action=de($action);
   $usercat=$this->db->get_where('cat_user',array('user'=>$this->session->userdata('role')))->result_array();
   $dd=array();
   foreach($usercat as $cat)
   {
   
       $this->db->select('expences_type.cat,expences_type.id as tid,expences_type.name,expences_type.status,expences_category.id,expences_category.name as catname');
       $this->db->join('expences_category','expences_type.cat=expences_category.id','left');
       $this->db->where('expences_type.status',1);
       $this->db->where('expences_category.id',$cat['cat']);
       $d=$this->db->get('expences_type')->result_array();
       $dd=array_merge($dd,$d);
   }
     $expences_type=$dd;
       
   $data['expences_type']=$expences_type;
   $data['action']=$action;
   
   $data['ex']=$this->db->get_where('expences',array('id'=>$id))->result_array();
   lv('user/user/requestedit',$data);
 }


public function editreqsave()
{
  if($_POST)
  {
    $id=$this->input->post('id');
    $ex=$this->db->get_where('expences',array('id'=>$id))->result_array();
    $amount=$ex[0]['amount'];
    
    
    
    $userid=$user_id=$ex[0]['user_id'];
    $user=getuser($user_id);
    $wallet_type=$ex[0]['wallet_type'];
    
    
if($wallet_type=='Pre-Pay')
{
 if($amount!=$this->input->post('amount'))
 {
$action='add';
     $diff=$amount-$this->input->post('amount');
     
     
     
     $this->db->where('id',$userid);
     $new=$user['wallet']+$diff;
     $this->db->update('users',array('wallet'=>$new));
    $s='added';
    if($diff < 0){
         $action='sub';
         $diff=$diff*-1;
         $s='Substracted';
     }
      $note='Pre-Pay Expence Request edited, Your Wallet '.$s.' by Rs. '.$diff;
      $edate=date('Y-m-d'); //   2022-06-21
      $this->db->insert('wallet_log',array('added_by'=>$this->session->userdata('id'),'user_id'=>$userid,'note'=>$note,'before_amount'=>$user['wallet'],'amount'=>$diff,'new_amount'=>$new,'action'=>$action,'date'=>$edate));
      $wallet_log=$this->db->insert_id();
         
 }
    
}   
    
    $data=$_POST;
    unset($data['id']);
   
   //$filename=NULL;
    if(!empty($_FILES['userfile']['name'])) 
    {
    $file=$this->fileadd('userfile');
    if($file['status']==true)
    {
      $filename=$file['filename'];
      $data['file']=$filename;
    }
    else
    {
      
      $message=$file['error'];
      setalert($message,'error');
      redirect('add-ex');
    }
    }

 if($this->input->post('rejectnote'))
    {
     if($wallet_type=='Pre-Pay')
     {
      $wallet=$user['wallet'];
      $new=$wallet+$amount;
      $action='add';
      $note='Pre-Pay Expence Request Rejected Your Wallet added by Rs. '.$amount;
      $edate=date('Y-m-d'); //   2022-06-21
      $this->db->insert('wallet_log',array('added_by'=>$this->session->userdata('id'),'user_id'=>$userid,'note'=>$note,'before_amount'=>$wallet,'amount'=>$amount,'new_amount'=>$new,'action'=>$action,'date'=>$edate));
      $wallet_log=$this->db->insert_id();

      if($wallet_log)
      {
       $this->db->where('id',$userid);
       $this->db->update('users',array('wallet'=>$new));
      }
     }
    
    
    }


    $this->db->where('id',$id);
    $this->db->update('expences',$data);

      $id=en($id);

$message='Expences Request updated Sucessfully';
setalert($message);
redirect('add-ex');
  }
}

public function requestapprove($id)
{
  $id=de($id);
  approve_ex($id);
  $message='Expences Request approved Sucessfully';
  setalert($message);
  redirect('action-on-ex');
}




      public function getexpencesjson()
      {  
          $postData=$serchq='';
          if($_POST)
          {
              $postData = $this->input->post();
          
              $serchq='';
          }
          $user_id='';
          if($this->session->userdata('role')==4)
          {
          $user_id=$this->session->userdata('userid');
          }
          
          $data = $this->DatatableModel->getexpencesjson('expences',$serchq,$postData,$user_id);
          echo json_encode($data);
      }
      
      
      
      

      public function getexpencesjson1()
      {  
         // print_r($this->session->userdata());
          $postData=$serchq='';
          if($_POST)
          {
              $postData = $this->input->post();
          
              $serchq='';
          }
       //   $user_id='';
        //  if($this->session->userdata('role')==4)
         // {
          $user_id=$this->session->userdata('userid');
        // }
          
          $data = $this->DatatableModel->getexpencesjson1('expences',$serchq,$postData,$user_id);
          echo json_encode($data);
      }
      
      // add expence pahge
      public function add()
      {
 
    
    
    $usercat=$this->db->get_where('cat_user',array('user'=>$this->session->userdata('role')))->result_array();
    $dd=array();
    foreach($usercat as $cat)
    {
    
        $this->db->select('expences_type.cat,expences_type.id as tid,expences_type.name,expences_type.status,expences_category.id,expences_category.name as catname');
        $this->db->join('expences_category','expences_type.cat=expences_category.id','left');
        $this->db->where('expences_type.status',1);
        $this->db->where('expences_category.id',$cat['cat']);
        $d=$this->db->get('expences_type')->result_array();
        $dd=array_merge($dd,$d);
    }
      $expences_type=$dd;
        
        $data['expences_type']=$expences_type;
        lv('user/user/addexp',$data);

      }

private function fileadd($name)
{

$config['upload_path']          = './uploads/';
$config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
$new_name = 'ex'.time();
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
return $r;
}

public function addex()
{
$data=$_POST; 
if($this->session->userdata('role')!=1)
{

$filename=NULL;
if(!empty($_FILES['userfile']['name'])) 
{
$file=$this->fileadd('userfile');
if($file['status']==true)
{
  $filename=$file['filename'];
}
else
{
  
  $message=$file['error'];
  setalert($message,'error');
  redirect('add-ex');
}
}
  $data['file']=$filename;
  $data['user_id']=$this->session->userdata('id');
  $data['added_year']=date('Y');
  $data['added_month']=date('m');
  $data['strdate']=strtotime(date('d-m-Y'));


  $wallet_type=$data['wallet_type'];
  if($wallet_type=='Pre-Pay')
  {
  $userid=$this->session->userdata('id');
  $user=getuser($this->session->userdata('id'));
  $wallet=$user['wallet'];
  if($wallet>=$this->input->post('amount'))
  {
    $new=$wallet-$this->input->post('amount');
    $note=$this->input->post('note');
    $edate=$this->input->post('edate');
    $this->db->insert('wallet_log',
    array('added_by'=>$this->session->userdata('id'),
    'user_id'=>$userid,
    'note'=>$note,
    'before_amount'=>$wallet,
    'amount'=>$this->input->post('amount'),
    'new_amount'=>$new,
    'action'=>'sub',
    'date'=>$edate));
    $id1=$this->db->insert_id();
    if($id1)
    {
     $this->db->where('id',$userid);
     $this->db->update('users',array('wallet'=>$new));
    }
  }
  else
  {
    $message='You Dont have Sufficinet Balance in Your Pre-pay Wallet';
    setalert($message,'error');
    redirect('add-ex');
  }
  }





$this->db->insert('expences',$data);
$message='Expences Sucessfully Added';
setalert($message);
redirect('add-ex');
}

  }


    }