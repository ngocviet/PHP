<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
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
        if(isset($_POST['change'])):
            $error = [];
            $username = htmlspecialchars($_POST['username']);
            $pass = htmlspecialchars($_POST['pass']);
            $newpass = htmlspecialchars($_POST['newpass']);
            if($username == ''){
                array_push($error, 'username');
            }
            if($pass == ''){
                array_push($error, 'pass');
            }
            if($newpass == ''){
                array_push($error, 'newpass');
            }
            $pass = sha1($pass);
            $newpass = sha1($newpass);
            $sql = sprintf("SELECT * FROM abc12users where USERNAME='%s' and PASSWORD_HASH='%s'",mysqli_real_escape_string($conn,$username),mysqli_real_escape_string($conn,$pass));
            $resul = $conn->query($sql);
            if($resul->num_rows > 0){
                $sql = sprintf("UPDATE abc12users SET PASSWORD_HASH='%s' where USERNAME='%s' and PASSWORD_HASH='%s'",mysqli_real_escape_string($conn,$newpass),mysqli_real_escape_string($conn,$username),mysqli_real_escape_string($conn,$pass));
                $resul = $conn->query($sql);
                if($resul){
                    ?>
                        <body>        
                            <div style="text-align: center;"><h2 style="color: green;font-weight: bold;">Change Success!!</h2></div>
                            <div><a href="Login.php" style="color: green;font-weight: bold;font-size:30px;">Login now</a></div>
                        </body>
                    <?php
                    return;
                }
            }else{
                array_push($error,'changefail');
            }
            $sum_error = implode('&', $error);
            if(count($error) > 0){
                header('Location: Change_password.php?'.$sum_error);
            }
        endif;
    ?>
</head>
<body>
    <form method="post" action="">
        <h2>Reset password form</h2> 
        <?php
            if(isset($_GET['changefail'])){
                echo"<p style='color: red;font-weight: bold;font-size:30px;'>Change fail!!</p>";
            }
        ?>
        <div><label>Username: </label><input type="text" name="username" required autocomplete="off"/></div>
        <div><label>Current Password: </label><input type="password" name="pass" required /></div>
        <div><label>New Password: </label><input type="password" name="newpass" required /></div>
        <?php
            if(isset($_GET['username'])){
                echo"<p style='color: red;font-weight: bold;'>Please enter your username!!</p>";
            }
            if(isset($_GET['password'])){
                echo"<p style='color: red;font-weight: bold;'>Please enter your password!!</p>";
            }
            if(isset($_GET['newpass'])){
                echo"<p style='color: red;font-weight: bold;'>Please enter your new password!!</p>";
            }
        ?>
        <div><input type="submit" name="change" value="Change" style="margin-top:20px;"/></div>
    </form>
</body>
</html>