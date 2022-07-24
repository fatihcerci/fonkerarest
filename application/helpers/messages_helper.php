<?php

function get_message($msg)
{
    $messages = array(
        "MSG0000" => "Oturumunuzun süresi doldu, lütfen tekrar giriş yapın",
        "MSG0001" => "Kullanıcı hesabınız aktif değil",
        "MSG0002" => "E-posta veya şifre yanlış",
        "MSG0003" => "Kullanıcı hesabı bulunamadı",
        "MSG0004" => "Şifreniz sıfırlandı, lütfen e-postanızı kontrol edin",
    );

    return $messages[$msg]
}
