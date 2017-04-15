<?php

$cron_time = filemtime("cron_time.php");    //получаем время последнего изменения файла
if ( date("d") != date("d",$cron_time) ) {    //сравниваем день изменения файла с текущим
	file_put_contents("cron_time.php","");    //перезаписываем файл cron_time
	include "cron.php";                //выполняем скрипты из файла cron.php
}

