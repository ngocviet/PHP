<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Pass</title>
    <style>
        div{
            margin: 0 0 10px 10px;
        }
    </style>
</head>
<?php
    require_once('config.php');
    if(isset($_POST['change'])):
        $user = htmlspecialchars($_POST['user']);
        $pass = htmlspecialchars($_POST['pass']);
        $pass = sha1($pass);
        $newpass = htmlspecialchars($_POST['newpass']);
        $newpass = sha1($newpass);
        $againpass = htmlspecialchars($_POST['againpass']);
        $againpass = sha1($againpass);
        if($user==''||$pass==''||$newpass==''||$againpass==''){
            header('Location: changepass.php?err_information');
            return; 
        }
        $sql = sprintf("SELECT * from users where user='%s' and pass = '%s'",mysqli_real_escape_string($conn,$user),mysqli_real_escape_string($conn,$pass));
        $conn->query($sql);
        if($conn->affected_rows > 0){ 
            if($newpass!=$againpass){
                header('Location: changepass.php?errnewpass');
                return;
            }else{
                $sql2 = sprintf("UPDATE users SET pass = '%s' where pass ='%s'",mysqli_real_escape_string($conn,$newpass),mysqli_real_escape_string($conn,$pass));
                $conn->query($sql2);
                $sucess = '';
            }
        }

    endif;
?>
<body>
    <form method="post" action="">
        <h2>CHANGE PASS</h2>
        <div><label>Username: </label><input type="text" placeholder="Username" name="user" required/></div>
        <div><label>Password: </label><input type="password" placeholder="Password" name="pass" required/></div>
        <div><label>New password: </label><input type="password" placeholder="New Password" name="newpass" required/></div>
        <div><label>Password again: </label><input type="password" placeholder="Password again" name="againpass" style="margin-right: 20px;" required/></div>
        <?php
        if(isset($sucess)){
                echo "<div style='color: green;font-weight: bold;margin-right: 20px;'>Change passqord success!!<a href='index.php' style='margin-left:20px;'>Login again</a></div>";
            }
            ?>
        
        <?php
            if(isset($_GET['errnewpass'])){
                echo"<p style='color: red'>Password incorrect!!</p>";
            }
            if(isset($_GET['err_information'])){
                echo"<p style='color: red'>Please enter your information full!!</p>";
            }
        ?>
        <div><input type="submit" value="Change" name="change"/></div>
    </form>
</body>
</html>