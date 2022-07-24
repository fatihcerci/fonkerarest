<?php

class Groups extends CI_Controller
{
    public $status = "";
    public $sessionUser = "";

    public function __construct()
    {
        parent::__construct();

        $this->load->model("group_model");

        $this->create_status();

        if(!check_auth()){
            echo $this->return_timeout();
            die();
        }

        $this->sessionUser = get_session_user();
    }
    
    public function index(){
        
    }

    public function test_connection(){
        $json = $this->get_request();
        $resp = new stdClass();

        $resp->status = $this->create_status(true, "");

        echo json_encode($resp);
        response($resp);
    }

    public function return_timeout() {
        $resp = new stdClass();

        $resp->status = $this->create_status(false, "MSG0000");
        echo json_encode($resp);
        response($resp);
        die();
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

        $resp->data = $this->group_model->get_all();
        $resp->status = $this->create_status(true, "");

        echo json_encode($resp);
        response($resp);
    }

    public function create_update() {
        $resp = new stdClass();
        $json = $this->get_request();
    
        if(!empty($json->name)) {

            if(!empty($json->id)) {
                $update = $this->group_model->update(
                    array("id" => $json->id),
                    array(
                        "name"                      => $json->name,
                        "description"               => $json->description,
                        "phone"                     => $json->phone,
                        "email"                     => $json->email,
                        "address"                   => $json->address,

                        "last_updated"              => date("Y-m-d H:i:s"),
                        "last_updater_id"           => $this->sessionUser->id,
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
                $insert = $this->group_model->add(
                    array(
                        "id"                        => uniqid(),
                        "status"                    => 1,
                        "created_time"              => date("Y-m-d H:i:s"),
                        "creator_id"                => $this->sessionUser->id,

                        "name"                      => $json->name,
                        "description"               => $json->description,
                        "phone"                     => $json->phone,
                        "email"                     => $json->email,
                        "address"                   => $json->address
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
        response($resp);
    }

    public function activate_passivate() {
        $resp = new stdClass();
        $json = $this->get_request();
    
        if(!empty($json->id)) {

            $update = $this->group_model->update(
                array(
                    "id" => $json->id
                ),
                array(
                    "status" => $json->status,
                    "last_updated"         => date("Y-m-d H:i:s"),
                    "last_updater_id"      => $this->sessionUser->id,
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
        response($resp);
    }
    
}