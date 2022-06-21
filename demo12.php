<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
     form{
        border: gray thin solid;
        width: 300px;
        height: 200px;
        margin: auto;
        background-color: gray;
    }
    input{
        margin-bottom: 5px;
        margin-left: 20px;
    }
    h2{
        text-align: center;
    }
</style>
<?php
if(isset($_POST["login"])):

endif;


?>
<body>
    <Form method="POST" action="">
        <h2>Đăng Nhập</h2>
        <label>Username:</label><input type="text" name="username" placeholder="Username">
        <?php
        if(isset($_POST["login"])){
            if($_POST['username']==''){
                echo'<p style="color:red">Username Khong duoc de trong</p>';
            }
        }
        ?>
        <br>
        <label>Password:</label><input type="password" name="password" placeholder="Password">
        <br>
        <input style="margin-left: 90px;" type="submit" value="Login" name="login">
        <a href="DangKy.PHP">Đăng Ký</a>
       

    </Form>
</body>
</html>