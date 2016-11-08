<?php
require_once('connectdb.php');
 
$app->post('/token', function() {
    
    
if (isset($_POST["id_aluno"]) && isset($_POST["token"])) {

    $id_aluno=$_POST["id_aluno"];
	$token=$_POST["token"];

    $query = "INSERT INTO TOKEN (ALUNO_ID_ALUNO, TOKEN) VALUES ( '$id_aluno', '$token') "
              ." ON DUPLICATE KEY UPDATE TOKEN = '$token';";
    
    $connection = connect_db();
    mysqli_set_charset($connection, "utf8");

    $result = $connection->query($query);
    
    echo json_encode("Registered");
   

    }

   
  
   
 




});







?>