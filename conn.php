<?php
    $conn = new mysqli('localhost','root',''); 
    $sql_creDatabase = "CREATE DATABASE if not exists abc12";
    $viet = $conn->query($sql_creDatabase);
    $sql = "USE abc12";
    $conn->query($sql);
    $sql_table = "CREATE table if not exists abc12users(
        USERNAME varchar(100) not null unique,
        PASSWORD_HASH char(40) not null,
        PHONE varchar(10)
    )";
    $viet = $conn->query($sql_table);
    $conn = new mysqli('localhost','root','','abc12');
?>