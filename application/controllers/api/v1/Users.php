<?php

class Users extends CI_Controller
{
    public $status = "";

    public function __construct()
    {
        parent::__construct();

        $this->create_status();
    }
    
    public function index(){
        
    }

    public function create_status($success = true, $message = "Başarılı"){
        $this->status = new stdClass();
        $this->status->success = $success;
        $this->status->message = $message;
        return $this->status;
    }

    public function get_request(){
        return (object) json_decode(file_get_contents('php://input'),true);
    }

    public function test_method(){
        $json = $this->get_request();
        $resp = new stdClass();

        if(empty($json->username)) {
            $this->create_status(false, "Username is required");
        }
        if(empty($json->password)) {
            $this->create_status(false, "Password is required");
        }

        if($this->status->success != true) {
            $resp->status = $this->status;
            echo json_encode($resp);
            die();
        }

        $this->load->helper("string");
        $resp->userToken = random_string();
        $resp->expireTime = "2021-03-10";

        $resp->status = $this->create_status();

        echo json_encode($resp);
    }
    
}