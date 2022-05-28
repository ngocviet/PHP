<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example form</title>
</head>
<body>
<form method="post" action="hellodata.php">
    <br/>
    <label>Name</label>
    <br/>
    <input type="text" name="name" required/>
    <?php 
        if(!empty($_GET)){
            if($_GET["error"] == "name"){
                echo "<p style='color: red;'>Please enter your name</p>";
            }
        }
    ?>
    <br/>
    <label>Age</label>
    <br/>
    <input type="number" name="age" />
    <?php 
        if(!empty($_GET)){
            if($_GET["error"] == "age"){
                echo "<p style='color: red;'>Please enter your age</p>";
            }
        }
    ?>
    <label>DOB</label>
    <br/>
    <input name="dob" type="date" />
    <!-- <button type="submit">Submit</button> -->
    <input type=submit value="submit" />
</form>
</body>
</html>