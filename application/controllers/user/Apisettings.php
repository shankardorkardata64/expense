<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apisettings extends CI_Controller 
{

    public function __construct(){

		parent::__construct();
        auth_check();
       
	}

    public function doc()
    {

         $user_id=$this->session->userdata('id');
        $data['user_id']=$user_id;
        lv('user/apisettings/doc',$data);
    }
   public function index()
   {
       $user_id=$this->session->userdata('id');
       $data['api_keys']=select('api_keys',array('user_id'=>$user_id));
       lv('user/apisettings/index',$data);
   }
    
   public function createkeys()
   { 

       $user_id=$this->session->userdata('id');
       

       
       $public_key=generate_token(50);
       $private_key=generate_token(50);
       $insert=insert('api_keys',
       array(
       'user_id'=>$user_id,
       'public_key'=>$public_key,
       'private_key'=>$private_key,
    'tag'=>'NA',
        ));
       $message='Sucessfully Created New API Key';
	   setalert($message);
       redirect('acct_api_keys');

   }
}