<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    if(isset($_POST['submit'])){
        if(!file_exists('files')){
            mkdir('files',777,true);
        }
        $target_dir = 'files/';
        $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);

        if($imageFileType == 'jpg' ||$imageFileType == 'png' ){
            try{
               move_uploaded_file( $_FILES['fileToUpload']['tmp_name'], $target_file);
               $checkupload = true;
            }catch(Exception $ex){
                echo $ex->getMessage();
            }
        }
    }


?>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="fileupload" />
        <input type="submit" name="submit" value="Submit"/>
    </form>
</body>
</html>