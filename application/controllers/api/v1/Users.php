<?php

class Users extends CI_Controller
{
    public $status = "";

    public function __construct()
    {
        parent::__construct();

        $this->load->model("user_model");

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

        $resp->data = $this->user_model->get_all();
        $resp->status = $this->create_status(true, "");

        echo json_encode($resp);
    }

    public function create_user() {
        $resp = new stdClass();
        $json = $this->get_request();
    
        if(!empty($json->name)) {

            if(!empty($json->id)) {
                $update = $this->user_model->update(
                    array("id" => $json->id),
                    array(
                        "name"                      => $json->name,
                        "surname"                   => $json->surname,
                        "title"                     => $json->title,
                        "phone"                     => $json->phone,
                        "email"                     => $json->email
                    )
                );

                if($update == 1) {
                    $resp->status = $this->create_status(true, "Kullanıcı güncellendi");
                } else {
                    $resp->status = $this->create_status(false, "Kullanıcı güncellenemedi");
                    echo json_encode($resp);
                    die();
                }
                
            } else {
                $insert = $this->user_model->add(
                    array(
                        "id"                        => uniqid(),
                        "status"                    => 1,
                        "name"                      => $json->name,
                        "surname"                   => $json->surname,
                        "title"                     => $json->title,
                        "phone"                     => $json->phone,
                        "email"                     => $json->email
                    )
                );

                if($insert == 1) {
                    $resp->status = $this->create_status(true, "Kullanıcı oluşturuldu");
                } else {
                    $resp->status = $this->create_status(false, "Kullanıcı oluşturulamadı");
                    echo json_encode($resp);
                    die();
                }
            }
            
        } else {
            $resp->status = $this->create_status(false, "Zorunlu alanlar doldurulmalı");
            echo json_encode($resp);
            die();
        }
 
        echo json_encode($resp);
        
    }

    public function activate_passivate_user() {
        $resp = new stdClass();
        $json = $this->get_request();
    
        if(!empty($json->id)) {

            $update = $this->user_model->update(
                array("id" => $json->id),
                array(
                    "status"                    => $json->status
                )
            );

            if($update == 1) {
                $resp->status = $this->create_status(true, "Kullanıcı güncellendi");
            } else {
                $resp->status = $this->create_status(false, "Kullanıcı güncellenemedi");
                echo json_encode($resp);
                die();
            }
            
        } 
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