<?php

$arr_str = array(
   'toan','abcf','gdsfgdf','sdfsdf'
);
sort($arr_str);
foreach($arr_str as $value){
   echo $value.'<br>';
}
echo '<hr/>';
rsort($arr_str);
foreach($arr_str as $value){
   echo $value.'<br>';
}

$arr_str_asso = array(
   'keyabc' => 'toan',
   'linhtinh' => 'abcf',
   'fortest' => 'gdsfgdf',
   'helloworld' => 'sdfsdf'
);
echo '<hr/>';
asort($arr_str_asso);
foreach($arr_str_asso as $key => $value){
   echo $key.':'.$value.'<br>';
}
ksort($arr_str_asso);
foreach($arr_str_asso as $key => $value){
   echo $key.':'.$value.'<br>';
}

$contact = array(
   array(
      "name" => "David",
      "age"  => 20
   ),
   array(
      "name" => "Peter",
      "age"  => 21
   ),
   array(
      "name" => "John",
      "age"  => 22
   ),
);
echo '<pre>';
var_dump($contact);
echo '</pre>';
echo '<pre>';
var_dump($contact[1]);
echo '</pre>';
echo $contact[1]['name'];


class Person {
   public $name;
   public $age;
   function __construct($name,$age){
      $this->name = $name;
      $this->age = $age;
   }
   function getName () {
      return $this->name;
   }
   function setName($name) {
      $this->name = $name;
   }
   function getAge () {
      return $this->age;
   }
   function setAge($age) {
      $this->age = $age;
   }
}

//$person1 = new Person('toanngo',20);

$arr_asso = array(
   'john' => new Person('john',20),
   'jane' => new Person('jane',21),
   'joe' => new Person('joe',22),
);

echo '<pre>';
var_dump($arr_asso);
echo '</pre>';
echo '<pre>';
var_dump($arr_asso['jane']);
echo '</pre>';
echo $arr_asso['joe']->name;
echo $arr_asso['joe']->getName();


$arr = [2,3,4,2,2,5,3,2,9,10];
$arr2 = array(1,2,3,4,4,55);
$arr_asso_ps = array(
   new Person('toanngo',20),
   new Person('toanngo1',20),
   new Person('toanngo2',20),
);
foreach($arr as $key => $value){
   echo '<p>'.$value.'</p>';
   if($key == 4) {
      continue;
   }
   // todo
}

// vong lap foreach
echo 'vong lap break';
foreach($arr as $value) {
  
   if($value == 4) {
      break;
   }
   echo '<p>'.$value.'</p>';
}
?><hr/><?php

// vong lap for
for($i = 0; $i < count($arr); $i++) {
   echo '<p>'.$arr[$i].'</p>';
}
// vong lap foreach
foreach($arr as $value) {
   echo '<p>'.$value.'</p>';
}

foreach($arr as $key => $value):
   echo '<p>'.$key.'=>'.$value.'</p>';
endforeach;

