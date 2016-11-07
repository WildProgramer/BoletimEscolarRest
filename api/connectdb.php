<?php

function connect_db(){
$host = 'localhost';
$user = 'nogoa521_norb749';
$pass = '123456';
$db_name = 'nogoa521_escolaApi';
$connection = new mysqli($host, $user, $pass, $db_name);

return $connection;

}



?>