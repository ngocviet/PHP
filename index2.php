<?php
class Sinhvien
{
    public $name;
    public $age;
    public function __construct($nameparam, $ageparam)
    {
        $this->name = $nameparam;
        $this->age = $ageparam;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getAge()
    {
        return $this->age;
    }
}

$lst_sv = [
    new Sinhvien('Nguyen Van A', 20),
    new Sinhvien('Nguyen Van B', 21),
    new Sinhvien('Nguyen Van C', 22),
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #e1e1e1;
        }

        table tr,
        table td,
        table th {
            border: 1px solid #e1e1e1;
        }
    </style>
</head>

<body>
    <section class="table-outer">
        <h2>Bang sinh vien</h2>
        <!-- Table cach 1 -->
        <table>
            <thead>
                <tr>
                    <th>Ten</th>
                    <th>Tuoi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($lst_sv); $i++) :
                    echo '<tr>';
                    //  echo '<td>'.$lst_sv[$i]->getName().'</td><td>'.$lst_sv[$i]->getAge().'</td>';
                    echo "<td>{$lst_sv[$i]->getName()}</td><td>{$lst_sv[$i]->getAge()}<!--cach 2--></td>";
                    echo '</tr>';
                endfor;
                ?>
            </tbody>
        </table>
        <h2>Bang sinh vien cach 2</h2>
        <!-- table cach 2 -->
        <table>
            <thead>
                <tr>
                    <th>Ten</th>
                    <th>Tuoi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($lst_sv); $i++) :
                ?>
                    <tr>
                        <td><?php echo $lst_sv[$i]->getName(); ?></td>
                        <td><?php echo $lst_sv[$i]->getAge(); ?></td>
                    </tr>
                <?php
                endfor;
                ?>
            </tbody>
        </table>
    </section>
</body>

</html>