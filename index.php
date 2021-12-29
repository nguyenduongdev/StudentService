<?php
$firtName = "Hoang";
define("Last", "Duy");

$name = "hello my name is $firtName Last";
// $string1= 'hello $firtname' // no allow 
$fullName = $firtName . Last;
echo $firtName[2];
echo strlen($firtName); // độ dài chuỗi
// echo strtolower($firtName);
// echo strtoupper($firtName);
// echo str_replace('H','M',$firtName);
echo str_word_count("Duong hoc gio vl");
echo strpos("Hello world!", "l");
echo chop('duong coi');
$arr = str_split('duong coi 18 03'); //tách từng chữ thành mảng
echo stristr('duong coi', 'coi');
echo substr('cat chuoi', 4);
$text = "hello my name is duong i am learn php from w3school";
echo wordwrap(ucwords($text), 10, '<br>');
function getNum()
{
    static $num = 1;
    $num++;
    echo $num;
}
echo '<br>';
getNum();
getNum();
getNum();
getNum();
//Array
$animal = [
    ['cat', 'white', 1],
    ['dog', 'black', 4],
    ['chickend', 'yellow', 2],
];
print_r($animal);
echo $animal[0][1];
$animal2 = [
    ['name' => 'cat', 'color' => 'white', 'age' => 1],
    ['name' => 'dog', 'color' => 'black', 'age' => 4],
    ['name' => 'chickend', 'color' => 'yellow', 'age' => 2],
];
$animal2Length = count($animal2);
for ($i = 0; $i < $animal2Length; $i++) {
    echo '<br>';
    echo $animal2[$i]['name'];
}
for ($i = 0; $i < $animal2Length; $i++) {
    foreach ($animal2[$i] as $key => $value) {
        echo "<p>$key : $value</p> ";
    }
}
//Object in php
class car
{
    public $name;
    public $model;
    public $color;
    public function __construct($name, $model, $color)
    {
        $this->name = $name;
        $this->model = $model;
        $this->color = $color;
    }
    public function show()
    {
        echo "Tên xe: $this->name<br>Kiểu xe:$this->model<br>Màu xe:$this->color";
    }
}
$mec = new car('Mec', 'specical', 'black');
$mec->show();
$vin = new car('vinfast', 'limited', 'red');
$vin->show();

class champ
{
    public $name;
    public $skill;
    public function __construct($name, $skill)
    {
        $this->name = $name;
        $this->skill = $skill;
    }
    public function action()
    {
        echo "<br>champ $this->name<br> until $this->skill";
    }
}
$yasuo = new champ('yasuo', 'hasaki');
$yasuo->action();
class student
{
    public $name;
    public $id;
    public $gender;
    public function __construct($name, $id, $gender)
    {
        $this->name = $name;
        $this->id = $id;
        $this->gender = $gender;
    }
    public function infomation()
    {
        echo "Hello my nam is $this->name my id $this->id and gender is $this->gender";
    }
}
$duongs = new student('dương', '19067', 'nam');
$duongs->infomation();

$number1 = 1;
if (is_int($number1)) {
    echo '<br>Là số nguyên';
} else {
    echo '<br>không phải đâu em ơi';
}
$number2 = 1.93;
var_dump(is_float($number2));
$number3 = "23.2";
//check chuỗi số 
var_dump(is_numeric($number3));
var_dump(is_numeric($number2));
var_dump(is_numeric($number1));
echo '<br>';
$cast_number2 = (int)$number2;
var_dump(is_int($cast_number2));
echo $cast_number2;
echo "<br>";
function addFloat(float $a, float $b): float
{
    return $a + $b;
}
echo addFloat(3.4, 4, 4) + 2.2;
$so = 0;
$so5 = 7;
$so3 = 3;
function addg()
{
    $GLOBALS['so'] = $GLOBALS['so5'] + $GLOBALS['so3'];
    // $so =$so5+$so3;
    // echo $so;
    echo $GLOBALS['so'];
}
addg();
echo $so;
echo '<br>';
$mario = 'mario';
function intro(&$name)
{ //thêm '&' biến truyền vào =>global
    $name = "mistic";
    echo "hello $name";
}
   intro($mario);
     echo $mario; //giá trị biến cx thay đổi khi chạy hàm
//include
include('index2.php'); //include nếu lỗi vẫn chạy lệnh bên dưới
require('index2.php'); // require nếu lỗi break luôn
echo 'index.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- <h1> <?php echo $firtName ?></h1>
    <h2> <?php echo Last ?></h2>
    <h2> <?php echo $fullName ?></h2>
    <h2> <?php echo $name ?></h2> -->
</body>

</html>