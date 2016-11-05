<?php

function connect_db(){
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'slimteste';
$connection = new mysqli($host, $user, $pass, $db_name);

return $connection;

}



?>