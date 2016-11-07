<?php

require_once('connectdb.php');
 
$app->get('/aluno/{ra}', function($request) {
    
    
    $ra = $request->getAttribute('ra');

    $query = "SELECT ALUNO.ID_ALUNO, PESSOA.P_NOME, PESSOA.S_NOME 
              FROM ALUNO
              INNER JOIN PESSOA
              ON ALUNO.PESSOA_ID_PESSOA=PESSOA.ID_PESSOA
              WHERE ALUNO.RA = '$ra'";
    
    $connection = connect_db();
    mysqli_set_charset($connection, "utf8");

    $result = $connection->query($query);
    
   
    while($row = $result->fetch_assoc()){

        $data['aluno'][] = $row;

        
        
    }

   
  
    if (isset($data)){
   
    
    header('Content-Type: application/json; Charset="UTF-8"');
    echo json_encode($data);
    //mysqli_close($this->connection);

    }else{

        header('Content-Type: application/json; Charset="UTF-8"');  
        header("HTTP/1.1 404 Not Found");
        echo json_encode(http_response_code(404));
       // mysqli_close($this->connection);
       
    } 
 




});







?>