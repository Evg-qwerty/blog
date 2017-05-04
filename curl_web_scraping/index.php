<?php

$url = 'https://google.com';

$userAgent = $_SERVER['HTTP_USER_AGENT'];

$ch = curl_init($url);


curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com');
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

ob_start();

curl_exec($ch);

if(curl_exec($ch) === false) {
	echo 'Ошибка curl: ' . curl_error($ch);
}

curl_close($ch);

$curl_result = ob_get_clean();

preg_match('/#hplogo{background:url\((.+?)\)/', $curl_result, $result);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<img src="<?php echo 'https://www.google.com'.$result[1]; ?>" alt="">
</body>
</html>