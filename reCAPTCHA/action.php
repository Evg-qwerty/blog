<?php

$data = array(
	'secret'   => "secret-key",
	'response' => $_POST['g-recaptcha-response'],
	'remoteip' => $_SERVER["REMOTE_ADDR"]
);

$c = curl_init();

curl_setopt( $c, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify" );
curl_setopt( $c, CURLOPT_POST, true );
curl_setopt( $c, CURLOPT_POSTFIELDS, http_build_query( $data ) );
curl_setopt( $c, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $c, CURLOPT_RETURNTRANSFER, true );

$response = json_decode( curl_exec( $c ) );

if( $response->success ) {
	echo "Поздравляю вы не робот";
} else {
	header('Location: /');
}
