<?php

function showTable($table)
{
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbName = 'testes';
    
    $mysqli = new mysqli($host,$user, $pass, $dbName);

    $query = "SELECT * FROM $table";
/*  $statement = $mysqli->prepare($query);
    $statement->execute();
    $result = $statement->get_result();
*/    
//    echo json_encode($result->fetch_assoc());
    
    $result = $mysqli->query($query);

    for ($set = array (); $row = $result->fetch_assoc(); $set[] = $row);
    echo json_encode($set);

    $result->close();
    $mysqli->close();
}
