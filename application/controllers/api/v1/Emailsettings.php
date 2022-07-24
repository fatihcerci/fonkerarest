<?php

class Emailsettings extends CI_Controller
{
    public $status = "";
    public $sessionUser = "";

    public function __construct()
    {
        parent::__construct();

        $this->load->model("emailsettings_model");

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

    public function get(){
        $json = $this->get_request();
        $resp = new stdClass();

        $resp->data = $this->emailsettings_model->get();
        $resp->status = $this->create_status(true, "");

        echo json_encode($resp);
        response($resp);
    }

    public function create_update() {
        $resp = new stdClass();
        $json = $this->get_request();
    
        if(!empty($json->protocol)) {

            if(!empty($json->id)) {
                $update = $this->emailsettings_model->update(
                    array("id" => $json->id),
                    array(
                        "protocol"         => $json->protocol,
                        "server"           => $json->server,
                        "port"             => $json->port,
                        "account"          => $json->account,
                        "password"         => $json->password,
                        "from"             => $json->from,
                        "to"               => $json->to,
                        "title"            => $json->title,

                        "last_updated"     => date("Y-m-d H:i:s"),
                        "last_updater_id"  => $this->sessionUser->id,
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
                $insert = $this->emailsettings_model->add(
                    array(
                        "id"               => uniqid(),
                        "status"           => 1,
                        "created_time"     => date("Y-m-d H:i:s"),
                        "creator_id"       => $this->sessionUser->id,
                        
                        "protocol"         => $json->protocol,
                        "server"           => $json->server,
                        "port"             => $json->port,
                        "account"          => $json->account,
                        "password"         => $json->password,
                        "from"             => $json->from,
                        "to"               => $json->to,
                        "title"            => $json->title
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


    public function send_test_mail(){
        $json = $this->get_request();
        $resp = new stdClass();

        $email_settings = $this->emailsettings_model->get(array("status" => 1));

        $config = array(
            "protocol"   => $email_settings->protocol,
            "smtp_host"  => $email_settings->server,
            "smtp_port"  => $email_settings->port,
            "smtp_user"  => $email_settings->account,
            "smtp_pass"  => $email_settings->password,
            "starttls"   => true,
            "charset"    => "utf-8",
            "mailtype"   => "html",
            "wordwrap"   => true,
            "newline"    => "\r\n"
        );
    
        $this->load->library("email", $config);
    
        $this->email->from($email_settings->from, $email_settings->title);
        $this->email->to($json->test_mail);
        $this->email->subject("TEST MAIL");
        $this->email->message("Bu bir test mesajıdır.");

        $send = $this->email->send();

        if($send) {
            $resp->status = $this->create_status(true, "Test mail gönderimi başarılı");
            $is_sent = 1;
        } else {
            $resp->status = $this->create_status(false, "Test mail gönderimi başarısız");
            $is_sent = 0;
        }

        $this->load->model("base_model");

        $this->base_model->add(
            "emails_sent",
            array(
                "id"                => uniqid(),
                "created_time"      => date("Y-m-d H:i:s"),
                "from"              => $email_settings->from,
                "to"                => $json->test_mail,
                "subject"           => "TEST MAIL",
                "content"           => "Bu bir test mesajıdır.",
                "is_sent"           => $is_sent
            )
        );
        

        echo json_encode($resp);
        response($resp);
    }

    
}