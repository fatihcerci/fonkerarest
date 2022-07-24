<?php

class Users extends CI_Controller
{
    public $status = "";
    public $sessionUser = "";

    public function __construct()
    {
        parent::__construct();

        $this->load->model("user_model");

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
    }

    public function return_timeout() {
        $resp = new stdClass();
        $resp->status = $this->create_status(false, "MSG0000");
        
        echo json_encode($resp);
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
                        "role_id"                   => $json->role_id,

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
                $this->load->helper("string");
                $temp_password = random_string('numeric', 6);

                $insert = $this->user_model->add(
                    array(
                        "id"                        => uniqid(),
                        "status"                    => 1,
                        "created_time"              => date("Y-m-d H:i:s"),
                        "creator_id"                => $this->sessionUser->id,

                        "tckn"                      => $json->tckn,
                        "name"                      => $json->name,
                        "surname"                   => $json->surname,
                        "title"                     => $json->title,
                        "birthdate"                 => $birthdate,
                        "phone"                     => $json->phone,
                        "email"                     => $json->email,
                        "group_id"                  => $json->group_id,
                        "role_id"                   => $json->role_id,

                        "password"                  => md5($temp_password)
                    )
                );

                if($insert == 1) {
                    $resp->status = $this->create_status(true, "Kayıt oluşturuldu");

                    $arrContextOptions=array(
                        "ssl"=>array(
                            "verify_peer"=>false,
                            "verify_peer_name"=>false,
                        ),
                    );
                    
                    $sendpasswordhtml = file_get_contents(base_url("sendpassword.html"), false, stream_context_create($arrContextOptions));
                    $message = str_replace("APP_TEMP_PASSWORD", $temp_password, $sendpasswordhtml);
                    
                    $send = send_email(
                        $json->email,
                        "Kullanıcınız Oluşturuldu",
                        $message
                    );

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
                    "status"            => $json->status,
                    "last_updated"      => date("Y-m-d H:i:s"),
                    "last_updater_id"   => $this->sessionUser->id,
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

    public function update_password() {
        $resp = new stdClass();
        $json = $this->get_request();
    
        if(!empty($json->id)) {

            $update = $this->user_model->update(
                array("id" => $json->id),
                array(
                    "password"          => md5($json->password),
                    "last_updated"      => date("Y-m-d H:i:s"),
                    "last_updater_id"   => $this->sessionUser->id,
                )
            );

            if($update == 1) {
                $resp->status = $this->create_status(true, "Şifre güncellendi");

                $user = $this->user_model->get(
                    array(
                        "id"    => $json->id,
                    )
                );
                
                $arrContextOptions=array(
                    "ssl"=>array(
                        "verify_peer"=>false,
                        "verify_peer_name"=>false,
                    ),
                );
                
                $updatepasswordhtml = file_get_contents(base_url("updatepassword.html"), false, stream_context_create($arrContextOptions));
                $message = str_replace("APP_TEMP_PASSWORD", $json->password, $updatepasswordhtml);
                
                $send = send_email(
                    $user->email,
                    "Şifreniz Güncellendi",
                    $message
                );

            } else {
                $resp->status = $this->create_status(false, "Şifre güncellenemedi");
                echo json_encode($resp);
                die();
            }
        } else {
            $resp->status = $this->create_status(false, "Bir sorun oluştu");
            echo json_encode($resp);
            die();
        }
        echo json_encode($resp);
    }
    
}