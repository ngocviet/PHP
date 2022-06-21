<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit information</title>
</head>
<?php
    $conn = new mysqli('Localhost','root','','test');
    if(isset($_POST['repla'])):
        $id = htmlspecialchars($_POST['id']);
        $alert = [];
        $sql1 = sprintf("SELECT * FROM registration where id='%s'",mysqli_real_escape_string($conn,$id));
        $viet = $conn->query($sql1);
        if($viet){
            if(isset($_POST['name'])){
                array_push($alert, 'name');
            }
            if(isset($_POST['lop'])){
                array_push($alert, 'lop');
            }
            if(isset($_POST['dob'])){
                array_push($alert, 'dob');
            }
            if(isset($_POST['gender'])){
                array_push($alert, 'gender');
            }
            $sum_alert = implode('&', $alert);
            if(count($alert)>0){
                header('Location: edit.php?'.$sum_alert);
            }
        }
        else{
            header('Location: qlsvreal.php?erid');
        }
        

    endif;

?>
<body>
    <form method="post" action="">
        <h2>Fix information form!</h2>
        <?php
            if(isset($_GET['name'])){
                ?>
                <div><label>Nhap ten ban muon sua: </label><input type="text" name="nameplace"/></div>
                <?php
            }
        ?>
        <?php
            if(isset($_GET['lop'])){
                ?>
            <div><label>Lớp: </label>
                <select name="Lop">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>
                <?php
            }
        ?>
        <?php
            if(isset($_GET['dob'])){
                ?>
                <div><label>Nhap ngay ban muon sua: </label><input type="date" name="dobplace"/></div>
                <?php
            }
        ?>
        <?php
            if(isset($_GET['gender'])){
                ?>
                <div><label>Chon gioi tinh ban muon sua: </label><input type="radio" name="genderplace" value="Male"/>Nam<input type="radio" name="genderplace" value="Female"/>Nu</div>
                <?php
            }
        ?>
        <input type="submit" name="sua" value="OK" style="font-size: 20px;"/>
    </form>
    <a href="qlsvreal.php" style="font-size: 20px;color:blue;">Back</a>
        <?php
        if(isset($_POST['nameplace'])){
            $name0 = htmlspecialchars($_POST['nameplace']);
            $sql2 = sprintf("UPDATE registration SET name = '%s' where ID = 29",mysqli_real_escape_string($conn,$name0));
            $viet1 = $conn->query($sql2);
            if($viet1){
                echo"<p style='color:green;font-weight:bold;font-size:25px'>Rapalce name success!!</p>";
            }
        }
        if(isset($_POST['dobplace'])){
            $dob = htmlspecialchars($_POST['dobplace']);
            $sql3 = sprintf("UPDATE registration SET dob = '%s' where ID = 29",mysqli_real_escape_string($conn,$dob));
            $viet2 = $conn->query($sql3);
            if($viet2){
                echo"<p style='color:green;font-weight:bold;font-size:25px'>Rapalce dob success!!</p>";
            }
        }
        if(isset($_POST['Lop'])){
            $lop = htmlspecialchars($_POST['Lop']);
            $sql4 = sprintf("UPDATE registration SET Lop = '%s' where ID = 29",mysqli_real_escape_string($conn,$lop));
            $viet3 = $conn->query($sql4);
            if($viet3){
                echo"<p style='color:green;font-weight:bold;font-size:25px'>Rapalce Lop success!!</p>";
            }
        }
        if(isset($_POST['genderplace'])){
            $gender = htmlspecialchars($_POST['genderplace']);
            $sql5 = sprintf("UPDATE registration SET gender = '%s' where ID = 29",mysqli_real_escape_string($conn,$gender));
            $viet4 = $conn->query($sql5);
            if($viet4){
                echo"<p style='color:green;font-weight:bold;font-size:25px'>Rapalce Gender success!!</p>";
            }
        }
    ?>

</body>
</html>