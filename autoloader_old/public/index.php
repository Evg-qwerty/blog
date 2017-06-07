<?php

function __autoload($className) {

	$classPieces = explode('\\', $className);

	switch ($classPieces[0]) {
		case 'app':
			require_once ( __DIR__ . '/../' . implode(DIRECTORY_SEPARATOR, $classPieces) . '.php' );
			break;
		case 'app2':
			require_once ( __DIR__ . '/../' . implode(DIRECTORY_SEPARATOR, $classPieces) . '.php' );
			break;
	}
}

$sum = new app\One();
$min = new app2\Two();
