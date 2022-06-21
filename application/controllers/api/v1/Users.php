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

    public function list_users(){
        $json = $this->get_request();
        $resp = new stdClass();

        $users[0] = array(
            "avatar" => "https://cdn.quasar.dev/img/boy-avatar.png",
            "adi" => "Admin",
            "soyadi" => "Kullanicisi",
            "unvan" => "admin",
            "gsm" => "507 216 58 24",
            "eposta" => "fatihcerci001@gmail.com",
            "status" => "Aktif"
        );
        $users[1] = array(
            "avatar" => "https://cdn.quasar.dev/img/boy-avatar.png",
            "adi" => "Fatih",
            "soyadi" => "Çerçi",
            "unvan" => "Dr. Fatih Çerçi",
            "gsm" => "507 216 58 24",
            "eposta" => "chercycsgo@gmail.com",
            "status" => "Pasif"
        );

        $this->load->helper("string");

        $resp->data = $users;
        $resp->status = $this->create_status(true, "");

        echo json_encode($resp);
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