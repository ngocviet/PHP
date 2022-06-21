<?php
// BAI 1
$n = 157;
$m =$n;
// for(int i=0;i<strlen((string)$n);i++){
//     $s1 = $n%10;
//     if(i<strlen((string)$n)-1){
//         $n = floor($n/10);
//     }
// }
$s1 = $n%10;
$n = floor($n/10);
$s2 = $n%10;
$n = floor($n/10);
$s3=$n%10;
echo "So cua ban: ".$m." = ".$s3." _".$s2."_".$s1;
// $data = fgets(fopen('php://stdin','r'));
// echo 'Ban vua nhap vao tra tri: ',"\n";
// echo $data;
// BAI 2

class Student{
    private $name;
    private $age;
    public function __construct($name,$age){
        $this ->name = $name;
        $this ->age = $age;
    }
    public function getName(){
        return $this ->name;
    }
    public function getAge(){
        return $this ->age;
    }
}
echo"<br>";
$student = new Student('Viet', 19);
echo $student->getName();echo"<br>";
echo $student->getAge();
// echo $student->getName();

// BAI 3:
class Employee{
    private $name;
    private $age;
    private $interest;
    public function getNAme(){
        return $this ->name;
    }
    public function getAge(){
        return $this ->age;
    }
    public function getInterest(){
        return $this ->interest;
    }
    public function __construct($name,$age,$interest){
        $this ->name = $name;
        $this ->age = $age;
        $this ->interest = $interest;
    }
    public function gotoWork(){
        echo"go to work";
    }
}
echo"<br>";
$new = new Employee('Viet', 19, 'Game');
echo $new->getNAme();echo"<br>";
echo $new->getAge();echo"<br>";
echo $new->getInterest();echo"<br>";
echo $new->gotoWork();

?>