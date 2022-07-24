<?php

class Userop extends CI_Controller
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

    public function login() {
        $resp = new stdClass();
        $json = $this->get_request();
    
        if(!empty($json->email) && !empty($json->password)) {

            $user = $this->user_model->get(
                array(
                    "email"          => $json->email,
                    "password"       => md5($json->password)
                )
            );

            if(!empty($user)) {
                if($user->status == 0) {
                    $resp->status = $this->create_status(false, "MSG0001"); //Kullanıcı hesabınız aktif değil
                } else {
                    $token = get_encrypt($user->email);
                    $user->token = $token;

                    insert_auth($user->id, $token);

                    $resp->status = $this->create_status(true, "");
                    $resp->data = json_encode($user);
                }
            } else {
                $resp->status = $this->create_status(false, "MSG0002"); //Eposta veya şifre hatalı
                echo json_encode($resp);
                die();
            }
        } 
        echo json_encode($resp);
    }

    public function reset_password() {
        $resp = new stdClass();
        $json = $this->get_request();
    
        if(!empty($json->email)) {

            $user = $this->user_model->get(
                array(
                    "email" => $json->email
                )
            );

            if(!empty($user)) {
                if($user->status == 0) {
                    $resp->status = $this->create_status(false, "MSG0001");
                } else {
                    $this->load->helper("string");
                    $temp_password = random_string('numeric', 6);

                    $arrContextOptions=array(
                        "ssl"=>array(
                            "verify_peer"=>false,
                            "verify_peer_name"=>false,
                        ),
                    );
                    
                    $resetpasswordhtml = file_get_contents(base_url("resetpassword.html"), false, stream_context_create($arrContextOptions));
                    $message = str_replace("APP_TEMP_PASSWORD", $temp_password, $resetpasswordhtml);
                    
                    $send = send_email(
                        $json->email,
                        "Şifreniz Sıfırlandı",
                        $message
                    );

                    $this->user_model->update(
                        array(
                            "id" => $user->id
                        ),
                        array(
                            "password" => md5($temp_password),
                            "last_updated" => date("Y-m-d H:i:s")
                        )
                    );

                    $resp->status = $this->create_status(true, "MSG0004");
                }
            } else {
                $resp->status = $this->create_status(false, "MSG0003");
                echo json_encode($resp);
                die();
            }
        } 
        echo json_encode($resp);
    }

    public function logout() {
        $resp = new stdClass();
        $json = $this->get_request();
    
        if(!empty($json->id)) {
            $user = $this->user_model->get(
                array(
                    "id" => $json->id
                )
            );

            if(!empty($user)) {
                delete_auth($user->id);
                $resp->status = $this->create_status(true, "");
            } 
        } 
        echo json_encode($resp);
    }
    
}