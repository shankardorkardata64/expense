<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Twilio\Rest\Client;
 
class Welcome extends CI_Controller {
 

   function test()
   {
     
    $postData=$serchq='';
    if($_POST)
    {
        $postData = $this->input->post();
        $serchq='';
    }
    $input=array('table'=>'n_citizen',
    'where'=>array('name','email'),
    'primarycondition'=>array('isdeleted'=>0),
    'searchValue'=>'',
    'searchValueCol'=>array('name','en_name','email','house_no'),
    'select'=>'n_citizen.id as cid,n_citizen.name as cname,n_citizen.isdeleted,n_citizen.en_name,n_citizen.house_no,n_citizen.mobile_no,n_karyalaya.name as kname,n_zones.name as zname,n_citizen.property_type',
    'join'=>array('join'=>true,
    'condition'=>array(
                array('table'=>'n_karyalaya','innnercondition'=>'n_karyalaya.id = n_citizen.karyalay','type'=>'left'),
                array('table'=>'n_zones','innnercondition'=>'n_zones.id = n_citizen.zone','type'=>'left'),
                )
     ),
    

    );
    $data=$this->index($input,$postData);
    echo '<pre>';
    print_r($data);
   }

    function index($input)
    {
      
    $table=$input['table'];
    $searchValue=$input['searchValue'];
    $searchValueCol=$input['searchValueCol'];
    $postData=$input['postData'];
    $primarycondition=$input['primarycondition'];
    $join=$input['join'];
    $select=$input['select']?$input['select']:'*';
     $response = array();
     
     ## Read value
     $draw =@$postData['draw'];
     $start = @$postData['start'];
     $rowperpage = @$postData['length']; // Rows display per page
     $columnIndex = @$postData['order'][0]['column']; // Column index
     $columnName = @$postData['columns'][$columnIndex]['data']; // Column name
     $columnSortOrder = @$postData['order'][0]['dir']; // asc or desc
     $searchValue = @$postData['search']['value']; // Search value
     $this->db->select('count(*) as allcount');
     $this->db->from($table);
     if($searchValue != '')
     {  
         $i=0;
        foreach($searchValueCol as $key)
        {
            if($i==0)
            {
            $this->db->like($key,$searchValue);
            }
            else
            {
            $this->db->or_like($key,$searchValue);
            }
           $i++;
        }
        
     }
    
  if($join['join']==true)
  {
      foreach($input['join']['condition'] as $con)
      {
      $this->db->join($con['table'], $con['innnercondition'], $con['type']);
      }
  }  
     ##Primary Condtion
     foreach($primarycondition as $key=>$val)
     {
     $this->db->where($table.'.'.$key,$val);
     }
     
     $records = $this->db->get()->result(); 
     $totalRecords = $records[0]->allcount;
     
     
     $this->db->select('count(*) as allcount');
     $this->db->from($table);
    
     if($searchValue != '')
     {  
         $i=0;
        foreach($searchValueCol as $key)
        {
            if($i==0)
            {
            $this->db->like($key,$searchValue);
            }
            else
            {
            $this->db->or_like($key,$searchValue);
            }
           $i++;
        }
        
     }

    
  if($join['join']==true)
  {
      foreach($input['join']['condition'] as $con)
      {
      $this->db->join($con['table'], $con['innnercondition'], $con['type']);
      }
  }  
     foreach($primarycondition as $key=>$val)
     {
     $this->db->where($table.'.'.$key,$val);
     }
     if($rowperpage!=-1)
     {     
        $this->db->limit($rowperpage, $start);
     }
     $records = $this->db->get()->result();
     $totalRecordwithFilter = $records[0]->allcount;
  
  
    
     $this->db->select($select);
     $this->db->from($table);
  
     if($searchValue != '')
     {  
         $i=0;
        foreach($searchValueCol as $key)
        {
            if($i==0)
            {
            $this->db->like($key,$searchValue);
            }
            else
            {
            $this->db->or_like($key,$searchValue);
            }
           $i++;
        }
        
     }
    
  if($join['join']==true)
  {
      foreach($input['join']['condition'] as $con)
      {
      $this->db->join($con['table'], $con['innnercondition'], $con['type']);
      }
  }  
     $this->db->limit($rowperpage, $start);
     foreach($primarycondition as $key=>$val)
     {
     $this->db->where($table.'.'.$key,$val);
     }
     $records = $this->db->get()->result();
     


     
     ## Response
     $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $records
     );
  
     return $response; 
   
    }
  
  















 
 protected function sendSMS($data) {
          // Your Account SID and Auth Token from twilio.com/console
            $sid = 'your_sid';
            $token = 'your_token';
     $client = new Client($sid, $token);
 
            // Use the client to do fun stuff like send text messages!
             return $client->messages->create(
                // the number you'd like to send the message to
                $data['phone'],
                array(
                    // A Twilio phone number you purchased at twilio.com/console
                    "from" => "+your Twilio number",
                    // the body of the text message you'd like to send
                    'body' => $data['text']
                )
            );
    }
}