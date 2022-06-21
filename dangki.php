<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        input{
            margin: 5px 0 0 30px;
        }
    </style>
    <?php
        require_once('config.php'); 
        if(isset($_POST['dangki'])):
            $user = htmlspecialchars($_POST['user']);
            $pass = htmlspecialchars($_POST['pass']);
            $passa = htmlspecialchars($_POST['passa']);
            if($user==''||$pass==''||$passa==''){
                header('Location: dangki.php?errorinformation');
                return;
            }
            if($pass != $passa){
                header('Location: dangki.php?errorpassa=');
                return;
            }
            $sql = sprintf("SELECT * FROM users where user = '%s'",mysqli_real_escape_string($conn,$user));
            try{
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    header('Location: dangki.php?user_exists');
                    return;
                }else{
                    $pass = sha1($pass);
                    $query = sprintf("INSERT INTO users (user, pass) VALUES ('%s','%s')",
                        mysqli_real_escape_string($conn,$user),
                        mysqli_real_escape_string($conn,$pass));
                    $res = $conn->query($query);
                    if($res){
                        header('Location: dangki.php?register_success');
                        return;
                    }
                }
            }catch(Exception $ex){
                echo $ex->getMessage();
            }
        endif;
    ?>
</head>
<body>
    <h2>REGISTER</h2>
    <form method="post" action="">
        <div><label>Username: </label><input type="text" placeholder="Enter your Username" autocomplete="off" name="user" required/></div>
        <div><label>Password: </label><input type="password" placeholder="Enter your Password" autocomplete="off" name="pass" required/></div>
        <div><label>Pass_Again: </label><input type="password" placeholder="Enter your Pass_again" autocomplete="off" name="passa" required/></div>
        <?php
            if(isset($_GET['errorinformation'])){
                echo"<p style='color: red'>Please enter your information full!!</p>";
            }
            if(isset($_GET['errorpassa'])){
                echo"<p style='color: red'>Pass again incorect!!</p>";
            }
            if(isset($_GET['user_exists'])){
                echo"<p style='color: red'>Username is exists!!</p>";
            }
        ?>
        <input type="submit" name="dangki" value="Register"/>
        <?php 
            if(isset($_GET['register_success'])){
                echo"<label style='color: green;font-weight: bold;font-size:20px;margin-left: 20px;'>Register success!!</label><a href='index.php' style='margin-left:20px;'>Login now!</a>";
            }
        ?>
    </form>
</body>
</html>