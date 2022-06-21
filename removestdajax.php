<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location:index.php");
    die(); 
}
// require_once 'connect.php';
$conn = new mysqli('localhost','root','','test');
if(isset($_GET["id"]) && $_GET["id"] != ''){
    $id = $_GET["id"];
    $sql = "DELETE FROM student WHERE id = $id";
    $result = $conn->query($sql);
    if($result){
        // lay ra list sinh vien
        $sql = "SELECT * FROM student";
        $conn->query($sql, MYSQLI_USE_RESULT);
        $result = $conn->query($sql);
        $list_student = $result->fetch_all(MYSQLI_ASSOC);
        // du lieu tra ra json
       echo json_encode($list_student);
    }
}