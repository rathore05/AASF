<?php
$path_to_fcm = 'https://fcm.googleapis.com/fcm/send';
$server_key = "AIzaSyAnsfA-s2cVnBKlUTRl1IIFuyYD6ZlH_uU";
$headers = array(
	            'Authorization:key=' .$server_key,
	            'Content-Type:application/json'
	        );
$field=array (
  'to' => '/topics/news',
  'data' => 
  array (
    
    'message' => $_POST['title'],
    
    'extra1'=>$_POST['title']
    
  ),
);
$date = new DateTime();
echo $date->getTimestamp();
$payload=json_encode($field);
echo $payload;
$curl_session = curl_init();
curl_setopt($curl_session, CURLOPT_URL, $path_to_fcm);
curl_setopt($curl_session, CURLOPT_POST, true);
curl_setopt($curl_session, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_session, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
curl_setopt($curl_session, CURLOPT_POSTFIELDS, $payload);

$result = curl_exec($curl_session);



curl_close($curl_session);
  ?>



  