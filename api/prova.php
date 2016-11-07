<?php

require_once('connectdb.php');
 
$app->get('/prova/{idAluno}', function($request) {
    
    
    $idAluno = $request->getAttribute('idAluno');

    $query = "SELECT PROVA.ID_PROVA, PROVA.NOTA, MATERIA.MATERIA, FALTAS.FALTAS, BIMESTRE.BIMESTRE
              FROM PROVA
              INNER JOIN MATERIA
              ON PROVA.MATERIA_ID_MATERIA = MATERIA.ID_MATERIA
              INNER JOIN BIMESTRE
              ON PROVA.BIMESTRE_ID_BIMESTRE = BIMESTRE.ID_BIMESTRE
              INNER JOIN FALTAS
              ON PROVA.MATERIA_ID_MATERIA = FALTAS.MATERIA_ID_MATERIA
              WHERE PROVA.ALUNO_ID_ALUNO = '$idAluno'";
    
    $connection = connect_db();
    mysqli_set_charset($connection, "utf8");

    $result = $connection->query($query);
    
   
    while($row = $result->fetch_assoc()){

        $data['provas'][] = $row;

        
        
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