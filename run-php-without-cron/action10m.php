<?php

$cron_time = filemtime("cron_time.php");   //получаем время последнего изменения файла
if ( time() - $cron_time >= 600 ) {        //сравниваем с текущим временем - 10 минут
	file_put_contents("cron_time.php","");    //перезаписываем файл cron_time
	include "cron.php";                //выполняем скрипты из файла cron.php
}
