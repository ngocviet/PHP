<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLE QLSV</title>
</head>
<body>
    <h2 style="text-align: center;">BANG SINH VIEN</h2>
    <form method="post" action="qlsv.php"><button type="submit" name="addsv">ADD Student</button>
        <?php 
            if(isset($_GET['success'])){
                echo"<p style='color:green;font-weight:bold;font-size:30px;'>ADD Student Successfully!!!</p>";
            }
            if(isset($_GET['remove_success'])){
                echo"<p style='color:green;font-weight:bold;font-size:30px;'>Remove Successfully!!!</p>";
            }
            if(isset($_GET['up_success'])){
                echo"<p style='color:green;font-weight:bold;font-size:30px;'>Remove Successfully!!!</p>";
            }
        ?>
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
            window.location.href = "Editt.php?remove&id="+id;
        }
    }
    function updateSV(id){       
        window.location.href = "Editt.php?update&id="+id;
    }
</script>
</html>