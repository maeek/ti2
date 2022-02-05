<?php

$db_host = $_ENV['PMA_HOST'];
$db_user = $_ENV['MYSQL_USER'];
$db_password = $_ENV['MYSQL_PASSWORD'];
$db_name = $_ENV['MYSQL_DATABASE'];
$connect_to_db = @new mysqli($db_host, $db_user, $db_password, $db_name);
