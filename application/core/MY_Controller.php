<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
    
    public $cur_admin = array();
    public $cur_user = array();
    
    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('session');
        $this->load->helper('url');
        
        if ($this->session->userdata('admin_id')){
            $this->cur_admin = "admin";
        }  
        if(!$this->session->userdata('admin_id')) {
            $controller = strtolower($this->router->fetch_class());
            $action = strtolower($this->router->fetch_method());
            $page = $controller."/".$action;
            
                if( !in_array($page, array(
                    "admin/index",
                ))) {
                    if($controller=="admin"){
                        $this->session->set_userdata('redirect_url', current_url());
                        redirect(base_url());
                    }else{
                        $this->session->set_userdata('redirect_url', current_url());
                        redirect(base_url());
                    }
                }
        }
    }


    public function sendEmail($email,$subject,$message){
       
        $this->load->library('email');
        
        $config['protocol'] = "smtp";
        $config['smtp_host'] = 'ssl://smtp.gmail.com'; 
        $config['smtp_port'] = '465';
        $config['smtp_user'] = $this->config->item('smtp_user');
        $config['smtp_pass'] = $this->config->item('smtp_pass');
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
        $this->email->initialize($config);
        
        $this->email->from('noreply@yahoo.com', 'E-Learning Skill');
        $this->email->to($email);
        $this->email->subject($subject);        
        $this->email->message($message);
        $sendEmailFlag1 = "";
        
        if ($this->email->send()) {
            return true;
        }else{
            return false;
        }
    }

    public static function sendAndroidPushNotification($ssGcmRegistrationId, $bStatus=1, $ssMsg = "success", $ssTitle = "")
    {
        $url             = 'https://android.googleapis.com/gcm/send';
        $apiKey          = 'AIzaSyCEsL1hVJ4qHGk5ObCPD_mAz9UXhwPAy1E';
        $registrationIDs = $ssGcmRegistrationId;

        //payload data
        $msg = array('message' => "No message");

        $headers = array('Content-Type:application/json',
            'Authorization:key=' . trim($apiKey)
        );
        $ssMsg="New Magazine is published";
        $amRequestData = array(
            "data"             => array("status" => $bStatus, "message" => $ssMsg, "title" => $ssTitle),
            "registration_ids" => array($registrationIDs));

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL            => 'https://android.googleapis.com/gcm/send',
            CURLOPT_HTTPHEADER     => $headers,
            CURLOPT_POST           => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS     => json_encode($amRequestData)
        ));

        $response = curl_exec($ch);
        curl_close($ch);
        unset($ch);
    }
}


//require  APPPATH . 'core/Base_ApiController.php';

?>