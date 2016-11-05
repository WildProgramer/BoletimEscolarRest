<?php

require_once('connectdb.php');
 
$app->get('/login/{name}', function($request) {
    
    
    $name = $request->getAttribute('name');

    $query = "select * from Pessoa Where nome = '".$name."'";
    
    $connection = connect_db();
    mysqli_set_charset($connection, "utf8");

    $result = $connection->query($query);
    
   
    while($row = $result->fetch_assoc()){

        $data['users'][] = $row;

        
        
    }

    if (isset($data)){
   
    header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode($data);

    }else{

        header("HTTP/1.0 404 Not Found");
        echo "<h1>404 Not Found</h1>";
    } 
 




});







?>