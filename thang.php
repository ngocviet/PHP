<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style>
            label{
                display: block;
                float: left;
                text-align: right;
                box-sizing: border-box;
                width: 45%;
            }
            div{
                margin-bottom: 5px;
                margin: 2px;
            }
        </style>
        <?php
            $conn = new mysqli('localhost', 'root','','btlp');
            session_start();
            if(!isset($_SESSION['username'])){
                header("location: index.php");
                die();
            }

    if(isset($_POST['addsv'])){
        $name = htmlspecialchars($_POST['ten']);
        $gender = htmlspecialchars($_POST['sex']);    
        $DOB = htmlspecialchars($_POST['nam']);
        $subjects = $_POST['subjects'];
        $subjects_str = "";
        if(is_array($subjects)){
            $subjects_str = implode(",", $subjects);
            $subjects_str = htmlspecialchars($subjects_str);
        }
        var_dump($subjects_str);
        $class = htmlspecialchars($_POST['class']);
        var_dump($class);
        $sql = sprintf("INSERT INTO sinhvien(name, Class, DOB, Gender, Subjects) VALUES('%s','%s','%s',%d,'%s')", $name,$class,$DOB,$gender,$subjects_str);
         var_dump($sql);
        $result = $conn->query($sql);
        var_dump($result);
        return;
        if($result == true){
            $add_success = "<p>add student succes</p>";
        }   
    }
    $sql = "SELECT *FROM sinhvien";
    $conn->query($sql,MYSQLI_USE_RESULT);
    $result = $conn->query($sql);
    $list_student = $result->fetch_all(MYSQLI_ASSOC);
    $add_success = "";
?>
    </head>
    <body>
    <form method="post" action="">
        <div>
        <h2 style="text-align: center ;">Quản lý SV</h2>
        <div><label>Name:</label><input type="text" name="ten"></div>
        <div><label>DOB:</label><input type="date" name="nam"></div>
        <div><label>Gender:</label><input type="radio" value = 0 name="sex">Nam<input type="radio" value = 1 name="sex">Nu</div>
        <div><label>Subjects:</label><input type="checkbox" name="subjects[]" value="toan">Toán<input type="checkbox" name="subjects[]" value="ly">Lý<input type="checkbox" name="subjects[]" value="hoa">Hóa           
        </div>
        <label>Lớp:</label>
        <select name="class">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select>
        </div>
        <div><label>&nbsp;</label><input type="submit" name="addsv" value="Add"></div>
        <?php echo $add_success; ?>
    </form>
    <table border= 1 align="center">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Class</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Subjects</th>
            <th>Cap Nhat</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(is_array($list_student)){
                foreach($list_student as $key => $student){
        ?>
        <tr>
            <td><?php echo $student["ID"]; ?></td>
            <td><?php echo $student["name"]; ?></td>
            <td><?php echo $student["Class"]; ?></td>
            <td><?php echo $student["DOB"]; ?></td>
            <td><?php echo $Gender = ($student["Gender"] == 0)? "Nam" : "Nu"; ?></td>
            <td><?php echo $student["Subjects"]; ?></td>
            <td><a href="updatesv.php?id=">sửa</a><span>&nbsp;</span><button onclick="removeSV(<?php echo $student['ID']; ?>)">xóa</button></td>
        </tr>
        <?php
                }
            }
        ?>
    </tbody>
    </table>
    <?php
        if(isset($_GET['deleted_success'])){
            echo "<p style='color: red;'>Xoa thanh cong</p>";
        }
    ?>
    </body>
    <script>
        function removeSV(ID){
            if(confirm("Ban co chac muon xoa sinh vien hay khong?")){
                window.location.href = "Removs.php?id="+ID;
            }
        }
    </script>
</html>