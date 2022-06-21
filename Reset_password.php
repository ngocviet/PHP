<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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

        function rand_pass(){
            $comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array(); 
            $combLen = strlen($comb) - 1; 
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $combLen);
                $pass[] = $comb[$n];
            }
            return implode($pass);
        }

        if(isset($_POST['reset'])){
            $error = [];
            $username = htmlspecialchars($_POST['username']);
            $phone = htmlspecialchars($_POST['phone']);
            if($username == ''){
                array_push($error, 'username');
            }
            
            if($phone == ''){
                array_push($error, 'phone'); 
            }
            $sql = sprintf("SELECT * FROM abc12users where USERNAME = '%s' and PHONE = '%s'", mysqli_real_escape_string($conn,$username), mysqli_real_escape_string($conn,$phone));
            $viet = $conn->query($sql);
            if($viet->num_rows > 0){
                $new_pass = rand_pass();
                $password = sha1($new_pass);
                    $sql = sprintf("UPDATE abc12users SET PASSWORD_HASH = '%s' where USERNAME = '%s' and PHONE = '%s'",mysqli_real_escape_string($conn,$password),mysqli_real_escape_string($conn,$username),mysqli_real_escape_string($conn,$phone));
                    $resul=$conn->query($sql);
                    if($resul){
                        ?>
                        <body>        
                            <div style="text-align: center;"><h2 style="color: green;font-weight: bold;">Reset Success!!</h2></div>
                            <div style="text-align: center;"><h2 style="color: green;font-weight: bold;">New pass: <?php echo $new_pass; ?></h2></div>
                            <div style="text-align: center;"><a href="Login.php" style="color: green;font-weight: bold;font-size:30px;">Login now</a></div>
                        </body>
                    <?php
                        return ;
                    }
            }else{
                array_push($error, 'reset'); 
            }
            $sum_error = implode('&', $error);
            if(count($error) > 0){
                header('Location: Reset_password.php?'.$sum_error);
            }
        }
    ?>
</head>
<body>
    <?php
        if(isset($_GET['reset'])){
            echo"<p style='color: red;font-weight: bold;font-size:30px;'>Reset fail!!</p>";
        }
    ?>
    <form method="post" action="">
        <h2>Reset password form</h2>
        <div><label>Username: </label><input type="text" name="username" required  autocomplete="off"/></div>
        <div><label>Phone number: </label><input type="text" name="phone" required /></div>
        <?php
            if(isset($_GET['username'])){
                echo"<p style='color: red;font-weight: bold;'>Please enter your username!!</p>";
            }
            if(isset($_GET['phone'])){
                echo"<p style='color: red;font-weight: bold;'>Please enter your phone number!!</p>";
            }
        ?>
        <div><input type="submit" name="reset" value="Resset" style="margin-top:20px;"/></div>
    </form>
</body>
</html>