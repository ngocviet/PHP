<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QLSV</title>
    <style>
        label{
            width: 140px;
            float: left;
            display: block;
        }
        form>div{
            margin: 0px 0px 15px 10px;
        }
        table{
            border-collapse: collapse;
            border: 4px solid black;
        }
        input{
            margin-left: 5px;
        }
        th, td {
            padding: 15px;
        }
        button{
            margin: 5px;
        }
    </style>
</head>
<body>
    <?php
        if(count($_POST) >0){
            $username=htmlspecialchars($_POST["username"]);
            $pass=htmlspecialchars($_POST["pass"]);
            $error=[];
            if(strlen($username)<7){
                array_push($error, 'username_length');
            }
            if(strlen($pass)<7){
                array_push($error, 'pass_length');
            }
            // if(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{7,}$/', $pass)){
            //     array_push($error, 'pattern');
            // }
            if(!($username=='admin123' && $pass=='Admin123@')){
                array_push($error, 'loginfailed');
            }
            $param_str_err=implode('&', $error);
            if(count($error)>0){
                header(
                        'Location: http://localhost:82/C2108G2/index.php?'.$param_str_err,
                        true,
                        301
                );
            }
        }





        // if(!empty($_POST)){
        //     if(!$_POST["username"]){
        //         header('Location: index.php?error=er');
        //     }
        //     if(!$_POST["pass"]){
        //         header('Location: index.php?error=er');
        //     }
        //     if($_POST["username"]=='admin123'&&$_POST["pass"]=='1234567'){

        //     }else{
        //         header('Location: index.php?error=er');
        //     }
        // }    
    ?>

<h2>Quản lý sinh viên</h2>
    <form method="get" action="">
        <div><label>Tên sv: </label><input type="text" name="name" autocomplete="off"></div>
        <div><label>Năm sinh: </label><input type="date" name="dob"></div>
        <div><label>Giới tính: </label><input type="radio" name="gender" value="Nam">Nam<input type="radio" name="gender" value="Nữ">Nữ</div>
        <div><label>Môn học: </label><input type="checkbox" name="subject1" value="Toán">Toán<input type="checkbox" name="subject2" value="Lý">Lý<input type="checkbox" name="subject3" value="Hóa">Hóa</div>
        <div><label style="color: white;">v</label><input type="button" value="Them Mon"></div>
        <div><label>Lớp: </label>
            <select name="Lop">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select><input type="button" value="Them lop">
        </div>
        <div><button type="submit" name="submit">Thêm sinh viên</button></div>
    </form>
    <table border="1">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Lớp</th>
                <th>Năm sinh</th>
                <th>Giới tính</th>
                <th>Môn học</th>
                <th>Cập nhật</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if(!empty($_GET)){
                    if(isset($_GET['submit'])){ ?>
            <tr>
                <td><?php echo isset($_GET["name"])?$_GET["name"]:''; ?></td>
                <td><?php echo isset($_GET["Lop"])?$_GET["Lop"]:''; ?></td>
                <td><?php echo isset($_GET["dob"])?$_GET["dob"]:''; ?></td>
                <td><?php echo isset($_GET["gender"])?$_GET["gender"]:''; ?></td>
                <td><?php echo isset($_GET["subject1"])?$_GET["subject1"].'':'';
                          echo isset($_GET["subject2"])?$_GET["subject2"].'':'';
                          echo isset($_GET["subject3"])?$_GET["subject3"].'':'';
                    // if(isset($_GET["subject[]"])){
                        // foreach($_GET["subject[]"] as $sub){
                            // echo $sub.' '; 
                        // }
                    // }
                     ?></td>
                <td><button>Sửa</button><button>Xóa</button></td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>
</body>
</html>