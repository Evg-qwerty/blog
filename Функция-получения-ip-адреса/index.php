<?php

function get_ip() {
	if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		if (is_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		foreach( explode(',',$_SERVER['HTTP_X_FORWARDED_FOR']) as $ip ) {
			$ip=trim($ip);
			if (is_ip($ip))
				return $ip;
		}
	}
	return $_SERVER['REMOTE_ADDR'];
}
function is_ip($ip) {
	return (false===ip2long($ip)) ? false : true;
}
