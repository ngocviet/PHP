<?php

class verhicle{
    public $wheels;
    public $name;
    public $date;
    public $warranty;
    public $type;
    public function __construct($wheels,$name,$date,$warranty,$type){
        $this ->wheels = $wheels;
        $this ->name = $name;
        $this ->date = $date;
        $this ->warranty = $warranty;
        $this ->type = $type;
    }
    function getWheels(){
        return $this -> wheels;
    }
    function getName(){
        return $this -> name;
    }
    function getdate(){
        return $this -> date;
    }
    function getWarranty(){
        return $this -> warranty;
    }
    function getType(){
        return $this -> type;
    }
}
    $List_verhicle=[
        new verhicle(2,'Wave',2010,2,'Motorbike'),
        new verhicle(4,'Hyundai grand i10',2015,2,'Car'),
        new verhicle(2,'Halaxy',2017,1,'Bike'),
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VI-ET</title>
    <style>
        /* h2{
            text-align: center;
        } */
        table{
            border-collapse: collapse;
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <div>
        <table border = 1>
            <h2>Bang Thong Tin So 1</h2>
            <thead>
                <tr>
                    <th>Name</th>                    
                    <th>Wheels</th>
                    <th>Date</th>
                    <th>Warranty</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                    for($i = 0; $i < count($List_verhicle);$i++){
                        echo "<tr><td>{$List_verhicle[$i]->getName()}</td><td>{$List_verhicle[$i]->getWheels()}</td><td>{$List_verhicle[$i]->getDate()}</td><td>{$List_verhicle[$i]->getWarranty()}</td><td>{$List_verhicle[$i]->getType()}</td></tr>";
                    }
                ?>
            </tbody>
        </table>
        <table border = 1>
            <h2>Bang Thong Tin So 2</h2>
            <thead>
                    <tr>
                        <th>Name</th>                    
                        <th>Wheels</th>
                        <th>Date</th>
                        <th>Warranty</th>
                        <th>Type</th>
                    </tr>
            </thead>
            <tbody>
                    <?php  
                        foreach($List_verhicle as $key => $sieuxe):
                            if($sieuxe->getType()=='Car' || $sieuxe->getType()=='Motorbike'){?>
                            <tr>
                                <td><?php echo $sieuxe->getName(); ?></td>
                                <td><?php echo $sieuxe->getWheels(); ?></td>
                                <td><?php echo $sieuxe->getdate(); ?></td>
                                <td><?php echo $sieuxe->getWarranty(); ?></td>
                                <td><?php echo $sieuxe->getType(); ?></td>
                            </tr>
                       <?php } endforeach; ?>

            </tbody>
        </table>
        <table border = 1>
            <h2>Bang Thong Tin So 3</h2>
            <thead>
                    <tr>
                        <th>Name</th>                    
                        <th>Wheels</th>
                        <th>Date</th>
                        <th>Warranty</th>
                        <th>Type</th>
                    </tr>
            </thead>
            <tbody>
                    <?php  
                        foreach($List_verhicle as $key => $sieuxe):?>
                            <tr>
                                <td><?php echo $sieuxe->getName(); ?></td>
                                <td><?php echo $sieuxe->getWheels(); ?></td>
                                <td><?php echo $sieuxe->getdate(); ?></td>
                                <td><?php echo $sieuxe->getWarranty(); ?></td>
                                <?php switch($sieuxe->getType()){
                                    case 'Car':?>
                                <td><?php echo $sieuxe->getType().'Car'; ?></td>
                                <?php break; ?>
                                <?php case 'Motorbike': ?>
                                <td><?php echo $sieuxe->getType().'Motorbike'; ?></td>
                                <?php break; ?>
                                <?php case 'Bike': ?>
                                <td><?php echo $sieuxe->getType().'Bike'; ?></td>
                                <?php break; ?>
                                <?php } ?>
                            </tr>
                       <?php  endforeach; ?>

            </tbody>
        </table>
    </div>
</body>
</html>