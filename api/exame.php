<?php

require_once('connectdb.php');
 
$app->get('/exames', function() {
    
    
   

    $query = "SELECT EXAMES.ID_EXAME, BIMESTRE.BIMESTRE, DATA.DATA, MATERIA.MATERIA
              FROM EXAMES
              INNER JOIN BIMESTRE
              ON EXAMES.BIMESTRE_ID_BIMESTRE = BIMESTRE.ID_BIMESTRE
              INNER JOIN DATA
              ON EXAMES.DATA_ID_DATA = DATA.ID_DATA
              INNER JOIN MATERIA
              ON EXAMES.MATERIA_ID_MATERIA = MATERIA.ID_MATERIA";
    
    $connection = connect_db();
    mysqli_set_charset($connection, "utf8");

    $result = $connection->query($query);
    
   
    while($row = $result->fetch_assoc()){

        $data['exames'][] = $row;

        
        
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