<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposite extends CI_Controller 
{

    public function __construct(){

		parent::__construct();
        auth_check();
       
	}


    public function index()
    {
        lv('user/deposites/index');
    }   


   public function trxlist($id)
   {   $id=de($id);
      
    
       $this->session->set_userdata('address_id',$id);
    $data['request']=select('deposite_request',array('id'=>$id))[0];
  
    if(empty($data['request']))
    {
        $message='Error. Not Valid Id!';
        setalert($message,'error');
        redirect('address');
    }
    else
    {   $data['id']=$id;
        lv('user/deposites/trxlist',$data);
    }   
   }

   public function detail($id)
   {   
    $id=de($id);   
    update('notification',array('status'=>1),array('table_id'=>$id));
    $data['request']=select('deposite_list',array('id'=>$id))[0];
       if(empty($data['request']))
       {
           
       $message='Error. Not Valid Id!';
	   setalert($message,'error');
       redirect('address');
       } 
       else
       {
        lv('user/deposites/details',$data);
       }
   }

   public function trxjson()
   {
      $id=$this->session->userdata('address_id');
        // POST data
        $postData=$serchq='';
        if($_POST)
        {
            $postData = $this->input->post();
        
            $serchq='';
        }
        $data = $this->DatatableModel->gettrxjson('deposite_list',$serchq,$postData,$id);
   
        echo json_encode($data);
   }







    public function depositejson(){
     

        
        // POST data
        $postData=$serchq='';
        if($_POST)
        {
            $postData = $this->input->post();
        
            $serchq='';
        }

        // Get data
        $data = $this->DatatableModel->getdatatablejson('deposite_request',$serchq,$postData);
   
        echo json_encode($data);
     }
}