<?php

$url = "http://your-site.com/action.php";
$curl = curl_init($url);

$params = array('a'=>'2');
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $params);

$result = curl_exec($curl);

echo $result;

curl_close($curl);


