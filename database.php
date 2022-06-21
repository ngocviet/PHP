<?php
    $host = "localhost:3306";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($host,$username,$password,'tesdb');
    if(!$conn){
        die("Kết nối thất bại<br>".mysqli_connect_error());
    }else{
        echo "Kết nối thành công<br>";
    }    
    // $sql = "CREATE DATABASE IF NOT EXISTS tesdb";
    // if($conn->query($sql) === TRUE){
    //     echo "Tạo database thành công<br>";
    // }else{
    //     echo "Tạo database thất bại<br>".$conn->error;
    // }

    // if(mysqli_query($conn,$sql)){
    //     echo "Tạo database thành công<br>";
    // }else{
    //     echo "Tạo database thất bại<br>".mysqli_error($conn);
    // }
    $sql="
    CREATE TABLE userr (
        ID int AUTO_INCREMENT PRIMARY KEY,
        username varchar(30),
        passwordd varchar(30) 
    );
    CREATE TABLE sinhvien(
        ID int AUTO_INCREMENT PRIMARY KEY,
        name varchar(30),
        Gender tinyint,
        mon_hoc varchar(30),
        lop varchar(30)
    );
    Insert INTO sinhvien(name,mon_hoc,lop) VALUES
    ('Le Ngoc A',1,'PHP1','C2108G2'),
    ('Le Ngoc B',0,'PHP2','C2108G3'),
    ('Le Ngoc C',1,'PHP3','C2108G4'),
    ;
    Insert INTO userr(username,passwordd) VALUES
    ('LeNgocD','31082003'),
    ('LeNgocE','31082004'),
    ('LeNgocF','31082005'),
    ;
    ";
        if($conn->multi_query($sql)===True){
            echo 'Tao bang thanh cong<br>';
        }else{
            echo 'Tao bang that bai<br>';
        }
    mysqli_close($conn);
?>