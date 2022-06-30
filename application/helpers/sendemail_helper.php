<?php
function generate_token($size=30)
{
    $CI=&get_instance();
    $CI->load->helper('string');
    return random_string('alnum', $size/2).time().random_string('alnum', $size/2);
}



function send_mail($array) 
{
   $ci = get_instance();
   $sitename=$ci->db->get_where('setting',array('name'=>'system_name'))->row()->value;
   $from_email = "shankardorkardata64@gmail.com";
    $from_email=$ci->db->get_where('setting',array('name'=>'system_email'))->row()->value;
  
    $to_email =$array['to'];
    $select=$array['select'];
    $array['username']='Valuable User';
    if(!empty($select))
    {
    $array['username']=$select['fname'].' '.$select['lname'];
    }
    
    $me=$ci->load->view('email',$array,TRUE);
    
    $ci->load->library('email');
    $config['protocol'] = SMTPPROTOCOL;
    $config['smtp_host'] = SMTPHOST;
    $config['smtp_port'] =SMTPPORT;
    $config['smtp_user'] = SMTPUSER;
    $config['smtp_pass'] = SMTPPASS;
    $config['charset'] = 'iso-8859-1';
    $config['mailtype'] = "html";
    $config['newline'] = "\r\n";
    $ci->email->initialize($config);
    $ci->email->from($from_email, $sitename);
    $list = array($to_email);

    $ci->email->to($list);
    $ci->email->reply_to($from_email, $sitename);  //keep comapy name 2nd option ''
    $ci->email->subject($array['subject']);
    $ci->email->message($me);
    $ci->email->send();
}

?>