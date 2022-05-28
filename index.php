<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate</title>
    <style>
        label{
            display: block;
            width: 90px;
            float: left;
        }
        div{
            margin: 0 20px 5px;
        }
    </style>
</head>
<body>
    <h2>Moi nhap thong tin</h2>
    <form method="get" action="qlsvdemo.php">
        <div><label>Username: </label><input type="text" placeholder="Enter your name" name="username" minlength="7" required/>
        <?php 
        if(!empty($_GET)){
            if($_GET["error"] == "username"){
                echo "<p style='color: red;'>Please enter your name</p>";
            }
        }
        ?>
        </div>
        <div><label>Password: </label><input type="password" placeholder="Enter your pass" name="pass" minlength="7"/>
        <?php 
        if(!empty($_GET)){
            if($_GET["error"] == "pass"){
                echo "<p style='color: red;'>Please enter your age</p>";
            }
        }
        ?>
        </div>
        <div><label style="color: white">v</label><input type="submit" value="Submit" />
    </form>
</body>
</html>