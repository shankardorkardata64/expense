<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Twilio\Rest\Client;
// Load Composer's autoloader
require  FCPATH . 'application/vendor/autoload.php';

class Auth extends CI_Controller 
{




    public function index()
	{  
		alv('auth/login');
    }
	
	public function forget()
	{  
	  if($_POST)
	  {
	    $select=select('users',array('username'=>$_POST['username']))[0];
	    if($select) 
	    {
	    $twofa=generate_token(6);
		$ms='This is Your Verification code :-'.$twofa;
		$array=array('to'=>$select['email'],'subject'=>' Your  Code for Reset Password',
		'message'=>$ms,'select'=>$select);
		send_mail($array);
		$this->db->where('id',$select['id']);
		$this->db->update('users',array('forgotcode'=>$twofa));
			
			  $message='Please Check mail for OTP';
			  setalert($message);
			  redirect('forget-process');
		 //redircdt to verify otp and add password page
		
		}
		else
		{
		      $type='error';
			  $message='Username  not found';
			  setalert($message,$type);
			  redirect('forget');
		  //email address not found redirect to forgait firt page   
		}
		
		
		
	  }
	  else
	  {
	  	alv('auth/forget');
      }
      
	}
	
	
	function forget_process()
	{
	    if($_POST)
	    {
	        
	        
	        if($this->input->post('password')!=$this->input->post('cpassword'))
	        {
	              $type='error';
			  $message='Password And Confirm Password must be same';
			  setalert($message,$type);
			  redirect('forget-process');
	        }
	        
	        
	      
	        $user=select('users',array('forgotcode'=>$_POST['opt']))[0];
	      
	        if($user)
	        {
	            $this->db->where('id',$user['id']);
	        	$this->db->update('users',array('password'=>password_hash($this->input->post('password'), PASSWORD_BCRYPT)));
			   	  $message='Password updated sucessfully';
		    	  setalert($message);
			     redirect('login');
	        }
	        else
	        {
	              $type='error';
			  $message='You have enterd wrong OTP';
			  setalert($message,$type);
			  redirect('forget-process');
	        }
	        
	        
	    }
	    else
	    {
	    	alv('auth/forget_process');
	    }
 	}

  public function twofa()
  {
	$select=select('users',array('token'=>$this->session->userdata('token')))[0];
	if(!empty($select))
	{
	$data['otp']='';
	$data['token']=$select['token'];
	alv('auth/twofa',$data);
	}
	else
	{
	die('usernot found');
	}  
}

 public function verifyfa()
 {

	 $token=$this->input->post('token');
	 $otp=$this->input->post('otp');
	 $select=select('users',array('token'=>$token))[0];
	 if(empty($select))
	 {
		die('usernot found');
	 }
	  $email_opt=$select['twofa'];
	  $email_verified=$select['email_verified'];
	  if($email_verified==1)
	  {
		
		  if($email_opt==$otp)
		  {
			$this->userloginsession($select);
		  }
		  else
		  {
			  $type='error';
			  $message='You have Enterd Wrong CODE';
			  setalert($message,$type);
			  redirect('two-fa');
		  }
	  }
	  else
	  {
		$type='error';
		$message='Email is not verified';
		setalert($message,$type);
		redirect('login');
	  }

 }



	public function resendfa()
	{
		$select=select('users',array('token'=>$this->session->userdata('token')))[0];
		if($select)
		{
		$this->twofacode($select);  
		}
	  }


	private function userloginsession($select)
	{
		$admin_data = array(
			'id' => $select['id'],
			'userid' => $select['id'],
			'user_id' => $select['id'],
			'username' => $select['username'],
			'name' => $select['fname'].' '.$select['name'],
			'role' => $select['role'],
			'rolename' => $this->db->get_where('usertype',array('id'=>$select['role']))->row()->name,
			);

			$this->session->set_userdata($admin_data);
		$message='Sucessfully Loged in';
		setalert($message);
		redirect('dashboard');
	}
	private function  twofacode($select)
	{
		$twofa=generate_token(6);
		$ms='This is Your Verification code :-'.$twofa;
		$array=array('to'=>$select['email'],'subject'=>'Verify Your Two FA  Code',
		'message'=>$ms);
		send_mail($array);
		$this->session->set_userdata('token',$select['token']);
		update('users',array('twofa'=>$twofa),array('id'=>$select['id']));
		$message='Check Your email('.subs($select['email'],10).') for Two Factor Authentication Code';
		setalert($message);
		redirect('two-fa');
	}
	public function login()
	{
      $password=$this->input->post('password');
	  $username=$this->input->post('username');
	  $select=select('users',array('username'=>$username))[0];
	  if(!empty($select))
	  {
    	 $validPassword = password_verify($password, $select['password']); //die();
     	if($validPassword)
	 	{
			 if($select['status']==1)
			 {
              $this->userloginsession($select);
			 }
			 else
			 { 
				$type='error';
				$message='Your Account is deactivated';
				setalert($message,$type);
				redirect('login'); 
			 }
		 }
	 	else
	 	{
		$type='error';
		$message='Invalid Credentials';
		setalert($message,$type);
		redirect('login'); 
	 	}

	  }
	  else
	  {
		$type='error';
		$message='Invalid Credentials';
		setalert($message,$type);
		redirect('login');
	  }

	}


	public function logout(){
		$this->session->sess_destroy();
		$type='error';
		$message='Sucessfully Loged OUT';
		setalert($message,$type);
		redirect('login');
	}
    public function register()
	{   
	
		$this->load->library('form_validation');
		if($_POST)
		{ 
			
			$this->form_validation->set_error_delimiters('<div class="form_validation_error">', '</div>');
			$this->form_validation->set_rules('firstname', 'First Name', 'required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required');
			$this->form_validation->set_rules('country', 'Country', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
			if ($this->form_validation->run() == FALSE)
			{
            alv('auth/register');
            }
			else
			{	
            $data['firstname']=escape($this->input->post('firstname'));
			$data['lastname']=escape($this->input->post('lastname'));
			$data['email']=escape($this->input->post('email'));
			$data['password']=password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            $data['country']=escape($this->input->post('country'));
			$data['token']=$token=generate_token();
			$data['email_opt']=$otp=rand(1000,9999);
			$array=array('to'=>$data['email'],'subject'=>'Verify Your Email','message'=>$otp);
			send_mail($array);
            $data1=insert('users',$data);
		    if($data1!='')
			{ 
				$message='Check Your Email('.subs($data['email'],10).') for OTP Code';
				setalert($message);
			    redirect('email-verify/'.$token);
				//added send email for verificartio
            }
			else
			{
				$type='error';
				$message='Try again';
				setalert($message,$type);
			    redirect('register');
				//error not addrers 
			}
            

			}


		}
		else
		{
		alv('auth/register');
		}
	}


	public function resendotp($token)
	{
		$select=select('users',array('token'=>$token))[0];
		$otp=$select['email_opt'];
		$array=array('to'=>$select['email'],'subject'=>'Verify Your Email','message'=>$otp);
			    send_mail($array);
			    $message='Check Your Email('.subs($select['email'],10).') for OTP Code';
				setalert($message);
			    redirect('email-verify/'.$token);
	}
    public function verify_view($token='')
	{ 
	
		if($_POST)
		{
					$token=$this->input->post('token');
					$otp=$this->input->post('otp');
                    $select=select('users',array('token'=>$token))[0];
					$email_opt=$select['email_opt'];
					$email_verified=$select['email_verified'];
                     if($email_verified==0)
					 {
						 if($email_opt==$otp)
						 {
							update('users',array('email_verified'=>1),array('id'=>$select['id']));
							$message='Email Verified Sucessfully';
							setalert($message);
							redirect('login');
						 }
						 else
						 {
							 $type='error';
							 $message='You have Enterd Wrong OTP';
							 setalert($message,$type);
							 redirect('email-verify/'.$token);
						 }
					 }
		}
		else
		{
        $data['token']=$token;
		$data['otp']='';
		if(isset($_GET['otp']))
		{
          $data['otp']=$_GET['otp'];
		}
		alv('auth/verify_view',$data);	
	    }
	}


	


}
