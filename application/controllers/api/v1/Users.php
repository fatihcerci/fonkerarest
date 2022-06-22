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

    public function test_connection(){
        $json = $this->get_request();
        $resp = new stdClass();

        $resp->status = $this->create_status(true, "REST API Server Bağlantı Başarılı");

        echo json_encode($resp);
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

    public function get_all(){
        $json = $this->get_request();
        $resp = new stdClass();

        $records = $this->user_model->get_all();

        foreach($records as $r) {
            $date = DateTime::createFromFormat('Y-m-d', $r->birthdate);
            $birthdate=$date->format('d/m/Y');

            $r->birthdate = $birthdate;
        }

        $resp->data = $records;
        $resp->status = $this->create_status(true, "");

        echo json_encode($resp);
    }

    public function create_update() {
        $resp = new stdClass();
        $json = $this->get_request();
    
        if(!empty($json->name)) {
            $date = DateTime::createFromFormat('d/m/Y', $json->birthdate);
            $birthdate=$date->format('Y-m-d');

            if(!empty($json->id)) {
                $update = $this->user_model->update(
                    array("id" => $json->id),
                    array(
                        "tckn"                      => $json->tckn,
                        "name"                      => $json->name,
                        "surname"                   => $json->surname,
                        "title"                     => $json->title,
                        "birthdate"                 => $birthdate,
                        "phone"                     => $json->phone,
                        "email"                     => $json->email,
                        "group_id"                  => $json->group_id,
                        "role_id"                   => $json->role_id
                    )
                );

                if($update == 1) {
                    $resp->status = $this->create_status(true, "Kayıt güncellendi");
                } else {
                    $resp->status = $this->create_status(false, "Kayıt güncellenemedi");
                    echo json_encode($resp);
                    die();
                }
                
            } else {
                $insert = $this->user_model->add(
                    array(
                        "id"                        => uniqid(),
                        "status"                    => 1,
                        "created_time"              => date("Y-m-d H:i:s"),

                        "tckn"                      => $json->tckn,
                        "name"                      => $json->name,
                        "surname"                   => $json->surname,
                        "title"                     => $json->title,
                        "birthdate"                 => $birthdate,
                        "phone"                     => $json->phone,
                        "email"                     => $json->email,
                        "group_id"                  => $json->group_id,
                        "role_id"                   => $json->role_id
                    )
                );

                if($insert == 1) {
                    $resp->status = $this->create_status(true, "Kayıt oluşturuldu");
                } else {
                    $resp->status = $this->create_status(false, "Kayıt oluşturulamadı");
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

    public function activate_passivate() {
        $resp = new stdClass();
        $json = $this->get_request();
    
        if(!empty($json->id)) {

            $update = $this->user_model->update(
                array(
                    "id" => $json->id
                ),
                array(
                    "status" => $json->status,
                    "last_updated"         => date("Y-m-d H:i:s")
                )
            );

            if($update == 1) {
                $resp->status = $this->create_status(true, "Kayıt güncellendi");
            } else {
                $resp->status = $this->create_status(false, "Kayıt güncellenemedi");
                echo json_encode($resp);
                die();
            }
            
        } 
        echo json_encode($resp);
    }
    
}