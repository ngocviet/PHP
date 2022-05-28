<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// echo '<pre>';
// var_dump($_REQUEST);
// echo '</pre>';
//var_dump($_POST);
if(!empty($_POST)){
    if(!$_POST["name"]){
        header('Location: exampleform.php?error=name');
    }else{
        $bien_name = htmlspecialchars($_POST["name"]);
        echo "<p>Hello " . $bien_name . "!</p>";
    }
    // if(!$_POST["age"]){
    //     header('Location: exampleform.php?error=age');
    // }else{
    //     echo "Your age " . $_POST["age"];
    // }
}

?>
</body>
</html>
