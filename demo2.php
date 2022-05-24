<?php
class Student{
    public $name;
    public $age;
    public function __construct($nameparam,$ageparam){
        $this->name = $nameparam;
        $this->age = $ageparam;
    }
    puclic function getName(){
        return $this->name;
    }
}
$ongtoan = new Student('toan',20);
echo $ongtoan;