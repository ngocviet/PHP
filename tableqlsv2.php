<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
    <table border="3">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Lớp</th>
                <th>Năm sinh</th>
                <th>Giới tính</th>
                <!-- <th>Môn học</th> -->
                <th>Cập nhật</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                // require_once('config.php');
                $conn = new mysqli('localhost','root','','test');
                $sql = sprintf("SELECT * from registration");
                $viet = $conn->query($sql);
                if($viet->num_rows > 0){
                    while($rows = $viet->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo$rows['name'] ?></td>
                            <td><?php echo$rows['Lop'] ?></td>
                            <td><?php echo$rows['dob'] ?></td>
                            <td><?php echo$rows['gender'] ?></td>
                            <td><button>Sửa</button><button>Xóa</button></td>
                        </tr>
                        <?php
                    }
                }
            ?>
        </tbody>
    </table>
    </form>
</body>
</html>