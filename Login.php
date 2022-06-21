<?php
    if(isset($_COOKIE['username'])){
        // unset($_SESSION['username']);
        ?>
            <body> 
                <div style="text-align: center;"><h2 style="color: green;font-weight: bold;font-size:30px;">Login Success!!</h2>
                <div style="text-align: center;"><button style="color: green;font-weight: bold;font-size:30px;" onclick="logOut();">Log out</button></div>
            </body>
        <?php
        return;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <?php
        // require_once('conn.php');
        $conn = new mysqli('localhost','root','');
        $sql_creDatabase = "CREATE DATABASE if not exists abc12";
        $viet = $conn->query($sql_creDatabase);
        $sql = "USE abc12";
        $conn->query($sql);
        $sql_table = "CREATE table if not exists abc12users(
            USERNAME varchar(100) not null unique,
            PASSWORD_HASH char(40) not null,
            PHONE varchar(10)
        )";
        $viet = $conn->query($sql_table);
        $conn = new mysqli('localhost','root','','abc12');

        if(isset($_POST['login'])):
            session_start();
            $error = [];
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            if($password == ''){
                array_push($error, 'password');
            }
            $password = sha1($password);
            if($username == ''){
                array_push($error, 'username');
            }
            $sql = sprintf("SELECT * From abc12users where USERNAME='%s' and PASSWORD_HASH='%s'",mysqli_real_escape_string($conn,$username),mysqli_real_escape_string($conn,$password));
            $resul = $conn->query($sql);
            if($resul->num_rows == 1){
                // $_SESSION['username']=$username;
                setcookie("username",$username,time()+30);
                setcookie("password",$password,time()+30);
            }
            if($resul->num_rows != 1 ){
                array_push($error,'loginfail');
            }
            if(isset($_COOKIE['username'])){
                // unset($_SESSION['username']);
                ?>
                    <body> 
                        <div style="text-align: center;"><h2 style="color: green;font-weight: bold;font-size:30px;">Login Success!!</h2>
                        <div style="text-align: center;"><a href="Login.php" style="color: green;font-weight: bold;font-size:30px;">Log out</a></div>
                    </body>
                <?php
                return;
            }
            $sum_error = implode('&', $error);
            if(count($error) > 0){
                header('Location: Login.php?'.$sum_error);
            }
        endif;
    ?>
</head>
<body>
    <?php if(!isset($_SESSION['username'])){?>
    <form method="post" action="">
        <?php
            if(isset($_GET['loginfail'])){
                echo"<p style='color: red;font-weight: bold;font-size:30px;'>Login fail!!</p>";
            }
        ?>
        <h2>Login form</h2>
        <div><label>Username: </label><input type="text" name="username" required  autocomplete="off"/></div>
        <div><label>Password: </label><input type="password" name="password" required /></div>
        <?php
            if(isset($_GET['username'])){
                echo"<p style='color: red;font-weight: bold;'>Please enter your username!!</p>";
            }
            if(isset($_GET['password'])){
                echo"<p style='color: red;font-weight: bold;'>Please enter your password!!</p>";
            }
        ?>
        <div><input type="submit" name="login" value="Login" style="margin:20px 20px 0 0;"/>
        <!-- <a href="Scren1_Register.php" style="margin-right: 20px;">Register</a><a href="Scren3_Resetpassword.php">Reset Password</a> -->
        </div>
    </form>
    <?php }?>
            <?php
                if(isset($_GET['logout'])){
                    setcookie("username",$username,time() -60);
                    header("Location: Login.php");
                }
            ?>  
    <script>
        function logOut(){
            alert("hi");
            window.location.href = "Login.php?logout";
        }
    </script>
</body>
</html>