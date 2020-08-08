<?php

    $groupID = $_GET['groupid'];
    $brightness = $_GET['bri'];

    $groupAttributes = '{"bri":' . $brightness . '}';
   
    
    //$data_json = json_encode($groupAttributes);
    //echo $data_json;

    $url = "http://192.168.6.21/api/r9qVoXN0guMC1zjwQFJKOB9wV7M3tZRrmw6Hdrcm/groups/" . $groupID . "/action";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch,CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);	
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($groupAttributes)));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS,$groupAttributes);			
    usleep(250000); 
    $result = curl_exec($ch);
    if ($result == false) {
        echo "false";
        echo curl_errno($ch);
        echo curl_error($ch);
    } else {
        echo $result;
    }
    


?>