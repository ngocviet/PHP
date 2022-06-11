<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: index.php");
    }
    $con = new mysqli('localhost','root','','test');
    if(isset($_POST['themsv'])):
        $name = htmlspecialchars($_POST["name"]); 
        $Lop = htmlspecialchars($_POST["Lop"]);
        $dob = htmlspecialchars($_POST["dob"]);
        $gender = htmlspecialchars($_POST["gender"]);
        $subjects = $_POST['subject'];
        if(is_array($subjects)){
            $subjects_str = implode(", ", $subjects);
            $subjects_str = htmlspecialchars($subjects_str);
        }
        $sql = sprintf("insert into registration(name,Lop,dob,gender,subject) values('%s','%s','%s','%s','%s')",$name,$Lop,$dob,$gender,$subjects_str);
        // var_dump($sql);
        $viet = $con->query($sql);
        // var_dump($viet);
        // return;
        // header('Location: tableqlsv.php?success');
    endif;
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QLSV</title>
</head>
<body>
    <form method="post" action="">
        <div><label>Tên sv: </label><input type="text" name="name" autocomplete="off" required></div>
        <div><label>Năm sinh: </label><input type="date" name="dob"></div>
        <div><label>Giới tính: </label><input type="radio" name="gender" value="Male">Nam<input type="radio" name="gender" value="Female">Nữ</div>
        <div><label>Môn học: </label><input type="checkbox" name="subject[]" value="Toán">Toán<input type="checkbox" name="subject[]" value="Lý">Lý<input type="checkbox" name="subject[]" value="Hóa">Hóa</div>
        <div><label>Lớp: </label>
            <select name="Lop">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select>
        </div>
        <div><input type="submit" name="themsv" value="Them sinh vien"/></div>
    </form>
    <table border="1" style="width: 100%;text-align:center;">
    <thead>
        <th>ID</th>
        <th>Tên</th>
        <th>Lớp</th>
        <th>Năm sinh</th>
        <th>Giới tính</th>
        <th>Môn học</th>
        <th>Cập nhật</th>
    </thead>
    <tbody>
        <?php
            $con = new mysqli('localhost','root','','test');
            $sqlselec = "SELECT * FROM registration";
            $check = $con->query($sqlselec);
            if($check->num_rows > 0){
                while($rows = $check->fetch_assoc()){
                    echo'<tr>';
                        echo'<td>'.$rows['ID'].'</td>';
                        echo'<td>'.$rows['name'].'</td>';
                        echo'<td>'.$rows['Lop'].'</td>';
                        echo'<td>'.$rows['dob'].'</td>';
                        echo'<td>'.$rows['gender'].'</td>';
                        echo'<td>'.$rows['subject'].'</td>';
                        ?>
                        <td><button onclick="updateSV(<?php echo $rows['ID'] ?>)">Cap nhat</button><button onclick="removeSV(<?php echo $rows['ID']?>)">Xoa</button></td>
                        <?php
                    echo'</tr>';
                }
            }
            ?>
            </tbody>
    </table>
</body>
    <script>
        function removeSV(id){
        if(confirm("Ban co chac chan muon xoa sinh vien nay khong?")){
            // window.location.href = "Editt.php?remove&id="+id;
            let ajax = new XMLHttpRequest();
            ajax
        }
    }
    </script>
</html>
