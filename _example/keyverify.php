<?php

$message = array();
if(isset($_POST)){

    $pcaptcha = $_POST["irisCaptcha"]; // the value of name of iris-captcha tag
    
    $secretKey = "0x1ed50xe8414ae66a37820fe4e277779c"; // your Secret provided in your panel at https://my.irisdev.net

    $url = "https://captcha.irisdev.net";
    $verifyResponse = file_get_contents($url);
    $responseData = json_decode($verifyResponse);
    if(isset($responseData->success) && $responseData->success){
    // Great the user solved Response correctly
        $message["class"] = "alert-success";
        $message["text"] = "success";
    }else{
    // Ops. the user doesn't solved it or response expired 
        $message["class"] = "alert-danger";
        $message["text"] = "something wrong , you doesn't solved the captcha dear bot !!! ";
    }
}