<?php

class control
{
    public student $st;
    private $conn;
    function __construct()
    {
    }
    private  function connect()
    {
        $this->conn = new PDO('mysql:host=localhost;dbname=duong', 'root', 'duongcoi1803');
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    private  function disConnect()
    {
        if ($this->conn) {
            $this->conn = null;
        }
    }
    public  function add($data, $table)
    {
        try {
            $tbValue = '';
            $tbName = '';
            $this->connect();
         
            echo trim($tbName, ',') . '<br>';
            echo trim($tbValue, ',');
            $stmp = $this->conn->prepare("INSERT INTO $table(name,age,id,address,gender) VALUE(:name,:age,:id,:address,:gender)");
            foreach ($data as $key => $values) {
                // $stmp ->bindParam(":$key",$key);
                // $key=$values;
                echo $key.$values;
                // switch ($values) {
                //     case 'age':
                //         $tbValue .= ",$values";
                //         break;
                //     default:
                //         $tbValue .= ",'$values'";
                // }
          
            }
            $stmp->execute();
            echo 'đã insert thành công';
            $this->disConnect();
        } catch (PDOException $e) {
            echo 'Lỗi insert' . $e->getMessage();
        }
    }
    public  function edit()
    {
    }
    public  function delete()
    {
    }
    public  function remove()
    {
    }
}
$arr = array(
    "name" => "Nguyễn Dương",
    "age" => 20,
    "id" => "PH19060",
    "address" => "Nam Sách HD",
    "gender" => "Nam",
);
$con = new control();
$con->add($arr, 'sinhVien');
