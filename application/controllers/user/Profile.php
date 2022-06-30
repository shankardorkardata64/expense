<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller 
{

    public function __construct(){

		parent::__construct();
        auth_check();
       
	}

    public function password()
    {
        $user_id=$this->session->userdata('id');
        $opassword=$this->input->post('opassword');
        $npassword=$this->input->post('npassword');
        $cpassword=$this->input->post('cpassword');
         
        $select=select('users',array('id'=>$user_id))[0];
        $validPassword = password_verify($opassword, $select['password']);
        if($validPassword)
	 	{


            if($npassword!=$cpassword)
            {
            $type='error';
            $message='New password and Confirm password must be same';
            setalert($message,$type);
            }
            else
            {
            update('users',
            array('password'=>password_hash($npassword,PASSWORD_BCRYPT)),
            array('id'=>$user_id));
            $message='Password Updated Sucessfully';
            setalert($message);
            }  
        }
        else
        {
                $type='error';
				$message='You have entered Wrong Current Password';
				setalert($message,$type);
        }
        redirect('profile');
    }


   

    public function profile_update()
    {
  $user_id=$this->session->userdata('id');
   if($user_id)
   {
            $num=$this->db->get_where('users',array('id!='=>$user_id,'email'=>$_POST['email']))->num_rows();
            if($num==0)
            {
                   update('users',$_POST,array('id'=>$user_id));
                   $message='Sucessfully Data Updated';
                   setalert($message);
                 
            }
            else
            {
                $type='error';
				$message='Email Allready Used , please use other email address';
				setalert($message,$type);
            }
   
        }
        else
        {
            $type='error';
            $message='User  Details not found';
            setalert($message,$type);
        }

            redirect('profile');

    }
   public function index()
   {
       $user_id=$this->session->userdata('id');
       $data['users']=select('users',array('id'=>$user_id))[0];
       lv('user/profile/index',$data);
        
    }

}