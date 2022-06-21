<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header('Location: index.php');
    }
    if(isset($_GET['remove'])):
        $conn = new mysqli('localhost','root','','test');
            $id = $_GET['id'];
            $sql = "DELETE FROM registration WHERE ID = $id";
            $viet = $conn->query($sql);
            if($viet){
                header('Location: tableqlsv.php?remove_success');
            }else{
                echo"Remove failed";
            }
    endif;
    if(isset($_GET['update'])):
        $conn = new mysqli('localhost','root','','test');
        $id = $_GET['id'];
        
    endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT STUDENT</title>
</head>
<body>
    <?php 
        $conn = new mysqli('localhost','root','','test');
        $sqlselec = "SELECT * FROM registration where id=$id";
            $check = $conn->query($sqlselec);
            if($check->num_rows > 0){
                while($rows = $check->fetch_assoc()){
    ?>
    <h2>UPDATE STUDENT FORM</h2>
    <form method="post" action="">
        <div><label>Tên sv: </label><input type="text" name="name" autocomplete="off" required value="<?php echo $rows['name'] ?>"></div>
        <div><label>Năm sinh: </label><input type="date" name="dob"></div>
        <div><label>Giới tính: </label><input type="radio" name="gender" value="Male" <?php if($rows['gender']=='Male'){echo'checked';} ?>>Nam<input type="radio" name="gender" value="Female" <?php if($rows['gender']=='Female'){echo'checked';} ?>>Nữ</div>
        <div><label>Môn học: </label><input type="checkbox" name="subject[]" value="Toán">Toán<input type="checkbox" name="subject[]" value="Lý">Lý<input type="checkbox" name="subject[]" value="Hóa">Hóa</div>
        <div><label>Lớp: </label>
            <select name="Lop">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select>
        </div>
        <div><input type="submit" name="update" value="UPDATE STUDENT"/></div>
    </form>
    <?php 
        }
    }
    if(isset($_POST['update'])){
        $name = htmlspecialchars($_POST["name"]); 
        $Lop = htmlspecialchars($_POST["Lop"]);
        $dob = htmlspecialchars($_POST["dob"]);
        $gender = htmlspecialchars($_POST["gender"]);
        $subjects = $_POST['subject'];
        if(is_array($subjects)){
            $subjects_str = implode(", ", $subjects);
            $subjects_str = htmlspecialchars($subjects_str);
        }
        $sql = sprintf("UPDATE registration SET name='%s', Lop='%s', dob='%s', gender='%s', subject='%s' where ID = $id",$name,$Lop,$dob,$gender,$subjects_str);
        $conn->query($sql);
        header('Location: tableqlsv.php?up_success');
    }
    ?>
</body>
</html>