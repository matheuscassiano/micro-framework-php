<?php

function showTable($table)
{
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbName = 'testes';
    
    $mysqli = new mysqli($host,$user, $pass, $dbName);

    $query = "SELECT * FROM $table";    
    $result = $mysqli->query($query);

    for ($set = array (); $row = $result->fetch_assoc(); $set[] = $row);
    echo json_encode($set);

    $result->close();
    $mysqli->close();
}

function databaseInsert($sql)
{
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbName = 'testes';
    
    $mysqli = new mysqli($host,$user, $pass, $dbName);

    if (mysqli_query($mysqli, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}