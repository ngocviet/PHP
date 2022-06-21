<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <style>
        .body1>div{
            text-align: center;
        }
    </style>
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
                array_push($error, 'user_exists');
            }else{
                $sql2 = sprintf("INSERT into abc12users(USERNAME,PASSWORD_HASH,PHONE) values('%s','%s','%s')",mysqli_real_escape_string($conn,$username),mysqli_real_escape_string($conn,$password),mysqli_real_escape_string($conn,$phone));
                $viet = $conn->query($sql2);
                if($viet){
                    ?>
                    <body class="body1">
                        <div><h2 style="color: green;font-weight: bold;">Register Success!!</h2></div>
                        <div><h2 style="color: green;">Your account is: <?php echo$username." with phone number: ".$phone; ?></h2></div>
                        <div><a href="Login.php" style="color: green;font-weight: bold;font-size:30px;">Login now</a></div>
                    </body>
                    <?php
                    return;
                }
            }
            $sum_error = implode('&', $error);
            if(count($error) > 0){
                header('Location: Register.php?'.$sum_error);
            }
        endif;
    ?>
</head>
<body>
    <form method="post" action=""> 
        <h2>Register form</h2>
        <div><label>Username :</label><input type="text" name="username" required autocomplete="off" autocomplete="off"/></div>
        <div><label>Password :</label><input type="password" name="password" required autocomplete="off"/></div>
        <div><label>Phone Number:</label><input type="number" name="phone" required/></div>
        <?php
            if(isset($_GET['username'])){
                echo"<p style='color: red;font-weight: bold;'>Please enter your username!!</p>";
            }
            if(isset($_GET['password'])){
                echo"<p style='color: red;font-weight: bold;'>Please enter your password!!</p>";
            }
            if(isset($_GET['phone'])){
                echo"<p style='color: red;font-weight: bold;'>Please enter your phone number!!</p>";
            }
            if(isset($_GET['user_exists'])){
                echo"<p style='color: red;font-weight: bold;'>Username exists!!</p>";
            }
        ?>
        <div><input type="submit" value="Registration" name="register" style="margin-top: 20px;"/></div>
    </form>
</body>
</html>