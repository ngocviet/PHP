<?php
    $conn = new mysqli('localhost','root','');
    $sql_creDatabase = "CREATE DATABASE if not exists demodatabase";
    $viet = $conn->query($sql_creDatabase);
    // echo $viet;
    $sql = "USE demodatabase";
    $conn->query($sql);
    $sql_table = "CREATE table if not exists abc12users(
        name varchar(100) not null unique,
        password_hash char(40) not null,
        phonr varchar(10)
    )";
    $viet = $conn->query($sql_table);
    // echo $viet;
    $conn = new mysqli('localhost','root','','demodatabase');
?>