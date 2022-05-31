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
            margin: 5px 310px 12px;
        }
        .div{
            margin: 0;
        }
        .div0{
            border: blue 5px solid;background-color: white;
        }
        /* form{
            background-color: white;
        } */
        h2{
            text-align: center;
        }
    </style>
</head>
<body style="background-color: white;">
    <h2>Mời bạn nhập thông tin</h2>
    <div class="div0">
        <form method="post" action="qlsv.php">
            <div><label>Username: </label><input type="text" placeholder="Enter your name" name="username" minlength="7" required autocomplete="off"/>
            </div>
            <div><label>Password: </label><input type="password" placeholder="Enter your pass" name="pass" minlength="7" require pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*@#$%^&*){7}"/>
            <?php
                if(!empty($_GET)){
                    if(isset($_GET['username_length'])){
                        echo '<p style="color:red;">Username phải có ít nhất 7 ký tự</p>';
                    }
                    if(isset($_GET['pass_length'])){
                        echo '<p style="color:red;">Password phải có ít nhất 7 ký tự</p>';
                    }
                    if(isset($_GET['pattern'])){
                        echo '<p style="color:red;">Password yêu cầu bao gồm kí tự thuưường, hoa, số và đặc biệt</p>';
                    }
                    if(isset($_GET['loginfailed'])){
                        echo '<p style="color:red;">Username va password khong khop</p>';
                    }
                }
            ?>
            </div>
            <div><label style="color: white">v</label><input type="submit" value="Submit" /></div>
        </form>
    </div>
</body>
</html>