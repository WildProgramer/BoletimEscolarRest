<?php

require_once('connectdb.php');
 
$app->get('/bimestre/{idAluno}', function($request) {
    
    
    $idAluno = $request->getAttribute('idAluno');

    $query = "SELECT DISTINCT BIMESTRE.ANO
              FROM PROVA	        
              INNER JOIN BIMESTRE
              ON PROVA.BIMESTRE_ID_BIMESTRE = BIMESTRE.ID_BIMESTRE
              WHERE PROVA.ALUNO_ID_ALUNO = '$idAluno'";
    
    $connection = connect_db();
    mysqli_set_charset($connection, "utf8");

    $result = $connection->query($query);
    
   
    while($row = $result->fetch_assoc()){

        $data['anos'][] = $row;

        
        
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