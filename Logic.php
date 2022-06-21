<?php
    require_once('conn.php');
    if(isset($_POST['register'])):
        $error = [];
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        if($password == ''){
            array_push($error, 'password');
        }
        $password = sha1($password);
        $phone = htmlspecialchars($_POST['phone']);
        if($username == ''){
            array_push($error, 'username');
        }
        
        if($phone == ''){
            array_push($error, 'phone'); 
        }

        $sql = sprintf("SELECT * From abc12users where USERNAME='%s'",mysqli_real_escape_string($conn,$username));
        $resul = $conn->query($sql);
        if($resul->num_rows >0){
            array_push($error, 'samepassword');
            return;
        }else{
            $sql2 = sprintf("INSERT into abc12users(USERNAME,PASSWORD_HASH,PHONE) values('%s','%s','%s')",mysqli_real_escape_string($conn,$username),mysqli_real_escape_string($conn,$password),mysqli_real_escape_string($conn,$phone));
            $viet = $conn->query($sql2);
            if($viet){
                ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                    <style>
                        div{
                            text-align: center;
                        }
                        *{
                            font-size: 40px;
                        }
                    </style>
                </head>
                <body>
                    <div><h2 style="color: green;font-weight: bold;">Register Success!!</h2></div>
                    <div><h2 style="color: red;">Your account is: <?php echo$username." with phone number: ".$phone; ?></h2></div>
                    <div><a href="Scren2_Login.php">Login now!!</a></div>
                </body>
                </html>
                <?php
            }
        }

        $sum_error = implode('&', $error);

        if(count($error) > 0){
            header('Location: Scren1_Register.php?'.$sum_error);
        }
    endif;

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
            $_SESSION['username']=$username;
        }else{
            array_push($error,'loginfail');
        }

        if(isset($_SESSION['username'])){
            ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                    <style>
                        div{
                            text-align: center;
                        }
                        *{ 
                            font-size: 40px;
                        }
                    </style>
                </head>
                <body>
                <div><h2 style="color: green;font-weight: bold;">Login Success!!</h2></div>
                </body>
                </html>
            <?php
        }

        $sum_error = implode('&', $error);

        if(count($error) > 0){
            header('Location: Scren2_Login.php?'.$sum_error);
        }
    endif;
    if(isset($_POST['reset'])):
        session_start();
        $error = [];
        $username = htmlspecialchars($_POST['username']);
        $phone = htmlspecialchars($_POST['phone']);

        if($username == ''){
            array_push($error, 'username');
        }
        if($phone == ''){
            array_push($error, 'phone');
        }

        $sql = sprintf("SELECT * From abc12users where USERNAME='%s' and PHONE='%s'",mysqli_real_escape_string($conn,$username),mysqli_real_escape_string($conn,$phone));
        $resul = $conn->query($sql);

        if($resul->num_rows == 1){
            header('Location: Scren3_Reset.php');
        }else{
            array_push($error,'resetfail');
        }


        $sum_error = implode('&', $error); 
        if(count($error) > 0){
            header('Location: Scren3_Resetpassword.php?'.$sum_error);
        }
    endif;

    if(isset($_POST['change'])):
        session_start();
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
        $pass = sha1($pass);
        $newpass = sha1($newpass);

        $sql = sprintf("SELECT * From abc12users where USERNAME='%s' and PASSWORD_HASH='%s'",mysqli_real_escape_string($conn,$username),mysqli_real_escape_string($conn,$pass));
        $resul = $conn->query($sql);

        if($resul->num_rows == 1){
            $sql2 = sprintf("UPDATE abc12users SET PASSWORD_HASH='%s' where USERNAME='%s'",mysqli_real_escape_string($conn,$newpass),mysqli_real_escape_string($conn,$username));
            $resul = $conn->query($sql2);
            if($resul){
                ?>
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Document</title>
                        <style>
                        div{
                            text-align: center;
                        }
                        *{
                            font-size: 40px;
                        }
                    </style>
                    </head>
                    <body>        
                        <div><h2 style="color: green;font-weight: bold;">Change Success!!</h2></div>
                    </body>
                    </html>
                <?php
            }
        }else{
            array_push($error,'changefail');
        }

        $sum_error = implode('&', $error);
        if(count($error) > 0){
            header('Location: Scren3_Reset.php?'.$sum_error);
        }
    
    endif;
?>