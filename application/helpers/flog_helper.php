<?php

$CI = &get_instance();
$log = new stdClass();
$CI->benchmark->mark('code_start');

function create_log($requestParams, $user = ""){
    $t = &get_instance();

    $request = new stdClass();
    $request->requestMethod = $_SERVER['REQUEST_METHOD'];
    $request->method = $_SERVER['PATH_INFO'];
    $request->clientIPAdress = $_SERVER["REMOTE_ADDR"];
    $request->serverIPAdress = $_SERVER["SERVER_ADDR"].':'.$_SERVER["SERVER_PORT"];
    $request->browser = !empty($_SERVER["HTTP_SEC_CH_UA"]) ? $_SERVER["HTTP_SEC_CH_UA"] : null;

    $t->log->requstInfo = $request;
    $t->log->requestParams = $requestParams;
    $t->log->userInfo = $user;
}

function response($r){
    $t = &get_instance();

    $t->log->response = $r;

    $t->benchmark->mark('code_end');
    
    if($_SERVER['REQUEST_METHOD'] <> "OPTIONS") {
        log_message('log', "ELAPSED TIME: ".floor($t->benchmark->elapsed_time('code_start', 'code_end') * 1000)." ms || REQUEST --> ".json_encode($t->log));
    }
}

