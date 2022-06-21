<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate</title>
</head>
<?php 
    require_once('config.php');
    $er_user = $er_pass ="";
    if(isset($_POST['login'])):
        $user = htmlspecialchars($_POST['username']);
        $pass = htmlspecialchars(($_POST['pass']));
        if($pass==''){
            $er_pass ="<div class='div'><label style='color: red;width:130px'>Please enter your pass</label></div>";
        }
        $pass = sha1($pass);
        if($user==''){
            $er_user = "<div class='div'><label style='color: red;width:130px'>Please enter your username</label></div>";
        }
        $sqllogin = sprintf("SELECT * FROM users where user = '%s' and pass = '%s'",mysqli_real_escape_string($conn,$user),mysqli_real_escape_string($conn,$pass));
        $sql1 = $conn->query($sqllogin);
        if($sql1->num_rows >0 ){
            session_start();
            $_SESSION['user'] = $user;
            header("Location: tableqlsv.php");
            echo"hi";
        }else{
            $er_user = "<div class='div'><label style='color: red;width:130px'>Login failed</label></div>";
        }

    endif;
?>
<body>
    <h2>Mời bạn nhập thông tin</h2>
        <form method="post" action="">
            <div><label>Username: </label><input type="text" placeholder="Enter your name" name="username" required autocomplete="off"/>
            </div>
            <div><label>Password: </label><input type="password" placeholder="Enter your pass" name="pass"/>
            <?php
                echo $er_user;
                echo $er_pass;
            ?>
            </div>
            <div><input type="submit" value="login" style="margin-right: 20px;" name="login"/><a href="dangki.php" style="margin-right: 20px">Register</a><a href="changepass.php">Change password</a></div>
        </form>
</body>
</html>