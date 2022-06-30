<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ApiModel');
        $this->load->helper('api');
        
    }

	public function index()
	{
		json_output(400,array('status' => 400,'message' => 'Bad request.'));
	}

  public function synccoin()
  {
    $coins=$this->getcurl('synccoin');
     $num=0;
      foreach($coins['data'] as $c)
      { 
           $num=$this->db->get_where('coins',array('gatway'=>$c['Gateway'],'symbol'=>$c['Symbol'],'name'=>$c['Coin'],'contract_address'=>$c['contract_address']))->num_rows();
          if($num==0)
          {
              insert('coins',array('status'=>0,'balanceapi'=>$c['balanceapi'],'addressapi'=>$c['addressapi'],'gatway'=>$c['Gateway'],'symbol'=>$c['Symbol'],'name'=>$c['Coin'],'contract_address'=>$c['contract_address']));
          }
    
      }
  }

    public function generate_address()
    {
         $method = $_SERVER['REQUEST_METHOD'];
        if($method != 'POST')
        {
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} 
        else 
        {
            
            $check_auth_client = $this->ApiModel->check_auth_client();
            if($check_auth_client == true)
            { 
                   $params=getpostveriable();
                  if(!isset($params['Coin']))
                  {
                    json_output(404,array('message'=>'Coin Symbol must be needed'));
                  }
                  elseif(!isset($params['Amount']))
                  {
                    json_output(404,array('message'=>'Amount must needed'));
                  }
                  elseif(!isset($params['Webhookurl']))
                  {
                    json_output(404,array('message'=>'Webhookurl must needed'));
                  }
                  elseif(!isset($params['Buyer_email']))
                  {
                    json_output(404,array('message'=>'Buyer Email must needed'));
                  }
                  else
                  { 
                    $Buyer_email=$params['Buyer_email'];
                    $params['Amount']=0;
                    $coin=$params['Coin'];
                    $amount=number($params['Amount']);
                    $webhookurl=$params['Webhookurl'];
                    $ip=$params['ip'];
                    $pub=$this->input->get_request_header('Public-Key',TRUE);
                    $select=@select('coins',array('symbol'=>$coin,'status'=>1))[0];
                    if(!empty($select) AND isset($select))
                    {
                    $chk_address=select('deposite_request',array('apipublickey'=>$pub));
                    $chk_address=array();
                    if(empty($chk_address))
                    {
                    $method=$select['addressapi'];
                    $veriable=array('symbol'=>$coin,'ipnurl'=>base_url('ipn'));
                    $rr=$this->postcurl($method,$veriable);
                    $insert['tranaction_id']=$address_id=$rr['data']['_id'];
                    $insert['amount']=$amount;
                    $insert['coin']=$coin;
                    $insert['buyer_email']=$Buyer_email;
                    $insert['address']=$rr['data']['address'];
                    $insert['pv_key']=en($rr['data']['private_key']);
                    $insert['ipnurl']=$webhookurl;
                    $date=date("Y-m-d h:i:sa");
                    $insert['status']=0;
                    $insert['ip']=$ip;
                    $insert['merchantid']= $this->input->get_request_header('Merchant-Id',TRUE);
                    $insert['apipublickey']=$pub;
                    $addid=insert('deposite_request',$insert);
                   
                   if($addid)
                   {
                  // insert('sales_relation',array('address_id'=>$addid,'sales_id'=>$params['Sales_id'],'valid_till'=>add_min_in_time(30)));
                   }
                   if(HIDEKEY==TRUE)
                   {
                     unset($insert['pv_key']);
                   }
                   unset($insert['ipnurl']);
                   unset($insert['ip']);
                   unset($insert['apipublickey']);
                   unset($insert['tranaction_id']);
                   $insert['address_id']=$address_id;
                   $insert['date']=$date;
                   $insert['status']=select('tranaction_status',array('name'=>0))[0]['value'];
                   }
                   else
                   {
                   $insert=array();        
                   $insert1=$chk_address[0];
                   $sales=select('sales_relation',array('address_id'=>$insert1['id'],'sales_id'=>$params['Sales_id']));
                   if(empty($sales))
                   {
                 //  insert('sales_relation',array('address_id'=>$insert1['id'],'sales_id'=>$params['Sales_id'],'valid_till'=>add_min_in_time(30)));
                   }
                   $insert['address_id']=$insert1['tranaction_id'];
                   $insert['amount']=$amount;
                   $insert['coin']=$insert1['coin'];
                   $insert['buyer_email']=$Buyer_email;
                   $insert['address']=$insert1['address'];
                   $date=date("Y-m-d h:i:sa");
                   $insert['status']=select('tranaction_status',array('name'=>$insert1['status']))[0]['value'];
                   $insert['ip']=$ip;
                   $insert['date']=$date;
                   $insert['merchantid']= $this->input->get_request_header('Merchant-Id',TRUE);
                   $insert['apipublickey']=$pub;
                   }
                   
                 //  $insert['sales_id']=$params['Sales_id'];
                   unset($insert['amount']);
                   unset($insert['merchantid']);
                    unset($insert['apipublickey']);
                   unset($insert['ip']);
                   $insert['message']='Please Send only '.$insert['coin'].' else fund will be loss';
                   json_output(200,$insert);
                  }
                  else
                  {
                    json_output(404,array('message'=>'Not Permited action'));
                  } 
                }  
			    }

        }
    }


    private function postcurl($url,$veriable='')
    {
    $curl = curl_init();
    curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://157.245.86.178:80/'.$url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode($veriable),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
return json_decode($response,true);
}





    public function test()
    {
   $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://157.245.86.178:80/eth_address',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "symbol": "ETH",
    "ipnurl": "ipnurl"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
}



private function getcurl($url)
{
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://157.245.86.178:80/'.$url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Cookie: ci_session=qkim9t0mus9buqus716j3pdiia7cf2cc; cookie_name=48865eb7462a1c6e219c0afa8d80647c'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
return json_decode($response,true);
}

}