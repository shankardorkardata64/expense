<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Twilio\Rest\Client;
 
class Ipn extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ApiModel');
        $this->load->helper('api');
        
    }

  public function test()
  {
    $this->load->library('twilio');

    $data = ['phone' => '+919894114991', 'text' => 'Hello, CI'];
    print_r($this->sendSMS($data));
  }

	public function index()
	{
		json_output(400,array('status' => 400,'message' => 'Bad request.'));
	}



    public function ipn_from_server()
    { 
        $params=getpostveriable();
        $address_trx=select('deposite_request',array('address'=>$params['address'],'coin'=>$params['coincode']));
        foreach($address_trx as $r)
        {
                $cbtrxid=select('deposite_list',array('cbtrxid'=>$params['cbtransactionid']));
                if(empty($cbtrxid)) 
                {
                  $deposite_list=array(
                 'from_address'=>$params['fromaddress'],
                 'to_address'=>$params['address'],
                 'cbtrxid'=>$params['cbtransactionid'],
                 'hash'=>$params['transactionhash'],
                 'amount'=>number($params['value']),
                 'coin'=>$params['coincode'],
                 'date'=>date('d-m-Y H:i:s'),
                 'ipn_recived_at'=>date('d-m-Y H:i:s'),
                 'merchantid'=>$r['merchantid'],
                 'ipnurl'=>$r['ipnurl'],
                 'address_id'=>$r['id'],
                 );
                $insert_id=insert('deposite_list',$deposite_list);
                 

                 ipn_send_to_clinet($insert_id);
                 
                $notifications['name']='Received:-'.$params['value'].' '.$params['coincode'];
                $notifications['merchantid']=$r['merchantid'];
                $notifications['msg']='Address:-'.$params['address'];
                $notifications['url']=base_url('request-details').'/'.en($insert_id);
                $notifications['date']=time();
                $notifications['table_id']=$insert_id;
                insert('notification',$notifications);
                         

            }
        }
              


        
    }





    public function send_to_clinet($id)
    {
        ipn_send_to_clinet($id);

    }

    


}